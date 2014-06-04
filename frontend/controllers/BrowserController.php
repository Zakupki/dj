<?php

class BrowserController extends FrontController
{
    public function init()
    {
        parent::init();
    }

    public function actionIndex()
    {
        $browsers['Chrome']=array('name'=>'Chrome','img'=>'browser-logo-chrome.gif','url'=>'https://www.google.com/intl/ru/chrome/browser/');
        $browsers['Opera']=array('name'=>'Opera','img'=>'browser-logo-opera.png','url'=>'http://www.opera.com/ru/download');
        $browsers['Internet Explorer']=array('name'=>'Internet Explorer','img'=>'browser-logo-ie.gif','url'=>'http://windows.microsoft.com/ru-ru/internet-explorer/download-ie');
        $browsers['Firefox']=array('name'=>'Firefox','img'=>'browser-logo-firefox.gif','url'=>'http://www.mozilla.org/ru/firefox/new/');
        $browsers['Safari']=array('name'=>'Safari','img'=>'browser-logo-safari.png','url'=>'http://support.apple.com/downloads/#safari');
        $otherbrowsers=$browsers;


        Yii::import('common.extensions.browser.*');
        $b = new EWebBrowser();
        $verArr=array();
        $version='';
        $allowed=array('Chrome'=>20,'Opera'=>10,'Firefox'=>20,'Mozilla'=>5,'Internet Explorer'=>9,'Safari'=>5);
        if($b->browser=='Mozilla'){
            $verArr=explode('.',$b->version);
            $version=$verArr[0];
            if (strpos($_SERVER['HTTP_USER_AGENT'], 'Trident/7.0; rv:11.0') !== false) {
                $version=11;
                $b->browser='Internet Explorer';
            }
        }else{
            $verArr=explode('.',$b->version);
            $version=$verArr[0];
        }
        unset($otherbrowsers[$b->browser]);


        $this->layout='browser';
        $this->render('browser',array('browser'=>$b->browser,'version'=>$version,'browsers'=>$browsers,'otherbrowsers'=>$otherbrowsers));
    }
}