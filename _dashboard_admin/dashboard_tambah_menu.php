<?php
session_start();
include '../config/config.php';
if (isset($_POST['submit'])) {

    $menu_id = $_POST['menuid'];

    $tanggal = $_POST['tanggal_menu'];

    function ubahTanggal($tanggal) {
        $pisah = explode('/', $tanggal);
        $array = array($pisah[2], $pisah[0], $pisah[1]);
        $gabung = implode('-', $array);
        return $gabung;
    }

    $tgl_baru = ubahTanggal($tanggal);

    function ubahTahun($tanggal) {
        $pisah = explode('/', $tanggal);
        $array = array($pisah[2]);
        $gabung = implode($array);
        return $gabung;
    }

    $thn_baru = ubahTahun($tanggal);

    function ubahBulan($tanggal) {
        $pisah = explode('/', $tanggal);
        $array = array($pisah[0]);
        $gabung = implode($array);
        return $gabung;
    }

    $bln_baru = ubahBulan($tanggal);

    $wom = getMinggu($tanggal);

    $menu = $_POST['menu'];

    $userwhen = date('Y/m/d H:m:s');

    $menu_id = 'MN-' . $tgl_baru;
    //$insert = mysqli_query($con,"insert into t_menu_makanan(menu_id,menu,date) values ('$menu_id','$menu','$tgl_baru')");

    $cek = tampil('t_menu_makanan', 'date', "date = '$tanggal' and active = 1");
    //echo $cek[query];
    if ($cek[rowsnum] > 0) {
        echo "<script type='text/javascript'>";
        echo "alert('Menu sudah ada!');";
        echo "location.href='../index.php?page=11';";
        echo "</script>";
    } else {
        $insert = insert("t_menu_makanan", "menu_id,year,month,week,date,menu,user_when", "'$menu_id','$thn_baru','$bln_baru','$wom','$tgl_baru','$menu',SYSDATE()");
        if ($insert[status] == true) {
            echo "<script type='text/javascript'>";
            echo "alert('Menu berhasil diinput');";
            echo "location.href='../index.php?page=11';";
            echo "</script>";
        }
    }
} else {

    include '../css.php';
    ?>
    <form method="POST" action="_dashboard_admin/dashboard_tambah_menu.php">
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

            <h4 class="modal-title">Tambah Menu Makanan</h4>
        </div>
        <div class="modal-body">
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label class="control-label">Tanggal</label>
                        <input type="text" class="form-control date-picker" data-date-start-date="+0d" name="tanggal_menu">
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="form-group">
                        <label class="control-label">Menu</label>
                        <textarea class="form-control" name="menu"></textarea>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label class="control-label"></label>
                        <input class="form-control" type="hidden" readonly="" name="menuid" value="<?= $menu_id ?>">
                    </div>
                </div>
            </div>
        </div>
        <div class="modal-footer">
            <input type="submit" class="btn red-sunglo" name="submit" value="Simpan">
        </div>
    </form>
    <?php
    include '../js.php';
}
?>