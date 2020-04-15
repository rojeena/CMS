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
    <link href="<?php echo base_url('assets/'.BACKENDFOLDER.'//plugins/datatables/dataTables.bootstrap.css') ?>" rel="stylesheet" type="text/css" />
    <link href="<?php echo base_url('assets/jquery-ui/jquery-ui.css') ?>" rel="stylesheet" type="text/css" />
    <link href="<?php echo base_url('assets/jquery-ui/jquery.ui.theme.css') ?>" rel="stylesheet" type="text/css" />
    <link href="<?php echo base_url('assets/jquery-ui/jquery.ui.theme.font-awesome.css') ?>" rel="stylesheet" type="text/css" />
    <link href="<?php echo base_url('assets/elfinder/css/elfinder.min.css') ?>" rel="stylesheet" type="text/css" />
    <link href="<?php echo base_url('assets/elfinder/css/theme.css') ?>" rel="stylesheet" type="text/css" />
    <?php if(isset($addCss) && !empty($addCss)) {
        foreach($addCss as $css) { ?>
            <link href="<?php echo base_url($css) ?>" rel="stylesheet" type="text/css" />
        <?php }
    } ?>
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
    <![endif]-->
</head>

<body class="skin-purple">
<input type="hidden" value="<?php echo base_url() ?>" id="base-url"/>
<input type="hidden" value="<?php echo base_url(BACKENDFOLDER) ?>" id="admin-base-url"/>
<input type="hidden" value="<?php echo BACKENDFOLDER ?>" id="backend_folder"/>
<input type="hidden" value="<?php echo segment(2) ?>" id="admin-module"/>
<div class="wrapper">
    <header class="main-header">
        <a href="<?php echo base_url(BACKENDFOLDER) ?>" class="logo"><?php echo SITENAME ?></a>
        <nav class="navbar navbar-static-top" role="navigation">
            <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
                <span class="sr-only">Toggle navigation</span>
            </a>
            <div class="navbar-custom-menu">
                <ul class="nav navbar-nav">
                    <li class="dropdown user user-menu">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                            <span class="hidden-xs"><?php echo get_userdata('name') ?></span>
                        </a>
                        <ul class="dropdown-menu">
                            <li class="user-header">
                                <img src="<?php echo base_url('assets/'.BACKENDFOLDER.'/img/default-user.png') ?>" class="img-circle" alt="<?php echo get_userdata('name') ?>" />
                                <p>
                                    <?php echo get_userdata('name') ?> - Administrator
                                </p>
                            </li>
                            <li class="user-footer">
                                <div class="pull-left">
                                    <a href="<?php echo base_url(BACKENDFOLDER.'/user/create/'.get_userdata('user_id')) ?>" class="btn btn-default btn-flat">Profile</a>
                                </div>
                                <div class="pull-right">
                                    <a href="<?php echo base_url(BACKENDFOLDER.'/logout') ?>" class="btn btn-default btn-flat">Sign out</a>
                                </div>
                            </li>
                        </ul>
                    </li>
                </ul>
            </div>
        </nav>
    </header>

    <?php $this->load->view(BACKENDFOLDER.'/layout/navbar') ?>

    <div class="content-wrapper">
        <section class="content-header">
            <h1>
                <?php echo $module_name ?>
            </h1>
        </section>

        <section class="content">
            <div class="row">
                <div class="col-lg-12">
                    <div class="box box-primary">
                        <div class="box-header with-border">
                            <h3 class="box-title"><?php echo ucwords(str_replace('_', ' ', $sub_module_name)) ?></h3>
                            <div class="box-tools pull-right">
                                <?php $this->load->view(BACKENDFOLDER.'/layout/action_butons'); ?>

                            </div>
                        </div>
                        <div class="box-body">
                            <?php flash() ?>
                            <?php $this->load->view($body); ?>
                        </div>
                    </div>

                    <?php if(isset($socialForm)) { ?>
                        <div class="box box-success">
                            <div class="box-header with-border">
                                <h3 class="box-title">Social Form</h3>
                                <div class="box-tools pull-right">
                                    <button data-widget="collapse" class="btn btn-box-tool"><i class="fa fa-minus"></i></button>
                                    <button data-widget="remove" class="btn btn-box-tool"><i class="fa fa-times"></i></button>
                                </div>
                            </div>

                            <div class="box-body">
                                <?php flash() ?>
                                <?php $this->load->view($socialForm); ?>
                            </div>
                        </div>
                    <?php } ?>
                </div>
            </div>
        </section>
    </div>

    <footer class="main-footer">
        <div class="pull-right hidden-xs">
        </div>
        <strong>Copyright &copy; <?php echo date('Y') ?> <a href="<?php echo base_url() ?>"><?php echo SITENAME ?></a>.</strong> All rights reserved.
    </footer>
</div>

<div id="editor"></div>

<!-- Modal -->
<div class="modal fade" id="fileSelectorModal" tabindex="-1" role="dialog" aria-labelledby="fileSelectorModalLabel">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="fileSelectorModalLabel">Files Manager</h4>
            </div>
            <div class="modal-body" id="fileSelector">
            </div>
        </div>
    </div>
</div>

<script src="<?php echo base_url('assets/js/jquery-2.1.3.min.js') ?>"></script>
<script src="<?php echo base_url('assets/js/jquery-migrate-1.2.1.js') ?>"></script>
<script src="<?php echo base_url('assets/jquery-validate/jquery.validate.min.js') ?>"></script>
<script src="<?php echo base_url('assets/'.BACKENDFOLDER.'/bootstrap/js/bootstrap.min.js') ?>" type="text/javascript"></script>
<script src="<?php echo base_url('assets/jquery-ui/jquery-ui.js') ?>" type="text/javascript"></script>
<script src='<?php echo base_url('assets/'.BACKENDFOLDER.'/plugins/fastclick/fastclick.min.js') ?>'></script>
<script src="<?php echo base_url('assets/'.BACKENDFOLDER.'/dist/js/app.min.js') ?>" type="text/javascript"></script>
<script src="<?php echo base_url('assets/'.BACKENDFOLDER.'/plugins/sparkline/jquery.sparkline.min.js') ?>" type="text/javascript"></script>
<script src="<?php echo base_url('assets/ckeditor/ckeditor.js') ?>" type="text/javascript"></script>
<script src="<?php echo base_url('assets/ckfinder/ckfinder.js') ?>" type="text/javascript"></script>
<script src="<?php echo base_url('assets/'.BACKENDFOLDER.'/plugins/iCheck/icheck.min.js') ?>" type="text/javascript"></script>
<script src="<?php echo base_url('assets/'.BACKENDFOLDER.'/plugins/slimScroll/jquery.slimscroll.min.js') ?>" type="text/javascript"></script>
<script src="<?php echo base_url('assets/'.BACKENDFOLDER.'/plugins/datatables/jquery.dataTables.js') ?>" type="text/javascript"></script>
<script src="<?php echo base_url('assets/'.BACKENDFOLDER.'/plugins/datatables/dataTables.bootstrap.js') ?>" type="text/javascript"></script>
<script src="<?php echo base_url('assets/elfinder/js/elfinder.min.js') ?>" type="text/javascript"></script>
<script src="<?php echo base_url('assets/'.BACKENDFOLDER.'/dist/js/filepicker.js') ?>" type="text/javascript"></script>
<script src="<?php echo base_url('assets/'.BACKENDFOLDER.'/dist/js/scripts.js') ?>"></script>
<?php if(isset($addJs) && !empty($addJs)) {
    foreach($addJs as $js) { ?>
        <script src="<?php echo base_url($js) ?>" type="text/javascript"></script>
    <?php }
} ?>
</body>
</html>