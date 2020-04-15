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
                <label for="name">Keyword Name</label>
                <input type="text" name="name" value="<?php echo $category->name ?>" class="form-control" id="name" placeholder="Category Name">
            </div>
        </div>
        <div class="col-lg-6 col-md-6">
            <div class="form-group">
                <label for="status">Status</label>
                <select name="status" id="status" class="form-control">
                    <option value="1" <?php echo $category->status == 'Active' || $category->status == '' ? 'selected' : '' ?>>Publish</option>
                    <option value="0" <?php echo $category->status == 'InActive' ? 'selected' : '' ?>>UnPublish</option>
                </select>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-12 col-md-12">
            <div class="form-group">
                <button type="submit" class="btn btn-primary">Save</button>
                <a class="btn btn-warning" href="<?php echo base_url(BACKENDFOLDER . '/'. $this->header['page_name']) ?>"><span>Cancel</span></a>
            </div>
        </div>
    </div>
</form>