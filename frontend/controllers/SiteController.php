<?php

class SiteController extends FrontController
{
    public function init()
    {
        parent::init();
        Yii::import('common.extensions.yii-mail.*');
    }

    public function actionIndex()
    {
        if (Yii::app()->user->getId() > 0)
            $this->redirect('/plan/list/');

        $this->setBodyClass('index');
        $this->render('index');
    }

    public function actionRegister()
    {

        $this->setPageId(2);

        $model = new RegisterForm;
        // if it is ajax validation request

        if (isset($_POST['ajax']) && $_POST['ajax'] === 'register-form') {
            echo CActiveForm::validate($model);
            Yii::app()->end();
        }

        if (isset($_POST['RegisterForm'])) {
            $model->attributes = $_POST['RegisterForm'];
            // validate user input and redirect to the previous page if valid
            if ($model->validate()) {
                if ($model->register())
                    $this->redirect(Yii::app()->user->returnUrl);
                else
                    $this->redirect('/site/register/');
            }
        }


        $this->setBodyClass('registration');

        if (isset($_GET['page']))
            $page = $_GET['page'];
        else
            $page = null;
        $user = Yii::app()->user->getData();
        $this->render('register', array('model' => $model, 'user' => $user, 'page' => $page));
    }

    public function actionGetmarkets()
    {
        Market::model()->getAutocomplete();
    }

    public function actionGetregistercompany()
    {
        $company = Company::model()->findRegisterByEgrpou(trim($_GET['id']));
        echo CJSON::encode($company);
    }
    public function actionGetmarketcompanies()
    {
        $company = Company::model()->findMarketCompanies(trim($_REQUEST['market_id']));
        echo CJSON::encode($company);
    }
    public function actionGetregions()
    {
        echo CJSON::encode(Region::model()->getCountryRegions($_GET['country_id']));
    }

    public function actionGetcities()
    {
        echo CJSON::encode(City::model()->getRegionCities($_GET['region_id'], $_GET['term']));
    }

    public function actionGettags()
    {
        echo CJSON::encode(Tag::model()->getAutotag($_GET['term']));
    }

    public function actionGetcompany()
    {
        echo CJSON::encode(Company::model()->getAutocompany($_GET['term']));
    }

    public function actionGetfiltercompany()
    {
        echo CJSON::encode(Company::model()->getRequestCompanies($_GET['term'],$_GET['pageid']));
    }

    public function actionGetuser()
    {
        echo CJSON::encode(User::model()->findUser($_GET['term']));
    }

    public function actionGetmarkettype()
    {
        echo Market::model()->getMarkettype($_GET['markettype_id']);
    }

    /**
     * This is the action to handle external exceptions.
     */
    public function actionerrorr()
    {
        if($_SERVER['REMOTE_ADDR']!='31.42.52.10')
            $this->redirect('/');
        if ($error = Yii::app()->errorHandler->error) {
            if (Yii::app()->request->isAjaxRequest)
                echo $error['message'];
            else
                $this->render('error', $error);
        }
    }
    public function actionError()
    {
        if ($error = Yii::app()->errorHandler->error) {
            if (Yii::app()->request->isAjaxRequest)
                echo $error['message'];
            else
            {
                unset($error['traces']);
                if($_SERVER['HTTP_HOST']=='newzakupki2.reactor.ua'){
                    CVarDumper::dump($error,10,true);
                }else{
                    $this->render('error', $error);
                }
            }
        }
    }


    public function actionLoginoauth()
    {
        $service = Yii::app()->request->getQuery('service');
        if (isset($service)) {
            $authIdentity = Yii::app()->eauth->getIdentity($service);
            $authIdentity->redirectUrl = Yii::app()->request->getQuery('page');
            $authIdentity->cancelUrl = $this->createAbsoluteUrl('/');

            if ($authIdentity->authenticate()) {
                $identity = new EAuthUserIdentity($authIdentity);


                if ($identity->authenticate()) {
                    $checkuser = User::model()->findByAttributes(array(
                        'email' => $identity->getEmail()
                    ));
                    $user = User::model()->fbUser($identity);

                    $model = new LoginForm;
                    $model->attributes = $user->attributes;
                    if ($model->fblogin()) {
                        //echo $authIdentity->redirectUrl;
                        //die();
                        if ($checkuser)
                            $this->redirect($authIdentity->redirectUrl);
                        else {
                            $this->redirect(array('/site/register/', 'page' => urlencode(trim($authIdentity->redirectUrl, '/'))));
                        }
                    } else {
                        $authIdentity->cancel();
                    }

                } else {
                    // close popup window and redirect to cancelUrl
                    $authIdentity->cancel();
                }

            }
            // Something went wrong, redirect to login page
            $this->redirect(array('/'));
            Yii::app()->end();
        }
    }


    /**
     * Displays the login page
     */
    public function actionLogin()
    {
        $model = new LoginForm;
        // if it is ajax validation request
        if (isset($_POST['ajax']) && $_POST['ajax'] === 'login-form') {
            echo CActiveForm::validate($model);
            Yii::app()->end();
        }

        // collect user input data
        if (isset($_POST['LoginForm'])) {
            $model->attributes = $_POST['LoginForm'];
            // validate user input and redirect to the previous page if valid
            if ($model->validate() && $model->login())
                $this->redirect(Yii::app()->user->returnUrl);
        }
        // display the login form
        $this->render('login', array('model' => $model));
    }
    public function actionForgot()
    {
        $model = new ForgotForm;
        if (isset($_POST['ajax'])) {
            echo CActiveForm::validate($model);
            die();
        }
        if (isset($_POST['ForgotForm'])) {
            $model->attributes = $_POST['ForgotForm'];
            $model->retrieve();
        }
    }
    public function actionRetrieve(){
        if(User::model()->confirmRetrieve($_GET['code'])){
            $data['text']='Новые параметры доступа отправлены на ваш email.';
        }else{
            $data['text']='Ссылка по которой Вы перешли устарела.';
        }
        $this->layout='main';
        $this->render('text', array('data' => $data));
    }


    /**
     * Logs out the current user and redirect to homepage.
     */
    public function actionLogout()
    {
        Yii::app()->user->logout(false);
        unset($_COOKIE['PHPSESSID']);
        $this->redirect(Yii::app()->homeUrl);
    }

    public function actionGethelp()
    {
        $helps = array();
        if (isset($_GET['id']))
            $helps = Help::model()->with('helpgroup')->findAll('helpgroup.page_id=' . $_GET['id']);
        $this->renderPartial('help', array('helps' => $helps));
    }

    public function actionTest2()
    {
        if (Yii::app()->detectMobileBrowser->showMobile) {
            echo 'mobile';

        } else
            echo 'not mobile';
    }

    public function actionProfilecompanies()
    {
        $company = Company::model()->getProfileCompanies();
        echo CJSON::encode($company);
    }

    public function actionSetactivecompany()
    {
        if (isset($_POST['company_id']) && yii::app()->user->getId() > 0) {
            $model = CompanyUser::model()->with('company')->findByAttributes(array('user_id' => yii::app()->user->getId(), 'company_id' => $_POST['company_id']));
            if ($model->id && !$model->major) {
                CompanyUser::model()->updateAll(array('major' => 0, 'user_id=:user_id AND company_id!=:company_id AND major=1', array(':user_id' => yii::app()->user->getId(), ':company_id' => $_POST['company_id'])));
                $model->major = 1;
                if ($model->save()) {
                    $city=City::model()->findByPk($model->company->city_id);
                    if($city)
                        $city_title=$city->title;
                    else
                        $city_title='';
                    Yii::app()->session['major_company'] = array('id' => $model->company_id, 'title' => $model->company->title, 'city' => $city_title, 'balance'=>Payments::model()->companyBalance($model->company_id));
                }
            }
        }
    }
    #tests
    public function actionTest3()
    {
        /* $form = new FeedbackForm();
         if ($form->validate()) {
             echo    $form->send();



         }*/
        $body = $this->renderPartial('/mail/register', array('a' => 1), true);
        $message = new YiiMailMessage();
        $message->setBody($body, 'text/html');
        $message->setSubject('Регистрация');
        $message->setTo('dmitriy.bozhok@gmail.com');
        $message->setFrom(array(
            'info@zakupki-online.com' => 'Zakupki-Online.com'
        ));
        return Yii::app()->mail->send($message);


        //print_r(CHtml::listData(Market::model()->findAll(), 'id', 'title', 'markettepe_id'));
        //$form =new RegisterForm;
        //$model=
        //echo CHtml::activeDropDownList($form,'markets',CHtml::listData(Market::model()->findAll(),'id','title','markettype.title')); //brand.name is going to group the items.

    }
    public function actionActivate()
    {
        if(User::model()->confirmEmail($_GET['activation_code'])){
            $data['text']='Вы успешно подтвердили Вашу учетную запись.';
        }else{
            $data['text']='Ссылка по которой Вы перешли устарела.';
        }
        $this->render('text', array('data' => $data, 'data' => $data));
    }
    public function actionTime()
    {
        echo date('H:i:s');
    }
    public function actionTest()
    {
        echo date('H:i:s');
        die();
        $company=Company::model()->findAll();
        $tot=count($company);
        foreach($company as $c){
            $bill=new Payments;
            $bill->amount=5000;
            $bill->user_id=2;
            $bill->company_id=$c->id;
            $bill->paysystem_id=5;
            $bill->status=2;
            $bill->save();
            $tot--;
        }
        echo $tot;
        /*die();
        if(!Yii::app()->cache->get('new_purchase_id')){
            echo 'update';
            Yii::app()->cache->set('new_purchase_id', '222');
        }
        echo '<br>';
        echo Yii::app()->cache->get('new_purchase_id');*/
    }
    public function actionSignin(){
        /*echo Yii::app()->session['logintoken']; // Prints "value"
        echo "<br>";
        echo md5('zhl'.date('Ymdhi'));*/

        if(Yii::app()->session['logintoken']==md5('zhl'.date('Ymdhi'))){
            $identity=new UserIdentity($_GET['email'],123);
            $identity->authenticate(true);
            Yii::app()->user->login($identity);
            unset(Yii::app()->session['major_company']);
            $this->redirect('/');
        }
        /*$identity=new UserIdentity($_GET['email'],123);
        $identity->authenticate(true);
        //Yii::app()->user->login($identity);
        $this->redirect('/');*/
        /*
        $role = Rights::getAssignedRoles(Yii::app()->user->Id);
        foreach ($role as $role)
            echo $role -> name;*/
    }
    public function actionPresentation(){
        $this->layout='presentation';
        $this->render('presentation');
    }
    public function actionGetupdates(){
        echo CJSON::encode(User::model()->getUpdates());
    }
    public function actionOfferexport(){
        header("Content-type: text/xml");

        $connection = Yii::app()->db;
        $sql = '
            SELECT
              z_offer.id AS offer_id,
              z_offer.`product_id`,
              z_product.`purchase_id`,
              z_company.id AS buyer_id,
              z_company.title AS buyer_name,
              CONCAT(z_user.`first_name`," ",z_user.`last_name`) AS buyer_user,
              z_purchase.`date_closed`,
              z_purchase.`date_deliver`,
              z_offer.`delay`,
              z_tag.title AS product,
              z_offer.`amount`,
              z_unit.title AS unit,
              z_offer.`price`,
              z_offer.`price`*z_offer.`amount` AS total,
              z_offer.`delivery`,
              company.id AS seller_id,
              company.title AS seller_name,
              company.egrpou AS seller_egrpou
            FROM
              z_offer
              INNER JOIN z_tag
                ON z_tag.`id` = z_offer.`tag_id`
              INNER JOIN z_product
                ON z_product.id=z_offer.product_id
              INNER JOIN z_unit
                ON z_unit.`id`=z_product.`unit_id`
              INNER JOIN z_purchase
                ON z_purchase.id=z_product.`purchase_id`
              INNER JOIN z_company
                ON z_company.id=z_purchase.`company_id`
              INNER JOIN z_user
                ON z_user.id=z_purchase.`user_id`
              INNER JOIN z_company company
                ON company.id=z_offer.`company_id`
            WHERE z_offer.`winner` = 1 AND z_purchase.company_id=1
            LIMIT 0, 20
            ';
        $command = $connection->createCommand($sql);
        //$command->bindParam(":purchase_id", $params['purchase_id'], PDO::PARAM_INT);
        $offers = $command->queryAll();


        $xml_output = "<?xml version=\"1.0\"?>\n";
        $xml_output .= "<entries>\n";

        foreach($offers as $row){
            $xml_output .= "\t<entry>\n";
            //$xml_output .= "\t\t<date>" . $row['date'] . "</date>\n";
            // Escaping illegal characters
            $row['buyer_name'] = str_replace("&", "&", $row['buyer_name']);
            $row['buyer_name'] = str_replace("<", "<", $row['buyer_name']);
            $row['buyer_name'] = str_replace(">", "&gt;", $row['buyer_name']);
            $row['buyer_name'] = str_replace("\"", "&quot;", $row['buyer_name']);

            $row['buyer_user'] = str_replace("&", "&", $row['buyer_user']);
            $row['buyer_user'] = str_replace("<", "<", $row['buyer_user']);
            $row['buyer_user'] = str_replace(">", "&gt;", $row['buyer_user']);
            $row['buyer_user'] = str_replace("\"", "&quot;", $row['buyer_user']);

            $row['product'] = str_replace("&", "&", $row['product']);
            $row['product'] = str_replace("<", "<", $row['product']);
            $row['product'] = str_replace(">", "&gt;", $row['product']);
            $row['product'] = str_replace("\"", "&quot;", $row['product']);

            $row['seller_name'] = str_replace("&", "&", $row['seller_name']);
            $row['seller_name'] = str_replace("<", "<", $row['seller_name']);
            $row['seller_name'] = str_replace(">", "&gt;", $row['seller_name']);
            $row['seller_name'] = str_replace("\"", "&quot;", $row['seller_name']);
            foreach($row as $k=>$v){
                $xml_output .= "\t\t<".$k.">".$v."</".$k.">\n";
            }
            $xml_output .= "\t</entry>\n";
        }

        $xml_output .= "</entries>";

        echo $xml_output;
    }

}