<?php

session_start();
include '../config/config.php';

$makanan = tampil("p_submenu_malam", "submakanan_id,submakanan_name,active,parent_id", "submakanan_id is not null order by parent_id,submakanan_id");
$k = 1;
for ($i = 0; $i < $makanan[rowsnum]; $i++) {
    $submakanan_id = $makanan[$i][0];
    $submakanan_name = $makanan[$i][1];
    $active = ($makanan[$i][2] == 1) ? "<span class='label label-success label-sm'> Active </span>" : "<span class='label label-warning label-sm'> Non-Active </span>";
    $parent = $makanan[$i][3];
    $button = '<div class="btn-group">
    <button type="button" class="btn btn-danger dropdown-toggle red-sunglo" data-toggle="dropdown" ><span class="caret"></span></button>
    <ul class="dropdown-menu" role="menu">';
    $button .= '<li><a href="_daftar_menu/daftar_update_submenu.php?id=' . $makanan[$i][0] . '" data-toggle="modal" data-target="#modal_update_daftar_submenu">Display / Update Menu</a></li>';
    $button .= '</ul></div>';
    if ($parent == $prev_parent) {
        $k++;
    } else {
        $k = 1;
    }
    $prev_parent = $parent;
    $data[] = array(
        $k,
        $submakanan_id,
        $submakanan_name,
        $button,
        $active,
        $parent
    );
}
$arr_data = array("data" => $data);
echo json_encode($arr_data);
