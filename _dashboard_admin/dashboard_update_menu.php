<?php
session_start();
include '../config/config.php';
if (isset($_POST['submit'])) {
    
    $menu_id_lama = $_POST['menuid'];
    
    $tanggal = $_POST['tanggal_menu'];
    function ubahTanggal($tanggal){
    $pisah = explode('/',$tanggal);
    $array = array($pisah[2],$pisah[0],$pisah[1]);
    $gabung = implode('-',$array);
    return $gabung;
    }
    $tgl_baru = ubahTanggal($tanggal);
    
    
    $menu = $_POST['menu'];
    
    $userwhen = date('Y/m/d H:m:s');
    
    $menu_id_baru = 'MN-' . $tgl_baru;
    //$insert = mysqli_query($con,"insert into t_menu_makanan(menu_id,menu,date) values ('$menu_id','$menu','$tgl_baru')");
    $update = update("t_menu_makanan", "date = '$tgl_baru',menu = '$menu',user_when = SYSDATE(),menu_id='$menu_id_baru'","menu_id = '$menu_id_lama'");
    //echo $update[query];
    if ($update[status] == true) {
        echo "<script type='text/javascript'>";
        echo "alert('Menu berhasil diupdate');";
        echo "location.href='../';";
        echo "</script>";
    }
    
    } else {
    
    include '../css.php';
    ?>
    <form method="POST" action="_dashboard_admin/dashboard_update_menu.php">
        <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
            
            <?php
            $menu_id = $_GET['id'];
            $makanan = tampil('t_menu_makanan', 'DATE_FORMAT(date,"%m/%d/%Y"),menu', "menu_id = '$menu_id'");
            list($tanggal, $menu) = $makanan[0];
            //$waktu = explode(' ', $batas_waktu);
            ?>
            
            <h4 class="modal-title">Display / Update Menu Makanan </h4>
        </div>
        <div class="modal-body">
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label class="control-label">Menu ID</label>
                        <input class="form-control" type="text" readonly="" name="menuid" value="<?= $menu_id ?>">
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label class="control-label">Tanggal</label>
                        <input type="text" class="form-control date-picker" name="tanggal_menu" value="<?= $tanggal ?>">
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="form-group">
                        <label class="control-label">Menu</label>
                        <textarea class="form-control" name="menu"><?= $menu ?></textarea>
                    </div>
                </div>
            </div>
        </div>
        <div class="modal-footer">
            <input type="submit" class="btn red-sunglo" name="submit" value="Simpan">
        </div>
    </form>
    <?php
    include '../js.php';
}
?>