<?php
    session_start();

    if (isset($_POST['select_date']) && isset($_POST['select_route']) && isset($_POST['select_bus'])) {
        
        include_once '../model/DBConnect.php';

        $db = new DBConnect();
        $conn = $db->connect();

        $stmt = $conn->prepare("SELECT * FROM ticket WHERE route = :route AND time = :time", [PDO::ATTR_CURSOR => PDO::CURSOR_FWDONLY]);
        $stmt->execute([':route' => $_POST['select_route'], ':time' => $_POST['select_date']]);
        $_SESSION['bus_id'] = $_POST['select_bus'];
        
        if($stmt->rowCount() === 1) {
            $ticket = $stmt->fetch();

            $ticket_id      = $ticket['ticket_id'];
            $ticket_route   = $ticket['route'];
            $ticket_time    = $ticket['time'];
            $ticket_price   = $ticket['price'];
        
            $_SESSION['ticket_id']      = $ticket_id;
            $_SESSION['ticket_route']   = $ticket_route;
            $_SESSION['ticket_date']    = $ticket_time;
            $_SESSION['ticket_price']   = $ticket_price;


            // retrieve all bus id
            $stmt_bus_id = $conn->prepare("SELECT bus_id FROM bus");
            $stmt_bus_id->execute();
            $bus_id = $stmt->fetchAll(PDO::FETCH_ASSOC);
                // --> retrieve the info about the number of each bus for the ticket
                $stmt_bus = $conn->prepare("SELECT COUNT(bus_id) as bus_no FROM booking WHERE ticket_id = :ticket_id AND bus_id = :bus_id");
                $stmt_bus->execute([':ticket_id' => $ticket_id, ':bus_id' => $_POST['select_bus']]);
                $bus = $stmt_bus->fetch();
                $bus_no = $bus['bus_no'];
                $stmt_bus = $conn->prepare("SELECT seat_num FROM bus WHERE bus_id = :bus_id");
                $stmt_bus->execute([':bus_id' => $_POST['select_bus']]);
                $bus = $stmt_bus->fetch();
                $bus_no_left = $bus['seat_num'] - $bus_no;
            

            // retrieve the ticket whether the user purchased it or not
            $stmt_booking = $conn->prepare("SELECT COUNT(student_id) AS number FROM booking WHERE ticket_id = :ticket_id AND student_id = :student_id", [PDO::ATTR_CURSOR => PDO::CURSOR_FWDONLY]);
            $stmt_booking->execute([':ticket_id' => $ticket_id, ':student_id' => $_SESSION['user_id']]);
            $booking = $stmt_booking->fetch();
            $has_purchased = $booking['number'];
            


                if ($_POST['select_date'] == $ticket_time && $_POST['select_route'] === $ticket_route) {
                    if ($has_purchased == 0) {
                        // retrieve the number of bus
                        $stmt = $conn->prepare("SELECT * FROM bus");
                        $stmt->execute();
                        $_SESSION['bus'] = $stmt->fetchAll(PDO::FETCH_ASSOC);
                        

                        if ($bus_no_left > 0) {
                            $_SESSION['bus_id'] = $_POST['select_bus'];
                            echo("<script>location.href = '../view/userdashboard/index.php?menu=bookaticket&availability=check';</script>");
                        } else {
                            echo("<script>location.href = '../view/userdashboard/index.php?menu=bookaticket&error=The bus you chose has already full of seat!';</script>");
                        }
    
                       
                    } else {
                        echo("<script>location.href = '../view/userdashboard/index.php?menu=bookaticket&error=You have already purchased this ticket!';</script>");
                    }
                }   

           // $_SESSION['avail_test'] = $_POST['select_date'];
            //echo("<script>location.href = 'index.php?menu=bookaticket&availability=check';</script>");

        } else {
            echo("<script>location.href = '../view/userdashboard/index.php?menu=bookaticket&error=There is no ticket on your given date!';</script>");
        }

    }
?>