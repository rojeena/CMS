<form action="" method="post" id="gridForm" autocomplete="off">
    <table class="table table-bordered table-hover list-datatable">
        <thead>
        <tr>
            <th>SN</th>
            <!--<th><input type="checkbox" name="selectAll" value="selectAll" class="selectAll"/></th>-->
            <th>Name</th>
            <th>Username</th>
            <th>Email</th>
            <th>Action</th>
        </tr>
        </thead>
        <tbody>
        <?php if ($users) : $serial_number = 1; ?>
            <?php foreach ($users as $user) : ?>
                <?php if (get_userdata('role_id') == 1 || $user->role_id >= get_userdata('role_id')) { ?>
                    <tr>
                        <td><?php echo $serial_number;
                            $serial_number++; ?></td>
                        <!--<td><input type="checkbox" name="selected[]" value="<?php echo $user->id; ?>"
                                   class="rowCheckBox"/></td>-->
                        <td><?php echo $user->name ?></td>
                        <td><?php echo $user->username ?></td>
                        <td><?php echo $user->email ?></td>
                        <td>
                            <?php
                            $this->data['actionBtnData'] = [
                                'module' => 'user',
                                'moduleData' => $user,
                                'options' => 'EDS'
                            ];
                            $ci = &get_instance();
                            $ci->partialRender(BACKENDFOLDER . '/include/actionButton');
                            ?>
                        </td>
                    </tr>
                <?php } ?>
            <?php endforeach ?>
        <?php else : ?>
            <tr>
                <td>No Data</td>
                <td>No Data</td>
                <td>No Data</td>
                <!--<td>No Data</td>-->
                <td>No Data</td>
                <td>No Data</td>
            </tr>
        <?php endif; ?>
        </tbody>
    </table>
</form>