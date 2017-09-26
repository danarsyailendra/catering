<div class="page-content">
    <!-- BEGIN PAGE HEAD-->
    <div class="page-head">
        <!-- BEGIN PAGE TITLE -->
        <div class="page-title">
            <h1>Daftar Menu Admin
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
                        <div class="col-md-2" id="filter_menu_utama">
                            <select class="form-control" id="menu_utama">
                                <option value="0">Menu</option>
                                <option value="1">Sub Menu</option>
                            </select>
                        </div>
                        <div class="col-md-2" style="display: none" id="filter_sub_menu">
                            <select class="form-control" id="sub_menu">
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
                        <span class="pull-right" style="float: right" id="btambah_menu">
                            <div class="col-md-6">
                                <a href="_daftar_menu/daftar_tambah_menu.php" data-target="#modal_tambah_daftar_menu" data-toggle="modal" class="btn red btn-outline sbold"><i class="fa fa-plus"></i> Tambah Menu</a>
                            </div>
                        </span>
                        <span class="pull-right" style="float: right;display: none" id="btambah_submenu">
                            <div class="col-md-6">
                                <a href="_daftar_menu/daftar_tambah_submenu.php" data-target="#modal_tambah_daftar_submenu" data-toggle="modal" class="btn red btn-outline sbold"><i class="fa fa-plus"></i> Tambah Sub Menu</a>
                            </div>
                        </span>
                        <div id="modal_tambah_daftar_menu" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
                            <div class="modal-dialog" id="isi_kehadiran">
                                <div class="modal-content">

                                </div>
                                <!— /.modal-content —>
                            </div>
                            <!— /.modal-dialog —>
                        </div>
                        <div id="modal_tambah_daftar_submenu" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
                            <div class="modal-dialog" id="isi_kehadiran">
                                <div class="modal-content">

                                </div>
                                <!— /.modal-content —>
                            </div>
                            <!— /.modal-dialog —>
                        </div>
                        <div id="modal_update_daftar_submenu" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
                            <div class="modal-dialog" id="update_menu">
                                <div class="modal-content">

                                </div>
                                <!-- /.modal-content -->
                            </div>
                            <!-- /.modal-dialog -->
                        </div>
                        <div id="modal_update_daftar_menu" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
                            <div class="modal-dialog" id="update_menu">
                                <div class="modal-content">

                                </div>
                                <!-- /.modal-content -->
                            </div>
                            <!-- /.modal-dialog -->
                        </div>
                        <div id="modal_delete_daftar_menu" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
                            <div class="modal-dialog modal-sm" id="delete_menu">
                                <div class="modal-content">

                                </div>
                                <!-- /.modal-content -->
                            </div>
                            <!-- /.modal-dialog -->
                        </div>
                        <br><br><br>
                        <div style="display: box;white-space: nowrap;overflow-x: auto;height: 600px" id="displayMenu">
                            <table class="table table-striped table-bordered table-hover table-checkable order-column" style="width: 95%" id="daftarMenu">
                                <thead>
                                    <tr>
                                        <th width="5%">No</th>
                                        <th width="10%">Makanan ID</th>
                                        <th width="65%">Makanan</th>
                                        <th width="10%">Act</th>
                                        <th width="10%">Status</th>
                                    </tr>
                                </thead>
                            </table> 
                        </div>
                        <div style="display: none;white-space: nowrap;overflow-x: auto;height: 500px" id="displaySubMenu">
                            <table class="table table-striped table-bordered table-hover table-checkable order-column" style="width: 100%" id="daftarSubMenu">
                                <thead>
                                    <tr>
                                        <th width="5%">No</th>
                                        <th width="10%">Sub Makanan ID</th>
                                        <th width="55%">Sub Makanan</th>
                                        <th width="10%">Act</th>
                                        <th width="10%">Status</th>
                                        <th width="10%">Parent</th>
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
<script>
    $("#menu_utama").change(function () {
        var menu_utama = $("#menu_utama").val();
        if (menu_utama === "1") {
            $("#filter_sub_menu").show();
            $("#displaySubMenu").show();
            $("#displaySubMenu").css('display', 'box');
            $("#displayMenu").hide();
            $("#btambah_menu").hide();
            $("#btambah_submenu").show();
        } else {
            $("#filter_sub_menu").hide();
            $("#displaySubMenu").hide();
            $("#displayMenu").show();
            $("#btambah_menu").show();
            $("#btambah_submenu").hide();
        }

    });
    var subm = $("#daftarSubMenu").DataTable({
        "cache": false,
        "info": false,
        "lengthChange": false,
        "Processing": true,
        "ServerSide": true,
        "pageLength": 10,
        "ajax": "_daftar_menu/daftar_submenu_act.php",
        "dom": '<"top"if>rt<"bottom"p><"clear">', 
        "columnDefs": [
            {
                "targets": [1,5],
                "visible": false
            }
        ]
    });
    subm.columns(5).search($('#sub_menu').val()).draw();
    $("#sub_menu").change(function () {
        subm.columns(5).search($('#sub_menu').val()).draw();
    });
</script>