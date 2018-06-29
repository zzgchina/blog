<?php  $this->load->view('commom/nhead'); ?>
<div class="uk-panel uk-panel-box">
    <div class="uk-panel uk-panel-header">
        <h3 class="uk-panel-title">
            <span class="position"> 当前位置: <?php echo anchor('Manage/dash','首页'); ?> -> <a>菜单</a> </span>
        </h3>
        <div class="uk-align-left">
            <form id="cate_search" class="uk-form uk-margin">
                <?php echo anchor('menu/get_list','列表',array('class'=>'uk-button')); ?>
                <a href="javascript:window.location.reload();" class="uk-button">刷新</a>
            </form>
        </div>
    </div>
    <form id="webinfo_form" class="uk-form uk-form-horizontal" enctype="multipart/form-data" method="post">
        <br>
        <legend class="uk-text-bold uk-text-success">添加菜单</legend>
        <div class="uk-form-row">
            <label class="uk-form-label uk-text-bold
            uk-text-primary" for="web_title">名称</label>
            <div class="uk-form-controls">
                <input class="uk-form-large uk-form-width-large" type="text" id="web_title" name="name" placeholder="输入名称..."  maxlength="30" value="<?php echo isset($name)?$name:''; ?>">
                <?php echo form_error('name'); ?>
            </div>
        </div>
        <div class="uk-form-row">
            <label class="uk-form-label uk-text-bold uk-text-primary" for="is_record">上级菜单</label>
            <div class="uk-form-controls">
                <select name="pid" id="">
                    <option value="0">顶级菜单</option>
                    <?php foreach ($menu as $k=>$v){ ?>
                        <option value="<?php echo $v['id']; ?>" <?php echo (isset($pid) && $pid == $v['id'])?'selected':''; ?>><?php echo $v['name']; ?></option>
                    <?php } ?>
                </select>
            </div>
        </div>
        <div class="uk-form-row">
            <label class="uk-form-label uk-text-bold uk-text-primary" for="ICP">图标</label>
            <div class="uk-form-controls">
                <input class="uk-form-large" type="text" id="ICP" name="ico" placeholder="图标..."  maxlength="30" value="<?php echo isset($ico)?$ico:''; ?>" >
                <span><a href="http://fontawesome.dashgame.com/" target="_blank">图标库</a>，直接填入图标名</span>
            </div>
        </div>
        <div class="uk-form-row">
            <label class="uk-form-label uk-text-bold uk-text-primary" for="ICP">路由</label>
            <div class="uk-form-controls">
                <input class="uk-form-large" type="text" id="ICP" name="url" placeholder="菜单路径" maxlength="30" value="<?php echo isset($url)?$url:''; ?>" >
                <span>菜单路径</span>
                <?php echo form_error('url'); ?>
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
