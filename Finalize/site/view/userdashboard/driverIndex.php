<?php
    session_start();
    // include_once '../../controller/retrieve_notification.php';
    include_once '../../model/notification_query.php';
    include_once '../../model/DBConnect.php';

    if (isset($_SESSION['user_id']) && isset($_SESSION['user_email'])) { 
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="assets/images/favicon.png">
    <title>Bus Ticket Booking System</title>
    <!-- Bootstrap Core CSS -->
    <link href="assets/node_modules/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="assets/node_modules/perfect-scrollbar/css/perfect-scrollbar.css" rel="stylesheet">
    <!-- This page CSS -->
    <!-- chartist CSS -->
    <link href="assets/node_modules/morrisjs/morris.css" rel="stylesheet">
    <!--c3 CSS -->
    <link href="assets/node_modules/c3-master/c3.min.css" rel="stylesheet">
    <!-- Custom CSS -->
    <link href="css/style.css" rel="stylesheet">
    <!-- Dashboard 1 Page CSS -->
    <link href="css/pages/dashboard1.css" rel="stylesheet">
    <!-- You can change the theme colors from here -->
    <link href="css/colors/default.css" id="theme" rel="stylesheet">
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
<![endif]-->
</head>

<body class="fix-header fix-sidebar card-no-border">
    <!-- ============================================================== -->
    <!-- Preloader - style you can find in spinners.css -->
    <!-- ============================================================== -->
    <div class="preloader">
        <div class="loader">
            <div class="loader__figure"></div>
            <p class="loader__label">VGU Online Bus Ticket Booking System</p>
        </div>
    </div>
    <!-- ============================================================== -->
    <!-- Main wrapper - style you can find in pages.scss -->
    <!-- ============================================================== -->
    <div id="main-wrapper">
        <!-- ============================================================== -->
        <!-- Topbar header - style you can find in pages.scss -->
        <!-- ============================================================== -->
        <header class="topbar">
            <nav class="navbar top-navbar navbar-expand-md navbar-light">
                <!-- ============================================================== -->
                <!-- Logo -->
                <!-- ============================================================== -->
                <div class="navbar-header">
                    <a class="navbar-brand" href="driverIndex.php?menu=mainpage">
                        <!-- Logo icon --><b>
                            <!--You can put here icon as well // <i class="wi wi-sunset"></i> //-->
                            <!-- Dark Logo icon -->
                            <img src="assets/images/vgulogo40px.png" alt="homepage" class="dark-logo" />
                            <!-- Light Logo icon -->
                            <img src="assets/images/vgulogo40px.png" alt="homepage" class="light-logo" />
                        </b>
                        <!--End Logo icon -->
                        <!-- Logo text --><span>
                         <!-- dark Logo text -->
                         <img src="assets/images/onlineBusTicketTextLogo.png" alt="homepage" class="dark-logo" />
                         <!-- Light Logo text -->    
                         <img src="assets/images/onlineBusTicketTextLogo.png" class="light-logo" alt="homepage" /></span> </a>
                </div>
                <!-- ============================================================== -->
                <!-- End Logo -->
                <!-- ============================================================== -->

                <div class="navbar-collapse">
                   <!-- ============================================================== -->
                    <!-- toggle and nav items -->
                    <!-- ============================================================== -->
                    <ul class="navbar-nav mr-auto">
                        <li class="nav-item"> <a class="nav-link nav-toggler hidden-md-up waves-effect waves-dark" href="javascript:void(0)"><i class="fa fa-bars"></i></a> </li>
                        <!-- ============================================================== -->
                        <!-- Search -->
                        <!-- ============================================================== -->
                        
                    </ul>
                    <!-- ============================================================== -->
                    <!-- User profile and search -->
                    <!-- ============================================================== -->
                    <ul class="navbar-nav my-lg-0">
                        <!-- ============================================================== -->
                        <!-- Profile -->
                        <!-- ============================================================== -->
                        <li class="nav-item dropdown u-pro">
                <a
                  class="
                    nav-link
                    dropdown-toggle
                    waves-effect waves-dark
                    profile-pic
                  "
                  href=""
                  data-toggle="dropdown"
                  aria-haspopup="true"
                  aria-expanded="false"
                  ><img
                    src="assets/images/users/profile-user.png"
                    alt="user"
                    class=""
                  />
                  <span class="hidden-md-down"
                    > <?php echo nl2br($_SESSION['user_first_name']) ?> &nbsp;<i class="fa fa-angle-down"></i
                  ></span>
                </a>
                <div class="dropdown-menu dropdown-menu-right animated flipInY">
                  <ul class="dropdown-user">
                    <li>
                      <div class="dw-user-box">
                        <div class="u-img">
                          <img src="assets/images/users/profile-user.png" alt="user" />
                        </div>
                        <div class="u-text">
                          <h4><?php echo nl2br($_SESSION['user_last_name'] . " " . $_SESSION['user_first_name']) ?></h4>
                          <p class="text-muted"><?php echo nl2br($_SESSION['user_email']) ?></p>
                          <a
                            href="driverIndex.php?menu=account"
                            class="btn btn-rounded btn-success btn-sm"
                            >View Profile</a
                          >
                        </div>
                      </div>
                    </li>
                    <li role="separator" class="divider"></li>
                    <li>
                      <a href="driverIndex.php?menu=account"><i class="ti-user"></i> My Account</a>
                    </li>
                    <li>
                      <a href="driverIndex.php?menu=contact"><i class="ti-email"></i> Contact</a>
                    </li>
                    <li role="separator" class="divider"></li>
                    <li>
                      <a href="../../controller/logout.php"><i class="fa fa-power-off"></i> Logout</a>
                    </li>
                  </ul>
                </div>
              </li>
                    </ul>

                </div>
            </nav>
        </header>
        <!-- ============================================================== -->
        <!-- End Topbar header -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- Left Sidebar - style you can find in sidebar.scss  -->
        <!-- ============================================================== -->
        <aside class="left-sidebar">
            <!-- Sidebar scroll-->
            <div class="scroll-sidebar">
                <!-- Sidebar navigation-->
               
                <nav class="sidebar-nav">
                    <ul id="sidebarnav">
                        <li> <a class="waves-effect waves-dark" href="driverIndex.php?menu=mainpage" aria-expanded="false"><i class="fa fa-home"></i><span class="hide-menu">Main page</span></a>
                        </li>                        
                        
                        <li>
                            <a class="has-arrow waves-effect waves-dark" href="#" aria-expanded="false">
                                <i class="fa fa-user"></i>
                                    <span class="hide-menu">Account</span>
                            </a>

                            <ul aria-expanded="false" class="collapse">
                                <li><a href="driverIndex.php?menu=account">Account information</a></li>
                                <li><a href="driverIndex.php?menu=account&action=change_password">Change password</a></li>
                            </ul>
                        </li>


                        <li> <a class="waves-effect waves-dark" href="driverIndex.php?menu=scantickets" aria-expanded="false"><i class="fa fa-qrcode"></i><span class="hide-menu">Scan tickets</span></a>
                        </li>
                        <li> <a class="waves-effect waves-dark" href="driverIndex.php?menu=notification" aria-expanded="false"><i class="fa fa-globe"></i><span class="hide-menu">Notification</span></a>
                        </li>
                        <li> <a class="waves-effect waves-dark" href="../../controller/logout.php" aria-expanded="false"><i class="fa fa-sign-out"></i><span class="hide-menu">Logout</span></a>
                        </li>
                    </ul>

                </nav>
             
                <!-- End Sidebar navigation -->
            </div>
            <!-- End Sidebar scroll-->
        </aside>
        <!-- ============================================================== -->
        <!-- End Left Sidebar - style you can find in sidebar.scss  -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- Page wrapper  -->
        <!-- ============================================================== -->
        <div class="page-wrapper">
            <!-- ============================================================== -->
            <!-- Container fluid  -->
            <!-- ============================================================== -->
            <div class="container-fluid">

                <!-- Enter the content of the main page here-->
                <!-- ============================================================== -->

                <?php 
				if (isset($_GET['menu']) && $_GET['menu'] === 'mainpage') { ?>
                <!-- ============================================================== -->
                <!-- Bread crumb and right sidebar toggle -->
                <!-- ============================================================== -->
                <div class="row page-titles">
                    <div class="col-md-5 align-self-center">
                        <h3 class="text-themecolor">Main Page</h3>
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
                            <li class="breadcrumb-item active">Main Page</li>
                        </ol>
                    </div>
                    
                </div>
                <!-- ============================================================== -->
                <!-- End Bread crumb and right sidebar toggle -->
                <!-- ============================================================== -->
                <!-- ============================================================== -->
                


                <!-- Enter the content of the main page here-->
                <!-- ============================================================== -->
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">
                                <h2 class="card-title">Welcome driver, <?php echo nl2br($_SESSION['user_last_name'] . " " . $_SESSION['user_first_name']); ?></h2>
                                <!-- <div class="up-img" style="background-image: url(assets/images/big/vgu_bus2.jpg);"></div> -->
                            </div>
                        </div>
                    </div>
                </div>
				<?php } 

                // Account Menu
                else if (isset($_GET['menu']) && $_GET['menu'] === 'account' && !isset($_GET['action'])) { ?>
                <!-- ============================================================== -->
                <!-- Bread crumb and right sidebar toggle -->
                <!-- ============================================================== -->
                <div class="row page-titles">
                    <div class="col-md-5 align-self-center">
                        <h3 class="text-themecolor">Account</h3>
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
                            <li class="breadcrumb-item active">Account</li>
                        </ol>
                    </div>
                    
                </div>
                <!-- ============================================================== -->
                <!-- End Bread crumb and right sidebar toggle -->
                <!-- ============================================================== -->
                <!-- ============================================================== -->
                
                 <div class="row">
                    <!-- Column -->

                    <!-- Column -->
                    <!-- Column -->
                    <div class="col-lg-8 col-xlg-9 col-md-7">
                        <div class="card">
                            <!-- Tab panes -->
                            <div class="card-body">
                                <form class="form-horizontal form-material">
                                    <div class="form-group">
                                        <label class="col-md-12">First Name</label>
                                        <div class="col-md-12">
                                            <output><?=$_SESSION['user_first_name']?></output>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-12">Last Name</label>
                                        <div class="col-md-12">
                                            <output><?=$_SESSION['user_last_name']?></output>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-12">ID</label>
                                        <div class="col-md-12">
                                            <output><?=$_SESSION['user_id']?></output>
                                        </div>
                                    </div>
                                    
                                    <div class="form-group">
                                        <label for="example-email" class="col-md-12">Email</label>
                                        <div class="col-md-12">
                                            <output><?=$_SESSION['user_email']?></output>
                                        </div>
                                    </div>
                                    
                                </form>
                            </div>
                        </div>
                    </div>
                    <!-- Column -->
                </div>

                <?php } else if (isset($_GET['menu']) && $_GET['menu'] === 'account' && isset($_GET['action']) && $_GET['action'] === 'change_password') { ?>
                 <!-- ============================================================== -->
                <!-- Bread crumb and right sidebar toggle -->
                <!-- ============================================================== -->
                <div class="row page-titles">
                    <div class="col-md-5 align-self-center">
                        <h3 class="text-themecolor">Change Password</h3>
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
                            <li class="breadcrumb-item active">Account</li>
                            <li class="breadcrumb-item active">Change Password</li>
                        </ol>
                    </div>
                </div>
                <!-- ============================================================== -->
                <!-- End Bread crumb and right sidebar toggle -->
                <!-- ============================================================== -->
                <!-- ============================================================== -->
                <!-- Start Page Content -->
                <!-- ============================================================== -->
                <div class="row">
                <div class="col-lg-8 col-xlg-9 col-md-7">
                        <div class="card">
                            <!-- Tab panes -->
                            <div class="card-body">
                                <form class="form-horizontal form-material" action="../../controller/driver_ChangePassword.php" method="POST">
                                    <div class="alert alert-warning" role="alert">
                                        A valid password must contains the following rules: <br>
                                            - has at least 6 characters. <br>
                                            - has both letters and numbers. <br>
                                    </div>

                                    <?php if (isset($_GET['error'])) { ?>
                                            <div class="alert alert-danger" role="danger"> <?php echo $_GET['error']; ?> </div>
                                    <?php } 
                                        if (isset($_GET['success'])) { ?> 
                                            <div class="alert alert-success" role="success"> <?php echo $_GET['success']; ?> </div>
                                    <?php } ?>

                                    <div class="form-group">
                                        <div class="col-md-12">
                                            <span class="form-label">Enter your old password: </span>
                                            <input type="password" class="form-control form-control-line" name="oldpassword">
                                        </div>
                                    </div>
                                    
                                    <div class="form-group">
                                        <div class="col-md-12">
                                            <span class="form-label">Enter your new password: </span>
                                            <input type="password" class="form-control form-control-line" name="newpassword">
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <div class="col-md-12">
                                            <span class="form-label">Enter your new password again: </span>
                                            <input type="password" class="form-control form-control-line" name="newpasswordagain">
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <div class="col-md-12">
                                            <span class="form-label">Confirm that you are not a robot:</span>
                                            <div class="g-recaptcha brochure__form__captcha" data-sitekey="6LdG0iMmAAAAAMc92UYnBUcVagNQQlaTIC3130BG"></div>
                                        </div>
                                    </div>

                                    

                                <div class="form-group">
                                    <div class="col-sm-12">
                                        <button class="btn btn-success" name="changepassword">Change password</button>
                                    </div>
                                </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- ============================================================== -->
                <!-- End Page Content -->
                <!-- ============================================================== -->

                <?php } else if (isset($_GET['menu']) && $_GET['menu'] === 'scantickets') { ?>
                 <!-- ============================================================== -->
                <!-- Bread crumb and right sidebar toggle -->
                <!-- ============================================================== -->
                <div class="row page-titles">
                    <div class="col-md-5 align-self-center">
                        <h3 class="text-themecolor">Scan Tickets</h3>
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
                            <li class="breadcrumb-item active">Scan Tickets</li>
                        </ol>
                    </div>
                
                </div>
                <!-- ============================================================== -->
                <!-- End Bread crumb and right sidebar toggle -->
                <!-- ============================================================== -->
                <!-- ============================================================== -->
                <!-- Start Page Content -->
                <!-- ============================================================== -->
                <div class="card">
                    <div class="card-body">
                        <div class="frame">
                            <script src="../../controller/qr-module/ht.js"></script>
                            <style>
                                .result{
                                    background-color: green;
                                    color:#fff;
                                    padding:20px;
                                }
                                .row{
                                    display:flex;
                                }
                            </style>
                            
                            <div class="row">
                                <div class="col">
                                    <div style="width:500px;" id="reader"></div>
                                </div>
                                <script src="../../controller/driver_QRcontroller.js"></script>

                                <div class="col" style="padding:30px;">
                                    <!-- <h4>Raw Info</h4> -->
                                    
                                    <form action=""><span type="text" name="start" class="input" id="result" onkeyup="showHint(this.value)" placeholder="" readonly="" ></span></form>
                                    <p><span id="txtHint"></span></p>
                                </div>
                            </div>
                            <script type="text/javascript">
                                var html5QrcodeScanner = new Html5QrcodeScanner("reader", { fps: 10, qrbox: 250 });
                                html5QrcodeScanner.render(onScanSuccess, onScanError); 
                            </script>
                        </div>
                    </div>
                </div>



                <?php } else if (isset($_GET['menu']) && $_GET['menu'] === 'notification') { ?>

                <div class="row page-titles">
                    <div class="col-md-5 align-self-center">
                        <h3 class="text-themecolor">Notification</h3>
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
                            <li class="breadcrumb-item active">Notification</li>
                        </ol>
                    </div>
                </div>
                <!-- ============================================================== -->
                <!-- End Bread crumb and right sidebar toggle -->
                <!-- ============================================================== -->
                <!-- ============================================================== -->
                
                <!-- Enter the content of the main page here-->
                <!-- ============================================================== -->
                <?php
                $_SESSION['notification'] = query_notification();

                foreach ($_SESSION['notification'] as $notification) : ?>
                    <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">
                                <h2 class="card-title"><?php echo $notification['title'] ?></h2>
                                <?php 
                                    echo nl2br($notification['date'] . "\n\n");
                                    echo nl2br($notification['content']); 
                                    ?>   
                            </div>
                        </div>
                    </div>
                </div>                     

                <?php endforeach; ?>

                <?php
                } else if (isset($_GET['menu']) && $_GET['menu'] === 'contact') {?>

                <div class="row page-titles">
                    <div class="col-md-5 align-self-center">
                        <h3 class="text-themecolor">Contact</h3>
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
                            <li class="breadcrumb-item active">Contact</li>
                        </ol>
                    </div>
                </div>
                
                <!-- Start Page Content -->
                <!-- ============================================================== -->

                <div class="row">
                    <!-- Column -->
                    <div class="col-lg-4">
                        <div class="card">
                            <div class="card-body">
                                <div class="d-flex m-b-30 no-block">
                                    <h5 class="card-title m-b-0 align-self-center">General Information</h5>
                                    <div class="ml-auto">

                                    </div>
                                </div>
                               
                                    <p>
                                        E-mail: <a href="mailto:info@vgu.edu.vn"><span style="color:#0000FF;">info@vgu.edu.vn</span></a> <br>
                                        Tel: +84 (0) 274 222 0990 <br>
                                        Fax: +84 (0) 274 222 0980 <br>
                                    </p>
                                        
                            </div>
                        </div>
                    </div>
                    <!-- Column -->
                    <div class="col-lg-4">
                        <div class="card">
                            <div class="card-body">
                                <div class="d-flex m-b-30 no-block">
                                    <h5 class="card-title m-b-0 align-self-center">Cơ Sở Bình Dương</h5>
                                    <div class="ml-auto">

                                    </div>
                                </div>
                                    <p>
                                       <a href="https://www.google.com/maps/place/PH%C3%92NG+TUY%E1%BB%82N+SINH+%C4%90H+VI%E1%BB%86T+%C4%90%E1%BB%A8C+VGU/@11.108994,106.6141613,437m/data=!3m1!1e3!4m6!3m5!1s0x3174cd60508ec045:0x859a536237a091f5!8m2!3d11.1096816!4d106.6152112!15sCilQSMOSTkcgVFVZ4buCTiBTSU5IIMSQSCBWSeG7hlQgxJDhu6hDIFZHVZIBCnVuaXZlcnNpdHngAQA?shorturl=1" target="_blank"><span style="color:#0000CD;">Đường Vành đai 4,&nbsp; Khu phố 4, Phường Thới Hòa, Tx. Bến Cát, Tỉnh Bình Dương</span></a>  <br>
                                        Tel. : (0274) 222 0990 <br>
                                        Fax : (0274) 222 0980 <br>
                                    </p>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-4">
                        <div class="card">
                            <div class="card-body">
                                <div class="d-flex m-b-30 no-block">
                                    <h5 class="card-title m-b-0 align-self-center">Văn phòng tại Tp. Hồ Chí Minh</h5>
                                    <div class="ml-auto">
                                        <!-- <select class="custom-select b-0">
                                            <option selected="">Today</option>
                                            <option value="1">Tomorrow</option>
                                        </select> -->
                                    </div>
                                </div>
                                <span style="color:#0000CD;">Tầng 5, 6, 7 Tòa nhà Halo, Số 10 Hoàng Diệu, Quận Phú Nhuận, Thành Phố Hồ Chí Minh, Việt Nam</span>
                            </div>
                        </div>
                    </div>
                </div>


                <?php } ?>





            <!-- ============================================================== -->
            <!-- End Container fluid  -->
            <!-- ============================================================== -->
            <!-- ============================================================== -->
            <!-- footer -->
            <!-- ============================================================== -->
            <footer class="footer"> © 2023 VGU Online Bus Ticket by Meme Group </footer>
            <!-- ============================================================== -->
            <!-- End footer -->
            <!-- ============================================================== -->
        </div>
        <!-- ============================================================== -->
        <!-- End Page wrapper  -->
        <!-- ============================================================== -->
    </div>
    <!-- ============================================================== -->
    <!-- End Wrapper -->
    <!-- ============================================================== -->
    <!-- ============================================================== -->
    <!-- All Jquery -->
    <!-- ============================================================== -->
    <script src="assets/node_modules/jquery/jquery.min.js"></script>
    <!-- Bootstrap popper Core JavaScript -->
    <script src="assets/node_modules/bootstrap/js/popper.min.js"></script>
    <script src="assets/node_modules/bootstrap/js/bootstrap.min.js"></script>
    <!-- slimscrollbar scrollbar JavaScript -->
    <script src="js/perfect-scrollbar.jquery.min.js"></script>
    <!--Wave Effects -->
    <script src="js/waves.js"></script>
    <!--Menu sidebar -->
    <script src="js/sidebarmenu.js"></script>
    <!--Custom JavaScript -->
    <script src="js/custom.min.js"></script>
    <!-- ============================================================== -->
    <!-- This page plugins -->
    <!-- ============================================================== -->
    <!--morris JavaScript -->
    <script src="assets/node_modules/raphael/raphael-min.js"></script>
    <script src="assets/node_modules/morrisjs/morris.min.js"></script>
    <!--c3 JavaScript -->
    <script src="assets/node_modules/d3/d3.min.js"></script>
    <script src="assets/node_modules/c3-master/c3.min.js"></script>
    <!-- Chart JS -->
    <script src="js/dashboard1.js"></script>

    <!-- Other scripts -->
    <script src="https://www.google.com/recaptcha/api.js"></script>

</body>

</html>

<?php 
} else {
    echo("<script>location.href = 'driverIndex.php';</script>");
}
 ?>