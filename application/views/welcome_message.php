<?php
defined('BASEPATH') OR exit('No direct script access allowed');
$this->load->view('commom/head');
?>

            <!-- 网站内容 -->
            <div class="uk-width-medium-4-5" id="load_content" data-dashboard="<?php echo site_url('Manage/dash'); ?>">
                <div class="uk-grid" id="iframe">
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
<script>
    $('.list-side ').click(function() {
        // 找出 li 中的超链接 href(#id)
        var $this = $(this),
            _clickTab = $this.attr('target'); // 找到链接a中的targer的值
        $.get(_clickTab,function(data){
            $("#iframe").html(data);
        });
    });
</script>
</body>
</html>
