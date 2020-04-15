<?php if (substr($actionBtnData['options'], 0, 1) == 'E') { ?> <!-- checking to display options -->
    <?php if ($activeModulePermission['edit']) {
        $action = true;
        switch ($actionBtnData['module']) {
            default:
                $hrefUrl = base_url(BACKENDFOLDER . '/' . $actionBtnData['module'] . '/create/' . $actionBtnData['moduleData']->id);
                break;
        } ?>
        <a title="Edit Data" href="<?php echo $hrefUrl ?>" class="btn btn-primary">
            <i class="fa fa-edit fa-fw"></i>
        </a>
    <?php } ?>
<?php } ?>
<?php if (substr($actionBtnData['options'], 1, 1) == 'D' || $actionBtnData['options'] == 'D') { ?> <!-- checking to display options -->
    <?php if ($activeModulePermission['delete']) {
        $action = true;
        $delete = true;
        switch ($actionBtnData['module']) {
            case 'category':
                //if ($actionBtnData['moduleData']->is_deletable == 'yes') {
                    $hrefUrl = base_url(BACKENDFOLDER . '/' . $actionBtnData['module'] . '/delete/' . $actionBtnData['moduleData']->id);
                //} else {
                   // $delete = false;
               // }
                break;
            default:
                $hrefUrl = base_url(BACKENDFOLDER . '/' . $actionBtnData['module'] . '/delete/' . $actionBtnData['moduleData']->id);
                break;
        }
        if ($delete) {
            ?>
            <a title="Delete Data" href="<?php echo $hrefUrl ?>" class="btn btn-danger"
               onclick="return confirm('Are you sure?')">
                <i class="fa fa-trash fa-fw"></i>
            </a>
        <?php }
    } ?>
<?php } ?>

<?php if (substr($actionBtnData['options'], 2, 1) == 'S' || $actionBtnData['options'] == 'S') { ?> <!-- checking to display options -->
    <?php if ($activeModulePermission['edit']) {
        $action = true;
        $status = true;
        ?>
        <?php
        if ($actionBtnData['moduleData']->status == 'InActive') {
            $icon_class = 'fa-eye';
            $button_class = 'btn-success';
            $button_text = '';
        } else {
            $icon_class = 'fa-eye-slash';
            $button_class = 'btn-info';
            $button_text = '';
        }
        switch ($actionBtnData['module']) {
            case 'category':
                //if ($actionBtnData['moduleData']->is_deletable == 'no') {
                    //$status = false;
                //}
                break;
            default:
                $status = true;
                break;
        }
        if ($status) { ?>
            <a title="Change Status of Data"
               href="<?php echo base_url(BACKENDFOLDER . '/' . $actionBtnData['module'] . '/status/' . $actionBtnData['moduleData']->status . '/' . $actionBtnData['moduleData']->id) ?>"
               class="btn <?php echo $button_class ?>" onclick="return confirm('Are you sure?')">
                <i class="fa <?php echo $icon_class ?> fa-fw"></i><?php echo $button_text ?>
            </a>
        <?php }
    } ?>
<?php } ?>

<?php echo !(isset($action)) ? 'No permission granted for other actions' : '' ?>