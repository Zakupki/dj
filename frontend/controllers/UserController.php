<?php

class UserController extends FrontController
{
    public function init()
    {
        parent::init();
        if (Yii::app()->user->getId() < 1)
            $this->redirect(Yii::app()->user->returnUrl);
        Yii::import('common.extensions.yii-mail.*');
    }

    public function actionProfile()
    {
        //$user = User::model()->findByPk(yii::app()->user->getId());
        //$companygroups = Companygroup::model()->with(array('companies' => array('with' => array('companyUsers')), 'companygroupUsers'))->findAll('companygroupUsers.user_id=' . yii::app()->user->getId());
        $this->setBodyClass('profile');
        $this->render('profile');
    }

    public function actionUpdateprofile()
    {
        $model = ProfileForm::findByPk(user()->getId());
        if (isset($_POST['ajax']) && $_POST['ajax'] === 'profile-form') {
            //echo 1;
            echo CActiveForm::validate($model);
            Yii::app()->end();
        }
        if (isset($_POST['ProfileForm'])) {
            $model->attributes = $_POST['ProfileForm'];
            // validate user input and redirect to the previous page if valid
            if ($model->validate()) {
                $model->save();
                $this->redirect('/user/profile/#/profiledata');
            }
        }


    }

    public function actionUpdatemarkets()
    {
        $model = new UsermarketForm;
        if (isset($_POST['UsermarketForm'])) {
            $model->attributes = $_POST['UsermarketForm'];
            $model->save();
        } else
            $model->deleteUsers();
        echo CJSON::encode(array('error' => 'false'));

    }

    public function actionProfiledata()
    {
        $model = ProfileForm::findByPk(user()->getId());
        $this->renderPartial('inc/profiledata', array('model' => $model));
    }

    public function actionCompanies()
    {
        $companytree = Company::model()->getCompaniesTree();

        //CVarDumper::dump($companytree, 10, true);

        $companygroups = Companygroup::model()->active()->with(array('companies' => array('with' => array('companyUsers'=>array('with'=>array('companyrole')))), 'companygroupUsers'))->findAll('companygroupUsers.user_id=' . yii::app()->user->getId());

        $this->setBodyClass('profile');
        $this->renderPartial('inc/companies', array('companygroups' => $companygroups, 'companytree' => $companytree));
    }

    public function actionCompanyedit()
    {
        if (isset($_POST['company_id']))
            $model = CompanyForm::findByPk($_POST['company_id']);
        else{
            $model = new CompanyForm;
            if(isset($_POST['companygroup_id']))
            $model->companygroup_id=$_POST['companygroup_id'];
        }
        //print_r($model->attributes);
        $this->renderPartial('inc/company_edit', array('model' => $model));
    }

    public function actionUpdatecompany()
    {
        if(isset($_POST['company_id']) && isset($_POST['delete'])){
            $c=Company::model()->findByPk($_POST['company_id']);
            if($c->companygroup_id>0)
            $ug=CompanygroupUser::model()->findByAttributes(array('companygroup_id'=>$c->companygroup_id,'user_id'=>user()->getId()));
            if($ug->id>0)
                Company::model()->deleteByPk($_POST['company_id']);
            echo json_encode(array('error'=>'false','status'=>'Вы успешно удалили компанию.'));
            Yii::app()->end();
        }

        $model = new CompanyForm;
        if (isset($_POST['ajax']) && $_POST['ajax'] === 'company-form') {
            echo CActiveForm::validate($model);
            Yii::app()->end();
        }
        if (isset($_POST['CompanyForm'])) {
            $model->attributes = $_POST['CompanyForm'];
            // validate user input and redirect to the previous page if valid
            if ($model->validate()) {
                if($model->save())
                    echo json_encode(array('error'=>'false','status'=>'Вы успешно добавили компанию.'));
                else
                    echo json_encode(array('error'=>'true','status'=>'Произошла ошибка. Вам не удалось создать компанию.'));
            } else
                echo CActiveForm::validate($model);
        }
    }

    public function actionUseredit()
    {
        $company = '';
        if (isset($_POST['companyuser_id']))
            $model = CompanyUserForm::findByLink($_POST['companyuser_id']);
        else {
            $model = new CompanyUserForm;
            if (isset($_POST['company_id'])){
                $company = Company::model()->findByPk($_POST['company_id']);
                $model->companytitle = $company->title;
                $model->company_id = $company->id;
            }
        }
        if(isset($model->id))
            $merge=array('disabled'=>'disabled');
        else
            $merge=array();

        $this->renderPartial('inc/user_edit', array('model' => $model,'merge'=>$merge));
    }

    public function actionUpdatecompanyuser()
    {

        if(isset($_POST['companyuser_id']) && isset($_POST['approve'])){
            $cu=CompanyUser::model()->with(array('company','user'))->findByPk($_POST['companyuser_id']);
            $ug=CompanygroupUser::model()->with('user')->findByAttributes(array('companygroup_id'=>$cu->company->companygroup_id,'user_id'=>user()->getId()));
            if($ug->id>0){
                $cu->status=1;
                $cu->save();
            }

            #Подтверждение заявки
            $contr=Yii::app()->controller;
            $contr->layout="mail";
            $body =$contr->render('/mail/aprovejoin_company', array('user' => $cu->user, 'company'=>$cu->company,'groupadmin'=>$ug->user), true);
            $message = new YiiMailMessage();
            $message->setBody($body, 'text/html');
            $message->setSubject('Подтверждение заявки');
            $message->setTo($cu->user->email);
            $message->setFrom(array(
                'info@zakupki-online.com' => 'Zakupki-Online.com'
            ));
            Yii::app()->mail->send($message);

            echo json_encode(array('error'=>'false','status'=>'Вы успешно активировали нового пользователя.'));
            Yii::app()->end();
        }
        if(isset($_POST['companyuser_id']) && isset($_POST['delete'])){
            $cu=CompanyUser::model()->with(array('company','user'))->findByPk($_POST['companyuser_id']);
            $ug=CompanygroupUser::model()->findByAttributes(array('companygroup_id'=>$cu->company->companygroup_id,'user_id'=>user()->getId()));
            if($ug->id>0)
                CompanyUser::model()->deleteByPk($_POST['companyuser_id']);

            if($cu->status==1){
                #Подтверждение заявки
                $contr=Yii::app()->controller;
                $contr->layout="mail";
                $body =$contr->render('/mail/cancel_join_company', array('user' => $cu->user, 'company'=>$cu->company,'groupadmin'=>$ug->user), true);
                $message = new YiiMailMessage();
                $message->setBody($body, 'text/html');
                $message->setSubject('Вас удалили из компании');
            }else{
                #Подтверждение заявки
                $contr=Yii::app()->controller;
                $contr->layout="mail";
                $body =$contr->render('/mail/decline_join_company', array('user' => $cu->user, 'company'=>$cu->company,'groupadmin'=>$ug->user), true);
                $message = new YiiMailMessage();
                $message->setBody($body, 'text/html');
                $message->setSubject('Заявка на присоединение к компании отклонена');
            }
            $message->setTo($cu->user->email);
            $message->setFrom(array(
                'info@zakupki-online.com' => 'Zakupki-Online.com'
            ));
            Yii::app()->mail->send($message);

            echo json_encode(array('error'=>'false','status'=>'Вы успешно отключили пользователя.'));
            Yii::app()->end();
        }

        if(isset($_POST['CompanyUserForm']['id']))
            $model = new CompanyUserForm('update');
        else
            $model = new CompanyUserForm('create');
        if (isset($_POST['ajax']) && $_POST['ajax'] === 'user-form') {
            echo CActiveForm::validate($model);
            Yii::app()->end();
        }
        if (isset($_POST['CompanyUserForm'])) {
            $model->attributes = $_POST['CompanyUserForm'];
            if ($model->validate()) {
                if($model->save())
                    if($model->scenario=='create')
                        echo json_encode(array('error'=>'false','status'=>'Вы успешно добавили пользователя.'));
                    else
                        echo json_encode(array('error'=>'false','status'=>'Вы успешно отредактировали роль пользователя.'));
                    Yii::app()->end();
            } else
                echo json_encode(array('error'=>'true','status'=>'Произошла ошибка. Вам не удалось выполнить операцию.'));
        }


    }

    public function actionSettings()
    {
        if(!yii::app()->user->getId())
            return;
        $user=User::model()->findByPk(yii::app()->user->getId());
        if(isset($user->id)){
            if(isset($_POST['plantabs'])){
                $user->plantabs=$_POST['plantabs'];
                Yii::app()->session['plantabs']=$user->plantabs;
            }
            if(isset($_POST['requests_purchase_id'])){
                $user->requests_purchase_id=$_POST['requests_purchase_id'];
                Yii::app()->session['requests_purchase_id']=$user->requests_purchase_id;
            }
            $user->save();
        }

    }

    public function actionContacts()
    {
        $market_id='';
        $role_id='';
        if(isset($_REQUEST['market_id']))
            $market_id=$_REQUEST['market_id'];
        if(isset($_REQUEST['role_id']))
            $role_id=$_REQUEST['role_id'];
        $users=User::model()->getContacts(array('start'=>0,'take'=>0,'market_id'=>0,'role_id'=>0));
        $contacts=$this->renderPartial('inc/morecontacts',array('users'=>$users),true);
        $this->render('contacts',array('contacts'=>$contacts,'market_id'=>$market_id,'role_id'=>$role_id));
    }
    public function actionMorecontacts()
    {
        $take=0;
        $start=0;
        $market_id=0;
        $role_id=0;
        if(isset($_REQUEST['take']))
            $take=$_REQUEST['take'];
        if(isset($_REQUEST['start']))
            $start=$_REQUEST['start'];
        if(isset($_REQUEST['market_id']))
            if($_REQUEST['market_id']>0)
            $market_id=$_REQUEST['market_id'];
        if(isset($_REQUEST['role_id']))
            if($_REQUEST['role_id']>0)
                $role_id=$_REQUEST['role_id'];
        $users=User::model()->getContacts(array('start'=>$start,'take'=>$take,'market_id'=>$market_id,'role_id'=>$role_id));
        $this->renderPartial('inc/morecontacts',array('users'=>$users));
    }
    public function actionBalance()
    {
        $this->render('balance');
    }
    public function actionGetcontacts(){
        if(Yii::app()->request->isAjaxRequest){
            echo CJSON::encode(User::model()->findContacts($_POST));
        }
    }
    public function actionInvitetopurchase(){
        if(isset($_POST['invitecontacts'])){
            $users=User::model()->findAll('t.id in('.implode(',',array_keys($_POST['invitecontacts'])).')');
            $cnt=0;
            foreach($users as $user){
                    $username=$user->first_name.' '.$user->last_name;
                    $products=Product::model()->with(array('tag','unit'))->findAllByAttributes(array('purchase_id'=>$_POST['purchase_id']));
                    $purchase=Purchase::model()->with('company')->findByPk($_POST['purchase_id']);
                    $contr=Yii::app()->controller;
                    $contr->layout="mail";
                    $body =$contr->render('/mail/invite_email', array('products' => $products, 'purchase'=>$purchase,'user'=>$username), true);
                    $queue = new EmailQueue();
                    $queue->to_email = $user->email;
                    $queue->subject = "Приглашение принять участие в торгах";
                    $queue->from_email = 'support@zakupki-online.com';
                    $queue->from_name = 'Zakupki-online';
                    $queue->date_published = new CDbExpression('NOW()');
                    $queue->message = $body;
                    if($queue->save())
                        $cnt++;
            }
            echo CJSON::encode(array('error'=>false, 'status'=>'Вы успешно пригласили '.$cnt.' поставщиков в ваш тендер'));
        }else
        echo CJSON::encode(array('error'=>true, 'status'=>'произошла ошибка'));
    }
}