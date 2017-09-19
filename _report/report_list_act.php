<?php

session_start();
include '../config/config.php';

$report = tampil('t_pesan', 'pesan_id,user_email,nama_makanan,notes', "active = 1 order by pesan_id");
//$report[query];
for ($i = 0; $i < $report[rowsnum]; $i++) {
    $pesan_id     = $report[$i][0];
    $user_email   = $report[$i][1];
    $nama_makanan = $report[$i][2];
    $notes        = $report[$i][3];

    //$harga_bid   = ($harga_bid == '') ? '-' : 'Rp. '.number_format($harga_bid);
    //$pemenang    = ($pemenang == '') ? '-' : $pemenang;
    //$id_bid      = ($id_bid == '') ? '-' : $id_bid;
    $pesan_id = ($pesan_id == '') ? '-' : $pesan_id;
    $data[] = array(
        $i + 1,
        $pesan_id,
        $user_email,
        $nama_makanan,
        $notes
    );
}
$arr_data = array("data" => $data);
echo json_encode($arr_data);
?>