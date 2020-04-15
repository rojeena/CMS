<form action="" method="post">
    <div class="form-group has-feedback">
        <input type="text" name="username" class="form-control" placeholder="Username"/>
        <span class="glyphicon glyphicon-user form-control-feedback"></span>
    </div>
    <div class="form-group has-feedback">
        <input type="password" name="password" class="form-control" placeholder="Password"/>
        <span class="glyphicon glyphicon-lock form-control-feedback"></span>
    </div>
    <div class="row">
        <div class="col-xs-8">
            <a href="<?php echo base_url(BACKENDFOLDER.'/retrieve-password') ?>">I forgot my password</a>
        </div>
        <div class="col-xs-4">
            <button type="submit" class="btn btn-primary btn-block btn-flat">Sign In</button>
        </div>
    </div>
</form>