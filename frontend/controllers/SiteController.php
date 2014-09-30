<?php

class SiteController extends FrontController
{
    public function actionIndex()
    {
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
            CVarDumper::dump($error,10,true);
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
    public function actionContacts(){
        $this->render('contacts');
    }

}