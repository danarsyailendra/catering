<?php
session_start();
include '../config/config.php';
if (isset($_POST['submit'])) {

    $makanan_id   = $_POST['makanan_id'];
    $user         = $_SESSION['suser_email'];
    $nama_makanan = $_POST['nama_makanan'];
    $notes        = $_POST['notes'];
    $date         = date('Y/m/d');
    //$makanan_id = 'MKN-' . $tgl_baru;
    //$insert = mysqli_query($con,"insert into t_menu_makanan(menu_id,menu,date) values ('$menu_id','$menu','$tgl_baru')");
    
    $cek = tampil('t_pesan', 'date', "date = '$date' and active = 1");
    $cek[query];
    if ($cek[rowsnum] > 0) {
        echo "<script type='text/javascript'>";
        echo "alert('Pesanan hari ini sudah ada!');";
        echo "location.href='../?page=23';";
        echo "</script>";
    } else {
        $insert = insert("t_pesan", "email,nama_makanan,notes,date", "'$user','$nama_makanan','$notes','$date'");
        if ($insert[status] == true) {
            echo "<script type='text/javascript'>";
            echo "alert('Menu berhasil diinput');";
            echo "location.href='../?page=23';";
            echo "</script>";
        }
    }
} else {

   // include '../css.php';
    ?>
    <form method="POST" action="_pesan_makan_malam/pesan_tambah_menu.php">
        <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>

            <?php
            //$generate_id = tampil("t_menu_makanan", "max(menu_id)", "date_format(t_menu_makanan.user_when,'%Y%m') = '" . date('Y') . date('m') . "'");
            //list($max) = $generate_id[0];
            //echo $generate_id[rowsnum];
            //if (empty($max)) {
            //$menu_id = 'MN-' . $tgl_baru .'-'. $bln_baru . '-' . $thn_baru;
            //$menu_id = 'MN-' . date('Y').''. date('m') . '' . date('d');
            /*
              } else {
              $max = explode('-', $max);
              $counter = $max[3] + 1;
              if (strlen($counter) == 1) {
              $counter = '000' . $counter;
              } elseif (strlen($counter) == 2) {
              $counter = '00' . $counter;
              } elseif (strlen($counter) == 3) {
              $counter = '0' . $counter;
              } else {
              $counter = $counter;
              }
             */
            //$menu_id = $max[0] . '-' . date('Y') . '' . date('m') . '' . date('d');
            ?>

            <h4 class="modal-title">Tambah Pesanan</h4>
        </div>
        <div class="modal-body">
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label class="control-label">Menu</label>
                        <select name="nama_makanan" id="nama_makanan" class="form-control">
                                <option>Pilih Menu</option>
                                    <?php
                                    $pilih = tampil("p_menu_malam", "nama_makanan", "active = 1 and disp = 1");
                                    if (($pilih[rowsnum] > 0 )) {
                                        for ($i = 0; $i < $pilih[rowsnum]; $i++) {
                                            $pilih_   = $pilih[$i][0];
                                            ?>
                                            <option><?php echo $pilih_ ?></option>
                                        <?php }
                                    }
                                    ?>
                            </select>
                    </div>
                </div>    
            </div>
            <div class="row">
                <div class="col-md-8">
                    <div class="form-group">
                        <label class="control-label">Notes</label>
                        <textarea class="form-control" name="notes"></textarea>
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