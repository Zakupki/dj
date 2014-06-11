<?php
error_reporting(0);
ini_set('display_errors', 0);
define("YII_ENBLE_ERROR_HANDLER",false);
define("YII_ENBLE_EXCEPTION_HANDLER",false);
error_reporting(E_ALL ^ E_WARNING);

@include(dirname(__FILE__).'/../init.php');

require_once(dirname(__FILE__).'/../common/lib/Yii/yii.php');

$config = CMap::mergeArray(
    require(dirname(__FILE__).'/../common/config/main.php'),
    require(dirname(__FILE__).'/../backend/config/main.php'),

    require(dirname(__FILE__).'/../common/config/main-local.php'),
    @include(dirname(__FILE__).'/../backend/config/main-local.php')
);

Yii::createWebApplication($config)->run();