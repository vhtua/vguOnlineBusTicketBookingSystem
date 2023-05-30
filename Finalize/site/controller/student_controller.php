<?php
    session_start();

    require_once 'qr-module/encryptQRCode.php';
    include_once '../../model/DBConnect.php';
    include_once '../../model/student_model.php';

    function view_QRCode() {
        if(isset($_POST['viewqrcode'])){
            $code = encrypt($_POST['viewqrcode'], $_SESSION['private_secret_key']);
            // echo nl2br($code . "\n"); }
            echo "
                <img src='https://chart.googleapis.com/chart?chs=300x300&cht=qr&chl=$code&choe=UTF-8'>
            ";
            // $real_qr = decrypt(substr($code, 30), $_SESSION['private_secret_key']);
            // echo nl2br("Real content:" . $real_qr . "\n");
    
            // $real_qr = decrypt($code, "f12345");
            // echo nl2br("Real content:" . $real_qr . "\n");
        }
    }

    function ticket_status() {
        if (isset($_GET['error'])) { ?>
            <div class="alert alert-danger" role="alert">
                <?php echo $_GET['error']; ?>
            </div>
        <?php
        } else if (isset($_GET['message']) && $_GET['message'] != 'Successful.') {
            echo '  <div class="alert alert-danger" role="alert">
                        Transaction failed, please try again.
                    </div>';
        } 
    }

    function handle_momo_transaction($student_id, $ticket_id, $bus_id) {
        if (isset($_GET['partnerCode']) && $_GET['partnerCode'] == $_SESSION['momo_partnerCode'] && isset($_GET['message']) && $_GET['message'] === 'Successful.') {
            $partnerCode    = $_GET["partnerCode"];
            $orderId        = $_GET["orderId"]; // Mã đơn hàng
            $requestId      = $_GET["requestId"];
            $orderInfo      = $_GET["orderInfo"];
            $message        = $_GET["message"];
            $amount = $_GET["amount"];
            $extraData = $_GET["extraData"];

            $db = new DBConnect();
            $conn = $db->connect();
            // echo '<p> Debugging </p>';
            insert_new_booking($student_id, $ticket_id, $bus_id, $conn);
            ?>

        
        <?php 
        } else if (isset($_GET['message']) && $_GET['message'] != 'Successful.') { ?>
            <div class="alert alert-danger" role="alert">
                <?php echo 'Transaction failed, please try again.'; ?>
            </div>
        <?php
        } else if (isset($_GET['error'])) { ?>
            <div class="alert alert-danger" role="alert">
                <?php echo $_GET['error']; ?>
            </div>
        <?php
        }

    }
    
?>