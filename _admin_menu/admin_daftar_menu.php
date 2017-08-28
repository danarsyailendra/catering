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
                      <!--  <span class="pull-right" style="float: right">
                            <div class="col-md-6">
                                <a href="#" data-target="" data-toggle="modal" class="btn red btn-outline sbold"><i class="fa fa-mail-forward"></i> Send Menu</a>
                            </div>
                        </span>-->
                        <span class="pull-right" style="float: right">
                            <div class="col-md-6">
                                <a href="_admin_menu/admin_tambah_menu.php" data-target="#modal_tambah_daftar_menu" data-toggle="modal" class="btn red btn-outline sbold"><i class="fa fa-plus"></i> Tambah Menu</a>
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
                        <div style="display: box;white-space: nowrap;overflow-x: auto;height: 500px">
                            <table class="table table-striped table-bordered table-hover table-checkable order-column" id="daftarMenu">
                                <thead>
                                    <tr>
                                        <th width="5%">No</th>
                                        <th width="10%">Makanan ID</th>
                                        <th width="10%">Makanan</th>
                                        <th width="10%">Act</th>
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