<head>
    <meta charset="gbk">
    <title>fff</title>
    <meta name="keywords" content="rr" />
    <meta name="description" content="dddd" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="<?php echo base_url('resouse/home/css/base.css'); ?>" rel="stylesheet">
    <link href="<?php echo base_url('resouse/home/css/index.css'); ?>" rel="stylesheet">
    <link href="<?php echo base_url('resouse/home/css/m.css'); ?>" rel="stylesheet">
    <script src="<?php echo base_url('resouse/home/js/jquery.min.js'); ?>" type="text/javascript"></script>
    <script src="<?php echo base_url('resouse/home/js/jquery.easyfader.min.js'); ?>"></script>
    <script src="<?php echo base_url('resouse/home/js/scrollReveal.js'); ?>"></script>
    <script src="<?php echo base_url('resouse/home/js/common.js'); ?>"></script>
    <!--[if lt IE 9]>
    <script src="<?php echo base_url('resouse/home/js/modernizr.js'); ?>"></script>
    <![endif]-->
</head>
<body>
<header>
    <!--menu begin-->
    <div class="menu">
        <nav class="nav" id="topnav">
            <h1 class="logo"><a href="http://www.yangqq.com">xxxx</a></h1>
            <?php foreach ($nav as $v):?>
                <li><a href="<?=$v['id']?>"><?=$v['name']?></a>
                <?php if(!empty($v['son'])) :?>
                    <ul class="sub-nav">
                        <?php foreach ($v['son'] as $vv):?>
                            <li><a href="<?=$vv['id']?>"><?=$vv['name']?></a></li>
                        <?php endforeach;?>
                    </ul>
                <?php endif; ?>
                </li>
            <?php endforeach;?>
        </nav>
    </div>
</header>