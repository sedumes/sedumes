<?php

namespace app\controllers;

use yii\web\Controller;
use Yii;
class BaseController extends Controller
{
//    public function renderPage($url, $data=[])
//    {
//        $this->renderFile($viewFile, $params, $context)
//        return Yii::$app->getResponse()->redirect(Url::to($url));
//    }

    public function cookieSet($data,$time=null){
       $_COOKIE[$data[0]] = $data[1];
        setcookie($data[0], $data[1], time() + $time);
    }
}