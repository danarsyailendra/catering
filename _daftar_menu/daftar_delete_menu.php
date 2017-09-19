<?php
session_start();
include '../config/config.php';
if (isset($_POST['submit'])) {
    $makanan_id = $_POST['makanan_id'];
    $delete = update('p_menu_malam', 'disp=0', "makanan_id = '$makanan_id'");
    if ($delete[status] == true) {
        echo "<script type='text/javascript'>";
        echo "alert('Menu berhasil dihapus');";
        echo "location.href='../?page=21';";
        echo "</script>";
    }
} else {
    $makanan_id = $_GET['id'];
    ?>
<form method="post" action="_daftar_menu/daftar_delete_menu.php">
        <input type="hidden" name="makanan_id" value="<?= $makanan_id ?>">
        <div class="modal-body">
            <div class="row cm-fix-height center-block">
                <img src="assets/img/sf/sign-delete.svg"> <h4 style="margin: 0;display: inline-block" >Yakin menghapus menu ini?</h4>
            </div>
            <hr>
            <div class="row cm-fix-height">
                <div class="col-sm-1"></div>
                <button class="btn btn-default col-sm-4" data-dismiss="modal">Tidak</button>
                <div class="col-sm-2"></div>
                <input type="submit" name="submit" class="btn btn-danger metra-red col-sm-4" value="Ya">
                <div class="col-sm-1"></div>
            </div>
        </div>

    </form>
    <?php
}
?>
<script>
    $('body').on('hidden.bs.modal', '.modal', function () {
            $(this).removeData('bs.modal');
        });
        $('.modal').on('hidden.bs.modal', function () {
            $(this).find('input[type=text]').val('').end();
            
        });
</script>