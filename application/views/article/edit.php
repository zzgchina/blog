<?php  $this->load->view('commom/nhead'); ?>
<div class="uk-panel uk-panel-box">
    <div class="uk-panel uk-panel-header">
        <h3 class="uk-panel-title">
            <span class="position"> 当前位置: <?php echo anchor('','首页'); ?> -> <a>菜单</a> </span>
        </h3>
        <div class="uk-align-left">
            <form id="cate_search" class="uk-form uk-margin">
                <?php echo anchor('column/index','列表',array('class'=>'uk-button')); ?>
                <a href="javascript:window.location.reload();" class="uk-button">刷新</a>
            </form>
        </div>
    </div>
    <form id="webinfo_form" class="uk-form uk-form-horizontal" enctype="multipart/form-data" method="post">
        <br>
        <legend class="uk-text-bold uk-text-success">添加分类栏目</legend>
        <div class="uk-form-row">
            <label class="uk-form-label uk-text-bold
            uk-text-primary" for="web_title">名称</label>
            <div class="uk-form-controls">
                <input class="uk-form-large uk-form-width-large" type="text" id="web_title" name="name" placeholder="输入名称..."  maxlength="30" value="<?php echo isset($name)?$name:''; ?>">
                <?php echo form_error('name'); ?>
            </div>
        </div>
        <div class="uk-form-row">
            <label class="uk-form-label uk-text-bold uk-text-primary" for="ICP">状态</label>
            <div class="uk-form-controls">
                <input type="radio" name="status" value="1" checked>可用
                <input type="radio" name="status" value="0">禁用

            </div>
        </div>
        <div class="uk-form-row">
            <label class="uk-form-label uk-text-bold uk-text-primary" for="ICP">描述</label>
            <div class="uk-form-controls">
                <textarea name="descript" style="width: 500px;height: 100px;"><?=  isset($descript)?$descript:''; ?></textarea>
                <?php echo form_error('url'); ?>
            </div>
        </div>
        <br>
        <!-- token令牌 -->
        <input type="hidden" name="<?php echo $csrf['name']; ?>" value="<?php echo $csrf['hash']; ?>" />
        <input type="hidden" name="id" value="<?= isset($id)?$id:''; ?>" />
        <input type="hidden" name="token" value="<?= isset($token)?$token:''; ?>" />
        <br><hr><br>
        <button id="webinfo_submit" class="uk-button uk-button-success uk-button-large uk-align-center" type="submit">确认</button>
        <br>
    </form>
</div>
