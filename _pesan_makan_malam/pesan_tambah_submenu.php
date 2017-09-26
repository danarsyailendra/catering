<?php
include '../config/config.php';

$sub_menu = tampil("p_submenu_malam", "submakanan_id,submakanan_name", "parent_id=" . $_POST['id'] . " and active = 1 order by submakanan_name");
if ($sub_menu[rowsnum] > 0) {
    ?>
    <div class="col-md-6">
        <div class="form-group">
            <label class="control-label">Sub Menu</label>
            <!--<input id="tags" class="form-control" >-->
            <select name="nama_submakanan" class="form-control">
                <?php
                for ($i = 0; $i < $sub_menu[rowsnum]; $i++) {
                    ?>
                    <option value="<?= $sub_menu[$i][0] ?>"><?= $sub_menu[$i][1] ?></option>
                    <?php
                }
                ?>
            </select>
        </div>
    </div>
    <?php
}
?>