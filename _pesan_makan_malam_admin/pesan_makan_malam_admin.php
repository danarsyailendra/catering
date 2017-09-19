<style>
    .dt-head-left {text-align: left;}
</style>
<div class="page-content">
    <!-- BEGIN PAGE HEAD-->
    <div class="page-head">
        <!-- BEGIN PAGE TITLE -->
        <div class="page-title">
            <h1>List Makan Malam
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
                    <span class="caption-subject bold uppercase"> Daftar Pemesan</span>
                </div>
            </div>
            <div class="portlet-body">
                <div class="table-toolbar">
                    <div class="row">
                        <form action="_report/report_excel.php" method="get">
                            <div class="col-md-2">
                                <div class="form-group">
                                    <input readonly type="text" class="form-control date-picker" name="date" class="day_filter date-picker" id="date" value="<?= date('Y-m-d') ?>" data-date-format="yyyy-mm-dd" name="tanggal_menu">
                                </div>
                            </div>
                                      <!--  <span class="pull-right" style="float: right">
                                            <div class="col-md-6">
                                                <a href="#" data-target="" data-toggle="modal" class="btn red btn-outline sbold"><i class="fa fa-mail-forward"></i> Send Menu</a>
                                            </div>
                                        </span>-->
                            <span class="pull-right" style="float: right">
                                <div class="col-md-6">
                                    <input type="submit" target="_blank" class="btn red btn-outline sbold" value="Export List Pemesan">
<!--<a href="_report/report_excel.php" target="_blank" class="btn red btn-outline sbold"><i class="fa fa-file"></i> Export List Pemesan</a>-->
                                </div>
                            </span>        
                        </form>


                        <div id="modal_report_menu" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
                            <div class="modal-dialog" id="report_menu">
                                <div class="modal-content">

                                </div>
                                <!— /.modal-content —>
                            </div>
                            <!— /.modal-dialog —>
                        </div>
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
                            <table class="table table-striped table-bordered table-hover table-checkable order-column" id="makanMalam">
                                <thead>
                                    <tr>
                                        <th width="5%">No</th>
                                        <th width="15%">ID Pemesan</th>
                                        <th width="15%">Nama Pemesan</th>
                                        <th width="20%">Pesanan</th>
                                        <th width="30%">Note</th>
                                        <th width="15%">Tanggal</th>
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
     //data table report
       var report = $('#makanMalam').DataTable({
            "cache": false,
            "info": false,
            "lengthChange": false,
            "Processing": true,
            "ServerSide": true,
            "ajax": "_pesan_makan_malam_admin/pesan_makan_malam_admin_act.php",
            "pageLength": 10,
            "dom": '<"top"if>rt<"bottom"p><"clear">',
            "columnDefs": [
                {
                    "targets": [1,5],
                    "visible": false
                }
            ],
            "order": [
                [0,"asc"]
            ]
        });
        //untuk filter report
        report.column(5).search(document.getElementById('date').value).draw();
        //setelah diubah
        $('#date').on('change',function(){
            report.column(5).search(document.getElementById('date').value).draw();
        });
    </script>