<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title><?php echo $title; ?> </title>
    <link type="text/css" rel="stylesheet" href="<?php echo base_url('resouse/admin/view/css/login.css');  ?>">
    <link href="<?php echo base_url('resouse/admin/view/favicon.ico'); ?>" rel="icon" type="image/x-icon">
    <link href="//netdna.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
    <!-- 适合阻塞加载的样式，使用非阻塞会将没样式的html渲染 -->
    <link rel="stylesheet" type="text/css" href="<?php echo base_url('resouse/admin/view/css/uikit.almost-flat.min.css'); ?>" >
    <link rel="stylesheet" type="text/css" href="<?php echo base_url('resouse/admin/view/css/qin.admin.css'); ?>" >
    <script src="<?php echo base_url('resouse/admin/view/js/jquery.min.js'); ?>"></script>
    <script src="<?php echo base_url('resouse/admin/view/js/uikit.min.js'); ?>"></script>
    <!-- 非阻塞并发加载js模块 -->
    <script src="<?php echo base_url('resouse/admin/view/js/head.load.min.js'); ?>" data-headjs-load="<?php echo base_url(AD_JS_PATH.'init.js'); ?>"></script>
</head>

