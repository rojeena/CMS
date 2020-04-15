<?php if(validation_errors()) : ?>
    <div class="alert alert-danger alert-dismissable fade in">
        <button aria-hidden="true" data-dismiss="alert" class="close" type="button">×</button>
        <?php echo validation_errors() ?>
    </div>
<?php endif ?>
<form action="" method="post">
    <div class="row">
        <div class="col-lg-6 col-md-6">
            <div class="form-group">
                <label for="full_name">Full Name</label>
                <input type="text" name="name" value="<?php echo $user->name ?>" class="form-control" id="full_name" placeholder="Full Name">
            </div>
            <div class="form-group">
                <label for="email">Email Address</label>
                <input type="text" name="email" value="<?php echo $user->email ?>" class="form-control" id="email" placeholder="Email Address">
            </div>
            <div class="form-group">
                <label for="role_id">User Role</label>
                <select class="form-control" name="role_id" id="role_id">
                    <option value="">User Role</option>
                    <?php foreach($user_roles as $user_role) { ?>
                        <?php if(get_userdata('role_id') == 1 || $user_role->id >= get_userdata('role_id')) { ?>
                            <option value="<?php echo $user_role->id ?>" <?php echo isset($user->role_id) && ($user->role_id == $user_role->id) ? 'selected' : '' ?>><?php echo $user_role->name ?></option>
                        <?php } ?>
                    <?php } ?>
                </select>
            </div>
        </div>
        <div class="col-lg-6 col-md-6">
            <div class="form-group">
                <label for="username">Username</label>
                <input type="text" name="username" value="<?php echo $user->username ?>" class="form-control" id="username" placeholder="Username">
            </div>
            <?php if(segment(4) == '') { ?>
            <div class="form-group">
                <label for="password">Password</label>
                <input type="text" name="password" value="" class="form-control" id="password" placeholder="Password">
            </div>
            <?php } else { ?>
                <a href="#" data-toggle="modal" data-target="#change-password-modal">Change Password</a>
            <?php } ?>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-12 col-md-12">
            <div class="form-group">
                <button type="submit" class="btn btn-primary">Save</button>
            </div>
        </div>
    </div>
</form>
<div class="modal fade" id="change-password-modal" tabindex="-1" role="dialog" aria-labelledby="change-password-modal">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel">Change Password</h4>
            </div>
            <div class="modal-body">
                <form action="<?php echo base_url(BACKENDFOLDER . '/user/changepassword') ?>" method="post">
                    <input type="hidden" name="userId" value="<?php echo segment(4) ?>"/>
                    <div class="form-group">
                        <input type="password" name="oldPassword" class="form-control" placeholder="Old Password"/>
                    </div>
                    <div class="form-group">
                        <input type="password" name="newPassword" class="form-control" placeholder="New Password"/>
                    </div>
                    <div class="form-group">
                        <input type="password" name="reNewPassword" class="form-control" placeholder="Re-enter New Password"/>
                    </div>
                    <div class="form-group">
                        <input type="submit" value="Save" class="btn btn-primary"/>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>