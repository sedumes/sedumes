<?php


namespace app\models;


use yii\db\ActiveRecord;

class Types extends ActiveRecord
{
    //添加数据
    public function saveData($data){
        foreach ($data as $k=>$v){
            $this->$k = $v;
        }
        return $this->save($data);
    }
}