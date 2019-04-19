<?= include('head.php')?>
<?= include('nav.php')?>
        <div class="col-sm-9 col-sm-offset-3 col-md-10 col-lg-10 col-md-offset-2 main" id="main">
            <h1 class="page-header">信息总览</h1>
            <div class="row placeholders">
                <div class="col-xs-6 col-sm-3 placeholder">
                    <h4>文章</h4>
                    <span class="text-muted">0 条</span> </div>
                <div class="col-xs-6 col-sm-3 placeholder">
                    <h4>评论</h4>
                    <span class="text-muted">0 条</span> </div>
                <div class="col-xs-6 col-sm-3 placeholder">
                    <h4>友链</h4>
                    <span class="text-muted">0 条</span> </div>
                <div class="col-xs-6 col-sm-3 placeholder">
                    <h4>访问量</h4>
                    <span class="text-muted">0</span> </div>
            </div>
            <h1 class="page-header">状态</h1>
            <div class="table-responsive">
                <table class="table table-striped table-hover">
                    <tbody>
                    <tr>
                        <td>登录者: <span><?=Yii::$app->session->get('sedumes_name')?></span></td>
                    </tr>
                    <tr>
                        <td>当前时间: <?=date("Y-m-d H:i:s")?> , 登录IP:<?=$_SERVER["REMOTE_ADDR"]?> </td>
                    </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</section>



<!--提示模态框-->
<div class="modal fade user-select" id="areDeveloping" tabindex="-1" role="dialog" aria-labelledby="areDevelopingModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="areDevelopingModalLabel" style="cursor:default;">该功能正在日以继夜的开发中…</h4>
            </div>
            <div class="modal-body"> <img src="<?= Yii::$app->request->baseUrl.'/images/baoman/baoman_01.gif'?>" alt="深思熟虑" />
                <p style="padding:15px 15px 15px 100px; position:absolute; top:15px; cursor:default;">很抱歉，程序猿正在日以继夜的开发此功能，本程序将会在以后的版本中持续完善！</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-primary" data-dismiss="modal">朕已阅</button>
            </div>
        </div>
    </div>
</div>

<script src="<?= Yii::$app->request->baseUrl.'/js/bootstrap.min.js'?>"></script>
<script src="<?= Yii::$app->request->baseUrl.'/js/admin-scripts.js'?>"></script>
</body>
</html>
