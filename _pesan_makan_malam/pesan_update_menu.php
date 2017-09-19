<?php
session_start();
include '../config/config.php';
if (isset($_POST['submit'])) {

    $pesan_id = $_POST['pesan_id'];
    $nama_makanan = $_POST['nama_makanan'];
    $notes = $_POST['notes'];
    $date = date('Y/m/d');

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

    //$makanan_id_baru = 'MKN-' . $tgl_baru;
    //$insert = mysqli_query($con,"insert into t_menu_makanan(menu_id,menu,date) values ('$menu_id','$menu','$tgl_baru')");
    $update = update("t_pesan", "nama_makanan = '$nama_makanan', notes = '$notes'", "pesan_id='$pesan_id'");
    //echo $update[query];
    if ($update[status] == true) {
        echo "<script type='text/javascript'>";
        echo "alert('Menu berhasil diupdate');";
        echo "location.href='../?page=22';";
        echo "</script>";
    }
} else {

    // include '../css.php';
    ?>
    <form method="POST" action="_pesan_makan_malam/pesan_update_menu.php">
        <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>

            <?php
            $pesan_id = $_GET['id'];
            $pesan = tampil('t_pesan', 'nama_makanan,notes,date', "pesan_id = '$pesan_id'");
            list($nama_makanan, $notes, $date) = $pesan[0];
            //$waktu = explode(' ', $batas_waktu);
            ?>

            <h4 class="modal-title">Display / Update Menu Makanan </h4>
        </div>
        <div class="modal-body">
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label class="control-label">Menu</label>
                        <select name="nama_makanan" id="nama_makanan" class="form-control">
                            <option><?= $nama_makanan ?></option>
                            <?php
                            $pilih = tampil("p_menu_malam", "nama_makanan", "active = 1 and disp = 1");
                            if (($pilih[rowsnum] > 0)) {
                                for ($i = 0; $i < $pilih[rowsnum]; $i++) {
                                    $pilih_ = $pilih[$i][0];
                                    ?>
                                    <option><?php echo $pilih_ ?></option>
                                    <?php
                                }
                            }
                            ?>
                        </select>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label class="control-label">Tanggal</label>
                        <input type="text" name="date" class="form-control" value="<?= $date ?>" readonly="">
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-8">
                    <div class="form-group">
                        <label class="control-label">Notes</label>
                        <textarea class="form-control" name="notes"><?= $notes ?></textarea>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <label class="control-label"></label>
                    <input class="form-control" type="hidden" readonly="" name="pesan_id" value="<?= $pesan_id ?>">
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