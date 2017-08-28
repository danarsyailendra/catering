<?php ob_start();
session_start();

include 'config/config.php';
if (isset($_SESSION['suser_email'])) {
    $include = 'main.php';
    $title = 'Catering Metra';
    $class_body = 'page-container-bg-solid page-header-fixed page-sidebar-closed-hide-logo page-md';
} else {
    $include = 'login.php';
    $title = 'Login';
    $class_body = 'login';
    $style = "style='background-color: #ddd9d9!important;'";
}
?>
<style>

</style>
<html lang="en">
    <!--<![endif]-->
    <!-- BEGIN HEAD -->

    <head>
        <meta charset="utf-8" />
        <title><?= $title ?></title>
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta content="width=device-width, initial-scale=1" name="viewport" />
        <meta content="" name="description" />
        <meta content="" name="author" />
        <!-- BEGIN GLOBAL MANDATORY STYLES -->
        <?php
        include 'css.php';
        include 'js.php'
        ?>  
    </head>
    <!-- END HEAD -->
    <body class="<?= $class_body ?>" <?= $style ?>>
        <?php
        include $include;
        //echo $include;
        ?>

        <!-- END MAIN SCRIPTS -->
    </body>

</html>
</body>