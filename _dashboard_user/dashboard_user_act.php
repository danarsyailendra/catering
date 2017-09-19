<?php
if (!function_exists('tampil')) {
    include '../config/config.php';
}
$_bulan = ($_GET['_bulan']) ? $_GET['_bulan'] : str_replace('0', '', date('m'));
$_year = ($_GET['_year']) ? $_GET['_year'] : date('Y');
$_week = ($_GET['_week']) ? $_GET['_week'] : getMinggu(date('d-m-Y'));

$menu = tampil('t_menu_makanan', 'menu_id,date,menu,close', 'active = 1 and month=' . $_bulan . ' and year = ' . $_year . ' and week = ' . $_week . ' order by close,menu_id');
//echo $menu[query];
if ($menu[rowsnum] > 0) {
    $hor = ceil($menu[rowsnum] / 3);
    $k = 0;
    for ($j = 0; $j < $hor; $j++) {
        //echo $j;
        $l = $k + 3;
        ?>
        <div class="row">
            <?php
            for ($i = $k; $i < $l; $i++) {

                //echo $menu[query];
                $menu_id = $menu[$i][0];
                $date = $menu[$i][1];
                $daftar_menu = $menu[$i][2];
                $close = $menu[$i][3];
                $email = $_SESSION['suser_email'];
                //echo $cek[query];
                $hari = date('D', strtotime($date));
                $cek = tampil('t_kehadiran', 'hadir', "menu_id='$menu_id' and user_email = '" . $email . "'");
                //echo $cek[query];
                list($hadir) = $cek[0];
                $hadir_text = '';
                if ($menu_id) {
                    ?>
                    <div class="col-md-4">
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
                                        //echo getMinggu($date);
                                        //echo getJumlahMingu(2017, 8);
                                        ?>
                                        <a href="_dashboard_user/dashboard_user_kehadiran.php?id=<?= $menu_id ?>" data-target="#modal_isi_kehadiran" data-toggle="modal" class="btn red btn-sm">
                                            <i class="fa fa-pencil"></i>
                                            Isi Kehadiran
                                        </a>
                                        <?php
                                    } else {
                                       // echo date('W');
                                        ?>

                                        <span class="btn red-thunderbird font-white-sunglo caption-subject bold uppercase"><i class="fa fa-close"></i>Closed</span>
                                        <?php
                                    }
                                    ?>
                                </div>
                            </div>
                            <div class="portlet-body">
                                <div class="row">
                                    <!--<div class="col-md-6">
                                        <label><b>Menu: </b></label><br>
                                    <?= $daftar_menu ?>
                                    </div>-->
                                    <div class="col-md-12">
                                        <div class="note note-success">
                                            <center>
                                                <?= $cek[query] ?>
                                            </center>
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
    <div id="modal_isi_kehadiran" class="modal fade" tabindex="-1" role="basic" aria-hidden="true">
        <div class="modal-dialog" id="isi_kehadiran">
            <div class="modal-content">

            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>