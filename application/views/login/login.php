
<body class="login_bj" >
<div class="zhuce_body">
    <div class="logo"><a href="#"><img src="<?php echo base_url('/resouse/admin/view/images/logo.png'); ?>" width="114" height="54" border="0"></a></div>
    <div class="zhuce_kong login_kuang">
        <div class="zc">
            <div class="bj_bai">
                <h3>登录</h3>
                <form action="" method="post">
                    <?php echo form_error('name')?>
                    <input type="hidden" name="<?=$name;?>" value="<?=$hash;?>" />
                    <input name="name" type="text" class="kuang_txt" placeholder="手机号/用户名">
                    <?php echo form_error('password')?>
                    <input name="password" type="password" class="kuang_txt" placeholder="密码">
                    <div>
                        <a href="#">忘记密码？</a><input name="" type="checkbox" value="" checked><span>记住我</span>
                    </div>
                    <input name="登录" type="submit" class="btn_zhuce" value="登录">

                </form>
            </div>
            <div class="bj_right">
                <p>使用以下账号直接登录</p>
                <a href="#" class="zhuce_qq">QQ注册</a>
                <a href="#" class="zhuce_wb">微博注册</a>
                <a href="#" class="zhuce_wx">微信注册</a>
                <a href="#" class="zhuce">直接注册</a>
                <p>已有账号？<a href="#">立即登录</a></p>

            </div>
        </div>
        <P>Diyhe.com&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;欢迎您定制盒子模型</P>
    </div>

</div>

</body>