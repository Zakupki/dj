<?php

class ArticleController extends FrontController
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
}