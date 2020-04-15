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
                <label for="name">Module Name</label>
                <input type="text" name="name" value="<?php echo $module->name ?>" class="form-control title" id="name" placeholder="Module Name">
            </div>
            <div class="form-group">
                <label for="slug">Module Alias</label>
                <input type="text" name="slug" value="<?php echo $module->slug ?>" class="form-control alias" id="slug" placeholder="Module Alias">
            </div>
            <div class="form-group">
                <label for="slug">Social Integration</label>
                <div>
                    <label>
                        <input type="radio" name="social" value="On" id="social" <?php echo ($module->social == 'On') ? 'checked' : '' ?>> On
                    </label>
                    <label>
                        <input type="radio" name="social" value="Off" id="social" <?php echo ($module->social == 'Off') ? 'checked' : '' ?>> Off
                    </label>
                </div>
            </div>
        </div>
        <div class="col-lg-6 col-md-6">
            <div class="form-group">
                <label for="parent_id">Parent Module</label>
                <?php echo form_dropdown('parent_id', $modules, $module->parent_id, 'class="form-control" id="parent_id"') ?>
            </div>
            <div class="form-group">
                <label for="icon_class">Icon Class</label>
                <input type="text" name="icon_class" value="<?php echo $module->icon_class ?>" class="form-control" id="icon_class" placeholder="Icon Class">
            </div>
            <div class="form-group">
                <label for="show_in_navigation">Show in Navigation</label>
                <select name="show_in_navigation" id="show_in_navigation" class="form-control">
                    <option value="1" <?php echo (isset($module->show_in_navigation) && $module->show_in_navigation == '1') ? 'selected="selected"' : '' ?>>Yes</option>
                    <option value="0" <?php echo (isset($module->show_in_navigation) && $module->show_in_navigation == '0') ? 'selected="selected"' : '' ?>>No</option>
                </select>
            </div>
        </div>
    </div>
    <div class="">
        <div class="form-group">
            <button type="submit" class="btn btn-primary">Save</button>
            <a class="btn btn-warning" href="<?php echo base_url(BACKENDFOLDER . '/'. $this->header['page_name']) ?>"><span>Cancel</span></a>
        </div>
    </div>
</form>