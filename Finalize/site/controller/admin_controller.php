<?php
    session_start();

    include_once dirname(__FILE__) . '/../model/DBConnect.php';
    include_once dirname(__FILE__) . '/../model/admin_model.php';
    
    $db = new DBConnect();
    $conn = $db->connect();

    if (isset($_POST['send_notification'])) {
        add_notification($conn);

    } else if (isset($_POST['select_route_ticket_price']) && isset($_POST['select_date_ticket_price']) && isset($_POST['Change_price'])) {
        change_ticket_price($conn);

    } else if (isset($_POST['enter_date']) && isset($_POST['enter_route']) && isset($_POST['enter_price']) && isset($_POST['add_this_ticket'])) {
        if (is_numeric($_POST['enter_price'])) {
            add_a_ticket($conn);
        } else {
            header("Location: ../view/userdashboard/adminIndex.php?menu=modifications&action=addaticket&error=Invalid price");
            //echo("<script>location.href = '../view/userdashboard/adminIndex.php?menu=modifications&action=addaticket&error=Invalid price';</script>");
        }
    }

?>