<?php
include "config.php";
// QR UPDATE USER
date_default_timezone_set('Asia/Manila');

$receiver = mysqli_real_escape_string($connect, $_POST['receiver']);
$docno=mysqli_real_escape_string($connect, json_decode($_POST['selectedid'])); 


// $date = date('Y-m-d');
// $time = date('H:i:s');

foreach($docno as $value) {
// $check_start_sql = "select end_time from tbl_ledger where docno = $value and end_time < now() ORDER BY end_time DESC limit 1";
// $result= mysqli_query($connect,$check_start_sql);
// $row = mysqli_fetch_assoc($result);

// $start_time = $row['end_time'];

 $query = "UPDATE tbl_documents set status = 'RECEIVED', print = 1  where docno = $value";
 $result= mysqli_query($connect, $query);

//  $query_ledger = "Insert into tbl_ledger VALUES(
//      $value, $date, $time,
//      (Select type from tbl_documents where docno = $value), 
//      (Select particulars from tbl_documents where docno = $value), 
//      (Select origin from tbl_documents where docno = $value), 
//      (Select destination from tbl_documents where docno = $value), 
//      'RECEIVED', 
//      (Select remarks from tbl_documents where docno = $value),
//      $receiver,'mobile')";
//      $result1= mysqli_query($connect,$query_ledger);

}



?>

