<meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
<?php
require 'encryptQRCode.php';
include_once 'DBConnect.php';

$db = new DBConnect();
$conn = $db->connect();

// get the q parameter from URL
$qr = $_GET["q"];
// echo nl2br($qr . "\n\n");
$real_qr = decrypt($qr, "f12345");
// echo nl2br($real_qr . "\n\n");

// Match the three strings using a regular expression
$pattern = '/id=(\d+)@t(\d+)@b(\d+)/';
//preg_match($pattern, $real_qr, $matches);

// echo $matches[1]; 
// echo $matches[2]; 
// echo $matches[3]; 

if (preg_match($pattern, $real_qr, $matches)) {
  $stmt = $conn->prepare("SELECT COUNT(student_id) AS has_booking FROM booking WHERE student_id = :student_id AND ticket_id = :ticket_id AND bus_id = :bus_id", [PDO::ATTR_CURSOR => PDO::CURSOR_FWDONLY]);
  $stmt->execute([':student_id' => $matches[1], ':ticket_id' => $matches[2], ':bus_id' => $matches[3]]);
  $booking = $stmt->fetch();
  $has_ticket = $booking['has_booking'];

  // check if the QR ticket is in the DB Server or not
  if ($has_ticket > 0) {
    $stmt = $conn->prepare("SELECT * FROM ticket WHERE ticket_id = :ticket_id", [PDO::ATTR_CURSOR => PDO::CURSOR_FWDONLY]);
    $stmt->execute([':ticket_id' => $matches[2]]);
    $ticket = $stmt->fetch();

    $ticket_date  = $ticket['time'];
    $ticket_route = $ticket['route'];


    echo '<div class="btn alert alert-success" role="alert"> Valid Ticket! </div>'
    . '<h4>Ticket Information: <span id="txtHint"></span></h4> <br>' 
    . '<p>Student ID: ' . $matches[1] . '</p>' 
    . '<p>Ticket Date: ' . $ticket_date . '</p>'
    . '<p>Ticket Route: ' . $ticket_route . '</p>';
  } else {
    echo '<div class="btn alert alert-danger" role="alert"> Invalid Ticket! </div>'
    . '<p> This QR Code is not valid.</p> <span id="txtHint"></span></h4> <br>';
  }

} else {
  echo '<div class="btn alert alert-danger" role="alert"> Invalid Ticket! </div>'
  . '<p> This QR Code is not valid.</p> <span id="txtHint"></span></h4> <br>';
}






// Output "no suggestion" if no hint was found or output correct values
//echo $hint === "" ? "no suggestion" : $hint;
?>