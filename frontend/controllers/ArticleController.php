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
        $articles=Article::model()->findAll();
        $this->render('index',array('articles'=>$articles));
    }
    public function actionView($id)
    {
        $article=Article::model()->findByPk($id);
        $this->render('view',array('article'=>$article));
    }
}