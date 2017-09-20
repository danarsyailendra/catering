<?php
ob_start();
//include 'config/config.php';
if (isset($_POST['submit'])) {
    $user = $_POST['username'];
    $pass = $_POST['password'];

    $cek = tampil('p_user', 'nik,email,nama,role_id', "nik = '$user' and password = '$pass'");
    //echo $cek[query];
    list($nik,$email, $nama, $role) = $cek[0];
    if ($cek[rowsnum] > 0) {
        $_SESSION['suser_nik'] = $nik;
        $_SESSION['suser_email'] = $email;
        $_SESSION['suser_name'] = $username;
        $_SESSION['suser_role'] = $role;
        header("Location:http://" . $_SERVER['SERVER_NAME'] . "/catering/");
        unset($_SESSION['login']);
    } else {
        $_SESSION['login'] = true;

        header("Location:http://" . $_SERVER['SERVER_NAME'] . "/catering/");
    }
} else {
    ?>
    <!-- BEGIN LOGO -->
    <div class="logo">
        <a href="index.php">
            <img src="assets/img/abc.png" alt="" /> </a>
    </div>
    <!-- END LOGO -->
    <!-- BEGIN LOGIN -->
    <div class="content">
        <!-- BEGIN LOGIN FORM -->
        <form class="login-form" action="" method="post">
            <h3 class="form-title font-red sunglo">Sign In</h3>
            <?php
            if ($_SESSION['login'] == true) {
                ?>
                <div class="alert alert-danger">
                    <span><center> Username atau Password salah </center></span>
                </div>
                <?php
            }
            ?>

            <div class="form-group">
                <!--ie8, ie9 does not support html5 placeholder, so we just show field title for that-->
                <label class="control-label visible-ie8 visible-ie9">Username</label>
                <input class="form-control form-control-solid placeholder-no-fix" type="text" autocomplete="off" placeholder="Username" name="username" /> </div>
            <div class="form-group">
                <label class="control-label visible-ie8 visible-ie9">Password</label>
                <input class="form-control form-control-solid placeholder-no-fix" type="password" autocomplete="off" placeholder="Password" name="password" /> </div>
            <div class="form-actions">
                <input type="submit" class="form-control btn red-sunglo uppercase" name="submit" value="Login">                  
            </div>
        </form>

    </div>
    <div class="copyright"> 2017 © Telkom Metra. All Right Reserved </div>
    <?php
}
?>
