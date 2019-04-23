<!doctype html>
<html lang="zh-CN">
<head>
    <meta charset="utf-8">
    <meta name="renderer" content="webkit">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>sedumes管理系统</title>
    <link rel="stylesheet" type="text/css" href="<?= Yii::$app->request->baseUrl.'/css/bootstrap.min.css'?>">
    <link rel="stylesheet" type="text/css" href="<?= Yii::$app->request->baseUrl.'/css/style.css'?>">
    <link rel="stylesheet" type="text/css" href="<?= Yii::$app->request->baseUrl.'/css/font-awesome.min.css'?>">
    <script src="<?= Yii::$app->request->baseUrl.'/js/jquery-2.1.4.min.js'?>"></script>
    <script src="<?= Yii::$app->request->baseUrl.'/js/html5shiv.min.js'?>" type="text/javascript"></script>
    <script src="<?= Yii::$app->request->baseUrl.'/js/respond.min.js'?>" type="text/javascript"></script>
    <script src="<?= Yii::$app->request->baseUrl.'/js/selectivizr-min.js'?>" type="text/javascript"></script>
</head>
<body class="user-select">
<section class="container-fluid">
    <header>
        <nav class="navbar navbar-default navbar-fixed-top">
            <div class="container-fluid">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false"> <span class="sr-only">切换导航</span> <span class="icon-bar"></span> <span class="icon-bar"></span> <span class="icon-bar"></span> </button>
                    <a class="navbar-brand" href="/admin/home">sedumes</a> </div>
                <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                    <ul class="nav navbar-nav navbar-right">
                        <li class="dropdown"> <a class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><?= Yii::$app->session->get('sedumes_name')?> <span class="caret"></span></a>
                            <ul class="dropdown-menu dropdown-menu-left">
                                <li><a title="查看或修改个人信息" data-toggle="modal" data-target="#seeUserInfo">个人信息</a></li>
                            </ul>
                        </li>
                        <li><a href="<?=\yii\helpers\Url::to('/admin/logout')?>" onClick="if(!confirm('是否确认退出？'))return false;">退出登录</a></li>
                    </ul>
                </div>
            </div>
        </nav>
    </header>