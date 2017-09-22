<?php
session_start();
include '../config/config.php';
if (isset($_POST['submit'])) {

    $insert = insert("p_submenu_malam", "submakanan_name,active,parent_id", "'".$_POST['nama_makanan']."',1,".$_POST['parent']);
    if ($insert[status] == true) {
        echo "<script type='text/javascript'>";
        echo "alert('Sub Menu berhasil diinput');";
        echo "location.href='../?page=21';";
        echo "</script>";
    }
} else {

    // include '../css.php';
    ?>
    <form method="POST" action="_daftar_menu/daftar_tambah_submenu.php">
        <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
            <h4 class="modal-title">Tambah Sub Menu Makanan</h4>
        </div>
        <div class="modal-body">
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label class="control-label">Nama Menu</label>
                        <select class="form-control" name="parent">
                            <?php
                            $menu_utama = tampil("p_menu_malam", "makanan_id,nama_makanan", "active = 1 and disp = 1");
                            for ($i = 0; $i < $menu_utama[rowsnum]; $i++) {
                                ?>
                                <option value="<?= $menu_utama[$i][0] ?>"><?= $menu_utama[$i][1] ?></option>
                                <?php
                            }
                            ?>
                        </select>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label class="control-label">Nama Sub Menu</label>
                        <input type="text" class="form-control" name="nama_makanan">
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