<?php
    // session_start();

    include_once '../../model/notification_query.php';
    include_once '../../model/DBConnect.php';
    include_once '../../model/admin_model.php';
    include_once '../../controller/admin_controller.php';

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
                    <a class="navbar-brand" href="adminIndex.php?menu=mainpage">
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
                            href="adminIndex.php?menu=account"
                            class="btn btn-rounded btn-success btn-sm"
                            >View Profile</a
                          >
                        </div>
                      </div>
                    </li>
                    <li role="separator" class="divider"></li>
                    <li>
                      <a href="adminIndex.php?menu=datalist&tag=bus"><i class="ti-wallet"></i> Bus data list</a>
                    </li>
                    <li>
                      <a href="adminIndex.php?menu=datalist&tag=ticket"><i class="ti-wallet"></i> Ticket data list</a>
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
                <nav class="sidebar-nav" action="redirect.php" method="POST">
                    <ul id="sidebarnav">
                        <li> <a class="waves-effect waves-dark" href="adminIndex.php?menu=mainpage" aria-expanded="false"><i class="fa fa-home"></i><span class="hide-menu">Main page</span></a>
                        </li>

                        <li>
                            <a class="has-arrow waves-effect waves-dark" href="#" aria-expanded="false">
                                <i class="fa fa-user"></i>
                                    <span class="hide-menu">Account</span>
                            </a>

                            <ul aria-expanded="false" class="collapse">
                                <li><a href="adminIndex.php?menu=account">Account information</a></li>
                                <li><a href="adminIndex.php?menu=account&action=change_password">Change password</a></li>
                            </ul>
                        </li>

                        <li>
                            <a class="has-arrow waves-effect waves-dark" href="#" aria-expanded="false">
                                <i class="fa fa-table"></i>
                                    <span class="hide-menu">Data list</span>
                            </a>
                            <ul aria-expanded="false" class="collapse">
                                <li><a href="adminIndex.php?menu=datalist&tag=bus">Bus</a></li>
                                <li><a href="adminIndex.php?menu=datalist&tag=ticket">Ticket</a></li>
                            </ul>
                        </li>

                        <li>
                            <a class="has-arrow waves-effect waves-dark" href="#" aria-expanded="false">
                                <i class="fa fa-cogs"></i>
                                    <span class="hide-menu">Modifications</span>
                            </a>
                            <ul aria-expanded="false" class="collapse">
                                <li><a href="adminIndex.php?menu=modifications&action=addaticket">Add a ticket</a></li>
                                <li><a href="adminIndex.php?menu=modifications&action=changeticketprice">Change ticket price</a></li>
                                <!-- <li><a href="adminIndex.php?menu=modifications&tag=changeroute">Change route</a></li> -->
                                <li><a href="adminIndex.php?menu=modifications&action=sendnotification">Send notification</a></li>
                            </ul>
                        </li>
                        

                        <li> <a class="waves-effect waves-dark" href="adminIndex.php?menu=notification" aria-expanded="false"><i class="fa fa-globe"></i><span class="hide-menu">Notification</span></a>
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
                <!-- Page Content-->
                <!-- ============================================================== -->
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">
                                <h2 class="card-title">Welcome admin, <?php echo nl2br($_SESSION['user_last_name'] . " " . $_SESSION['user_first_name']); ?></h2>
                                <div class="up-img" style="background-image: url(assets/images/big/adminbuilding.jpg);"></div>
                            </div>
                        </div>
                    </div>
                </div>
				<!-- ============================================================== -->
                <!-- End Page Content-->
                <!-- ============================================================== -->



                <?php } else if (isset($_GET['menu']) && $_GET['menu'] === 'account' && !isset($_GET['action'])) { ?>
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
                <!-- Page Content-->
                <!-- ============================================================== -->
                <div class="row">
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
                <!-- ============================================================== -->
                <!-- End Page Content-->
                <!-- ============================================================== -->



                <?php } else if (isset($_GET['menu']) && $_GET['menu'] === 'account' && isset($_GET['action']) && $_GET['action'] === 'change_password') { ?>


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
                                <form class="form-horizontal form-material" action="../../controller/admin_ChangePassword.php" method="POST">
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




                    
                <?php } else if (isset($_GET['menu']) && $_GET['menu'] === 'datalist' && isset($_GET['tag']) && $_GET['tag'] === 'bus') { ?>
                <!-- ============================================================== -->
                <!-- Bread crumb and right sidebar toggle -->
                <!-- ============================================================== -->
                <div class="row page-titles">
                    <div class="col-md-5 align-self-center">
                        <h3 class="text-themecolor">Bus</h3>
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
                            <li class="breadcrumb-item active">Data list</li>
                            <li class="breadcrumb-item active">Bus</li>
                        </ol>
                    </div>
                
                </div>
                <!-- ============================================================== -->
                <!-- End Bread crumb and right sidebar toggle -->
                <!-- ============================================================== -->
                <!-- ============================================================== -->
                <!-- Page Content -->
                <!-- ============================================================== -->
                
                <?php
                    $db = new DBConnect();
                    $conn = $db->connect();
                
                    $_SESSION['bus'] = get_bus_data($conn);
                ?>

                <div class="row">
                    <!-- Column -->
                    <div class="col-lg-8">
                        <div class="card">
                            <div class="card-body">
                                <div class="d-flex no-block">
                                    <div>
                                        <h5 class="card-title m-b-0">Bus data list</h5>
                                    </div>
                                    <div class="ml-auto">
                                        <ul class="list-inline text-center font-12">
                                            <li><i class="fa fa-circle text-success"></i> Sorted by Bus ID</li>
                                            <!-- <li><i class="fa fa-circle text-info"></i> SITE B</li>
                                            <li><i class="fa fa-circle text-primary"></i> SITE C</li> -->
                                        </ul>
                                    </div>
                                </div>
                                <div class="table-responsive">

                                    <table class="table">
                                        <thead>
                                            <tr>
                                                <th>No.</th>
                                                <th>Bus ID</th>
                                                <th>Number of seats</th>
                                            </tr>
                                        </thead>
                                        <tbody>

                                        <form method="POST">
                                        <?php 
                                        $_SESSION['bus_index'] = 1;
                                        foreach ($_SESSION['bus'] as $bus) { ?>
                                            
                                            <tr>
                                                    <td> <?php echo $_SESSION['bus_index']; ?> </div> </td>
                                                    <td> <?php echo $bus['bus_id']; ?> </td>
                                                    <td> <?php echo $bus['seat_num']; ?> </td>
                                            </tr>
                                            
                                        <?php
                                        $_SESSION['bus_index']++; 
                                        } ?>

                                        </form>

                                        </tbody>
                                    </table>

                                </div>
                            </div>
                        </div>
                    </div>


                <!-- Data list ticket -->
                <?php } else if (isset($_GET['menu']) && $_GET['menu'] === 'datalist' && isset($_GET['tag']) && $_GET['tag'] === 'ticket') { ?>
                <!-- ============================================================== -->
                <!-- Bread crumb and right sidebar toggle -->
                <!-- ============================================================== -->
                <div class="row page-titles">
                    <div class="col-md-5 align-self-center">
                        <h3 class="text-themecolor">Ticket</h3>
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
                            <li class="breadcrumb-item active">Data list</li>
                            <li class="breadcrumb-item active">Ticket</li>
                        </ol>
                    </div>
                
                </div>
                <!-- ============================================================== -->
                <!-- End Bread crumb and right sidebar toggle -->
                <!-- ============================================================== -->
                <!-- ============================================================== -->
                <!-- Page Content -->
                <!-- ============================================================== -->
                
                <?php
                    $db = new DBConnect();
                    $conn = $db->connect();
                
                    $ticket = get_ticket_data($conn);
                ?>

                <div class="row">
                    <!-- Column -->
                    <div class="col-lg-8">
                        <div class="card">
                            <div class="card-body">
                                <div class="d-flex no-block">
                                    <div>
                                        <h5 class="card-title m-b-0">Ticket data list</h5>
                                    </div>
                                    <div class="ml-auto">
                                        <ul class="list-inline text-center font-12">
                                            <li><i class="fa fa-circle text-info"></i> Show at most 75 tickets</li>
                                            <li><i class="fa fa-circle text-success"></i> Sorted by date (newest > oldest)</li> 
                                        </ul>
                                    </div>
                                </div>
                                <div class="table-responsive">

                                    <table class="table">
                                        <thead>
                                            <tr>
                                                <th>No.</th>
                                                <th>Ticket ID</th>
                                                <th>Route</th>
                                                <th>Date</th>
                                                <th>Price</th>
                                            </tr>
                                        </thead>
                                        <tbody>

                                        <form method="POST">
                                        <?php 
                                        $ticket_index = 1;
                                        foreach ($ticket as $each_ticket) { ?>
                                            
                                            <tr>
                                                    <td> <?php echo $ticket_index; ?> </div> </td>
                                                    <td> <?php echo $each_ticket['ticket_id']; ?> </td>
                                                    <td> <?php echo $each_ticket['route']; ?> </td>
                                                    <td> <?php echo $each_ticket['time']; ?> </td>
                                                    <td> <?php echo number_format($each_ticket['price'], 2, ',', ' ') . " VND"; ?> </td>
                                            </tr>
                                            
                                        <?php
                                        $ticket_index++; 
                                        } ?>

                                        </form>

                                        </tbody>
                                    </table>

                                </div>
                            </div>
                        </div>
                    </div>


                <?php } else if (isset($_GET['menu']) && $_GET['menu'] === 'modifications' && isset($_GET['action']) && $_GET['action'] === 'addaticket') { ?>
                 <!-- ============================================================== -->
                <!-- Bread crumb and right sidebar toggle -->
                <!-- ============================================================== -->
                <div class="row page-titles">
                    <div class="col-md-5 align-self-center">
                        <h3 class="text-themecolor">Add A Ticket</h3>
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
                            <li class="breadcrumb-item active">Modifications</li>
                            <li class="breadcrumb-item active">Add a ticket</li>
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
                                <form class="form-horizontal form-material" action="../../controller/admin_controller.php" method="POST">

                                <?php if (isset($_GET['error'])) { ?>
                                            <div class="alert alert-danger" role="danger"> <?php echo $_GET['error']; ?> </div>
                                    <?php } 
                                        if (isset($_GET['success'])) { ?> 
                                            <div class="alert alert-success" role="success"> <?php echo $_GET['success']; ?> </div>
                                    <?php } ?>

                                <div class="form-group">
                                    <span class="form-label">Enter Date</span>
                                    <input class="form-control" type="date" placeholder="dd-mm-yyyy" name="enter_date" required>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-12">Enter Route</label>
                                    <div class="col-sm-12">
                                        <select class="form-control form-control-line" name="enter_route">
                                            <option>VGU Campus → Turtle Lake</option>
                                            <option>Turtle Lake → VGU Campus</option>
                                        </select>
                                    </div>
                                </div>
                                    <div class="form-group">
                                        <div class="col-md-12">
                                            <span class="form-label">Enter price: </span>
                                            <input type="text" class="form-control form-control-line" name="enter_price">
                                        </div>
                                    </div>
                                <div class="form-group">
                                    <div class="col-sm-12">
                                        <button class="btn btn-success" name="add_this_ticket">Add this ticket</button>
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


               <?php } else if (isset($_GET['menu']) && $_GET['menu'] === 'modifications' && isset($_GET['action']) && $_GET['action'] === 'changeticketprice') { ?>
                 <!-- ============================================================== -->
                <!-- Bread crumb and right sidebar toggle -->
                <!-- ============================================================== -->
                <div class="row page-titles">
                    <div class="col-md-5 align-self-center">
                        <h3 class="text-themecolor">Change Ticket Price</h3>
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
                            <li class="breadcrumb-item active">Modifications</li>
                            <li class="breadcrumb-item active">Change Ticket Price</li>
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
                                <form class="form-horizontal form-material" action="../../controller/admin_controller.php" method="POST">

                                <?php if (isset($_GET['error'])) { ?>
                                            <div class="alert alert-danger" role="danger"> <?php echo $_GET['error']; ?> </div>
                                    <?php } 
                                        if (isset($_GET['success'])) { ?> 
                                            <div class="alert alert-success" role="success"> <?php echo $_GET['success']; ?> </div>
                                    <?php } ?>

                                <div class="form-group">
                                    <span class="form-label">Select Date</span>
                                    <input class="form-control" type="date" placeholder="dd-mm-yyyy" name="select_date_ticket_price" required>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-12">Select Route</label>
                                    <div class="col-sm-12">
                                        <select class="form-control form-control-line" name="select_route_ticket_price">
                                            <option>VGU Campus → Turtle Lake</option>
                                            <option>Turtle Lake → VGU Campus</option>
                                        </select>
                                    </div>
                                </div>
                                    <div class="form-group">
                                        <div class="col-md-12">
                                            <span class="form-label">New price: </span>
                                            <input type="text" class="form-control form-control-line" name="change_ticket_price">
                                        </div>
                                    </div>
                                <div class="form-group">
                                    <div class="col-sm-12">
                                        <button class="btn btn-success" name="Change_price">Change price</button>
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



                <?php } else if (isset($_GET['menu']) && $_GET['menu'] === 'modifications' && isset($_GET['action']) && $_GET['action'] === 'sendnotification') { ?>
                <!-- ============================================================== -->
                <!-- Bread crumb and right sidebar toggle -->
                <!-- ============================================================== -->
                <div class="row page-titles">
                    <div class="col-md-5 align-self-center">
                        <h3 class="text-themecolor">Send Notification</h3>
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
                            <li class="breadcrumb-item active">Modifications</li>
                            <li class="breadcrumb-item active">Send Notification</li>
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
                                <form class="form-horizontal form-material" action="../../controller/admin_controller.php" method="POST">

                                    <?php if (isset($_GET['success'])) { ?>
						                <div class="alert alert-success" role="alert">
							                <?=$_GET['success']?>
						                </div>
					                <?php } ?>

                                    <?php if (isset($_GET['error'])) { ?>
						                <div class="alert alert-error" role="alert">
							                <?=$_GET['error']?>
						                </div>
					                <?php } ?>

                                <div class="form-group">
                                    <span class="form-label">Select Date</span>
                                    <input class="form-control" type="date" placeholder="dd-mm-yyyy" name="select_date_notification" required>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="col-md-12">
                                        <span class="form-label">Title: </span>
                                        <input type="text" class="form-control form-control-line" name="title_notification">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-12">Content: </label>
                                    <div class="col-md-12">
                                        <textarea rows="10" class="form-control form-control-line" name="content_notification"></textarea>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="col-sm-12">
                                        <button class="btn btn-success" name="send_notification">Send</button>
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

                <!-- ============================================================== -->
                <!-- End Page Content -->
                <!-- ============================================================== -->

                <?php
                } ?>
               
                
              
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
    echo("<script>location.href = 'adminIndex.php';</script>");
}
 ?>