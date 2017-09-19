<?php
if (!function_exists('tampil')) {
    include '../config/config.php';
}

$_date = ($_GET['_date'])?$_GET['_date'] : date('Y-m-d');

$pesan = tampil('t_pesan', 'pesan_id,nama_makanan,notes,date,close', "date = '$_date' and active = 1 order by date,pesan_id");
//echo $menu[query];
if ($pesan[rowsnum] > 0) {
    $hor = ceil($pesan[rowsnum] / 3);
    $k = 0;
    for ($j = 0; $j < $hor; $j++) {
        //echo $j;
        $l = $k + 3;
        ?>
        <div class="row">
            <?php
            for ($i = $k; $i < $l; $i++) {

                //echo $menu[query];
                $pesan_id     = $pesan[$i][0];
                $nama_makanan = $pesan[$i][1];
                $notes        = $pesan[$i][2];
                $date         = $pesan[$i][3];
                $close        = $pesan[$i][4];
                $user         = $_SESSION['suser_email'];
                $hari         = date('D', strtotime($date));
                //$cek = tampil('t_kehadiran', 'hadir', "menu_id='$menu_id' and user_email = '" . $_SESSION['suser_email'] . "'");
                //echo $cek[query];
                //list($hadir) = $cek[0];
                //$hadir_text = '';
                if ($pesan_id) {
                    ?>
            <div class="col-md-6">
                        <div class="portlet light bordered">
                            <div class="portlet-title">
                                <div class="caption">
                                    <div class="caption-subject">
                                        <?= hari($hari) . ', ' . indo($date) ?>
                                    </div>
                                </div>
                                <div class="actions">
                                    <?php
                                        if ($close == 0) {
                                        ?>
                                            <div class="row">
                                                <span class="pull-right" style="float: right">
                                                    <div class="col-md-6">
                                                        <a href="_pesan_makan_malam/pesan_update_menu.php?id=<?= $pesan_id ?>" data-target="#modal_update_menu_" data-toggle="modal" class="btn red btn-sm">
                                                            <i class="fa fa-pencil"></i>
                                                            Edit Pesanan
                                                         </a>
                                                    </div>
                                                 </span>
                                            </div>
                                    <?php
                                            } else {
                                                // echo date('W');
                                                ?>
                                                <span class="btn red-sunglo font-white-sunglo caption-subject bold uppercase"><i class="fa fa-close"></i>Closed</span>
                                                <?php
                                                    }
                                                    ?>
                                </div>
                            </div>
                            <div class="portlet-body">
                                <!--
                                <div class="scroller" data-rail-visible="1" data-rail-color="red-sunglo" data-handle-color="#a1b2bd">
                                -->
                                    <!--
                                    <div class="row">
                                        <div class="col-md-6">
                                            <h5>Menu</h5>
                                        </div>
                                        <div class="col-md-6">
                                            <h5>Notes</h5>
                                        </div>
                                    </div>
                                    -->
                                    <div class="row">
                                            <div class="col-md-6">
                                                <h3><?= $nama_makanan ?></h3>
                                            </div>
                                    </div>
                                    <div class="row">
                                            <div class="col-md-6">
                                                <p><?= $notes ?></p>
                                            </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php
                    $k++;
                }
            }
            ?>
        </div>
        <?php
    }
} else {
    ?>
    <div class="col-md-12">
        <div class="portlet light bordered">
            <div class="portlet-body">
                <div class="row">
                    <div class="col-md-12">
                        <span class="pull-right" style="float: right">
                            <div class="col-md-2">
                                <a href="_pesan_makan_malam/pesan_tambah_menu.php?date=<?= $_date ?>" data-target="#modal_update_menu_" data-toggle="modal" class="btn red btn-sm">
                                    <i class="fa fa-plus"></i>
                                    Tambah Pesanan
                                </a>
                            </div>
                        </span>
                        <center>
                            <h2>Data not found</h2>
                        </center>
                    </div>
                </div>
            </div>
        </div>
        <?php
    }
    ?>
    <!--
    <div id="modal_tambah_menu_" class="modal fade" tabindex="-1" role="basic" aria-hidden="true">
        <div class="modal-dialog" id="isi_kehadiran">
            <div class="modal-content">

            </div>
            <!-- /.modal-content 
        </div>
        <!-- /.modal-dialog 
   </div>
    -->
   <div id="modal_update_menu_" class="modal fade" tabindex="-1" role="basic" aria-hidden="true">
        <div class="modal-dialog" id="isi_kehadiran">
            <div class="modal-content">

            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>