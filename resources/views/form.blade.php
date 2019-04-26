<form class="form-horizontal" role="form"
      action="/import" method="post" enctype="multipart/form-data">

    <div class="form-group">
        <label for="picPath" class="col-sm-3 control-label">品牌大图：</label>
        <div class="col-sm-5">
            <input type="file" id="picPath" name="file" placeholder="请上传...">
        </div>
    </div>

    <div class="form-group">
        <div class="col-sm-offset-5 col-sm-10">
            <button type="submit" class="btn btn-primary">确定添加</button>
            <button type="reset" class="btn btn-primary">重置</button>
        </div>
    </div>
</form>