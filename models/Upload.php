<?php
namespace app\models;
use yii\base\Model;

class Upload extends Model{
    public $file;
    public function rules(){
//        return [
//            [['file'], 'file', 'extensions' => 'jpg, png', 'mimeTypes' => 'image/jpeg, image/png',],
//        ];
    }
    public function attributeLabels(){
        return [
            'file'=>'文件上传'
        ];
    }
}