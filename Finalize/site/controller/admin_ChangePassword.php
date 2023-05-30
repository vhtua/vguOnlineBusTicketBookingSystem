<?php
    session_start();

    include_once '../model/reCaptcha.php';
    include_once '../model/admin_model.php';
    include_once '../model/DBConnect.php';
    
    $db = new DBConnect();
    $conn = $db->connect();

    $recaptcha = $_POST['g-recaptcha-response'];
    $captcha_res = reCaptcha($recaptcha);

    // echo $_SESSION['user_password'];

    if ($captcha_res['success']) {
        if (isset($_POST['oldpassword']) && isset($_POST['newpassword']) && isset($_POST['newpasswordagain'])) {
        
            if (empty($_POST['oldpassword']) || !password_verify($_POST['oldpassword'], $_SESSION['user_password'])) {
                $error = 'Your old password is wrong, please try again.';
                header("Location: ../view/userdashboard/adminIndex.php?menu=account&action=change_password&error=$error");
            } else if ($_POST['newpassword'] != $_POST['newpasswordagain']) {
                $error = 'Your 2 new passwords did not match, please enter again your new password.';
                header("Location: ../view/userdashboard/adminIndex.php?menu=account&action=change_password&error=$error");
                //echo 'Error';
            } else if (empty($_POST['newpassword']) || strlen($_POST['newpassword']) < 6 || !preg_match('/^(?=.*[a-zA-Z])(?=.*\d).+$/', $_POST['newpassword'])) {
                $error = 'You entered an invalid new password, please try again.';
                header("Location: ../view/userdashboard/adminIndex.php?menu=account&action=change_password&error=$error");
            } else {
                // echo 'Good';
                admin_change_password($_SESSION['user_id'], $_POST['newpassword'], $conn);
            }
        }
    } else {
        $error = 'Failed captcha, please try again.';
        header("Location: ../view/userdashboard/adminIndex.php?menu=account&action=change_password&error=$error");
    }
?>
