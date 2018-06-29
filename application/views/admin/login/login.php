<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title><?php echo $title; ?> </title>
    <link type="text/css" rel="stylesheet" href="<?php echo base_url('resouse/admin/view/css/login.css');  ?>">
<!-- qq登录js-->
    <script type="text/javascript" src="http://qzonestyle.gtimg.cn/qzone/openapi/qc_loader.js" data-appid="APPID" data-redirecturi="REDIRECTURI" charset="utf-8"></script></head>
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
                    <?php echo form_error('captcha')?>
                    <input type="text" name="captcha"  placeholder="输入验证码">
                    <img src="<?php echo site_url('login/captcha'); ?>" onclick="this.src = this.src+'?'+Math.random()">
                    <div>
                        <a href="#">忘记密码？</a><input name="" type="checkbox" value="" checked><span>记住我</span>
                    </div>
                    <input name="登录" type="submit" class="btn_zhuce" value="登录">

                </form>
            </div>
            <div class="bj_right">
                <p>使用以下账号直接登录</p>
                <a  class="zhuce_qq" id="qqLoginBtn">QQ注册</a>
                <script type="text/javascript">
                    QC.Login({
                        btnId:"qqLoginBtn"    //插入按钮的节点id
                    });
                </script>
                <a href="#" class="zhuce_wb">微博注册</a>
                <a href="#" class="zhuce_wx">微信注册</a>
                <a href="#" class="zhuce">直接注册</a>
                <p>已有账号？<a href="#">立即登录</a></p>

            </div>
        </div>
        <P>http://www.zzgblog.com&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</P>
    </div>

</div>

</body>