<?php
$gd = getdate();
?>
<div class="page-content">
    <!-- BEGIN PAGE HEAD-->
    <div class="page-head">
        <!-- BEGIN PAGE TITLE -->
        <div class="page-title">
            <h1>Dashboard User
            </h1>
        </div>
        <div class="col-md-2">
            <?php
            $bulan = tampil("p_bulan", "*", "bulan_id is not null");
            ?>
            <select class="form-control" id="_bulan" onchange="call('_dashboard_user/dashboard_user_act.php?_bulan=' + this.options[this.selectedIndex].value + '&_year=' + document.getElementById('_year').options[document.getElementById('_year').selectedIndex].value+'&_week='+document.getElementById('_week').options[document.getElementById('_week').selectedIndex].value)">
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
            <select class="form-control" id="_year" onchange="call('_dashboard_user/dashboard_user_act.php?_year=' + this.options[this.selectedIndex].value + '&_bulan=' + document.getElementById('_bulan').options[document.getElementById('_bulan').selectedIndex].value+'&_week='+document.getElementById('_week').options[document.getElementById('_week').selectedIndex].value)">
                <?php
                $max_year = $gd['year'];
                for ($i = 2017; $i <= $max_year; $i++) {
                    $selected = ($i == $gd['year']) ? "selected" : "";
                    $thn = ($i == $gd['year']) ? $i : "";
                    ?>
                    <option value="<?= $i ?>"<?= $selected ?>><?= $i ?></option>
                    <?php
                }
                ?>
            </select>
        </div>
        <div class="col-md-2">
            <select class="form-control" id="_week" onchange="call('_dashboard_user/dashboard_user_act.php?_week=' + this.options[this.selectedIndex].value + '&_bulan=' + document.getElementById('_bulan').options[document.getElementById('_bulan').selectedIndex].value+'&_year='+document.getElementById('_year').options[document.getElementById('_year').selectedIndex].value)">
                <?php
                for ($i = 1; $i <= 5; $i++) {
                    $minggu = getMinggu(date('d-m-Y'));
                    $selected = ($i == $minggu) ? "selected" : "";
                    ?>
                    <option value="<?= $i ?>"<?= $selected ?>>Minggu ke : <?= $i ?></option>
                    <?php
                }
                ?>
            </select>
        </div>
        <!-- END PAGE TITLE -->
        <!-- BEGIN PAGE TOOLBAR -->

        <!-- END PAGE TOOLBAR -->

    </div>
    <div class="page-body">
         <div id="calendar" class="has-toolbar"> </div>
    </div>
    <!--
    <div class="page-body" id="list">
        <?php
       // include '_dashboard_user/dashboard_user_act.php'
        ?>
    </div>
    <!-- END PAGE HEAD            
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

</script>-->