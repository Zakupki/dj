<?php

class ChronicleController extends FrontController
{
    public function init()
    {
        parent::init();
        Yii::import('common.extensions.yii-mail.*');
    }

    public function actionIndex()
    {
        $this->render('index');
    }
    public function actionView()
    {
        $this->render('view');
    }
}