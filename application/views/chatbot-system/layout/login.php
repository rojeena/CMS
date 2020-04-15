<!doctype html>

<html lang="en">

<head>
    <meta charset="utf-8">

    <title><?php echo $meta_title ?></title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <link href="<?php echo base_url('assets/'.BACKENDFOLDER.'//bootstrap/css/bootstrap.min.css') ?>" rel="stylesheet" type="text/css"/>
    <link href="<?php echo base_url('assets/font-awesome/css/font-awesome.min.css') ?>" rel="stylesheet" type="text/css"/>
    <link href="<?php echo base_url('assets/'.BACKENDFOLDER.'//dist/css/AdminLTE.css') ?>" rel="stylesheet" type="text/css"/>
    <link href="<?php echo base_url('assets/'.BACKENDFOLDER.'//dist/css/skins/skin-purple.css') ?>" rel="stylesheet" type="text/css"/>

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
    <![endif]-->
</head>

<body class="login-page">

<div class="login-box">
    <div class="login-logo">
        <?php echo $meta_title ?>
    </div>
    <div class="login-box-body">
        <p class="login-box-msg">Sign in to start your session</p>
        <?php flash() ?>
        <?php $this->load->view($body); ?>
    </div>
</div>

<script src="<?php echo base_url('assets/js/jQuery-2.1.3.min.js') ?>"></script>
<script src="<?php echo base_url('assets/'.BACKENDFOLDER.'//bootstrap/js/bootstrap.min.js') ?>" type="text/javascript"></script>
<script src="<?php echo base_url('assets/js/scripts.js') ?>"></script>

</body>
</html>