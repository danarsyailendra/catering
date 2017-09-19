<style>
    .dt-head-left {text-align: left;}
</style>
<div class="page-content">
    <!-- BEGIN PAGE HEAD-->
    <div class="page-head">
        <!-- BEGIN PAGE TITLE -->
        <div class="page-title">
            <h1>Dashboard Admin
            </h1>
        </div>
        <!-- END PAGE TITLE -->
        <!-- BEGIN PAGE TOOLBAR -->
        <div class="page-toolbar">
        </div>
        <!-- END PAGE TOOLBAR -->

    </div>
    <div class="page-body">
        <div class="portlet light bordered">
            <div class="portlet-title">
                <div class="caption">
                    <span class="caption-subject bold uppercase"> Daftar Menu</span>
                </div>
            </div>
            <div class="portlet-body">
                <div class="table-toolbar">
                    <div class="row">
                        <div class="col-md-2">
                            <select id="minggu" class="form-control">
                                <?php
                                //$_minggu = str_replace("0","", date('d'));
                                for ($i = 1; $i <= 5; $i++) {
                                    $now = date('d-m-Y');
                                    $now_ = getMinggu($now);
                                    $selected = ($i == $now_) ? "selected" : "";
                                    ?>
                                    <option value="<?= $i ?>"<?= $selected ?>>Minggu ke - <?= $i ?></option>
                                    <?php
                                }
                                ?>
                            </select>
                        </div>
                        <div class="col-md-2">
                            <?php
                            $bulan = tampil("p_bulan", "*", "bulan_id is not null");
                            ?>
                            <select id="bulan" class="form-control">
                                <?php
                                $_bulan = str_replace("0", "", date('m'));
                                for ($i = 0; $i < $bulan[rowsnum]; $i++) {
                                    $selected = ($bulan[$i][0] == $_bulan) ? "selected" : "";
                                    ?>
                                    <option value="<?= $bulan[$i][0] ?>"<?= $selected ?>><?= $bulan[$i][1] ?></option>
                                    <?php
                                }
                                ?>
                            </select>
                        </div>
                        <div class="col-md-2">
                            <select id="tahun" class="form-control">
                                <?php
                                $gd = getdate();
                                $max_year = $gd['year'];
                                for ($i = 2017; $i <= $max_year; $i++) {
                                    $selected = ($i == $gd['year']) ? "selected" : "";
                                    ?>
                                    <option value="<?= $i ?>"<?= $selected ?>><?= $i ?></option>
                                    <?php
                                }
                                ?>
                            </select>
                        </div>
                      <!--  <span class="pull-right" style="float: right">
                            <div class="col-md-6">
                                <a href="#" data-target="" data-toggle="modal" class="btn red btn-outline sbold"><i class="fa fa-mail-forward"></i> Send Menu</a>
                            </div>
                        </span>-->
                        <span class="pull-right" style="float: right">
                            <div class="col-md-6">
                                <a href="_dashboard_admin/dashboard_tambah_menu.php" data-target="#modal_tambah_menu" data-toggle="modal" class="btn red btn-outline sbold"><i class="fa fa-plus"></i> Tambah Menu</a>
                            </div>
                        </span>
                        <div id="modal_tambah_menu" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
                            <div class="modal-dialog" id="tambah_menu">
                                <div class="modal-content">

                                </div>
                                <!— /.modal-content —>
                            </div>
                            <!— /.modal-dialog —>
                        </div>
                        <!--
                        <span class="pull-right" style="float: right">
                            <div class="col-md-6">
                                <a href="_report/report_excel.php" target="_blank" class="btn red btn-outline sbold"><i class="fa fa-file"></i> Export List Pemesan</a>
                            </div>
                        </span>
                        -->
                        <!--
                        <div id="modal_report_menu" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
                            <div class="modal-dialog" id="report_menu">
                                <div class="modal-content">

                                </div>
                                <!— /.modal-content —>
                            </div>
                            <!— /.modal-dialog —>
                        </div>
                        -->
                        <div id="modal_update_menu" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
                            <div class="modal-dialog" id="update_menu">
                                <div class="modal-content">

                                </div>
                                <!-- /.modal-content -->
                            </div>
                            <!-- /.modal-dialog -->
                        </div>
                        <div id="modal_delete_menu" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
                            <div class="modal-dialog modal-sm" id="delete_menu">
                                <div class="modal-content">

                                </div>
                                <!-- /.modal-content -->
                            </div>
                            <!-- /.modal-dialog -->
                        </div>
                        <br><br><br>
                        <div style="display: box;white-space: nowrap;overflow-x: auto;height: 500px;">
                            <table class="table table-striped table-bordered table-hover table-checkable order-column" id="tambahMenu" style=" width: 95%">
                                <thead>
                                    <tr>
                                        <th width="5%">No</th>
                                        <th width="15%">Menu ID</th>
                                        <th width="20%">Tanggal</th>
                                        <th width="30%">Menu</th>
                                        <th width="5%">Jumlah Orang</th>
                                        <th width="5%">Act</th>
                                        <th width="5%">Minggu</th>
                                        <th width="5%">Bulan</th>
                                        <th width="5%">Tahun</th>
                                        <th width="5%">Status</th>
                                    </tr>
                                </thead>
                            </table> 
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- END PAGE HEAD-->            
</div>