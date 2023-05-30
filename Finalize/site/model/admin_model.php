<?php
    function admin_auth_query($admin_id, $conn) {
        $stmt = $conn->prepare("SELECT * FROM admin WHERE admin_id=?");
        $stmt->execute([$admin_id]);

        return $stmt;
    }

    function admin_change_password($admin_id, $new_password, $conn) {
        $new_password = password_hash($new_password, PASSWORD_DEFAULT);
        $stmt = $conn->prepare("UPDATE admin SET password = :password WHERE admin_id = :admin_id", [PDO::ATTR_CURSOR => PDO::CURSOR_FWDONLY]);
        $stmt->execute([':password' => $new_password, ':admin_id' => $admin_id]); 
        if ($stmt) {
            // echo $new_password . '\n';
            // echo $admin_id;
            echo("<script>location.href = '../view/userdashboard/adminIndex.php?menu=account&action=change_password&success=Change password successfully, you can now log out and log in with the new password.';</script>"); 
        } else {
            echo("<script>location.href = '../view/userdashboard/adminIndex.php?menu=account&action=change_password&error=Error occurred while changing the new password, possibly caused by the connection with the Databases Server.';</script>"); 
        }
    }

    function get_bus_data($conn) {
        $stmt = $conn->prepare("SELECT * FROM bus ORDER BY bus_id", [PDO::ATTR_CURSOR => PDO::CURSOR_FWDONLY]);
        $stmt->execute();
        $bus = $stmt->fetchALL(PDO::FETCH_ASSOC);
        
        return $bus;
    }

    function get_ticket_data($conn) {
        $stmt = $conn->prepare("SELECT * FROM ticket ORDER BY time DESC LIMIT 75", [PDO::ATTR_CURSOR => PDO::CURSOR_FWDONLY]);
        $stmt->execute();
        $ticket = $stmt->fetchALL(PDO::FETCH_ASSOC);
        
        return $ticket;      
    }

    function add_notification($conn) {
        $stmt = $conn->prepare("INSERT INTO notification (date, content, title) VALUES (:date, :content, :title)", [PDO::ATTR_CURSOR => PDO::CURSOR_FWDONLY]);
        $stmt->execute([':date' => $_POST['select_date_notification'], ':content' =>  $_POST['content_notification'], ':title' =>$_POST['title_notification']]);

        if ($stmt) {
            echo("<script>location.href = '../view/userdashboard/adminIndex.php?menu=modifications&action=sendnotification&success=Send notification successfully.';</script>"); 
        } else {
            echo("<script>location.href = '../view/userdashboard/adminIndex.php?menu=modifications&action=sendnotification&error=Failed to send notification.';</script>"); 
        }
    }

    function change_ticket_price($conn) {
        if (is_numeric($_POST['change_ticket_price'])) {
            $stmt = $conn->prepare("SELECT * FROM ticket WHERE route = :route AND time = :time", [PDO::ATTR_CURSOR => PDO::CURSOR_FWDONLY]);
            $stmt->execute([':route' => $_POST['select_route_ticket_price'], ':time' => $_POST['select_date_ticket_price']]);
            
            if($stmt->rowCount() > 0) {
                $stmt_ticket_price = $conn->prepare("UPDATE ticket SET price = :price WHERE time = :time AND route = :route", [PDO::ATTR_CURSOR => PDO::CURSOR_FWDONLY]);
                $stmt_ticket_price->execute([':price' => $_POST['change_ticket_price'], ':time' => $_POST['select_date_ticket_price'], ':route' => $_POST['select_route_ticket_price']]);
        
                if ($stmt_ticket_price) {
                    echo("<script>location.href = '../view/userdashboard/adminIndex.php?menu=modifications&action=changeticketprice&success=Change ticket price successfully';</script>"); 
                } else {
                    echo("<script>location.href = '../view/userdashboard/adminIndex.php?menu=modifications&action=changeticketprice&error=Failed to change ticket price';</script>"); 
                }
            } else {
                echo("<script>location.href = '../view/userdashboard/adminIndex.php?menu=modifications&action=changeticketprice&error=There is no ticket on your given date';</script>");
            }
        } else {
            echo("<script>location.href = '../view/userdashboard/adminIndex.php?menu=modifications&action=changeticketprice&error=Invalid price';</script>");
        }
    }

    function add_a_ticket($conn) {
        // check if the ticket is already in the system
        $stmt = $conn->prepare("SELECT * FROM ticket WHERE route = :route AND time = :time", [PDO::ATTR_CURSOR => PDO::CURSOR_FWDONLY]);
        $stmt->execute([':route' => $_POST['enter_route'], ':time' => $_POST['enter_date']]);
        
        if($stmt->rowCount() == 0) {
            $stmt = $conn->prepare("INSERT INTO ticket (route, time, price) VALUES (:route, :time, :price)", [PDO::ATTR_CURSOR => PDO::CURSOR_FWDONLY]);
            $stmt->execute([':route' => $_POST['enter_route'], ':time' => $_POST['enter_date'], ':price' => $_POST['enter_price']]);
    
            if ($stmt) {
                echo("<script>location.href = '../view/userdashboard/adminIndex.php?menu=modifications&action=addaticket&success=Add a ticket successfully';</script>"); 
            } else {
                echo("<script>location.href = '../view/userdashboard/adminIndex.php?menu=modifications&action=addaticket&error=Failed to add this ticket';</script>"); 
            }
        } else {
            echo("<script>location.href = '../view/userdashboard/adminIndex.php?menu=modifications&action=addaticket&error=This ticket is already in our system';</script>");
        }
    }
?>