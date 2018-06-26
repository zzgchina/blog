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
        <legend class="uk-text-bold uk-text-success">添加文章</legend>
        <div class="uk-form-row">
            <label class="uk-form-label uk-text-bold
            uk-text-primary" for="web_title">名称</label>
            <div class="uk-form-controls">
                <input class="uk-form-large uk-form-width-large" type="text" name="name" placeholder="输入名称..."  maxlength="30" value="<?php echo isset($name)?$name:''; ?>">
                <?php echo form_error('name'); ?>
            </div>
        </div>
        <div class="uk-form-row">
            <label class="uk-form-label uk-text-bold
            uk-text-primary" for="web_title">作者</label>
            <div class="uk-form-controls">
                <input class="uk-form-large uk-form-width-large" type="text" name="author" placeholder="作者姓名..."  maxlength="30" value="<?php echo isset($author)?$author:''; ?>">
                <?php echo form_error('author'); ?>
            </div>
        </div>
        <div class="uk-form-row">
            <label class="uk-form-label uk-text-bold uk-text-primary" for="is_record">分类</label>
            <div class="uk-form-controls">
                <select name="pid" id="">
                    <?php foreach ($menu as $k=>$v){ ?>
                        <option value="<?php echo $v['id']; ?>" <?php echo (isset($pid) && $pid == $v['id'])?'selected':''; ?>><?php echo $v['name']; ?></option>
                    <?php } ?>
                </select>
            </div>
        </div>
        <div class="uk-form-row">
            <label class="uk-form-label uk-text-bold uk-text-primary" for="ICP">文章来源</label>
            <div class="uk-form-controls">
                <input type="radio" name="status" value="1" checked>原创
                <input type="radio" name="status" value="0">转载

            </div>
        </div>
        <div class="uk-form-row">
            <label class="uk-form-label uk-text-bold
            uk-text-primary" for="web_title">转载地址</label>
            <div class="uk-form-controls">
                <input class="uk-form-large uk-form-width-large" type="text"  name="url" placeholder="转载地址..."  maxlength="30" value="<?php echo isset($url)?$url:''; ?>">
                <?php echo form_error('url'); ?>
            </div>
        </div>
        <div class="uk-form-row">
            <label class="uk-form-label uk-text-bold uk-text-primary" for="ICP">文章属性</label>
            <div class="uk-form-controls">
                <input type="radio" name="status" value="1" checked>私密
                <input type="radio" name="status" value="0">公开

            </div>
        </div>
        <div class="uk-form-row">
            <label class="uk-form-label uk-text-bold uk-text-primary" for="ICP">是否评论</label>
            <div class="uk-form-controls">
                <input type="radio" name="status" value="1" checked>允许
                <input type="radio" name="status" value="0">禁止

            </div>
        </div>
        <div class="uk-form-row">
            <label class="uk-form-label uk-text-bold uk-text-primary" for="ICP">状态</label>
            <div class="uk-form-controls">
                <input type="radio" name="status" value="1" checked>可用
                <input type="radio" name="status" value="0">禁用

            </div>
        </div>
        <script src="<?php echo base_url('resouse/admin/view/js/wangEditor.min.js'); ?>"></script>
        <div class="uk-form-row">
            <label class="uk-form-label uk-text-bold uk-text-primary" for="ICP">内容</label>
            <div class="uk-form-controls">
<!--                <textarea name="descript" id="editor" style="width: 500px;height: 100px;">--><?//=  isset($descript)?$descript:''; ?><!--</textarea>-->
                    <!--                --><?php //echo form_error('url'); ?>
                <div id="editor">
                </div>
            </div>
        </div>
        <script type="text/javascript">
            var E = window.wangEditor;
            var editor = new E('#editor');
            // 或者 var editor = new E( document.getElementById('editor') )
            editor.create();
            editor.txt.html('<p onclick="alert(33)">用 JS 设置的内容</p>')
        </script>
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
