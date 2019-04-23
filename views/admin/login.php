<?php require('head.php');?>
<link rel="stylesheet" type="text/css" href="<?= Yii::$app->request->baseUrl.'/css/login.css'?>">
<body class="user-select">
<div class="container">
    <?php if(isset($_COOKIE['sedumes_error'])):?>
        <div class="alert alert-error" style="background: red;max-width: 330px;margin: 0 auto;">
            <button type="button" class="close" data-dismiss="alert" style="color: white">×</button>
            <font style="color: white"> <strong><?php echo $_COOKIE['sedumes_error'];?></strong></font>
        </div>
    <?php endif;?>
    <div class="siteIcon">
        <img src="<?php echo \yii\helpers\Url::to('@web/images/login_img.png', true);?>" alt="" data-toggle="tooltip" data-placement="top" title="" draggable="false" data-original-title="欢迎使用sedumes管理系统">
    </div>
    <form action="/admin/pro" method="post" autocomplete="off" class="form-signin">
        <h2 class="form-signin-heading">管理员登录</h2>
        <label for="userName" class="sr-only">用户名</label>
        <input type="text" id="userName" name="username" class="form-control" placeholder="请输入用户名" required autofocus autocomplete="off" maxlength="10">
        <label for="userPwd" class="sr-only">密码</label>
        <input name="_csrf" type="hidden" id="_csrf" value="<?= Yii::$app->request->csrfToken ?>">
        <input type="password" id="userPwd" name="userpwd" class="form-control" placeholder="请输入密码" required autocomplete="off" maxlength="18">
        <button class="btn btn-lg btn-primary btn-block" type="submit" id="signinSubmit">登录</button>
    </form>
</div>
<script src="<?= Yii::$app->request->baseUrl.'/js/bootstrap.min.js'?>"></script>
<script>
    $('.siteIcon img').click(function(){
        window.location.reload();
    });
    $('#signinSubmit').click(function(){
        if($('#userName').val() === ''){
            $(this).text('用户名不能为空');
        }else if($('#userPwd').val() === ''){
            $(this).text('密码不能为空');
        }else{
            $(this).text('请稍后...');
        }
    });
</script>
</body>
</html>
