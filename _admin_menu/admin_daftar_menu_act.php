<?php

session_start();
include '../config/config.php';

$makanan = tampil('p_menu_malam','makanan_id,nama_makanan,active','makanan_id is not null and disp = 1 order by makanan_id');

//$makanan[query];
if (($makanan[rowsnum] > 0 )) {
for ($i = 0; $i < $makanan[rowsnum]; $i++) {
    $makanan_id   = $makanan[$i][0];
    $nama_makanan = $makanan[$i][1];
    //$tanggal    = $makanan[$i][2];
    $status       = $makanan[$i][2];
    
    $status = ($makanan[$i][2]==1)?"<span class='label label-success label-sm'> Active </span>":"<span class='label label-warning label-sm'> Non-Active </span>";
    
    $button = '<div class="btn-group">
    <button type="button" class="btn btn-danger dropdown-toggle red-sunglo" data-toggle="dropdown" ><span class="caret"></span></button>
    <ul class="dropdown-menu" role="menu">';

        //if ($makanan[$i][6] == 0) {
            $button .= '<li><a href="_admin_menu/admin_update_menu.php?id=' . $makanan[$i][0] . '" data-toggle="modal" data-target="#modal_update_daftar_menu">Display / Update Menu</a></li>';
            $button .= '<li><a href="_admin_menu/admin_delete_menu.php?id=' . $makanan[$i][0] . '" data-toggle="modal" data-target="#modal_delete_daftar_menu">Hapus Menu</a></li>';
        //} else {
            //$button .= '<a href="#"></a>';
        //}
        //$button .= '<li><a href="bid/bid_act.php?id=' . $makanan[$i][0] . '" data-toggle="modal" data-target="#bid">Penawaran</a></li>';
        //if ($_SESSION['suser_email'] != 'user') {
        //}
        $button .= '</ul></div>';
    
    $makanan_id = ($makanan_id == '') ? '-' : $makanan_id;
    $data[]     = array(
        $i + 1,
        $makanan_id,
        $nama_makanan,
        //$tanggal,
        $button,
        $status
        
    );
} 
} else {
    $data[] = array(
        '',
        '',
        'Data Not Found',
        '',
        ''
    );
}
$arr_data = array("data" => $data);
echo json_encode($arr_data);
?>