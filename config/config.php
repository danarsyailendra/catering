<?php

$con = mysqli_connect("10.15.16.31", "catering", "metra456", "catering");
//$con = mysqli_connect("36.67.130.18", "catering", "metra456", "catering");
// Check connection
if (mysqli_connect_errno()) {
    echo "Failed to connect to MySQL: " . mysqli_connect_error();
}

function tampil($nama_tabel, $field, $parameter) {
    global $con;
    $where = ($parameter == "") ? "" : " where " . $parameter;
    $query = "select " . $field . " from " . $nama_tabel . $where;
    if ($sql = mysqli_query($con, $query)) {
        // echo $sql;
        $hitung = mysqli_num_rows($sql);
        $post = array();
        while ($row = mysqli_fetch_row($sql)) {
            $post[] = $row;
        }
        $post[rowsnum] = $hitung;
        $post[query] = $query;
        return $post;
    } else {
        echo $post[msg] = 'Error: <i>' . $query . '</i> ' . mysqli_error($con);
    }
}

function insert($nama_tabel, $field, $value) {
    global $con;
    $query = "insert into " . $nama_tabel . " (" . $field . ") values (" . $value . ")";
    $post = array();
    if (mysqli_query($con, $query)) {
        $post[status] = true;
    } else {
        $post[status] = false;
        echo $post[msg] = 'Error: <i>' . $query . '</i> ' . mysqli_error($con);
    }
    $post[query] = $query;
    return $post;
}

function update($nama_tabel, $field, $parameter) {
    global $con;
    $query = "update $nama_tabel set $field where $parameter";
    $post = array();
    if (mysqli_query($con, $query)) {
        $post[status] = true;
    } else {
        $post[status] = false;
        echo $post[msg] = 'Error: <i>' . $query . '</i> ' . mysqli_error($con);
    }
    $post[query] = $query;
    return $post;
}

function delete($nama_tabel, $parameter) {
    global $con;
    $query = "delete from $nama_tabel where $parameter";
    $post = array();
    if (mysqli_query($con, $query)) {
        $post[status] = true;
    } else {
        $post[status] = false;
        echo $post[msg] = 'Error: <i>' . $query . '</i> ' . mysqli_error($con);
    }
    $post[query] = $query;
    return $post;
}

function indo($date) {
    $BulanIndo = array("Januari", "Februari", "Maret", "April", "Mei", "Juni", "Juli", "Agustus", "September", "Oktober", "November", "Desember");

    /* $tahun = substr($date, 0, 4);
      $bulan = substr($date, 3, 2);
      $tgl   = substr($date, 5, 2); */

    $date2 = explode('-', $date);
    $tahun = $date2[0];
    $bulan = $date2[1];
    $tgl = $date2[2];
    $result = $tgl . " " . $BulanIndo[(int) $bulan - 1] . " " . $tahun;
    return($result);
}

function generatePassword($length = 8) {
    $chars = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789';
    $count = mb_strlen($chars);

    for ($i = 0, $result = ''; $i < $length; $i++) {
        $index = rand(0, $count - 1);
        $result .= mb_substr($chars, $index, 1);
    }

    return $result;
}

function hari($hari) {
    switch ($hari) {
        case 'Sun' :
            $day = 'Minggu';
            break;
        case 'Mon':
            $day = 'Senin';
            break;
        case 'Tue':
            $day = 'Selasa';
            break;
        case 'Wed':
            $day = 'Rabu';
            break;
        case 'Thu':
            $day = 'Kamis';
            break;
        case 'Fri':
            $day = "Jum'at";
            break;
        case 'Sat':
            $day = 'Sabtu';
            break;
    }
    return $day;
}

function getMinggu($date) {
    // pisah berdasarkan strip
    list($y, $m, $d) = explode('-', date('Y-m-d', strtotime($date)));

    // minggu sekarang, minimal 1
    $w = 1;

    // loop hari dari tanggal awal sampai yang diinputkan
    for ($i = 1; $i <= $d; ++$i) {
        // jika hari itu Minggu dan tidak di awal bulan
        if ($i > 1 && date('w', strtotime("$y-$m-$i")) == 0) {
            // increment jumlah minggu
            ++$w;
        }
    }

    
    return $w;
}

function getJumlahMingu($year, $month) {
    $sql_jml_hari = tampil("p_bulan", "jumlah_hari", "bulan_id = $month");
    list($jml_hari) = $sql_jml_hari[0];
    
    $date = $year."-".$month."-".$jml_hari;
    list($y, $m, $d) = explode('-', date('Y-m-d', strtotime($date)));

    // minggu sekarang, minimal 1
    $w = 1;

    // loop hari dari tanggal awal sampai yang diinputkan
    for ($i = 1; $i <= $d; ++$i) {
        // jika hari itu Minggu dan tidak di awal bulan
        if ($i > 1 && date('w', strtotime("$y-$m-$i")) == 0) {
            // increment jumlah minggu
            ++$w;
        }
    }

    
    return $w;
}
