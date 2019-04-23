
    <div class="row">
        <aside class="col-sm-3 col-md-2 col-lg-2 sidebar">
            <ul class="nav nav-sidebar nav1">
                <li><a href="/admin/home">报告</a></li>
            </ul>
            <ul class="nav nav-sidebar nav2">
                <li><a href="/type/lists">大类别</a></li>
                <li><a href="/type/lists2">小类别</a></li>
                <li><a href="/product/product">上传文件</a></li>
                <li><a data-toggle="tooltip" data-placement="bottom" title="网站暂无留言功能">留言</a></li>
            </ul>
            <ul class="nav nav-sidebar nav3">
                <li><a href="category.html">栏目</a></li>
                <li><a class="dropdown-toggle" id="otherMenu" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">其他</a>
                    <ul class="dropdown-menu" aria-labelledby="otherMenu">
                        <li><a href="flink.html">友情链接</a></li>
                        <li><a data-toggle="modal" data-target="#areDeveloping">访问记录</a></li>
                    </ul>
                </li>
            </ul>
            <ul class="nav nav-sidebar nav4">
                <li><a class="dropdown-toggle" id="userMenu" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">用户</a>
                    <ul class="dropdown-menu" aria-labelledby="userMenu">
                        <!--                        <li><a data-toggle="modal" data-target="#areDeveloping">管理用户组</a></li>-->
                        <li><a href="<?=\yii\helpers\Url::to('/admin/userlist')?>">管理用户</a></li>
                        <!--                        <li role="separator" class="divider"></li>-->
                        <!--                        <li><a href="loginlog.html">管理登录日志</a></li>-->
                    </ul>
                </li>
                <li><a class="dropdown-toggle" id="settingMenu" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">设置</a>
                    <ul class="dropdown-menu" aria-labelledby="settingMenu">
                        <li><a href="setting.html">基本设置</a></li>
                        <li><a href="readset.html">阅读设置</a></li>
                        <li role="separator" class="divider"></li>
                        <li><a data-toggle="modal" data-target="#areDeveloping">安全配置</a></li>
                        <li role="separator" class="divider"></li>
                        <li class="disabled"><a>扩展菜单</a></li>
                    </ul>
                </li>
            </ul>
        </aside>
        <!--个人信息模态框-->
        <div class="modal fade" id="seeUserInfo" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
            <div class="modal-dialog" role="document">
                <form action="" method="post" autocomplete="off" draggable="false">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                            <h4 class="modal-title" >个人信息</h4>
                        </div>
                        <div class="modal-body">
                            <table class="table" style="margin-bottom:0px;">
                                <thead>
                                <tr> </tr>
                                </thead>
                                <tbody>
                                <tr>
                                    <td wdith="20%">姓名:</td>
                                    <td width="80%"><input type="text" value="王雨" class="form-control" name="truename" maxlength="10" autocomplete="off" /></td>
                                </tr>
                                <tr>
                                    <td wdith="20%">用户名:</td>
                                    <td width="80%"><input type="text" value="admin" class="form-control" name="username" maxlength="10" autocomplete="off" /></td>
                                </tr>
                                <tr>
                                    <td wdith="20%">电话:</td>
                                    <td width="80%"><input type="text" value="18538078281" class="form-control" name="usertel" maxlength="13" autocomplete="off" /></td>
                                </tr>
                                <tr>
                                    <td wdith="20%">旧密码:</td>
                                    <td width="80%"><input type="password" class="form-control" name="old_password" maxlength="18" autocomplete="off" /></td>
                                </tr>
                                <tr>
                                    <td wdith="20%">新密码:</td>
                                    <td width="80%"><input type="password" class="form-control" name="password" maxlength="18" autocomplete="off" /></td>
                                </tr>
                                <tr>
                                    <td wdith="20%">确认密码:</td>
                                    <td width="80%"><input type="password" class="form-control" name="new_password" maxlength="18" autocomplete="off" /></td>
                                </tr>
                                </tbody>
                                <tfoot>
                                <tr></tr>
                                </tfoot>
                            </table>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-default" data-dismiss="modal">取消</button>
                            <button type="submit" class="btn btn-primary">提交</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>

        <script>
            $('.nav1 li').addClass('active');
        </script>
        <div class="col-sm-9 col-sm-offset-3 col-md-10 col-lg-10 col-md-offset-2 main" id="main">
            <?php if(isset($_COOKIE['sedumes_error'])):?>
                <div class="alert alert-error" style="background: red;">
                    <button type="button" class="close" data-dismiss="alert" style="color: white">×</button>
                    <font style="color: white"> <strong><?php echo $_COOKIE['sedumes_error'];?></strong></font>
                </div>
            <?php endif;?>
            <?php if(isset($_COOKIE['sedumes_success'])):?>
            <div class="alert alert-success" style="background: green;">
                <button type="button" class="close" data-dismiss="alert" style="color: white">×</button>
                <font style="color: white"> <strong><?php echo $_COOKIE['sedumes_success'];?></strong></font>
            </div>
            <?php endif;?>