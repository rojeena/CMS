<aside class="main-sidebar">
    <section class="sidebar">
        <div class="user-panel">
            <div class="pull-left info">
                <p><?php echo get_userdata('name') ?></p>

                <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
            </div>
        </div>
        <ul class="sidebar-menu">
            <li class="header">MAIN NAVIGATION</li>
            <li<?php echo segment(2) == 'dashboard' ? ' class="active"' : '' ?>>
                <a href="<?php echo base_url(BACKENDFOLDER.'/dashboard') ?>">
                    <i class="fa fa-dashboard"></i> <span>Dashboard</span>
                </a>
            </li>
            <?php if($user_id == 1){
                if(segment(2) == 'role' || segment(2) == 'rolemodule' || segment(2) == 'user'){
                    $class="treeview active";
                }else{
                    $class="treeview";
                }?>
                <li class="<?php echo $class?>">
                    <a href="#">
                        <i class="fa fa-cogs"></i><span>Settings</span>
                        <i class="fa fa-angle-left pull-right"></i>
                    </a>
                    <ul class="treeview-menu">
                        <li class="<?php echo segment(2) == 'role' ? 'active' : '' ?>">
                            <a href="<?php echo base_url(BACKENDFOLDER.'/role') ?>">
                                <i class="fa fa-circle-o"></i> Role Manager
                            </a>
                        </li>
                        <li class="<?php echo segment(2) == 'rolemodule' ? 'active' : '' ?>">
                            <a href="<?php echo base_url(BACKENDFOLDER.'/rolemodule')?>">
                                <i class="fa fa-circle-o"></i> Role Module Manager
                            </a>
                        </li>
                        <li class="<?php echo segment(2) == 'user' ? 'active' : '' ?>">
                            <a href="<?php echo base_url(BACKENDFOLDER.'/user')?>">
                                <i class="fa fa-circle-o"></i> Users
                            </a>
                        </li>
                    </ul>
                </li>
            <?php }?>
            <li class="<?php echo segment(2) == 'category' ? 'active' : '' ?>">
                <a href="<?php echo base_url(BACKENDFOLDER.'/category')?>">
                    <i class="fa fa-cogs"></i> <span>Keywords</span>
                </a>
            </li>
            <li class="<?php echo segment(2) == 'faq' ? 'active' : '' ?>">
                <a href="<?php echo base_url(BACKENDFOLDER.'/faq')?>">
                    <i class="fa fa-files-o"></i> <span>FAQ</span>
                </a>
            </li>
            <li class="<?php echo segment(2) == 'unanswered' ? 'active' : '' ?>">
                <a href="<?php echo base_url(BACKENDFOLDER.'/unanswered')?>">
                    <i class="fa fa-files-o"></i> <span>Unanswered Questions</span>
                </a>
            </li>
            <li>
                <a href="<?php echo base_url(BACKENDFOLDER.'/logout') ?>">
                    <i class="fa fa-sign-out"></i> <span>Sign Out</span>
                </a>
            </li>
        </ul>
    </section>
</aside>