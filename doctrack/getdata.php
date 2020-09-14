<?php
include "config.php";

$user = mysqli_real_escape_string($connect, $_POST['user']);


$queryResult = $connect->
      query("SELECT DISTINCT d.docno, d.creator, d.destination, d.particulars FROM tbl_documents d inner join tbl_ledger l on l.docno = d.docno  WHERE l.status in ('FORWARDED','CREATED') and d.status in ('FORWARDED','CREATED') and  l.receiver = '$user' and d.print = 0 group by l.docno order by UNIX_TIMESTAMP(l.txndate),UNIX_TIMESTAMP(l.time)");//change your_table with your database table that you want to fetch values

  $result = array();

  while ($fetchdata=$queryResult->fetch_assoc()) {
      $result[] = $fetchdata;
  }

  echo json_encode($result);
?>