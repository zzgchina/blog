<?php
defined('BASEPATH') OR exit('No direct script access allowed');
$this->load->view('commom/head');
?>

            <!-- 网站内容 -->
            <div class="uk-width-medium-4-5" id="load_content" data-dashboard="<?php echo site_url('Manage/dash'); ?>">
                <div class="uk-grid" >
                    <!-- 后台信息 -->
                    <div class="uk-width-medium-1-1" id="iframe">
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
