<?php
session_start();
include '../config/config.php';
if (isset($_POST['submit'])) {

    $pesan_id = $_POST['pesan_id'];
    $nama_makanan = $_POST['nama_makanan'];
    $notes = $_POST['notes'];
    $date = $_POST['date'];
    $delete = $_POST['delete'];

    if ($delete == 1) {
        $update = delete("t_pesan", "pesan_id='$pesan_id' and email = '" . $_SESSION['suser_email'] . "'");
    } else {
        $nama_sub = $_POST['nama_submakanan'];

        if (isset($nama_sub)) {
            $look = tampil("p_submenu_malam,p_menu_malam", "nama_makanan,submakanan_name", "submakanan_id=$nama_sub and makanan_id=$nama_makanan");
            $nama_makanan = $look[0][0] . ' - ' . $look[0][1];
        } else {
            $look = tampil("p_menu_malam", "nama_makanan", "makanan_id=$nama_makanan");
            $nama_makanan = $look[0][0];
        }
        $update = update("t_pesan", "nama_makanan = '$nama_makanan', notes = '$notes'", "pesan_id='$pesan_id'");
    }
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
                            <option value=""><?= $nama_makanan ?></option>
                            <?php
                            $pilih = tampil("p_menu_malam", "nama_makanan,makanan_id", "active = 1 and disp = 1");
                            if (($pilih[rowsnum] > 0)) {
                                for ($i = 0; $i < $pilih[rowsnum]; $i++) {
                                    $pilih_ = $pilih[$i][0];
                                    ?>
                                    <option value="<?= $pilih[$i][1] ?>"><?php echo $pilih_ ?></option>
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
            <div class="row" id="sub">

            </div>
            <div class="row">
                <div class="col-md-8">
                    <div class="form-group">
                        <label class="control-label">Notes</label>
                        <textarea class="form-control" name="notes"><?= $notes ?></textarea>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <label class="control-label">Batal Pesanan</label>
                        <div class="mt-checkbox-list">
                            <label class="mt-checkbox">
                                <input type="checkbox" name="delete" value="1">Batal<span></span>
                            </label>
                        </div>
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
<script>
    $("#nama_makanan").change(function () {
        var id_makanan = $("#nama_makanan").val();
        $.ajax({
            type: "POST",
            dataType: "html",
            url: "_pesan_makan_malam/pesan_tambah_submenu.php",
            data: "id=" + id_makanan,
            success: function (msg) {
                $("#sub").html(msg);
            }
        });
    });
</script>