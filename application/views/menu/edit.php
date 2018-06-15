
<div class="uk-panel uk-panel-box">
    <div class="uk-panel uk-panel-header">
        <h3 class="uk-panel-title">
            <span class="position"> 当前位置: <?php echo anchor('Manage/dash','首页'); ?> -> <a>菜单</a> </span>
        </h3>
    </div>
    <form id="webinfo_form" class="uk-form uk-form-horizontal" enctype="multipart/form-data">
        <br>
        <legend class="uk-text-bold uk-text-success">添加菜单</legend>
        <div class="uk-form-row">
            <label class="uk-form-label uk-text-bold
            uk-text-primary" for="web_title">名称</label>
            <div class="uk-form-controls">
                <input class="uk-form-large uk-form-width-large" type="text" id="web_title" name="web_title" placeholder="输入名称..." required="required" maxlength="30" value="">
            </div>
        </div>
        <div class="uk-form-row">
            <label class="uk-form-label uk-text-bold uk-text-primary" for="is_record">上级菜单</label>
            <div class="uk-form-controls">
                select
            </div>
        </div>
        <div class="uk-form-row">
            <label class="uk-form-label uk-text-bold uk-text-primary" for="ICP">图标</label>
            <div class="uk-form-controls">
                <input class="uk-form-large" type="text" id="ICP" name="ICP" placeholder="图标..." required="required" maxlength="30" value="" >
                <span><a href="http://fontawesome.dashgame.com/" target="_blank">图标库</a>，直接填入图标名</span>
            </div>
        </div>
        <hr><br>
        <!-- token令牌 -->
        <input type="hidden" name="" value="" />
        <br><br><hr><br>
        <button id="webinfo_submit" class="uk-button uk-button-success uk-button-large uk-align-center" type="submit">确认修改</button>
        <br>
    </form>
</div>
