<!doctype html>

<html lang="en">

<head>
    <meta charset="utf-8">

    <title><?php echo $meta_title ?></title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <link href="<?php echo base_url('assets/'.BACKENDFOLDER.'//bootstrap/css/bootstrap.min.css') ?>" rel="stylesheet"
          type="text/css"/>
    <link href="<?php echo base_url('assets/font-awesome/css/font-awesome.min.css') ?>" rel="stylesheet"
          type="text/css"/>
    <link href="<?php echo base_url('assets/'.BACKENDFOLDER.'//plugins/daterangepicker/daterangepicker-bs3.css') ?>" rel="stylesheet"
          type="text/css"/>
    <link href="<?php echo base_url('assets/'.BACKENDFOLDER.'//dist/css/AdminLTE.css') ?>" rel="stylesheet" type="text/css"/>
    <link href="<?php echo base_url('assets/'.BACKENDFOLDER.'//dist/css/skins/skin-purple.css') ?>" rel="stylesheet" type="text/css"/>
    <link href="<?php echo base_url('assets/'.BACKENDFOLDER.'//plugins/datatables/dataTables.bootstrap.css') ?>" rel="stylesheet"
          type="text/css"/>
    <link href="<?php echo base_url('assets/jquery-ui/jquery-ui.css') ?>" rel="stylesheet" type="text/css"/>
    <link href="<?php echo base_url('assets/elfinder/css/elfinder.min.css') ?>" rel="stylesheet" type="text/css"/>
    <link href="<?php echo base_url('assets/'.BACKENDFOLDER.'//dynatree/skin-vista/ui.dynatree.css') ?>" rel="stylesheet"
          type="text/css"/>
    <link href="<?php echo base_url('assets/elfinder/css/theme.css') ?>" rel="stylesheet" type="text/css"/>

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
    <![endif]-->
</head>

<body class="skin-purple">
<input type="hidden" value="<?php echo base_url() ?>" id="base-url"/>

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
                            <img src="<?php echo base_url('assets/'.BACKENDFOLDER.'//img/default-user.png') ?>" class="user-image"
                                 alt="<?php echo get_userdata('name') ?>" width="160" height="160"/>
                            <span class="hidden-xs"><?php echo get_userdata('name') ?></span>
                        </a>
                        <ul class="dropdown-menu">
                            <li class="user-header">
                                <img src="<?php echo base_url('assets/'.BACKENDFOLDER.'//img/default-user.png') ?>"
                                     class="img-circle" alt="<?php echo get_userdata('name') ?>"/>

                                <p>
                                    <?php echo get_userdata('name') ?> - Administrator
                                    <small>Member since <?php echo date('M. Y', get_userdata('since')) ?></small>
                                </p>
                            </li>
                            <li class="user-footer">
                                <div class="pull-left">
                                    <a href="<?php echo base_url(BACKENDFOLDER.'/user/create/' . get_userdata('user_id')) ?>"
                                       class="btn btn-default btn-flat">Profile</a>
                                </div>
                                <div class="pull-right">
                                    <a href="<?php echo base_url(BACKENDFOLDER.'/logout') ?>" class="btn btn-default btn-flat">Sign
                                        out</a>
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
        <?php foreach ($roles as $role) { ?>
            <?php if(get_userdata('role_id') == 1 || $role->id > get_userdata('role_id')) { ?>
                <section class="content">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="box box-primary">
                                <div class="box-header with-border">
                                    <h3 class="box-title"><?php echo $role->name ?></h3>

                                    <div class="box-tools pull-right">
                                        <button data-widget="collapse" class="btn btn-box-tool"><i class="fa fa-minus"></i>
                                        </button>
                                    </div>
                                </div>
                                <div class="box-body">
                                    <div class="message-<?php echo $role->id ?>"></div>
                                    <div class="tree-structure">
                                        <ul>
                                            <form action="<?php echo base_url(BACKENDFOLDER.'/rolemodule') ?>" class="role-form"
                                                  method="post">
                                                <input type="hidden" name="role_id" value="<?php echo $role->id ?>"/>
                                                <?php foreach ($modules as $module) { ?>
                                                    <li class="col-lg-3">
                                                        <label><input <?php echo (isset($saved_modules[$role->id])
                                                                && in_array($module->id, $saved_modules[$role->id])) ? 'checked' : '' ?>
                                                                type="checkbox" value="<?php echo $module->id ?>"
                                                                class="parent-check"
                                                                data-role-type="<?php echo $role->id ?>"
                                                                name="modules[]"/> <?php echo $module->name ?></label>
                                                        <?php if (!empty($child_modules[$module->id])) { ?>
                                                            <ul>
                                                                <?php foreach ($child_modules[$module->id] as $child_module) { ?>
                                                                    <li style="border: 1px solid #ccc; padding: 10px 20px; background-color: #f9f9f9; width: 100%; margin-bottom: 10px">
                                                                        <label>
                                                                            <input <?php echo (isset($saved_modules[$role->id])
                                                                                && in_array($child_module->id, $saved_modules[$role->id])) ? 'checked' : '' ?>
                                                                                class="<?php echo $role->id . '-' . $module->id ?> child-check"
                                                                                type="checkbox"
                                                                                value="<?php echo $child_module->id ?>"
                                                                                data-role-type="<?php echo $role->id ?>"
                                                                                name="modules[]"/> <?php echo $child_module->name ?>
                                                                        </label>

                                                                        <div id="permission-<?php echo $role->id.'-'.$child_module->id ?>">
                                                                            <?php
                                                                            $viewPermission = $addPermission = $editPermission = $deletePermission = '';
                                                                            $permissionCheck = (isset($saved_module_permissions[$role->id][$child_module->id])) ? $saved_module_permissions[$role->id][$child_module->id] : false;
                                                                            ?>
                                                                            <input type="checkbox" value="1"
                                                                                   class="<?php echo $role->id . '-' . $module->id ?>"
                                                                                <?php echo (substr($permissionCheck, 0, 1)) ? 'checked' : '' ?>
                                                                                   name="view-<?php echo $child_module->id ?>"/>
                                                                            View
                                                                            <input type="checkbox" value="1"
                                                                                   class="<?php echo $role->id . '-' . $module->id ?>"
                                                                                <?php echo (substr($permissionCheck, 1, 1)) ? 'checked' : '' ?>
                                                                                   name="add-<?php echo $child_module->id ?>"/>
                                                                            Add
                                                                            <input type="checkbox" value="1"
                                                                                   class="<?php echo $role->id . '-' . $module->id ?>"
                                                                                <?php echo (substr($permissionCheck, 2, 1)) ? 'checked' : '' ?>
                                                                                   name="edit-<?php echo $child_module->id ?>"/>
                                                                            Edit
                                                                            <input type="checkbox" value="1"
                                                                                   class="<?php echo $role->id . '-' . $module->id ?>"
                                                                                <?php echo (substr($permissionCheck, 3, 1)) ? 'checked' : '' ?>
                                                                                   name="delete-<?php echo $child_module->id ?>"/>
                                                                            Delete
                                                                        </div>
                                                                    </li>
                                                                <?php } ?>
                                                            </ul>
                                                        <?php } else { ?>
                                                            <div>
                                                                <?php
                                                                $viewPermission = $addPermission = $editPermission = $deletePermission = '';
                                                                $permissionCheck = (isset($saved_module_permissions[$role->id][$module->id])) ? $saved_module_permissions[$role->id][$module->id] : false;
                                                                ?>
                                                                <input type="checkbox" value="1"
                                                                       class="<?php echo $role->id . '-' . $module->id ?>"
                                                                    <?php echo (substr($permissionCheck, 0, 1)) ? 'checked' : '' ?>
                                                                       name="view-<?php echo $module->id ?>"/>
                                                                View
                                                                <input type="checkbox" value="1"
                                                                       class="<?php echo $role->id . '-' . $module->id ?>"
                                                                    <?php echo (substr($permissionCheck, 1, 1)) ? 'checked' : '' ?>
                                                                       name="add-<?php echo $module->id ?>"/>
                                                                Add
                                                                <input type="checkbox" value="1"
                                                                       class="<?php echo $role->id . '-' . $module->id ?>"
                                                                    <?php echo (substr($permissionCheck, 2, 1)) ? 'checked' : '' ?>
                                                                       name="edit-<?php echo $module->id ?>"/>
                                                                Edit
                                                                <input type="checkbox" value="1"
                                                                       class="<?php echo $role->id . '-' . $module->id ?>"
                                                                    <?php echo (substr($permissionCheck, 3, 1)) ? 'checked' : '' ?>
                                                                       name="delete-<?php echo $module->id ?>"/>
                                                                Delete
                                                            </div>
                                                        <?php } ?>
                                                    </li>
                                                <?php } ?>
                                                <div class="clearfix"></div>
                                                <input type="submit" value="Save" class="btn btn-primary submit-form">
                                            </form>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
            <?php } ?>
        <?php } ?>
    </div>

    <footer class="main-footer">
        <div class="pull-right hidden-xs">
        </div>
        <strong>Copyright &copy; <?php echo date('Y') ?> <a href="<?php echo base_url() ?>"><?php echo SITENAME ?></a>.</strong> All rights reserved. Powered By: <a href="http://amniltech.com" target="_blank">Amnil Technologies Pvt. Ltd.</a>
    </footer>
</div>

<script src="<?php echo base_url('assets/js/jquery-2.1.3.min.js') ?>"></script>
<script src="<?php echo base_url('assets/js/jquery-migrate-1.2.1.js') ?>"></script>
<script src="<?php echo base_url('assets/'.BACKENDFOLDER.'//bootstrap/js/bootstrap.min.js') ?>" type="text/javascript"></script>
<script src="<?php echo base_url('assets/jquery-ui/jquery-ui.js') ?>" type="text/javascript"></script>
<script src='<?php echo base_url('assets/'.BACKENDFOLDER.'//plugins/fastclick/fastclick.min.js') ?>'></script>
<script src="<?php echo base_url('assets/'.BACKENDFOLDER.'//dist/js/app.min.js') ?>" type="text/javascript"></script>
<script src="<?php echo base_url('assets/'.BACKENDFOLDER.'//plugins/sparkline/jquery.sparkline.min.js') ?>"
        type="text/javascript"></script>
<script src="<?php echo base_url('assets/ckeditor/ckeditor.js') ?>" type="text/javascript"></script>
<script src="<?php echo base_url('assets/ckfinder/ckfinder.js') ?>" type="text/javascript"></script>
<script src="<?php echo base_url('assets/'.BACKENDFOLDER.'//plugins/daterangepicker/daterangepicker.js') ?>"
        type="text/javascript"></script>
<script src="<?php echo base_url('assets/'.BACKENDFOLDER.'//plugins/datepicker/bootstrap-datepicker.js') ?>"
        type="text/javascript"></script>
<script src="<?php echo base_url('assets/'.BACKENDFOLDER.'//plugins/iCheck/icheck.min.js') ?>" type="text/javascript"></script>
<script src="<?php echo base_url('assets/'.BACKENDFOLDER.'//plugins/slimScroll/jquery.slimscroll.min.js') ?>"
        type="text/javascript"></script>
<script src="<?php echo base_url('assets/'.BACKENDFOLDER.'//plugins/datatables/jquery.dataTables.js') ?>"
        type="text/javascript"></script>
<script src="<?php echo base_url('assets/'.BACKENDFOLDER.'//plugins/datatables/dataTables.bootstrap.js') ?>"
        type="text/javascript"></script>
<script src="<?php echo base_url('assets/'.BACKENDFOLDER.'//dist/js/filepicker.js') ?>" type="text/javascript"></script>
<script src="<?php echo base_url('assets/elfinder/js/elfinder.min.js') ?>" type="text/javascript"></script>
<script src="<?php echo base_url('assets/'.BACKENDFOLDER.'//dynatree/jquery.dynatree.min.js') ?>"></script>
<script src="<?php echo base_url('assets/'.BACKENDFOLDER.'//dist/js/role-module.js') ?>"></script>
<script src="<?php echo base_url('assets/'.BACKENDFOLDER.'//dist/js/scripts.js') ?>"></script>

</body>
</html>