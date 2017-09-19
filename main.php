<style>
    .page-header.navbar.header-metra{
        background: #E26A6A;
        border-color: #E26A6A;
    }
    .page-header.navbar .top-menu .navbar-nav>li.dropdown .dropdown-toggle:hover{
        background-color: #E26A6A;
    }
    .page-header.navbar .page-top.header-metra{
        background: #E26A6A;
        border-color: #E26A6A;
    }
    .page-sidebar .page-sidebar-menu>li.active>a, .page-sidebar-closed.page-sidebar-fixed .page-sidebar:hover .page-sidebar-menu>li.active>a{
        border-left: 3px solid #E26A6A!important;
    }
    /*menu utama saat active*/
    .page-sidebar .page-sidebar-menu>li.active.open>a, 
    .page-sidebar .page-sidebar-menu>li.active>a, 
    .page-sidebar-closed.page-sidebar-fixed 
    .page-sidebar:hover .page-sidebar-menu>li.active.open>a, 
    .page-sidebar-closed.page-sidebar-fixed .page-sidebar:hover 
    .page-sidebar-menu>li.active>a{
        color: #E26A6A
    }
    .page-sidebar .page-sidebar-menu>li.active.open>a>i, 
    .page-sidebar .page-sidebar-menu>li.active>a>i, 
    .page-sidebar-closed.page-sidebar-fixed 
    .page-sidebar:hover .page-sidebar-menu>li.active.open>a>i, 
    .page-sidebar-closed.page-sidebar-fixed .page-sidebar:hover 
    .page-sidebar-menu>li.active>a>i{
        color: #E26A6A
    }
    /*paging*/
    .pagination>.disabled>a, .pagination>.disabled>a:focus, 
    .pagination>.disabled>a:hover, .pagination>.disabled>span, 
    .pagination>.disabled>span:focus, .pagination>.disabled>span:hover{
        height: 33px
    }
    .page-sidebar .page-sidebar-menu .sub-menu>li.active>a, 
    .page-sidebar .page-sidebar-menu .sub-menu>li.open>a, 
    .page-sidebar .page-sidebar-menu .sub-menu>li:hover>a, 
    .page-sidebar-closed.page-sidebar-fixed .page-sidebar:hover 
    .page-sidebar-menu .sub-menu>li.active>a, 
    .page-sidebar-closed.page-sidebar-fixed .page-sidebar:hover 
    .page-sidebar-menu .sub-menu>li.open>a, .page-sidebar-closed.page-sidebar-fixed 
    .page-sidebar:hover .page-sidebar-menu .sub-menu>li:hover>a{
        color: #E26A6A
    }
    .page-sidebar .page-sidebar-menu .sub-menu>li.active>a>i, 
    .page-sidebar .page-sidebar-menu .sub-menu>li.open>a>i, 
    .page-sidebar .page-sidebar-menu .sub-menu>li:hover>a>i, 
    .page-sidebar-closed.page-sidebar-fixed .page-sidebar:hover 
    .page-sidebar-menu .sub-menu>li.active>a>i, 
    .page-sidebar-closed.page-sidebar-fixed .page-sidebar:hover 
    .page-sidebar-menu .sub-menu>li.open>a>i, 
    .page-sidebar-closed.page-sidebar-fixed .page-sidebar:hover 
    .page-sidebar-menu .sub-menu>li:hover>a>i{
        color: #E26A6A
    }
    .page-sidebar .page-sidebar-menu>li.open>a, 
    .page-sidebar .page-sidebar-menu>li:hover>a, 
    .page-sidebar-closed.page-sidebar-fixed .page-sidebar:hover 
    .page-sidebar-menu>li.open>a, .page-sidebar-closed.page-sidebar-fixed 
    .page-sidebar:hover .page-sidebar-menu>li:hover>a{
        color: #E26A6A
    }
</style>
<!-- BEGIN HEADER -->
<div class="page-header navbar navbar-fixed-top header-metra">
    <!-- BEGIN HEADER INNER -->
    <div class="page-header-inner ">
        <!-- BEGIN LOGO -->
        <div class="page-logo">
            <a href="index.php">
                <img src="assets/img/def.png" alt="logo" class="logo-default" style="margin:10px 10px 0;max-width: 100%"/> </a>
            <div class="menu-toggler sidebar-toggler">
                <!-- DOC: Remove the above "hide" to enable the sidebar toggler button on header -->
            </div>
        </div>
        <!-- END LOGO -->
        <!-- BEGIN RESPONSIVE MENU TOGGLER -->
        <a href="javascript:;" class="menu-toggler responsive-toggler" data-toggle="collapse" data-target=".navbar-collapse"> </a>
        <!-- END RESPONSIVE MENU TOGGLER -->
        <!-- BEGIN PAGE ACTIONS -->
        <div class="page-actions">
            <!--div class="btn-group">
                <button type="button" class="btn default btn-sm white dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-close-others="true">
                    <span class="hidden-sm hidden-xs"><?= $_SESSION['suser_email'] ?>&nbsp;</span>
                    <i class="fa fa-angle-down"></i>
                </button>
                <ul class="dropdown-menu" role="menu">
                    <li>
                        <a href="logout.php">
                            <i class="icon-login"></i> Logout </a>
                    </li>
                </ul>
            </div-->
            <span class="btn default btn-sm white"><?= $_SESSION['suser_email'] ?></span>
            <a href="logout.php" class="btn default btn-sm white">Logout</a>
        </div>
        <div class="page-top" style="background: #F3F5F9">
            
        </div>
        <!-- END PAGE ACTIONS -->
        <!-- BEGIN PAGE TOP -->
        <!--   <div class="page-top header-metra">
        <!-- BEGIN HEADER SEARCH BOX 
        <!-- DOC: Apply "search-form-expanded" right after the "search-form" class to have half expanded search box 
        <!-- END HEADER SEARCH BOX 
        <!-- BEGIN TOP NAVIGATION MENU 
        <div class="top-menu">

            <ul class="nav navbar-nav pull-right">
        <!-- END TODO DROPDOWN -->
        <!-- BEGIN USER LOGIN DROPDOWN -->
        <!-- DOC: Apply "dropdown-dark" class after below "dropdown-extended" to change the dropdown styte 
        <li class="dropdown dropdown-user">
            <a class="dropdown-toggle" href="logout.php">
                <span class="username username-hide-on-mobile"></span>
        <!-- DOC: Do not remove below empty space(&nbsp;) as its purposely used 
        <i class="icon-login"></i></a>
</li>
        <!-- END USER LOGIN DROPDOWN -->
        <!-- BEGIN QUICK SIDEBAR TOGGLER 
        <li class="dropdown quick-sidebar-toggler">

        </li>
        <!-- END QUICK SIDEBAR TOGGLER 
    </ul>
</div>
        <!-- END TOP NAVIGATION MENU 
    </div>
        <!-- END PAGE TOP -->
    </div>
    <!-- END HEADER INNER -->
</div>
<!-- END HEADER -->
<!-- BEGIN HEADER & CONTENT DIVIDER -->
<div class="clearfix"> </div>
<!-- END HEADER & CONTENT DIVIDER -->
<!-- BEGIN CONTAINER -->
<div class="page-container">
    <!-- BEGIN SIDEBAR -->
    <div class="page-sidebar-wrapper">
        <!-- BEGIN SIDEBAR -->
        <!-- DOC: Set data-auto-scroll="false" to disable the sidebar from auto scrolling/focusing -->
        <!-- DOC: Change data-auto-speed="200" to adjust the sub menu slide up/down speed -->
        <div class="page-sidebar navbar-collapse collapse">
            <!-- BEGIN SIDEBAR MENU -->
            <!-- DOC: Apply "page-sidebar-menu-light" class right after "page-sidebar-menu" to enable light sidebar menu style(without borders) -->
            <!-- DOC: Apply "page-sidebar-menu-hover-submenu" class right after "page-sidebar-menu" to enable hoverable(hover vs accordion) sub menu mode -->
            <!-- DOC: Apply "page-sidebar-menu-closed" class right after "page-sidebar-menu" to collapse("page-sidebar-closed" class must be applied to the body element) the sidebar sub menu mode -->
            <!-- DOC: Set data-auto-scroll="false" to disable the sidebar from auto scrolling/focusing -->
            <!-- DOC: Set data-keep-expand="true" to keep the submenues expanded -->
            <!-- DOC: Set data-auto-speed="200" to adjust the sub menu slide up/down speed -->
            <ul class="page-sidebar-menu   " data-keep-expanded="false" data-auto-scroll="true" data-slide-speed="200">
                <?php
              /*  if ($_SESSION['suser_role'] == 'admin') {
                    $_GET['page'] = (empty($_GET['page'])) ? 1 : $_GET['page'];
                } else {
                    $_GET['page'] = (empty($_GET['page'])) ? 2 : $_GET['page'];
                }*/
                $_GET['page'] = (empty($_GET['page']) ?0: $_GET['page']);
                //cek menu yang boleh diakses berdasarkan role user
                $menu = tampil("p_role", "id_menu", "role_id = '" . $_SESSION['suser_role'] . "'");
                list($daftar_menu) = $menu[0];
                $arr_menu = explode(",", $daftar_menu);
                for ($i = 0; $i < count($arr_menu); $i++) {
                    $list_menu = tampil("p_menu", "nama_menu,link,icon,child,parent_id", "id_menu = $arr_menu[$i] and active = 1");
                    list($nama_menu, $link, $icon,$child,$parent) = $list_menu[0];
                    if($child == 1){
                        $qparent = tampil("p_menu", "parent_id", "id_menu =". $_GET['page']);
                        list($parent_id) = $qparent[0];
                        $active = ($parent_id == $arr_menu[$i]) ? "active open" : "";
                        $arrow = ($parent_id == $arr_menu[$i]) ? "open" : "";
                        ?>
                        <li class="nav-item start <?=$active?>">
                            <a href="javascript:;" class="nav-link">
                                <i class="<?= $icon ?>"></i>
                                <span class="title"><?= $nama_menu ?></span>
                                <span class="arrow <?=$arrow?>"></span>
                            </a>
                            <ul class="sub-menu">
                                <?php
                                $sub_menu = tampil("p_menu", "id_menu,nama_menu,link,icon", "parent_id = $arr_menu[$i] and id_menu in ($daftar_menu) and active = 1");
                                for($j = 0;$j<$sub_menu[rowsnum];$j++){
                                    $sub_active = ($_GET['page'] == $sub_menu[$j][0]) ? "active open":"";
                                    ?>
                                    <li class="nav-item start <?=$sub_active?>">
                                        <a href="?page=<?=$sub_menu[$j][0]?>">
                                            <i class="<?=$sub_menu[$j][3]?>"></i>
                                            <span class="titile"><?=$sub_menu[$j][1]?></span>
                                        </a>
                                    </li>
                                    <?php
                                }
                                ?>
                            </ul>
                        </li>
                        <?php
                    }
                   /* $active = ($_GET['page'] == $arr_menu[$i]) ? "active open" : "";
                    ?>
                    <li class="nav-item start <?= $active ?>">
                        <a href="?page=<?= $arr_menu[$i] ?>" class="nav-link">
                            <i class="<?= $icon ?>"></i>
                            <span class="title"><?= $nama_menu ?></span>
                        </a>
                    </li>
                    <?php
                    if($child == 1 and empty($parent)){
                        ?>
                        <ul class="sub-menu">
                            
                        </ul>
                        <?php
                    }*/
                }
                ?>


            </ul>
            <!-- END SIDEBAR MENU -->
        </div>
        <!-- END SIDEBAR -->
    </div>
    <!-- END SIDEBAR -->
    <!-- BEGIN CONTENT -->
    <div class="page-content-wrapper">
        <!-- BEGIN CONTENT BODY -->
        <?php
        $id_menu = $_GET['page'];
        $cek_link = tampil("p_menu", "link", "id_menu = $id_menu and active = 1");
        list($link) = $cek_link[0];
        //echo $link;
        if($id_menu != ""){
            include $link;
        }else{
            ?>
        <div style="max-height: 100%">
            <br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
        </div>
        <?php
        }
        ?>
        <!-- END CONTENT BODY -->
    </div>
    <!-- END CONTENT -->
    <!-- BEGIN QUICK SIDEBAR -->
    <!-- END QUICK SIDEBAR -->
</div>
<!-- END CONTAINER -->
<!-- BEGIN FOOTER -->
<div class="page-footer">
    <div class="page-footer-inner"> 
        2017 &copy; Telkom Metra All Right Reserved | Best Viewed in Google Chrome
    </div>
    <div class="scroll-to-top">
        <i class="icon-arrow-up"></i>
    </div>
</div>

<script>
    $(document).ready(function () {
        //data table dashboard admin
        var table = $('#tambahMenu').DataTable({
            "cache": false,
            "info": false,
            "lengthChange": false,
            "Processing": true,
            "ServerSide": true,
            "ajax": "_dashboard_admin/dashboard_admin_act.php",
            "pageLength": 10,
            "dom": '<"top"if>rt<"bottom"p><"clear">',
            "columnDefs": [
                {
                    "targets": [6,7,8],
                    "visible": false
                }
            ],
            "order": [
                [0,"asc"]
            ]
        });
        
        //data table daftar menu admin
        $('#daftarMenu').DataTable({
            "cache": false,
            "info": false,
            "lengthChange": false,
            "Processing": true,
            "ServerSide": true,
            "ajax": "_daftar_menu/daftar_menu_act.php",
            "pageLength": 10,
            "dom": '<"top"if>rt<"bottom"p><"clear">',
            "columnDefs": [
                {
                    "targets": [1],
                    "visible": false
                }
            ],
            "order": [
                [0,"asc"]
            ]
        });
        //data table report
       var report = $('#makanMalam').DataTable({
            "cache": false,
            "info": false,
            "lengthChange": false,
            "Processing": true,
            "ServerSide": true,
            "ajax": "_pesan_makan_malam_admin/pesan_makan_malam_admin_act.php",
            "pageLength": 10,
            "dom": '<"top"if>rt<"bottom"p><"clear">',
            "columnDefs": [
                {
                    "targets": [1,5],
                    "visible": false
                }
            ],
            "order": [
                [0,"asc"]
            ]
        });
        //untuk filter report
        report.column(5).search(document.getElementById('date').value).draw();
        //setelah diubah
        $('#date').on('change',function(){
            report.column(5).search(document.getElementById('date').value).draw();
        });
        //untuk filter dashboard admin
        //sebelum filter diubah
        table.columns(6).search(document.getElementById('minggu').value).draw(); 
        table.columns(7).search(document.getElementById('bulan').value).draw(); 
        table.columns(8).search(document.getElementById('tahun').value).draw();
        //sesudah filter diubah
        $('#minggu').on('change', function(){
           table.columns(6).search(this.value).draw(); 
           table.columns(8).search(document.getElementById('tahun').value).draw();
           table.columns(7).search(document.getElementById('bulan').value).draw(); 
        });
        $('#bulan').on('change', function(){
           table.columns(7).search(this.value).draw(); 
           table.columns(8).search(document.getElementById('tahun').value).draw();
           table.columns(6).search(document.getElementById('minggu').value).draw(); 
        });
        $('#tahun').on('change', function(){
           table.columns(7).search(document.getElementById('bulan').value).draw(); 
           table.columns(8).search(this.value).draw(); 
           table.columns(6).search(document.getElementById('minggu').value).draw(); 
        });
    });
</script>

<!--
<script>
    $(document).ready(function () {
        

    });
</script>
-->