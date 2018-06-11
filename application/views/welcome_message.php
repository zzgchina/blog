<?php
defined('BASEPATH') OR exit('No direct script access allowed');
$this->load->view('commom/head');
?>
<body>
<!-- 正文内容 -->
<div class="body-content">
    <div class="uk-container uk-container-center">
        <!-- 导航栏 -->
        <nav class="uk-navbar">
            <ul class="uk-navbar-nav">
                <li class="uk-navbar-brand">
                    <img src="<?php echo base_url(IMG_PATH.'qinblog_bk.png'); ?>" width="130">
                </li>
                <li class="uk-hidden-small">
                    <?php echo anchor('Manage/dash','<span class="uk-text-primary uk-text-bold">首页</span>'); ?>
                </li>
                <!-- 消息下拉菜单 -->
                <li class="uk-parent uk-hidden-small" data-uk-dropdown>
                    <a>
                        <span class="uk-text-primary uk-text-bold">消息</span>
                        <span id="new_total" class="uk-badge uk-badge-notification uk-margin-left">0</span>
                    </a>
                    <div class="uk-dropdown uk-dropdown-navbar">
                        <ul class="uk-nav uk-nav-navbar">
                            <li>
                                <a href="<?php echo site_url('Comment/index/checked/0'); ?>"><span>新评论</span>
                                    <span id="new_comment" class="uk-badge uk-badge-notification uk-align-right">0</span>
                                </a>
                            </li>
                            <li class="uk-nav-divider"></li>
                            <li>
                                <a href="<?php echo site_url('Message/index/checked/0'); ?>"><span>新留言</span>
                                    <span id="new_message" class="uk-badge uk-badge-notification uk-align-right">0</span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </li><!-- 消息下拉菜单 end -->
            </ul>
            <!-- 导航栏右侧内容 -->
            <div class="uk-navbar-flip">
                <ul class="uk-navbar-nav uk-hidden-small">
                    <li>
                        <a href="<?php echo base_url(); ?>" target="_blank"><i class="uk-icon-medium uk-icon-home"></i></a>
                    </li>
                    <li>
                        <a href="<?php echo site_url('Manage/logout'); ?>" id="logout"><i class="uk-icon-medium uk-icon-power-off"></i></a>
                    </li>
                </ul>
                <!-- 小分辨率导航按钮 -->
                <a href="#offnavcanvas" class="uk-navbar-toggle uk-visible-small" data-uk-offcanvas></a>
            </div><!-- 导航栏右侧内容 end -->
        </nav><!-- 导航栏 end -->

        <div class="uk-grid">
            <!-- 导航菜单 -->
            <div class="uk-width-medium-1-5 uk-hidden-small">
                <!-- 导航面板 -->
                <div class="uk-panel uk-panel-box">
                    <h3 class="uk-panel-title"><i class="uk-icon uk-icon-tasks"></i><span class="uk-text-primary uk-text-bold"> 后台管理</span></h3>
                    <ul class="uk-nav uk-nav-side uk-nav-parent-icon" data-uk-nav>
                        <li class="uk-nav-divider"></li>
                        <li class="uk-parent">
                            <a href="#"><i class="fa fa-th-list"></i>菜单列表</a>
                            <ul class="uk-nav-sub">
                                <li class="uk-margin-left"><?php echo anchor('Article/add_page','<i class="fa fa-edit"></i> 添加菜单'); ?></li>
                                <li class="uk-margin-left"><?php echo anchor('Article/index','<i class="uk-icon uk-icon-list"></i> 查看'); ?></li>
                            </ul>
                        </li>
                        <li class="uk-parent">
                            <a href="#"><i class="fa fa-file-text"></i>文章管理</a>
                            <ul class="uk-nav-sub">
                                <li class="uk-margin-left"><?php echo anchor('Article/add_page','<i class="uk-icon uk-icon-edit"></i> 写文章'); ?></li>
                                <li class="uk-margin-left"><?php echo anchor('Article/index','<i class="uk-icon uk-icon-list"></i> 查看'); ?></li>
                            </ul>
                        </li>
                        <li><?php echo anchor('Category/index','<i class="uk-icon uk-icon-list"></i> 分类管理'); ?></li>
                        <li><?php echo anchor('Message/index','<i class="uk-icon-commenting"></i> 留言管理'); ?></li>
                        <li><?php echo anchor('Comment/index','<i class="uk-icon-comments"></i> 评论管理'); ?></li>
                        <li class="uk-nav-divider"></li>
                    </ul>
                    <h3 class="uk-panel-title"><i class="uk-icon uk-icon-cog"></i><span class="uk-text-primary uk-text-bold"> 系统管理</span></h3>
                    <ul class="uk-nav uk-nav-side uk-nav-parent-icon" data-uk-nav>
                        <li class="uk-nav-divider"></li>
                        <li><?php echo anchor('Webinfo/index','<i class="uk-icon uk-icon-home"></i> 网站信息'); ?></li>
                        <li><?php echo anchor('Friendlink/index','<i class="uk-icon uk-icon-link"></i> 友情链接'); ?></li>
                        <li class="uk-parent">
                            <a href="#"><i class="uk-icon uk-icon-user"></i> 管理员</a>
                            <ul class="uk-nav-sub">
                                <li class="uk-margin-left">
                                    <?php echo anchor('Administrator/index','<i class="uk-icon uk-icon-info-circle"></i> 基本信息'); ?>
                                </li>
                                <li class="uk-margin-left">
                                    <?php echo anchor('Administrator/pass_manage','<i class="uk-icon uk-icon-unlock"></i> 密码管理'); ?>
                                </li>
                            </ul>
                        </li>
                        <li><?php echo anchor('Operationlog/index','<i class="uk-icon uk-icon-file-text-o"></i> 操作日志'); ?></li>
                        <li><?php echo anchor('Webbackup/index','<i class="uk-icon uk-icon-cube"></i> 站点备份'); ?></li>
                        <li><?php echo anchor('Articlebackup/index','<i class="uk-icon uk-icon-copy"></i> 文章备份'); ?></li>
                    </ul>
                </div><!-- 导航面板 end-->
            </div><!-- 导航菜单  -->

            <!-- 网站内容 -->
            <div class="uk-width-medium-4-5" id="load_content" data-dashboard="<?php echo site_url('Manage/dash'); ?>">
                <div class="uk-grid">
                    <!-- 后台信息 -->
                    <div class="uk-width-medium-1-1">
                        <div class="uk-panel uk-panel-box">
                            <div id="on_load" style="text-align:center;font-size:24px;opacity:0.8;">
                                <i class="uk-icon-spin uk-icon-spinner"></i><span> 加载中...</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>

    </div><!-- 正文内容 end -->
</div>

<!-- 脚部 -->
<footer class="tm-footer">
    <div class="uk-container uk-container-center uk-text-center">
        <ul class="uk-subnav uk-subnav-line uk-flex-center">
            <li>design base on<a href="https://getuikit.com" target="_blank">&nbsp;UIKIT</a></li>
            <li>website base on<a href="http://www.codeigniter.com/" target="_blank">&nbsp;CodeIgniter</a></li>
            <?php if($web_info['is_record']): ?>
                <li><a href="http://www.github.com" target="_blank"><?php echo $web_info['ICP']; ?></a></li>
            <?php endif; ?>
        </ul>
        <p>
            <span><span style="font-family:arial;">Copyright&nbsp;&copy;&nbsp;</span>&nbsp;2016&nbsp;-&nbsp;<?php echo date("Y",time()); ?>&nbsp;<a><?php echo $web_info['web_title'];?></a>&nbsp;&amp;&nbsp; 版权所有 &nbsp;</span>
            <a href="https://github.com/wazsmwazsm/QinBlog" target="_blank">网站源码Github</a><br>
            <span>Made by <a><?php echo $web_info['web_author'];?></a> Licensed under <a href="http://opensource.org/licenses/MIT" target="_blank">MIT license</a>.</span>
        </p>
        <img src="<?php echo base_url(IMG_PATH.'qinblog_white.png'); ?>" width="90" height="30" title="QinBlog" alt="QinBlog">
    </div>
</footer><!-- //脚部 -->

</body>
</html>
