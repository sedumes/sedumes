<?php

namespace app\controllers;

use yii\web\Controller;
use Yii;
class BaseController extends Controller
{
    public $layout=false;
//    public function renderPage($url, $data=[])
//    {
//        $this->renderFile($viewFile, $params, $context)
//        return Yii::$app->getResponse()->redirect(Url::to($url));
//    }
    /**
     * @param $data
     * @param null $time
     * 记录cookie
     */
    public function cookieSet($data,$time=null){
       $_COOKIE[$data[0]] = $data[1];
        setcookie($data[0], $data[1], time() + $time);
    }

    /**
     * @param $data
     * @return \yii\web\Response
     * 提示信息
     */
    public function renderPage($data){
        $this->cookieSet([$data[0],$data[1]],$data[2]);
        return $this->redirect($data[3]);
    }

    public function fileUpload($file, $path, $type = array(), $size = 50000000){
        // 判定文件本身是否有效
        if(!isset($file["error"])) {
            return false;
        }
        // 有效路径判定
        if(!is_dir($path)) {
            $error = "存储路径无效";
            return false;
        }

        // 判定文件本身上传是否成功
        switch ($file["error"]) {
            case 1:
            case 2:
                $error = "文件超过服务器允许大小";
                return false;
            case 3:
                $error = "文件只有部分上传成功";
                return false;
            case 4:
                $error = "用户没有选择要上传的文件";
                return false;
            case 6:
            case 7:
                $error = "服务器操作失败";
                return false;
        }

        // 判定类型是否符合
        if(!empty($type) && !in_array($file["type"], $type)) {
            $error = "当前上传类型不符合";
            return false;
        }
        // 大小判定
        if($file["size"] > $size) {
            $error = "文件大小超过当前允许范围当前允许的大小是：".string($size/1000000)."M";
            return false;
        }
        // 移动文件
        $newfilename = $this->getNewName($file["name"]);
        if(move_uploaded_file($file["tmp_name"], $path."".$newfilename.".".explode('/',$file["type"])[1])) {
            // 成功
            return $path.$newfilename.".mp3";
        } else {
            $error = "文件上传失败";
            return false;
        }
    }
    // 构造一个文件名字：随机规则
    public function getNewName($filename) {
        // 时间日期部分
        $newname = date("YmdHis");

        // 增加随机部分
        $old = array_merge(range("a", "z"), range("A", "Z"));
        shuffle($old);
        $newname .= $old[0].$old[1].$old[2].$old[3].$old[4].$old[5];

        // 组织文件有效名
        return $newname;
    }
}