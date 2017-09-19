<?php

session_start();
if (!function_exists('tampil')) {
    include '../config/config.php';
}

$_date = ($_GET['_date'])?$_GET['_date'] : date('Y-m-d');

$makanan = tampil('t_pesan a', 'pesan_id,(select nama from p_user where email = a.email) nama,nama_makanan,notes,date', "active = 1 order by pesan_id");

$k=1;
//$makanan[query];
if (($makanan[rowsnum] > 0 )) {
for ($i = 0; $i < $makanan[rowsnum]; $i++) {
    $date_prev    = $date; 
    $pesan_id     = $makanan[$i][0];
    $nama         = $makanan[$i][1];
    $nama_makanan = $makanan[$i][2];
    $notes        = $makanan[$i][3];
    $date         = $makanan[$i][4];
    
        $day = date('D', strtotime($tanggal));
        $day_ = hari($day) .', '. indo($tanggal);
    
    $pesan_id = ($pesan_id == '') ? '-' : $pesan_id;
    $k = ($date != $date_prev)? 1:$k;
    $data[] = array(
        $k,
        $pesan_id,
        $nama,
        $nama_makanan,
        $notes,
        $date
    );
    $k++;
} 
} else {
    $data[] = array(
        '',
        'Data Not Found',
        '',
        '',
        '',
        ''
    );
}
$arr_data = array("data" => $data);
echo json_encode($arr_data);
?>