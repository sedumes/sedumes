<?php require('head.php');?>
<?php require('nav.php');?>
<h1 class="page-header">操作</h1>
<ol class="breadcrumb">
    <li><a data-toggle="modal" data-target="#addType">上传文件</a></li>
</ol>
<h1 class="page-header">管理 <span class="badge"><?php echo $count;?></span></h1>
<div class="table-responsive">
    <table class="table table-striped table-hover">
        <thead>
        <tr>
            <th><span class="glyphicon glyphicon-th-large"></span> <span class="visible-lg">ID</span></th>
            <th><span class="glyphicon glyphicon-adjust"></span> <span class="visible-lg">类别</span></th>
            <th><span class="glyphicon glyphicon-user"></span> <span class="visible-lg">名称</span></th>
            <th><span class="glyphicon glyphicon-time"></span> <span class="visible-lg">时间</span></th>
            <th><span class="glyphicon glyphicon-remove"></span> <span class="visible-lg">操作</span></th>
        </tr>
        </thead>
        <tbody>
            <?php foreach ($list as $k=>$value):?>
            <tr>
                <td><?php echo ($k+1)?></td>
                <td><?php echo $arr[$value->pid]?></td>
                <td><?php echo $value->name?></td>
                <td><?php echo $value->create_time?></td>
                <td><a rel="<?php echo $value->id;?>" name="del">删除</a></td>
            </tr>
            <?php endforeach;?>
        </tbody>
    </table>
</div>
<footer class="message_footer">
    <nav>
        <ul class="pagination pagenav">
            <li class="disabled"><a aria-label="Previous"> <span aria-hidden="true">&laquo;</span> </a> </li>
            <li class="active"><a>1</a></li>
            <li class="disabled"><a aria-label="Next"> <span aria-hidden="true">&raquo;</span> </a> </li>
        </ul>
    </nav>
</footer>
</div>
<!--增加分类模态框-->
<div class="modal fade" id="addType" tabindex="-1" role="dialog" aria-labelledby="addUserModalLabel">
    <div class="modal-dialog" role="document" style="max-width:450px;">
        <form action="/product/add" method="post" autocomplete="off" draggable="false" enctype="multipart/form-data">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" >上传文件</h4>
                </div>
                <div class="modal-body">
                    <table class="table" style="margin-bottom:0px;">
                        <thead>
                        <tr> </tr>
                        </thead>
                        <tbody>
                        <tr>
                            <td wdith="20%">类别:</td>
                            <td>
                                <select id="category-fname" class="form-control" name="pid">
                                    <?php foreach ($type as $k=>$v):?>
                                        <option value="<?=$v->id;?>" data-value=""><?=$v->name;?></option>
                                    <?php endforeach;?>
                                </select>
                            </td>
                        </tr>
                        <tr>
                            <td wdith="20%">名称:</td>
                            <td width="80%"><input type="text"  value="" class="form-control" name="name" maxlength="11" autocomplete="off" /></td>
                        </tr>
                        <tr>
                            <td wdith="20%">上传:</td>
                            <td width="80%"><input name="file" type="file"></td>
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
</div>
</section>
<script src="<?= Yii::$app->request->baseUrl.'/js/bootstrap.min.js'?>"></script>
<script src="<?= Yii::$app->request->baseUrl.'/js/admin-scripts.js'?>"></script>
<script>
    $('.nav1 li').removeClass('active');
    $('.nav2 li:eq(2)').addClass('active');
</script>
<script>
    //是否确认删除
    $(function(){
        $("#main table tbody tr td a").click(function(){
            var name = $(this);
            var id = name.attr("rel"); //对应id
            if (name.attr("name") === "del") {
                if (window.confirm("此操作不可逆，是否确认？")) {
                    $.ajax({
                        type: "type",
                        url: "/product/delete",
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
