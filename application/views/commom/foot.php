</div>

</div><!-- 正文内容 end -->
</div>

<!-- 脚部 -->
<footer class="tm-footer">
    <div class="uk-container uk-container-center uk-text-center">
        <ul class="uk-subnav uk-subnav-line uk-flex-center">
            <li>design base on<a href="https://getuikit.com" target="_blank">&nbsp;UIKIT</a></li>
            <li>website base on<a href="http://www.codeigniter.com/" target="_blank">&nbsp;CodeIgniter</a></li>
            <?php if('is_record'): ?>
                <li><a href="http://www.github.com" target="_blank"><?php echo 'ICP'; ?></a></li>
            <?php endif; ?>
        </ul>
        <p>
            <span><span style="font-family:arial;">Copyright&nbsp;&copy;&nbsp;</span>&nbsp;2016&nbsp;-&nbsp;<?php echo date("Y",time()); ?>&nbsp;<a><?php echo 'web_title';?></a>&nbsp;&amp;&nbsp; 版权所有 &nbsp;</span>
            <a href="https://github.com/wazsmwazsm/QinBlog" target="_blank">网站源码Github</a><br>
            <span>Made by <a><?php echo 'web_author';?></a> Licensed under <a href="http://opensource.org/licenses/MIT" target="_blank">MIT license</a>.</span>
        </p>
        <img src="<?php echo base_url('qinblog_white.png'); ?>" width="90" height="30" title="QinBlog" alt="QinBlog">
    </div>
</footer><!-- //脚部 -->

</body>
</html>
