<?php

session_start();
include '../config/config.php';

$makanan = tampil('t_menu_makanan','menu_id,date,menu,year,month,week,close','menu_id is not null and active = 1 order by menu_id,close');

$k=1;
//$makanan[query];
if (($makanan[rowsnum] > 0 )) {
for ($i = 0; $i < $makanan[rowsnum]; $i++) {
    $week_prev = $week; 
    $menu_id = $makanan[$i][0];
    $tanggal = $makanan[$i][1];
    $menu = $makanan[$i][2];
    $year = $makanan[$i][3];
    $month = $makanan[$i][4];
    $week = $makanan[$i][5];;
    $status = $makanan[$i][6];
    
    $hadir = tampil ('t_kehadiran', 'count(hadir)', "menu_id = '$menu_id'");
    list($orang) = $hadir[0];
        
    $status = ($makanan[$i][6]==0)?"<span class='label label-success label-sm'> Open </span>":"<span class='label label-warning label-sm'> Close </span>";
    
    $button = '<div class="btn-group">
    <button type="button" class="btn btn-danger dropdown-toggle red-sunglo" data-toggle="dropdown" ><span class="caret"></span></button>
    <ul class="dropdown-menu" role="menu">';
    
        if ($makanan[$i][6]==0) {
        $button .= '<li><a href="_dashboard_admin/dashboard_update_menu.php?id=' . $makanan[$i][0] . '" data-toggle="modal" data-target="#modal_update_menu">Display / Update Menu</a></li>';
        $button .= '<li><a href="_dashboard_admin/dashboard_delete_menu.php?id=' . $makanan[$i][0] . '" data-toggle="modal" data-target="#modal_delete_menu">Hapus Menu</a></li>';
        } else {
        $button .= '<a href="#"></a>';
        }
        //$button .= '<li><a href="bid/bid_act.php?id=' . $makanan[$i][0] . '" data-toggle="modal" data-target="#bid">Penawaran</a></li>';
        //if ($_SESSION['suser_email'] != 'user') {
        //}
        $button .= '</ul></div>';
        
        $day = date('D', strtotime($tanggal));
        $day_ = hari($day) .', '. indo($tanggal);
    
    $menu_id = ($menu_id == '') ? '-' : $menu_id;
    $k = ($week != $week_prev)? 1:$k;
    $data[] = array(
        $k,
        $menu_id,
        $day_,
        $menu,
        $orang,
        $button,
        $week,
        $month,
        $year,
        $status
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
        '',
        '',
        '',
        '',
        ''
    );
}
$arr_data = array("data" => $data);
echo json_encode($arr_data);
?>