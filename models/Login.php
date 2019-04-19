<?php


namespace app\models;
use yii\db\ActiveRecord;

class Login extends ActiveRecord
{
    //添加数据
    public function saveData($data){
        foreach ($data as $k=>$v){
            $this->$k = $v;
        }
        return $this->save($data);
    }

    //列表查询
    public function getData(){
        return self::find()->all();
    }
}