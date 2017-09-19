<div class="container-fluid">
    <div class="panel panel-default">
        <div class="panel-body">
            <div class="row">
                <h2 style="margin: 10px;display: inline-block">Report</h2>
                <span class="pull-right" style="float: right; margin-right: 10px; margin-top: 15px">
                    <a href="_report/report_excel.php" target="_blank" class="btn red btn-outline sbold">Export to Excel</a>
                </span>
            </div>
            <br>
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <input readonly type="text" class="form-control date-picker" class="day_filter date-picker" id="date" value="<?= date('Y/m/d') ?>" data-date-format="yyyy-mm-dd" name="tanggal_menu" onchange="call('_pesan_makan_malam/pesan_makan_malam_act.php?_date='+this.value)">
                    </div>
                </div>
            </div>
            <table id="reportMenu" class="table table-bordered table-striped dataTable" style="overflow: auto">
                <thead>
                    <tr>
                        <th width="5%">No</th>
                        <th width="25%">Nama Pemesan</th>
                        <th width="20%">Pesanan</th>
                        <th width="20%">Notes</th>
                    </tr>
                </thead>
            </table>
        </div>
    </div>
</div>
