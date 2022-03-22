<?php

// Layout wizard connect
if ($page && file_exists('php/pages/'.$page.'.php')) {
    include 'php/pages/'.$page.'.php';
    ?>
    <div class="global">

        <div class="main clearfix" role="main">
            <?php
            // Modules
            if (!empty($modules)) {
                foreach ($modules as $module) {
                    if (file_exists('php/components/'.$module.'.php')) {
                        include 'php/components/'.$module.'.php';
                    }
                }
            }
            ?>
        </div><!-- end .main -->


    </div><!-- end .global -->
<?php
} else {
    echo "No such page";
}