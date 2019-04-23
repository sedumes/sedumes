<?php


namespace app\controllers;


use app\models\product;
use app\models\Types;
use Yii;

class ProductController extends BaseController
{
    public $product;

    public function __construct($id, $module, $config = [])
    {
        parent::__construct($id, $module, $config);
        $this->product = new product();
    }
    public function actionProduct(){
        $type=Types::find()->where(['>','pid',0])->orderBy('sort asc')->all();
        foreach ($type as $k=>$v){
            $arr[$v->id] = $v->name;
        }
        $list = product::find()->all();
        $count = count($list);
        return $this->render('/admin/product',['type'=>$type,'list'=>$list,'count'=>$count,'arr'=>$arr]);
    }
    public function actionAdd(){
        $data['pid'] = Yii::$app->request->post('pid');
        $data['name'] = Yii::$app->request->post('name');
        $file = $_FILES["file"];

        $path=$_SERVER['DOCUMENT_ROOT']."/music/";
        if ($file) {
            $new_path=$this->fileUpload($file,$path);
            if($new_path){
                $data['path']=$new_path;
            }else{
                $this->renderPage(['sedumes_error','上传失败',5,'/product/product']);
            }
            $data['old_name'] = $file['name'];
            $data['create_time'] = date('Y-m-d H:i:s');
            $data['update_time'] = date('Y-m-d H:i:s');
            $res = $this->product->saveData($data);
            if($res){
                return $this->renderPage(['sedumes_success','上传成功',5,'/product/product']);
            }else{
                $this->renderPage(['sedumes_error','上传失败',5,'/product/product']);
            }
        }else{
            $this->renderPage(['sedumes_error','上传失败',5,'/product/product']);
        }
    }
    public function actionDelete(){
        $id = Yii::$app->request->post('id');
        $row=product::findOne($id);
        product::findOne($id)->delete();
        unlink($row->path);
    }
}