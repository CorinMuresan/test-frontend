<?php 
    include 'php/includes/var.php';
    $hmr = isset($_GET['hmr']) ? '//localhost:8080/' : '';
 ?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="x-ua-compatible" content="ie=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Front End</title>
        <link rel="stylesheet" type="text/css" href="<?php echo $hmr ?>assets/styles/styles.css">   
    </head>
    <body <?php echo $page === 'hp'? 'class="-homepage"': '' ?>>
    
        <?php

        // MAIN layout, or list of implemented pages
        if ($layout && file_exists('php/layouts/'.$layout.'.php')) {
            include 'php/layouts/'.$layout.'.php';
        } else {
            include 'php/pages/__integration.php';
        }
        ?>

        <script src="<?php echo $hmr ?>assets/scripts/manifest.js"></script>

        <script src="<?php echo $hmr ?>assets/scripts/vendor.js"></script>

        <script src="<?php echo $hmr ?>assets/scripts/app.js"></script>

        <script src="http://localhost:35729/livereload.js?snipver=1"></script>
    </body>
</html>