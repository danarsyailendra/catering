<?php

include '../config/config.php';

$sql = update('t_pesan', 'close=1', "date = '".date('Y-m-d')."' and active = 1");
//$row = tampil("t_pesan", "email", "date = '". date('Y-m-d')."' and active = 1");
echo '<pre>';
print_r($row);
echo '</pre>';