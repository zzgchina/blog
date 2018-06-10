<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml"><head>
    <title>出错界面</title>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url('resouse/admin/view/css/error.css');  ?>">
    <script language="javascript" type="text/javascript">
        var i = <?php echo isset($time)?$time:5; ?>;
        var intervalid;
        intervalid = setInterval("fun()", 1000);
        function fun() {
            if (i === 0) {
                window.location.href = "";
                clearInterval(intervalid);
            }
            document.getElementById("mes").innerHTML = i;
            i--;
        }
    </script>
</head>
<body class="error-404">
<div id="doc_main">

    <section class="bd clearfix">
        <div class="module-error">
            <div class="error-main clearfix">
                <div class="label"></div>
                <div class="info">
                    <h3 class="title"><?php echo $msg; ?></h3>

                    <div class="oper">
                        <p><a href="javascript:history.go(-1);">返回上一级页面&gt;</a></p>
                        <p>将在 <span id="mes"><?php echo $time; ?></span> 秒钟后返回！</p>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>

</body></html>
