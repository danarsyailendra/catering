<?php
session_start();
include '../config/config.php';
if (isset($_POST['submit'])) {
    $menu_id = $_POST['menu_id'];
    $hadir = $_POST['hadir'];
    $user = $_SESSION['suser_email'];
    
    $desc = ($hadir==1)?'hadir':'tidak hadir';
    //delete dulu jika sudah ada
    $delete = delete('t_kehadiran', "menu_id = '$menu_id' and user_email = '$user'");
    //selanjutnya insert
    $insert = insert('t_kehadiran', 'menu_id,user_email,hadir,user_when', "'$menu_id','$user',$hadir,SYSDATE()");
    if($insert[status] == true){
        echo "<script type='text/javascript'>";
        echo "alert('Anda $desc');";
        echo "location.href='http://" . $_SERVER['SERVER_NAME'] . "/catering/?page=12';";
        echo "</script>";
    }
} else {
    $menu_id = $_GET['id'];
    $det_menu = tampil('t_menu_makanan', 'date,menu', "menu_id='$menu_id'");
    list($tanggal, $menu) = $det_menu[0];
    //cek apakah sudah ada di daftar kehadiran user tsb
    $cek = tampil('t_kehadiran', 'hadir', "menu_id = '$menu_id' and user_email = '".$_SESSION['suser_email']."'");
    list($hadir) = $cek[0];
    ?>
    <form method="POST" action="_dashboard_user/dashboard_user_kehadiran.php">
        <input type="hidden" name="menu_id" value="<?=$menu_id?>">
        <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
            <h4 class="modal-title">Kehadiran | <?= $menu_id?></h4>
        </div>
        <div class="modal-body">
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label class="control-label">Tanggal</label>
                        <input type="text" class="form-control" name="tanggal_menu" value="<?= $tanggal ?>" readonly="readonly">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label class="control-label">Hadir</label>
                        <div class="mt-radio-inline">
                            <label class="mt-radio">
                                <input type="radio" name="hadir" value='1' <?=$checked = ($hadir=='1')?"checked":"" ?>> Ya
                                <span></span>
                            </label>
                            <label class="mt-radio">
                                <input type="radio" name="hadir" value='0' <?=$checked = ($hadir=='0' or $hadir == '')?"checked":"" ?>> Tidak
                                <span></span>
                            </label>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="form-group">
                        <label class="control-label">Menu</label>
                        <textarea class="form-control" readonly="readonly"><?= $menu ?></textarea>
                    </div>
                </div>
            </div>
        </div>
        <div class="modal-footer">
            <input type="submit" class="btn red-sunglo" name="submit" value="Simpan">
        </div>
    </form>
    <?php
}
?>