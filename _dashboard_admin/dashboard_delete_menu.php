<?php
session_start();
include '../config/config.php';
if (isset($_POST['submit'])) {
    $menu_id = $_POST['id_menu'];
    $delete = update('t_menu_makanan', 'active=0', "menu_id = '$menu_id'");
    if ($delete[status] == true) {
        echo "<script type='text/javascript'>";
        echo "alert('Menu berhasil dihapus');";
        echo "location.href='../';";
        echo "</script>";
    }
} else {
    $menu_id = $_GET['id'];
    ?>
<form method="post" action="_dashboard_admin/dashboard_delete_menu.php">
        <input type="hidden" name="id_menu" value="<?= $menu_id ?>">
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