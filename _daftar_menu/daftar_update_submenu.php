<?php
session_start();
include '../config/config.php';
if (isset($_POST['submit'])) {

    $nama_makanan = $_POST['nama_makanan'];
    $makanan_id = $_POST['makanan_id'];
    $parent = $_POST['parent'];
    $active = $_POST['active'];
    $update = update("p_submenu_malam", "submakanan_name = '$nama_makanan',active = $active,parent_id = $parent", "submakanan_id='$makanan_id'");
    if ($update[status] == true) {
        echo "<script type='text/javascript'>";
        echo "alert('Sub Menu berhasil diupdate');";
        echo "location.href='../?page=21';";
        echo "</script>";
    }
} else {

    // include '../css.php';
    ?>
    <form method="POST" action="_daftar_menu/daftar_update_submenu.php">
        <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>

            <?php
            $makanan_id = $_GET['id'];
            $makanan = tampil('p_submenu_malam', 'submakanan_name,active,parent_id', "submakanan_id = '$makanan_id'");
            list($nama_makanan, $active, $parent_id) = $makanan[0];
            ?>

            <h4 class="modal-title">Display / Update Menu Makanan </h4>
        </div>
        <div class="modal-body">
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label class="control-label">Active</label>
                        <div class="mt-radio-inline">
                            <label class="mt-radio">
                                <input type="radio" name="active" value='1' <?= $checked = ($active == '1') ? "checked" : "" ?>> Ya
                                <span></span>
                            </label>
                            <label class="mt-radio">
                                <input type="radio" name="active" value='0' <?= $checked = ($active == '0' or $active == '') ? "checked" : "" ?>> Tidak
                                <span></span>
                            </label>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label class="control-label">Nama Menu</label>
                        <select class="form-control" name="parent">
                            <?php
                            $menu_utama = tampil("p_menu_malam", "makanan_id,nama_makanan", "active = 1 and disp = 1");
                            for ($i = 0; $i < $menu_utama[rowsnum]; $i++) {
                                $cek = ($menu_utama[$i][0] == $parent_id) ? "selected" : "";
                                ?>
                                <option value="<?= $menu_utama[$i][0] ?>"<?= $cek ?>><?= $menu_utama[$i][1] ?></option>
                                <?php
                            }
                            ?>
                        </select>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label class="control-label">Nama Sub Menu</label>
                        <input type="text" class="form-control" name="nama_makanan" value="<?= $nama_makanan ?>">
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label class="control-label"></label>
                        <input class="form-control" type="hidden" readonly="" name="makanan_id" value="<?= $makanan_id ?>">
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