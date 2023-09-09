<?php
// include_once '../model/auth_query.php';
include_once '../model/notification_query.php';
include_once '../model/driver_model.php';
include_once '../model/student_model.php';
include_once '../model/admin_model.php';
include_once '../model/DBConnect.php';

$db = new DBConnect();
$conn = $db->connect();

if (isset($_POST['login'])) {
    $id = $_POST['user'];
    $password = $_POST['pass'];

    if (empty($id)) {
        header("Location: login.php?error=User ID is required");
        // echo("<script>location.href = 'login.php?error=Student ID is required';</script>");
    } else if (empty($password)) {
        header("Location: login.php?error=Password is required");
        // echo("<script>location.href = 'login.php?error=Password is required';</script>");
    } else if (substr($id, 0, 6) === "driver") {
        // echo("<script>location.href = 'index.php?error=Driver is registered';</script>");

        // $stmt = $conn->prepare("SELECT * FROM driver WHERE driver_id=?");
        // $stmt->execute([$id]);
        $stmt = driver_auth_query($id, $conn);

        if($stmt->rowCount() === 1) {
            $user = $stmt->fetch();

            $user_id            = $user['driver_id'];
            $user_first_name    = $user['first_name'];
            $user_last_name     = $user['last_name'];
            $user_email         = $user['email'];
            $user_password      = $user['password'];

            if ($id === $user_id) {
                // authentication for the user identification
                if (password_verify($password, $user_password)) {
                    $_SESSION['user_id']            = $user_id;
                    $_SESSION['user_first_name']    = $user_first_name;
                    $_SESSION['user_last_name']     = $user_last_name;
					$_SESSION['user_email']         = $user_email;
                    $_SESSION['user_password']      = $user_password;
                    $_SESSION['user_type']          = "driver";

                    // retrieve data for the notification
                    // $_SESSION['notification'] = retrieve_notification($conn);

                    //echo("<script>location.href = '../view/userdashboard/driverIndex.php?menu=mainpage';</script>");
                    header("Location: ../view/userdashboard/driverIndex.php?menu=mainpage");


                } else {
                    //echo("<script>location.href = 'login.php?error=Incorrect User ID or Password';</script>");
                    header("Location: ../view/login.php?error=Incorrect User ID or Password");
                }
            } else {
                //echo("<script>location.href = 'login.php?error=Incorrect User ID or Password';</script>");
                header("Location: ../view/login.php?error=Incorrect User ID or Password");
            }

        } else {
            header("Location: ../view/login.php?error=Incorrect User ID or Password");
        }
    } else if (substr($id, 0, 5) === "admin") {
        // echo("<script>location.href = 'index.php?error=Admin is registered';</script>");

        $stmt = admin_auth_query($id, $conn);

        if($stmt->rowCount() === 1) {
            $user = $stmt->fetch();

            $user_id            = $user['admin_id'];
            $user_first_name    = $user['first_name'];
            $user_last_name     = $user['last_name'];
            $user_email         = $user['email'];
            $user_password      = $user['password'];

            if ($id === $user_id) {
                // authentication for the user identification
                if (password_verify($password, $user_password)) {
                    $_SESSION['user_id']            = $user_id;
                    $_SESSION['user_first_name']    = $user_first_name;
                    $_SESSION['user_last_name']     = $user_last_name;
					$_SESSION['user_email']         = $user_email;
                    $_SESSION['user_password']      = $user_password;
                    $_SESSION['user_type']          = "admin";

                    header("Location: ../view/userdashboard/adminIndex.php?menu=mainpage");

                    // retrieve data for the notification
                    // $stmt_notification = $conn->prepare("SELECT * FROM notification ORDER BY date DESC LIMIT 10");
                    // $stmt_notification->execute();
                    // $notification = $stmt_notification->fetchAll(PDO::FETCH_ASSOC);
                    // $_SESSION['notification'] = $notification;

                } else {
                    header("Location: ../view/login.php?error=Incorrect User ID or Password");
                }
            } else {
                header("Location: ../view/login.php?error=Incorrect User ID or Password");
            }
        } else {
            header("Location: ../view/login.php?error=Incorrect User ID or Password");
        }
    } else {
        // student
        $stmt = student_auth_query($id, $conn);

        if($stmt->rowCount() === 1) {
            $user = $stmt->fetch();

            $user_id            = $user['student_id'];
            $user_first_name    = $user['first_name'];
            $user_last_name     = $user['last_name'];
            $user_email         = $user['email'];
            $user_password      = $user['password'];
            $user_intake        = $user['intake'];
            $user_phone_number  = $user['phone_number'];
            

            if ($id === $user_id) {
                // authentication for the user identification
                if (password_verify($password, $user_password)) {
                    // init SESSION var
                    $_SESSION['user_id']            = $user_id;
                    $_SESSION['user_first_name']    = $user_first_name;
                    $_SESSION['user_last_name']     = $user_last_name;
					$_SESSION['user_email']         = $user_email;
                    $_SESSION['user_intake']        = $user_intake;
                    $_SESSION['user_phone_number']  = $user_phone_number;
                    $_SESSION['user_password']      = $user_password;
                    $_SESSION['user_type']          = "student";

                    $private_secret_key = "f12345";                         // key used for encode 
                    $_SESSION['private_secret_key'] = $private_secret_key;

                    $_SESSION['momo_partnerCode']   = "MOMOBKUN20180529";
                    settype($_SESSION['ticket_id'], "integer");
                    settype($_SESSION['bus_id'], "integer");

                    header("Location: ../view/userdashboard/index.php?menu=mainpage");

                } else {
                    header("Location: ../view/login.php?error=Incorrect User ID or Password");
                }
            } else {
                header("Location: ../view/login.php?error=Incorrect User ID or Password");
            }

        } else {
            header("Location: ../view/login.php?error=Incorrect User ID or Password");
        }
    }


}