<?php require('head.php');?>
<?php require('nav.php');?>
            <h1 class="page-header">操作</h1>
            <ol class="breadcrumb">
                <li><a data-toggle="modal" data-target="#addUser">增加用户</a></li>
            </ol>
            <h1 class="page-header">管理 <span class="badge"><?php echo $count;?></span></h1>
            <div class="table-responsive">
                <table class="table table-striped table-hover">
                    <thead>
                    <tr>
                        <th><span class="glyphicon glyphicon-th-large"></span> <span class="visible-lg">ID</span></th>
                        <th><span class="glyphicon glyphicon-user"></span> <span class="visible-lg">昵称</span></th>
                        <th><span class="glyphicon glyphicon-bookmark"></span> <span class="visible-lg">手机号</span></th>
                        <th><span class="glyphicon glyphicon-pushpin"></span> <span class="visible-lg">性别</span></th>
                        <th><span class="glyphicon glyphicon-time"></span> <span class="visible-lg">创建时间</span></th>
                        <th><span class="glyphicon glyphicon-pencil"></span> <span class="visible-lg">操作</span></th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php foreach($list as $k=>$item): ?>
                    <tr>
                        <td><?php echo ($k+1);?></td>
                        <td><?php echo $item->uname;?></td>
                        <td><?php echo $item->phone;?></td>
                        <td><?php echo $item->sex;?></td>
                        <td><?php echo $item->create_time;?></td>
                        <td><a rel="<?php echo $item->id;?>" name="see">修改</a> <a rel="<?php echo $item->id;?>" name="delete">删除</a></td>
                    </tr>
                    <?php endforeach;?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</section>
<!--增加用户模态框-->
<div class="modal fade" id="addUser" tabindex="-1" role="dialog" aria-labelledby="addUserModalLabel">
    <div class="modal-dialog" role="document" style="max-width:450px;">
        <form action="/admin/add" method="post" autocomplete="off" draggable="false">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" >增加用户</h4>
                </div>
                <div class="modal-body">
                    <table class="table" style="margin-bottom:0px;">
                        <thead>
                        <tr> </tr>
                        </thead>
                        <tbody>
                        <tr>
                            <td wdith="20%">昵称:</td>
                            <td width="80%"><input type="text" value="" class="form-control" name="uname" maxlength="10" autocomplete="off" /></td>
                        </tr>
                        <tr>
                            <td wdith="20%">手机号:</td>
                            <td width="80%"><input type="text" value="" class="form-control" name="phone" maxlength="11" autocomplete="off" /></td>
                        </tr>
                        <tr>
                            <td wdith="20%">性别:</td>
                            <td width="80%"><input type="text" value="" class="form-control" name="sex" maxlength="1" autocomplete="off" /></td>
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
                    <input name="_csrf" type="hidden" id="_csrf" value="<?= Yii::$app->request->csrfToken ?>">
                    <button type="button" class="btn btn-default" data-dismiss="modal">取消</button>
                    <button type="submit" class="btn btn-primary">提交</button>
                </div>
            </div>
        </form>
    </div>
</div>
<!--用户信息模态框-->
<div class="modal fade" id="seeUser" tabindex="-1" role="dialog" aria-labelledby="seeUserModalLabel">
    <div class="modal-dialog" role="document" style="max-width:450px;">
        <form action="/admin/add" method="post" autocomplete="off" draggable="false">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title">修改用户</h4>
                </div>
                <div class="modal-body">
                    <table class="table" style="margin-bottom:0px;">
                        <thead>
                        <tr> </tr>
                        </thead>
                        <tbody>
                        <tr>
                            <td wdith="20%">昵称:</td>
                            <td width="80%"><input type="text" id="uname" value="" class="form-control" name="uname" maxlength="10" autocomplete="off" /></td>
                        </tr>
                        <tr>
                            <td wdith="20%">手机号:</td>
                            <td width="80%"><input type="text" id="phone" value="" class="form-control" name="phone" maxlength="11" autocomplete="off" /></td>
                        </tr>
                        <tr>
                            <td wdith="20%">性别:</td>
                            <td width="80%"><input type="text" id="sex" value="" class="form-control" name="sex" maxlength="1" autocomplete="off" /></td>
                        </tr>
                        <tr>
                            <td wdith="20%">新密码:</td>
                            <td width="80%"><input type="password" id="password" class="form-control" name="password" maxlength="18" autocomplete="off" /></td>
                        </tr>
                        <tr>
                            <td wdith="20%">确认密码:</td>
                            <td width="80%"><input type="password" id="new_password" class="form-control" name="new_password" maxlength="18" autocomplete="off" /></td>
                        </tr>
                        </tbody>
                        <tfoot>
                        <tr></tr>
                        </tfoot>
                    </table>
                </div>
                <div class="modal-footer">
                    <input name="_csrf" type="hidden" id="_csrf" value="<?= Yii::$app->request->csrfToken ?>">
                    <input type="hidden" name="id" id="userid" value="" />
                    <button type="button" class="btn btn-default" data-dismiss="modal">取消</button>
                    <button type="submit" class="btn btn-primary">提交</button>
                </div>
            </div>
        </form>
    </div>
</div>
<script src="<?= Yii::$app->request->baseUrl.'/js/bootstrap.min.js'?>"></script>
<script src="<?= Yii::$app->request->baseUrl.'/js/admin-scripts.js'?>"></script>
<script>
    $(function () {
        $('.nav1 li').removeClass('active');
        $('.nav4 li:eq(0)').addClass('active');
        $("#main table tbody tr td a").click(function () {
            var name = $(this);
            var id = name.attr("rel"); //对应id
            if (name.attr("name") === "see") {
                $.ajax({
                    type: "POST",
                    url: "/admin/see",
                    data: {"id":id,"_csrf":"<?= Yii::$app->request->csrfToken ?>"},
                    cache: false, //不缓存此页面
                    success: function (data) {
                        // var data = JSON.parse(data);
                        $('#uname').val(data.uname);
                        $('#phone').val(data.phone);
                        $('#sex').val(data.sex);
                        $('#userid').val(id);
                        $('#seeUser').modal('show');
                    }
                });
            } else if (name.attr("name") === "delete") {
                if (window.confirm("此操作不可逆，是否确认？")) {
                    $.ajax({
                        type: "POST",
                        url: "/admin/delete",
                        data: {"id":id,"_csrf":"<?= Yii::$app->request->csrfToken ?>"},
                        cache: false, //不缓存此页面
                        success: function (data) {
                            window.location.reload();
                        }
                    });
                };
            };
        });
    });
</script>
</body>
</html>
