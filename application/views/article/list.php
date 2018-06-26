<?php  $this->load->view('commom/nhead'); ?>
<div class="uk-panel uk-panel-box">
    <div class="uk-panel uk-panel-header">
        <h3 class="uk-panel-title">
            <span class="position"> 当前位置: <?php echo anchor('Manage/dash','首页'); ?> -> <a>文章列表</a> </span>
            <!-- keyword搜索 -->
            <div class="uk-align-right uk-text-large uk-text-bold">
                <form id="article_search" class="uk-search">
                    <input class="uk-search-field" type="search" placeholder="search..." maxlength="20" name="search">
                </form>
            </div><!-- keyword搜索 end -->
        </h3>
        <!-- 条件搜索 -->
        <div class="uk-align-left">
            <form id="cate_search" class="uk-form uk-margin">
                <?php echo anchor('article/edit','添加',array('class'=>'uk-button')); ?>
                <a href="javascript:window.location.reload();" class="uk-button">刷新</a>
            </form>
        </div>
        <!-- 文章列表 -->
        <form id="article_checked" class="uk-form">
            <table class="uk-table" id="check_controls">
                <thead>
                <tr>
                    <th><input id="p_check" type="checkbox" name="check_all"></th>
                    <th class="uk-hidden-small">ID</th>
                    <th>名称</th>
                    <th class="uk-hidden-small">状态</th>
                    <th>发布日期</th>
                    <th>操作</th>
                </tr>
                </thead>
                <tbody>
                <?php if(empty($list)): ?>
                    <tr class="uk-text-center uk-text-large"><td colspan="7"><br><?php echo '没有相关记录'; ?><br><br></td></tr>
                <?php endif; ?>
                <?php foreach($list as $list): ?>
                    <tr>
                        <td><input type="checkbox" name="checkbox[]" value="<?php echo $list['id']; ?>"></td>
                        <td class="uk-hidden-small"><?php echo $list['id']; ?></td>
                        <td><?php echo mb_strlen($list['name']) > 20 ? mb_substr($list['name'],0,20).'...' : $list['name']; ?></td>
                        <td class="uk-hidden-small"><?php echo $list['status']?'允许':'禁止'; ?> </td>
                        <td><?php echo date('Y-m-d H:i:s', $list['adddate']); ?></td>
                        <td>
                            <!-- 正常分辨率 -->
                            <div class="uk-button-group uk-hidden-small">
                                <?php echo anchor('column/edit/'.$list['id'],'<i class="uk-icon uk-icon-eye"></i>View',array('class'=>'uk-button')); ?>
                                <?php echo anchor('column/edit/'.$list['id'],'<i class="uk-icon uk-icon-edit"></i>Edit',array('class'=>'uk-button')); ?>
                                <?php echo anchor('column/del/'.$list['id'].'/'.$list['token'],'<i class="uk-icon uk-icon-trash"></i>Delete',array('class'=>'uk-button del')); ?>
<!--                                <a href="javascript:del(--><?//=$list['id']?><!--,'--><?//=$list['token']?><!--')" class="uk-button del"><i class="uk-icon uk-icon-trash"></i>Delete</a>-->
                            </div><!-- 正常分辨率 end -->
                            <!-- 小分辨率 -->
                            <div class="uk-button-group uk-visible-small">
                                <div data-uk-dropdown="{mode:'click'}">
                                    <button class="uk-button uk-button-small"><i class="uk-icon-caret-down"></i></button>
                                    <div class="uk-dropdown uk-dropdown-small">
                                        <ul class="uk-nav uk-nav-dropdown">
                                            <li><?php echo anchor('menu/edit/'.$list['id'],'<i class="uk-icon uk-icon-eye"></i> View'); ?></li>
                                            <li><?php echo anchor('menu/edit/'.$list['id'],'<i class="uk-icon uk-icon-edit"></i> Edit'); ?></li>
                                            <li class="uk-nav-divider"></li>
                                            <li><?php echo anchor('Article/delete/'.$list['id'],'<i class="uk-icon uk-icon-trash"></i> Delete',array('class'=>'del')); ?></li>
                                        </ul>
                                    </div>
                                </div>
                            </div><!-- 小分辨率 end -->
                        </td>
                    </tr>

                <?php endforeach; ?>
                </tbody>
            </table>
            <!-- 分页 -->
            <div>
                <?php echo $page_links; ?>

            </div><!-- 分页 end -->
            <!-- token令牌 -->
            <!-- 批量操作控件 -->
            <div id="cent_opt" class="uk-button-group" style="display: none">
                <button id="article_top_checked" class="uk-button">置顶</button>
                <button id="article_delete_checked" class="uk-button"><i class="uk-icon uk-icon-trash"></i></button>
            </div> <!-- 批量操作控件 end -->
        </form><!-- 文章列表 end -->
    </div>
</div>
