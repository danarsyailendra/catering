<?php
session_start();
include '../config/config.php';
if (isset($_POST['submit'])) {

    $makanan_id = $_POST['makanan_id'];
    $user = $_SESSION['suser_email'];
    $nama_makanan = $_POST['nama_makanan'];
    $notes = $_POST['notes'];
    $date = $_POST['date'];
    $nama_sub = $_POST['nama_submakanan'];
    
    if(isset($nama_sub)){
        $look = tampil("p_submenu_malam,p_menu_malam", "nama_makanan,submakanan_name", "submakanan_id=$nama_sub and makanan_id=$nama_makanan");
        $nama_makanan = $look[0][0].' - '.$look[0][1];
    }else{
        $look = tampil("p_menu_malam", "nama_makanan", "makanan_id=$nama_makanan");
        $nama_makanan = $look[0][0];
    }
        
    $cek = tampil('t_pesan', 'date', "date = '$date' and email = '" . $_SESSION['suser_name'] . "' and active = 1");
    $cek[query];
    if ($cek[rowsnum] > 0) {
        echo "<script type='text/javascript'>";
        echo "alert('Pesanan hari ini sudah ada!');";
        echo "location.href='../?page=22';";
        echo "</script>";
    } else {
        $insert = insert("t_pesan", "email,nama_makanan,notes,date", "'$user','$nama_makanan','$notes','$date'");
        if ($insert[status] == true) {
            echo "<script type='text/javascript'>";
            echo "alert('Menu berhasil diinput');";
            echo "location.href='../?page=22';";
            echo "</script>";
        }
    }
} else {

    // include '../css.php';
    ?>
    <form method="POST" action="_pesan_makan_malam/pesan_tambah_menu.php">
        <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
            <h4 class="modal-title">Tambah Pesanan</h4>
        </div>
        <div class="modal-body">
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label class="control-label">Menu</label>
                        <!--<input id="tags" class="form-control" >-->
                        <select name="nama_makanan" id="nama_makanan" class="form-control">
                            <option value="">Pilih Menu</option>
                            <?php
                            $pilih = tampil("p_menu_malam", "nama_makanan,makanan_id", "active = 1 and disp = 1");
                            if (($pilih[rowsnum] > 0)) {
                                for ($i = 0; $i < $pilih[rowsnum]; $i++) {
                                    $pilih_ = $pilih[$i][0];
                                    ?>
                            <option value="<?=$pilih[$i][1]?>"><?php echo $pilih_ ?></option>
                                <?php
                                }
                            }
                            ?>
                        </select>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label class="control-label">Tanggal</label>
                        <input type="text" name="date" class="form-control" value="<?= $_GET['date'] ?>" readonly="">
                    </div>
                </div>
            </div>
            <div class="row" id="sub">
                
            </div>
            <div class="row">
                <div class="col-md-8">
                    <div class="form-group">
                        <label class="control-label">Notes</label>
                        <textarea class="form-control" name="notes"></textarea>
                    </div>
                </div>
                <!-- <div class="col-md-4">
                     <div class="form-group">
                         <input type="checkbox" name="active" value="1">
                     </div>
                 </div>-->
            </div>
        </div>
        <div class="modal-footer">
            <input type="submit" class="btn red-sunglo" name="submit" value="Simpan">
        </div>
    </form>
    <?php
    // include '../js.php';
}
?>
<script>
    $("#nama_makanan").change(function(){
       var id_makanan = $("#nama_makanan").val();
       $.ajax({
          type:"POST",
          dataType:"html",
          url:"_pesan_makan_malam/pesan_tambah_submenu.php",
          data:"id="+id_makanan,
          success:function(msg){
              $("#sub").html(msg);
          }
       });
    });
</script>