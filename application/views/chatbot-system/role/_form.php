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
                <label for="title">Role *</label>
                <input type="text" name="name" value="<?php echo $role->name ?>" class="form-control title" id="name" placeholder="Title">
            </div>
        </div>
        <div class="col-lg-6 col-md-6">
            <div class="form-group">
                <label for="description">Description *</label>
                <textarea rows="7" name="description" class="form-control" id="description" placeholder="Description"><?php echo $role->description ?></textarea>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-6 col-md-6">
            <div class="form-group">
                <button type="submit" class="btn btn-primary">Save</button>
                <a class="btn btn-warning" href="<?php echo base_url(BACKENDFOLDER . '/'. $this->header['page_name']) ?>"><span>Cancel</span></a>
            </div>
        </div>
    </div>
</form>
<script>
    window.onload = function() {
        load_ckeditor('description', true);
    };
</script>