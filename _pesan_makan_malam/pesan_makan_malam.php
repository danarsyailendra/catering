<?php
$gd = getdate();
?>
<div class="page-content">
    <!-- BEGIN PAGE HEAD-->
    <div class="page-head"
        <!-- BEGIN PAGE TITLE -->
        <div class="page-title">
            <h1>Daftar Pesanan</h1>
        </div>
        <br>
        <br>
        <div class="row">
            <div class="col-md-1">
                <div class="form-group">
                    <h5>Tanggal</h5>
                </div>
            </div>
            <div class="col-md-2">
                <div class="form-group">
                    <input readonly type="text" class="form-control date-picker" class="day_filter date-picker" data-date-start-date="+0d" id="date" value="<?= date('Y/m/d') ?>" data-date-format="yyyy-mm-dd" name="tanggal_menu" onchange="call('_pesan_makan_malam/pesan_makan_malam_act.php?_date='+this.value)">
                </div>
            </div>
        </div>
        <!-- END PAGE TITLE -->
        <!-- BEGIN PAGE TOOLBAR -->

        <!-- END PAGE TOOLBAR -->

    </div>
    <div class="page-body" id="list">
        <?php
        include '_pesan_makan_malam/pesan_makan_malam_act.php'
        ?>
    </div>
    <!-- END PAGE HEAD-->            
</div>
<script>
    function callAjax(url, pageElement, callMessage, errorMessage) {
        document.getElementById(pageElement).innerHTML = callMessage;
        try {
            req = new XMLHttpRequest(); /* e.g. Firefox */
        } catch (e) {
            try {
                req = new ActiveXObject("Msxml2.XMLHTTP");  /* some versions IE */
            } catch (e) {
                try {
                    req = new ActiveXObject("Microsoft.XMLHTTP");  /* some versions IE */
                } catch (E) {
                    req = false;
                }
            }
        }
        req.onreadystatechange = function () {
            responseAjax(pageElement, errorMessage);
        };
        req.open("GET", url, true);
        req.send(null);
    }
    function responseAjax(pageElement, errorMessage) {
        var output = '';
        if (req.readyState == 4) {
            if (req.status == 200) {
                output = req.responseText;
                document.getElementById(pageElement).innerHTML = output;
            } else {
                document.getElementById(pageElement).innerHTML = errorMessage + "\n" + output;
            }
        }
    }
    function call(tab) {
        callAjax(tab, 'list', '', 'Error');
    }

</script>