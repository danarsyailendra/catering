<?php
session_start();
include '../config/config.php';
if (isset($_POST['submit'])) {

    $makanan_id = $_POST['makanan_id'];
    
    $cek = tampil('p_menu_malam', 'nama_makanan', "nama_makanan = '$nama_makanan' and active = 1");
    $cek[query];
    if ($cek[rowsnum] > 0) {
        echo "<script type='text/javascript'>";
        echo "alert('Menu sudah ada!');";
        echo "location.href='../?page=21';";
        echo "</script>";
    } else {
        $insert = insert("p_menu_malam", "nama_makanan,date", "'$nama_makanan',SYSDATE()");
        if ($insert[status] == true) {
            echo "<script type='text/javascript'>";
            echo "alert('Menu berhasil diinput');";
            echo "location.href='../?page=21';";
            echo "</script>";
        }
    }
} else {

   // include '../css.php';
    ?>
    <form method="POST" action="_daftar_menu/daftar_tambah_menu.php">
        <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
            <h4 class="modal-title">Tambah Menu Makanan</h4>
        </div>
        <div class="modal-body">
            <div class="row">
                <div class="col-md-12">
                    <div class="form-group">
                        <label class="control-label">Menu</label>
                        <textarea class="form-control" name="nama_makanan"></textarea>
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