<?php
    function student_auth_query($student_id, $conn) {
        $stmt = $conn->prepare("SELECT * FROM student WHERE student_id=?");
        $stmt->execute([$student_id]);

        return $stmt;
    }

    function get_my_tickets($student_id, $conn) {
        $stmt = $conn->prepare("SELECT * FROM ticket NATURAL JOIN booking WHERE student_id = :student_id ORDER BY time DESC LIMIT 50", [PDO::ATTR_CURSOR => PDO::CURSOR_FWDONLY]);
        $stmt->execute([':student_id' => $student_id]);
        $ticket = $stmt->fetchALL(PDO::FETCH_ASSOC);

        return $ticket; 
    }
    
    function student_change_password($student_id, $new_password, $conn) {
        $new_password = password_hash($new_password, PASSWORD_DEFAULT);
        $stmt = $conn->prepare("UPDATE student SET password = :password WHERE student_id = :student_id", [PDO::ATTR_CURSOR => PDO::CURSOR_FWDONLY]);
        $stmt->execute([':password' => $new_password, ':student_id' => $student_id]); 
        if ($stmt) {
            // echo $new_password . '\n';
            // echo $student_id;
            echo("<script>location.href = '../view/userdashboard/index.php?menu=account&action=change_password&success=Change password successfully, you can now log out and log in with the new password.';</script>"); 
        } else {
            echo("<script>location.href = '../view/userdashboard/index.php?menu=account&action=change_password&error=Error occurred while changing the new password, possibly caused by the connection with the Databases Server.';</script>"); 
        }
    }

    function insert_new_booking($student_id, $ticket_id, $bus_id, $conn) {
        $qrcode = "id=" . $student_id .  "@t" . $ticket_id . "@b" . $bus_id;

        $stmt = $conn->prepare("INSERT INTO booking VALUES (:student_id, :ticket_id, :bus_id, :qrcode)", [PDO::ATTR_CURSOR => PDO::CURSOR_FWDONLY]);
        $stmt->execute([':student_id' => $student_id, ':ticket_id' => $ticket_id, ':bus_id' => $bus_id, ':qrcode' => $qrcode]); 

        if ($stmt) {
            echo'   <div class="alert alert-success" role="alert">
                        Successfully purchase the ticket, you now can go to "My tickets" section to check the new ticket.
                    </div>';
        } else {
            echo'   <div class="alert alert-danger" role="alert">
                        Transaction failed, please try again.
                    </div>';
        }
    }
?>