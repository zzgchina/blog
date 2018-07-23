<?php  $this->load->view('commom/nhead'); ?>
<link rel="stylesheet" type="text/css" href="<?php echo base_url('resouse/admin/view/css/webuploader.css'); ?>" >
<script src="<?php echo base_url('resouse/admin/view/js/webuploader.js'); ?>" type="text/javascript"></script>
<script src="<?php echo base_url('resouse/admin/view/js/webupload.js'); ?>" type="text/javascript"></script>
<div class="uk-panel uk-panel-box">
    <div class="uk-panel uk-panel-header">
        <h3 class="uk-panel-title">
            <span class="position"> 当前位置: <?php echo anchor('Manage/dash','首页'); ?> -> <a>菜单</a> </span>
        </h3>
        <div class="uk-align-left">
            <form id="cate_search" class="uk-form uk-margin">
                <?php echo anchor('adv/index','列表',array('class'=>'uk-button')); ?>
                <a href="javascript:window.location.reload();" class="uk-button">刷新</a>
            </form>
        </div>
    </div>
    <form id="webinfo_form" class="uk-form uk-form-horizontal" enctype="multipart/form-data" method="post">
        <br>
        <legend class="uk-text-bold uk-text-success">添加图片</legend>

        <div class="uk-form-row">
            <label class="uk-form-label uk-text-bold
            uk-text-primary" for="web_title">图片</label>
            <div class="uk-form-controls">
                <input class="uk-form-large uk-form-width-large" type="text"  name="pictur[0]" placeholder="输入描述"   value="">
                <div id="uploader-demo">
                    <div id="fileList" class="uploader-list"></div>
                    <div id="filePicker0">选择图片</div>
                </div>
                <div class="uk-form-controls" id="preview0"> </div>
            </div>
        </div>
        <script>
            upload(0,'<?php echo site_url('admin/adv/webupload')?>','<?php echo base_url()?>');
        </script>
        <div class="uk-form-row">
        <div class="uk-form-row">
            <label class="uk-form-label uk-text-bold
            uk-text-primary" for="web_title">名称</label>
            <div class="uk-form-controls">
                <input class="uk-form-large uk-form-width-large" type="text" id="web_title" name="name" placeholder="输入名称..."  maxlength="30" value="<?php echo isset($name)?$name:''; ?>">
                <?php echo form_error('name'); ?>
            </div>
        </div>
        <hr><br>
        <!-- token令牌 -->
        <input type="hidden" name="<?php echo $csrf['name']; ?>" value="<?php echo $csrf['hash']; ?>" />
        <input type="hidden" name="id" value="<?= isset($id)?$id:''; ?>" />
        <input type="hidden" name="token" value="<?= isset($token)?$token:''; ?>" />
        <br><br><hr><br>
        <button id="webinfo_submit" class="uk-button uk-button-success uk-button-large uk-align-center" type="submit">确认修改</button>
        <br>
    </form>
</div>
