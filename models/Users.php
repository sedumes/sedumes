<?php

namespace app\models;

use yii\db\ActiveRecord;

class Users extends ActiveRecord
{
    public $name;
    public $password;
    /**
     * @return array the validation rules.
     */
    public function rules()
    {
        return [
            [['name', 'password'], 'required'],
        ];
    }
    //查询数据
    public function getDataName($user,$pwd){
        return self::find()->where(['name'=>$user,'password'=>$pwd])->all();
    }
}