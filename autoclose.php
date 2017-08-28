<?php
include 'config/config.php';

$tanggal_now = date('d-m-Y');
//cek yang belum close
$tampil = tampil("t_menu_makanan", "menu_id,date", "close = 0 and active = 1");
for($i=0;$i<$tampil[rowsnum];$i++){
    $menu_id = $tampil[$i][0];
    $date = $tampil[$i][1];
    $selisih = ((strtotime ($tanggal_now) - strtotime ($date))/(60*60*24));
    //echo $selisih.'<br>';
   //$tgl_kurang = date('d-m-Y', strtotime('-2 days', strtotime($date)));
    if($selisih >= -2){
        $close = update("t_menu_makanan", "close = 1", "menu_id = '$menu_id'");
    }
   // echo $date.' - '.$tgl_kurang.'<br>';
}
?>