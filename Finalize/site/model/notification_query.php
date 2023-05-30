<?php
    function query_notification() {
        $db = new DBConnect();
        $conn = $db->connect();

        $stmt_notification = $conn->prepare("SELECT * FROM notification ORDER BY date DESC LIMIT 10");
        $stmt_notification->execute();
        $notification = $stmt_notification->fetchAll(PDO::FETCH_ASSOC);
    
        return $notification;
    }
?>