<ul id="sortable-data">
    <?php if(is_array($allDataSort)) { ?>
        <?php foreach($allDataSort as $data) { ?>
            <li id='id_<?php echo $data->id ?>'>
                <?php
                if(isset($data->name))
                    echo $data->name;
                elseif(isset($data->menu_title))
                    echo $data->menu_title;
                elseif(isset($data->title))
                    echo $data->title;
                elseif(isset($data->question))
                    echo $data->question;
                ?>
            </li>
        <?php } ?>
    <?php } else {
        echo "<p>No data to sort.</p>";
    } ?>
</ul>