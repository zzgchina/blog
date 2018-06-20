<!DOCTYPE html>
<!--[if IE 8]> <html lang="en" class="ie8 no-js"> <![endif]-->
<!--[if IE 9]> <html lang="en" class="ie9 no-js"> <![endif]-->
<!--[if !IE]><!-->
<html lang="en">
<!--<![endif]-->
<head>
    <meta charset="utf-8" />
    <title><?php echo $title; ?></title>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta content="width=device-width, initial-scale=1" name="viewport" />
    <!-- BEGIN GLOBAL MANDATORY STYLES -->
    <link href="./resouse/statics/admin/global/plugins/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
    <link href="./resouse/statics/admin/css/font-awesome/css/font-awesome.css"rel="stylesheet" type="text/css" />
    <link href="./resouse/statics/admin/css/table_form.css" rel="stylesheet"  />
    <link href="./resouse/statics/admin/global/plugins/simple-line-icons/simple-line-icons.min.css" rel="stylesheet" type="text/css" />
    <link href="./resouse/statics/admin/global/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
    <link href="./resouse/statics/admin/global/plugins/uniform/css/uniform.default.css" rel="stylesheet" type="text/css" />
    <link href="./resouse/statics/admin/global/plugins/bootstrap-switch/css/bootstrap-switch.min.css" rel="stylesheet" type="text/css" />
    <link href="./resouse/statics/admin/global/plugins/jquery-notific8/jquery.notific8.min.css" rel="stylesheet" type="text/css" />
    <!-- END GLOBAL MANDATORY STYLES -->
    <!-- BEGIN THEME GLOBAL STYLES -->
    <link href="./resouse/statics/admin/global/css/components-rounded.min.css" rel="stylesheet" id="style_components" type="text/css" />
    <link href="./resouse/statics/admin/global/css/plugins.min.css" rel="stylesheet" type="text/css" />
    <link href="./resouse/statics/admin/my.css" rel="stylesheet" type="text/css" />
    <!-- END THEME GLOBAL STYLES -->
    <!-- BEGIN THEME LAYOUT STYLES -->
    <link href="./resouse/statics/admin/layouts/layout/css/layout.min.css" rel="stylesheet" type="text/css" />
    <!-- END THEME LAYOUT STYLES -->
    <!--[if lt IE 9]>
    <script src="./resouse/statics/admin/global/plugins/respond.min.js"></script>
    <script src="./resouse/statics/admin/global/plugins/excanvas.min.js"></script>
    <![endif]-->
    <!-- BEGIN CORE PLUGINS -->
    <script src="./resouse/statics/admin/global/plugins/jquery.min.js" type="text/javascript"></script>
<!--    <script type="text/javascript">var dr_index = 1;var siteurl = "{SITE_PATH}{SELF}";var memberpath = "{MEMBER_PATH}";var sys_theme = "{THEME_PATH}admin/";</script>-->
<!--    <script src="./resouse/statics/js/{SITE_LANGUAGE}.js" type="text/javascript"></script>-->
    <script src="./resouse/statics/js/jquery-ui.min.js" type="text/javascript"></script>
    <script src="./resouse/statics/js/jquery.cookie.js" type="text/javascript"></script>
    <link rel="stylesheet" href="./resouse/statics/js/ui-dialog.css">
    <script type="text/javascript"t src="./resouse/statics/js/dialog-plus.js"></script>
    <script type="text/javascript" src="./resouse/statics/js/jquery.artDialog.js?skin=default"></script>
    <script src="./resouse/statics/js/validate.js" type="text/javascript"></script>
    <script src="./resouse/statics/js/admin.js" type="text/javascript"></script>
    <script src="./resouse/statics/js/dayrui.js" type="text/javascript"></script>
    <script src="./resouse/statics/admin/global/plugins/bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
    <script src="./resouse/statics/admin/global/plugins/bootstrap-hover-dropdown/bootstrap-hover-dropdown.min.js" type="text/javascript"></script>
    <script src="./resouse/statics/admin/global/plugins/jquery-slimscroll/jquery.slimscroll.min.js" type="text/javascript"></script>
    <script src="./resouse/statics/admin/global/plugins/bootstrap-switch/js/bootstrap-switch.min.js" type="text/javascript"></script>
    <script src="./resouse/statics/admin/global/plugins/jquery.scrollTo.min.js" type="text/javascript"></script>
    <script src="./resouse/statics/admin/global/plugins/jquery-notific8/jquery.notific8.min.js" type="text/javascript"></script>
    <!-- END CORE PLUGINS -->
    <!-- BEGIN THEME GLOBAL SCRIPTS -->
    <script src="./resouse/statics/admin/global/scripts/app.min.js" type="text/javascript"></script>
    <script type="text/javascript" src="./resouse/statics/admin/tree/tree.js"></script>
    <!-- END THEME GLOBAL SCRIPTS -->
    <!-- BEGIN THEME LAYOUT SCRIPTS -->
    <script src="./resouse/statics/admin/layouts/layout/scripts/layout.js" type="text/javascript"></script>
    <script src="./resouse/statics/admin/layouts/layout/scripts/demo.min.js" type="text/javascript"></script>
    <script src="./resouse/statics/admin/layouts/global/scripts/quick-sidebar.min.js" type="text/javascript"></script>
    <script type="text/javascript">

        $(function(){

            if ($(window).width() <= 800) {
                alert("你的浏览器太小，推荐使用1024以上浏览器");
            }
            wSize();

            $("#sitelist li").click(function(){
                var id=$(this).attr('id');
                art.dialog.confirm("<font color=red><b>{fc_lang('是否要切换站点？')}</b></font>", function(){
                    // ajax提交验证
                    $.ajax({type: "POST",dataType:"json", url: "{dr_url('site/select')}", data: {id: id},
                        success: function(data) {
                            if (data.status == 1) {
                                //验证成功
                                dr_tips(data.code, 3, 1);
                                setTimeout('top.location.reload(true)', 2000);
                            } else {
                                dr_tips(data.code, 5);
                            }
                            return true;
                        },
                        error: function(HttpRequest, ajaxOptions, thrownError) {

                        }
                    });
                    return true;
                });
            });
        });
        function getSidebarScrollHeight(){
            var $el = $("#left"),
                $w = $(window),
                $nav = $("#navigation");
            var height = $w.height();

            if(($nav.hasClass("navbar-fixed-top") && $w.scrollTop() == 0) || $w.scrollTop() == 0) height -= 40;

            if($el.hasClass("sidebar-fixed") || $el.hasClass("mobile-show")){
                $el.height(height);
            }
        }
        // 强制隐藏左侧菜单按钮
        function hideNavShow(){
            var body = $('body');
            var sidebar = $('.page-sidebar');
            var sidebarMenu = $('.page-sidebar-menu');
            $(".sidebar-search", sidebar).removeClass("open");

            body.addClass("page-sidebar-closed");
            sidebarMenu.addClass("page-sidebar-menu-closed");
            if (body.hasClass("page-sidebar-fixed")) {
                sidebarMenu.trigger("mouseleave");
            }
            if ($.cookie) {
                $.cookie('sidebar_closed', '1');
            }

            // $(window).trigger('resize');
        }
        // 强制显示左侧菜单按钮
        function hideNavHide(){
            return;
            var body = $('body');
            var sidebar = $('.page-sidebar');
            var sidebarMenu = $('.page-sidebar-menu');
            $(".sidebar-search", sidebar).removeClass("open");

            body.removeClass("page-sidebar-closed");
            sidebarMenu.removeClass("page-sidebar-menu-closed");
            if ($.cookie) {
                $.cookie('sidebar_closed', '0');
            }

            //$(window).trigger('resize');
        }

        if(!Array.prototype.map)
            Array.prototype.map = function(fn,scope) {
                var result = [],ri = 0;
                for (var i = 0,n = this.length; i < n; i++){
                    if(i in this){
                        result[ri++]  = fn.call(scope ,this[i],i,this);
                    }
                }
                return result;
            };

        var getWindowSize = function(){
            return ["Height","Width"].map(function(name){
                return window["inner"+name] ||
                    document.compatMode === "CSS1Compat" && document.documentElement[ "client" + name ] || document.body[ "client" + name ]
            });
        }
        window.onload = function (){

            if (!window.applicationCache) {
                alert("你的浏览器不支持HTML5，推荐使用Chrome或IE高版本浏览器");
                return false;
            }
            if(!+"\v1" && !document.querySelector) {
                alert("你的浏览器不支持HTML5，推荐使用Chrome或IE高版本浏览器");
                return false;
            } else {
                window.onresize = resize;
            }
            function resize() {
                wSize();
                return false;
            }
        }
        function wSize(){
            var str=getWindowSize();
            var strs= new Array(); //定义一数组
            strs=str.toString().split(","); //字符分割
            var heights = strs[0]-80,Body = $('body');$('#rightMain').height(heights);
        }
        function _M(mid, sid, url, name) {

        }
        function fn(i, url) {

            $("#rightMain").attr('src', url);
            $("#rightMain").attr("url", url);

            $('.i-t').removeClass('active');
            $('#fn_'+i).addClass('active');
            $(".dr_link").attr('class', 'dr_link nav-item');

            // 移动端隐藏菜单
            if ($(window).width() <= 824) {
                $('.page-sidebar').removeClass("in");
                $('.page-sidebar').attr("aria-expanded", "false");
            }
        }
        function _MP(id, url) {

            $("#rightMain").attr('src', url);
            $("#rightMain").attr("url", url);

            var fid = $("#_MP_"+id).attr("fid");

            $(".dr_left").attr('class', 'dr_left nav-item');
            $(".dr_link").attr('class', 'dr_link nav-item');
            $("#_MP_"+id).addClass('active open');
            $("#D_M_"+fid).addClass('active open');

            if (url.indexOf('http') == -1) {
                dr_loading();
            }

            // 移动端隐藏菜单
            if ($(window).width() <= 824) {
                $('.page-sidebar').removeClass("in");
                $('.page-sidebar').attr("aria-expanded", "false");
            }
        }
        function _MAP(mid, tid, url) {
            $(".my_top").removeClass('open');
            //$("#select_top_module").addClass('open');
            $("#select_my_top_"+tid).addClass('open');
            $("#my_top_"+tid).addClass('open');
            $(".page-sidebar-menu").html(left_menu[tid]);
            _MP(mid, url);


            $('#tree').explr({
                rememberState   : true,
                startCollapsed  : false,
                treeWidth   : 180
            });
        }
        function logout(){
            if (confirm("{fc_lang('您确定要退出吗？')}"))
                top.location = '<?php echo site_url('login/loginout'); ?>';
            return false;
        }
        function dr_loading() {
            $('.page-loading').remove();
            $('body').append('<div class="page-loading"><img src="./resouse/statics/admin/images/loading-mini.gif"/>&nbsp;&nbsp;<span></span></div>');
            setTimeout(function(){
                $('.page-loading').remove();
            }, 5000);
        }
        function dr_set_color_value(v) {
            $.ajax({
                type: "GET",
                cache: false,
                url: "{dr_url('api/color')}&v="+v,
                dataType: "json",
                success: function (res) {
                },
                error: function (xhr, ajaxOptions, thrownError) {
                }
            });
        }
        function dr_add_menu() {
            $.ajax({
                type: "GET",
                cache: false,
                url: "{dr_url('api/menu')}&v="+encodeURIComponent($("#rightMain").attr("url")),
                dataType: "text",
                success: function (res) {
                    if (!res) {
                        dr_tips('{fc_lang("操作成功")}',3, 1);
                    } else {
                        dr_tips(res);
                    }
                },
                error: function (xhr, ajaxOptions, thrownError) {
                }
            });
        }
    </script>
    <style>
        .page-content {
            padding:0 !important;
            background-color: #f5f5f5;
        }
    </style>
</head>
<body scroll="no" style="overflow:hidden" class="page-sidebar-closed-hide-logo page-content-white page-header-fixed page-sidebar-fixed page-footer-fixed">

<div class="page-header navbar navbar-fixed-top">
    <div class="page-header-inner ">
        <div class="page-logo">
            <a href="" title="" target="_blank" style="    font-size: 16px; padding-top: 24px;">POSCMS免费版 </a>
        </div>

        <a href="javascript:;" class="menu-toggler responsive-toggler" data-toggle="collapse" data-target=".navbar-collapse"> </a>
        <div id="_right_menu" class="top-menu">

            <ul class="nav navbar-nav pull-right">

                <li class="dropdown dropdown-dark">
                    <a href="" target="_blank" class="dropdown-toggle popovers top-link" data-container="body" data-trigger="hover" data-placement="bottom" data-content="">
                        <i class="fa fa-home" style="font-size: 21px;"></i>
                    </a>
                </li>


                <li class="dropdown dropdown-dark">
                    <a class="dropdown-toggle popovers top-link" data-container="body" data-trigger="hover" data-placement="bottom" data-content="" href="" target="right"><i class="icon-refresh"></i></a>
                </li>

                <li class="dropdown dropdown-user">
                    <a href="javascript:;" style=" height: 70px;" class="dropdown-toggle top-link" data-toggle="dropdown" data-hover="dropdown" data-close-others="true">
                        <img alt="{$admin['username']}" class="img-circle" src="" />
                        <i class="fa fa-angle-down"></i>
                    </a>
                    <ul class="dropdown-menu dropdown-menu-default">
                        <li><a href="" target="_blank"><i class="fa fa-user"></i>  </a></li>
                        <li><a href="" target="_blank"><i class="fa fa-home"></i> </a></li>
                        <li><a href="javascript:;" onClick="logout();"><i class="fa fa-sign-in"></i> 退出系统</a></li>
                        <li class="divider"> </li>
                        <li><a href="{dr_url('home/clear')}" target="right"><i class="fa fa-trash"></i> 更新数据</a></li>
                        <li><a href="http://www.poscms.net" target="_blank"><i class="fa fa-code"></i> {fc_lang('官方网站')}</a></li>
                    </ul>
                </li>
            </ul>
        </div>
    </div>
</div>

<div class="clearfix"> </div>
<div class="page-container">
    <div class="page-sidebar-wrapper">
        <div class="page-sidebar navbar-collapse collapse">
            <div class="page-sidebar navbar-collapse collapse">
                <div class="sidebar-search-wrapper">
                    <form style="margin:10px 18px;" class="sidebar-search" action="http://www.poscms.net/index.php" method="get" target="_blank">
                        <input name="s" type="hidden" value="help">
                        <input name="c" type="hidden" value="search" />
                        <input name="m" type="hidden" value="index" />
                        <a href="javascript:;" class="remove">
                            <i class="icon-close"></i>
                        </a>
                        <div class="input-group" style="border-radius:0">
                            <input type="text" style="border-radius:0" class="form-control" name="keyword" placeholder="{fc_lang('搜索帮助...')}">
                            <span class="input-group-btn">
                                <a href="javascript:;" class="btn submit">
                                    <i class="icon-magnifier"></i>
                                </a>
                            </span>
                        </div>
                    </form>
                </div>

                <ul class="page-sidebar-menu page-sidebar-menu-fixed page-header-fixed" data-keep-expanded="false" data-auto-scroll="true" data-slide-speed="200" style="padding-top:0px">

                    <li id="D_M_2" class="dr_left nav-item active open ">
                        <a href="javascript:;" class="nav-link nav-toggle hided">
                            <i class="fa fa-home"></i>
                            <span class="title">配置项</span>
                            <span class="arrow open"></span>
                        </a>
                        <ul class="sub-menu">
                            <li tid="1" fid="2" id="_MP_3" class="dr_link nav-item active open">
                                <a href="javascript:_MP('3','<?php echo site_url('menu/get_list'); ?>');">
                                    <i class="iconm fa fa-home"></i>
                                    <span class="title">配置菜单</span>
                                </a>
                            </li>
                            <li tid="1" fid="2" id="_MP_4" class="dr_link nav-item">
                                <a href="javascript:_MP('4', 'index.php');">
                                    <i class="iconm fa fa-user"></i>
                                    <span class="title">资料修改</span>
                                </a>
                            </li>
                            <li tid="1" fid="2" id="_MP_5" class="dr_link nav-item">
                                <a href="javascript:_MP('5', 'admin.php?c=root&amp;m=log');">
                                    <i class="iconm fa fa-calendar-check-o"></i>
                                    <span class="title">登录日志</span>
                                </a>
                            </li>
                </ul>


            </div>
                </ul>
        </div>

        <div class="page-content-wrapper">

            <div class="page-content">


                <iframe name="right" id="rightMain" src="{dr_url('home/main')}&cache={SYS_TIME}" url="{dr_url('home/main')}&cache={SYS_TIME}" frameborder="false" scrolling="auto" style="border:none; margin-bottom:0px;" width="100%" height="auto" allowtransparency="true"></iframe>

            </div>
        </div>
        <a href="javascript:;" class="page-quick-sidebar-toggler">
            <i class="icon-login"></i>
        </a>
    </div>
</div>
</body>

<script>
    $('.hided').on('click',function(){
        $(this).siblings('ul').toggle();
    })
</script>
</html>