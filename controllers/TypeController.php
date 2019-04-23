<?php
namespace app\controllers;

use app\models\product;
use app\models\Types;
use Yii;

class TypeController extends BaseController
{
    public $types;

    public function __construct($id, $module, $config = [])
    {
        parent::__construct($id, $module, $config);
        $this->types = new Types();

    }

    public function actionLists(){
        $list=Types::find()->where(['pid'=>0])->orderBy('sort asc')->all();
        $count = count($list);
        return $this->render('/admin/lists',['list'=>$list,'count'=>$count]);
    }

    public function actionLists2(){
        $list=Types::find()->where(['>','pid',0])->orderBy('sort asc')->all();
        $big=Types::find()->where(['pid'=>0])->all();
        foreach ($big as $k=>$v){
            $arrs[$v->id] = $v->name;
        }
        $count = count($list);
        return $this->render('/admin/lists2',['list'=>$list,'count'=>$count,'big'=>$big,'arr'=>$arrs]);
    }

    /**
     * @return \yii\web\Response
     * 添加和修改的处理逻辑
     */
    public function actionAdd(){
        $id = Yii::$app->request->post('id');
        $name = Yii::$app->request->post('name');
        $sort = Yii::$app->request->post('sort');
        $data=['pid'=>0,'name'=>$name,'sort'=>$sort,'create_time'=>date('Y-m-d H:i:s'),'update_time'=>date('Y-m-d H:i:s')];

        if(!$id){
            $res=$this->types->saveData($data);
            if($res){
                return $this->renderPage(['sedumes_success','添加大类成功',5,'/type/lists']);
            }else{
                $this->renderPage(['sedumes_error','添加大类失败',5,'/type/lists']);
            }
        }else{
            $types = Types::findOne($id);
            foreach ($data as $k=>$v){
                unset($data['create_time']);
                $types->$k = $v;
            }
            $res2 = $types->save();
            if($res2){
                return $this->renderPage(['sedumes_success','修改大类成功',5,'/type/lists']);
            }else{
                $this->renderPage(['sedumes_error','修改大类失败',5,'/type/lists']);
            }
        }

    }
    public function actionAdd2(){
        $id = Yii::$app->request->post('id');
        $name = Yii::$app->request->post('name');
        $pid = Yii::$app->request->post('pid');
        $sort = Yii::$app->request->post('sort');
        $data=['pid'=>$pid,'name'=>$name,'sort'=>$sort,'create_time'=>date('Y-m-d H:i:s'),'update_time'=>date('Y-m-d H:i:s')];

        if(!$id){
            $res=$this->types->saveData($data);
            if($res){
                return $this->renderPage(['sedumes_success','添加小类成功',5,'/type/lists2']);
            }else{
                return $this->renderPage(['sedumes_error','添加小类失败',5,'/type/lists2']);
            }
        }else{
            $types = Types::findOne($id);
            foreach ($data as $k=>$v){
                unset($data['create_time']);
                $types->$k = $v;
            }
            $res2 = $types->save();
            if($res2){
                return $this->renderPage(['sedumes_success','修改小类成功',5,'/type/lists2']);
            }else{
                return $this->renderPage(['sedumes_error','修改小类失败',5,'/type/lists2']);
            }
        }

    }
    /**
     * @return \yii\web\Response
     * 修改视图
     */
    public function actionSee(){
        $id = Yii::$app->request->post('id');
        $row = Types::findOne($id);
        return $this->asJson($row);
    }

    /**
     * @throws \Throwable
     * @throws \yii\db\StaleObjectException
     * 删除逻辑
     */
    public function actionDelete(){
        $id = Yii::$app->request->post('id');
        $type = Yii::$app->request->post('type');
        if(!$type){
            $res = Types::find()->where(['pid'=>$id])->all();
            if($res){
                return $this->renderPage(['sedumes_error','大类下有小类，请先删除小类',5,'/type/lists']);
            } else{
                Types::findOne($id)->delete();
            }
        }else{
            $res2 = product::find()->where(['pid'=>$id])->all();
            if($res2){
                return $this->renderPage(['sedumes_error','小类下有产品，请先删除产品',5,'/type/lists2']);
            } else{
                Types::findOne($id)->delete();
            }
        }


    }
}