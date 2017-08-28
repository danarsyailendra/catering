<?php
session_start();
include '../config/config.php';
if (isset($_POST['submit'])) {
    
    $makanan_id = $_POST['makanan_id'];
    
    //$tanggal = $_POST['tanggal_menu_malam'];
    /*
    function ubahTanggal($tanggal){
    $pisah = explode('/',$tanggal);
    $array = array($pisah[0],$pisah[1],$pisah[2]);
    $gabung = implode('-',$array);
    return $gabung;
    }
    $tgl_baru = ubahTanggal($tanggal);
    */
    
    $nama_makanan = $_POST['nama_makanan'];
    
    //$makanan_id_baru = 'MKN-' . $tgl_baru;
    //$insert = mysqli_query($con,"insert into t_menu_makanan(menu_id,menu,date) values ('$menu_id','$menu','$tgl_baru')");
    $update = update("p_menu_malam", "nama_makanan = '$nama_makanan',date = SYSDATE()","makanan_id='$makanan_id'");
    //echo $update[query];
    if ($update[status] == true) {
        echo "<script type='text/javascript'>";
        echo "alert('Menu berhasil diupdate');";
        echo "location.href='../';";
        echo "</script>";
    }
    
    } else {
    
   // include '../css.php';
    ?>
    <form method="POST" action="_admin_menu/admin_update_menu.php">
        <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
            
            <?php
            $makanan_id = $_GET['id'];
            $makanan = tampil('p_menu_malam', 'nama_makanan', "makanan_id = '$makanan_id'");
            list($nama_makanan) = $makanan[0];
            //$waktu = explode(' ', $batas_waktu);
            ?>
            
            <h4 class="modal-title">Display / Update Menu Makanan </h4>
        </div>
        <div class="modal-body">
            <!--
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label class="control-label">Tanggal</label>
                        <input type="text" class="form-control date-picker" data-date-start-date="+0d" name="tanggal_menu_malam" readonly="" value="<?= $date ?>">
                    </div>
                </div>
            </div>
            -->
            <div class="row">
                <div class="col-md-12">
                    <div class="form-group">
                        <label class="control-label">Menu</label>
                        <textarea class="form-control" name="nama_makanan"><?= $nama_makanan ?></textarea>
                    </div>
                </div>
            </div>
        </div>
        <div class="modal-footer">
            <input type="submit" class="btn red-sunglo" name="submit" value="Simpan">
        </div>
    </form>
    <?php
   // include '../js.php';
}
?>