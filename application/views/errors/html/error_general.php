<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?><!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<title>Error</title>
<style type="text/css">

::selection { background-color: #E13300; color: white; }
::-moz-selection { background-color: #E13300; color: white; }

body {
	background-color: #fff;
	margin: 40px;
	font: 13px/20px normal Helvetica, Arial, sans-serif;
	color: #4F5155;
}

a {
	color: #003399;
	background-color: transparent;
	font-weight: normal;
}

h1 {
	color: #444;
	background-color: transparent;
	border-bottom: 1px solid #D0D0D0;
	font-size: 19px;
	font-weight: normal;
	margin: 0 0 14px 0;
	padding: 14px 15px 10px 15px;
}

code {
	font-family: Consolas, Monaco, Courier New, Courier, monospace;
	font-size: 12px;
	background-color: #f9f9f9;
	border: 1px solid #D0D0D0;
	color: #002166;
	display: block;
	margin: 14px 0 14px 0;
	padding: 12px 10px 12px 10px;
}

#container {
	margin: 10px;
	border: 1px solid #D0D0D0;
	box-shadow: 0 0 8px #D0D0D0;
}

p {
	margin: 12px 15px 12px 15px;
}
</style>
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
<body>
	<div id="container">
		<h1><?php echo $heading; ?></h1>
		<?php echo $message; ?>
        <p>将在 <span id="mes"><?php echo isset($time)?$time:5; ?></span> 秒钟后返回首页！</p>
    </div>
</body>
</html>