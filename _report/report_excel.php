<?php
session_start();
include '../config/config.php';
$_date = ($_GET['date']);
header("Content-type: application/vnd-ms-excel");
header("Content-Disposition: attachment; filename=List-Pesanan-Makan-Malam-$_date.xls");


$day   = date('D', strtotime($_date));
$day_  = hari($day) .', '. indo($_date);

$report = tampil('t_pesan a', 'pesan_id,(select nama from p_user where email = a.email) nama,nama_makanan,notes', "active = 1 and date = '$_date' order by pesan_id");
?>
<table  border="1">
    <h2><b>List Pemesan Makan Malam</b></h2>
    <h4><b><?= $day_ ?></b></h4>
    <h1 style="color: white">&nbsp</h1>
    <thead>
        <tr>
            <th style="background: darkred;color: white">No</th>
            <th style="background: darkred;color: white">Nama Pemesan</th>
            <th style="background: darkred;color: white">Pesanan</th>
            <th style="background: darkred;color: white">Notes</th>
        </tr>
    </thead>
    <tbody>
        <?php
        for($i=0;$i<$report[rowsnum];$i++){
            ?>
        <tr>
            <td style="vertical-align: middle"><center><?=$i+1?></center></td>
            <td style="vertical-align: middle"><?=$report[$i][1]?></td>
            <td style="vertical-align: middle"><?=$report[$i][2]?></td>
            <td style="vertical-align: middle"><?=$report[$i][3]?></td>
        </tr>
        <?php
        }
        ?>
    </tbody>
</table>
