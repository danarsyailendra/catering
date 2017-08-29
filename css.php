<link href="http://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700&subset=all" rel="stylesheet" type="text/css" />
<link href="assets/global/plugins/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
<link href="assets/global/plugins/simple-line-icons/simple-line-icons.min.css" rel="stylesheet" type="text/css" />
<link href="assets/global/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
<link href="assets/global/plugins/bootstrap-switch/css/bootstrap-switch.min.css" rel="stylesheet" type="text/css" />
<!-- END GLOBAL MANDATORY STYLES -->
<!-- BEGIN PAGE LEVEL PLUGINS -->
<link href="assets/global/plugins/select2/css/select2.min.css" rel="stylesheet" type="text/css" />
<link href="assets/global/plugins/select2/css/select2-bootstrap.min.css" rel="stylesheet" type="text/css" />
<link href="assets/global/css/components-md.min.css" rel="stylesheet" id="style_components" type="text/css" />
<link href="assets/global/css/plugins-md.min.css" rel="stylesheet" type="text/css" />
<link href="assets/global/plugins/bootstrap-daterangepicker/daterangepicker.min.css" rel="stylesheet" type="text/css" />
<link href="assets/global/plugins/bootstrap-datepicker/css/bootstrap-datepicker3.min.css" rel="stylesheet" type="text/css" />
<link href="assets/global/plugins/bootstrap-timepicker/css/bootstrap-timepicker.min.css" rel="stylesheet" type="text/css" />
<link href="assets/global/plugins/bootstrap-datetimepicker/css/bootstrap-datetimepicker.min.css" rel="stylesheet" type="text/css" />
<link href="assets/global/plugins/clockface/css/clockface.css" rel="stylesheet" type="text/css" />
<link href="assets/global/plugins/datatables/datatables.min.css" rel="stylesheet" type="text/css" />
<link href="assets/global/plugins/datatables/plugins/bootstrap/datatables.bootstrap.css" rel="stylesheet" type="text/css" />

<!-- END PAGE LEVEL PLUGINS -->
<!-- BEGIN THEME GLOBAL STYLES -->
<link href="assets/global/css/components-md.min.css" rel="stylesheet" id="style_components" type="text/css" />
<link href="assets/global/css/plugins-md.min.css" rel="stylesheet" type="text/css" />
<!-- END THEME GLOBAL STYLES -->
<!-- LOGIN STYLE -->
<link href="assets/pages/css/login.min.css" rel="stylesheet" type="text/css" />
<!-- END LOGIN STYLE -->
<!-- MAIN STYLE -->
<link href="assets/layouts/layout4/css/layout.min.css" rel="stylesheet" type="text/css" />
<link href="assets/layouts/layout4/css/themes/default.min.css" rel="stylesheet" type="text/css" id="style_color" />
<link href="assets/layouts/layout4/css/custom.min.css" rel="stylesheet" type="text/css" />
<!-- END MAIN STYLE -->
<link rel="shortcut icon" href="favicon.ico" />
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
        height: 30px
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
    .page-sidebar .page-sidebar-menu>li.open>a>i, 
    .page-sidebar .page-sidebar-menu>li:hover>a>i, 
    .page-sidebar-closed.page-sidebar-fixed .page-sidebar:hover 
    .page-sidebar-menu>li.open>a>i, .page-sidebar-closed.page-sidebar-fixed 
    .page-sidebar:hover .page-sidebar-menu>li:hover>a>i{
        color: #E26A6A
    }
</style>