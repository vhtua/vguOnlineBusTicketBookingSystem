<?php
    session_start();

    function driver_auth_query($driver_id, $conn) {
        $stmt = $conn->prepare("SELECT * FROM driver WHERE driver_id=?");
        $stmt->execute([$driver_id]);

        return $stmt;
    }

    function driver_change_password($driver_id, $new_password, $conn) {
        $new_password = password_hash($new_password, PASSWORD_DEFAULT);
        $stmt = $conn->prepare("UPDATE driver SET password = :password WHERE driver_id = :driver_id", [PDO::ATTR_CURSOR => PDO::CURSOR_FWDONLY]);
        $stmt->execute([':password' => $new_password, ':driver_id' => $driver_id]); 
        if ($stmt) {
            // echo $new_password . '\n';
            // echo $driver_id;
            echo("<script>location.href = '../view/userdashboard/driverIndex.php?menu=account&action=change_password&success=Change password successfully, you can now log out and log in with the new password.';</script>"); 
        } else {
            echo("<script>location.href = '../view/userdashboard/driverIndex.php?menu=account&action=change_password&error=Error occurred while changing the new password, possibly caused by the connection with the Databases Server.';</script>"); 
        }
    }
?>