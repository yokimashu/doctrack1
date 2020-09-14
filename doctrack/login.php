<?php
include "config.php";


$username = mysqli_real_escape_string($connect, $_POST['username']);
$password = mysqli_real_escape_string($connect, $_POST['password']);


$loginQuery = "SELECT * FROM tbl_users WHERE username = '$username'";

// Executing SQL Query.
$check = mysqli_fetch_array(mysqli_query($connect, $loginQuery));

if (isset($check)) {

    $result = mysqli_query($connect, $loginQuery);

    // Associative array
    $row = mysqli_fetch_assoc($result);
    $hash_password = $row['userpass'];
   
    if (password_verify($password, $hash_password)) {
             

 
    // Free result set
    mysqli_free_result($result);


    echo json_encode($row);
    }

} else {

    // If Email and Password did not Matched.
    // Converting the message into JSON format.
    // Echo the message.
    echo json_encode('Invalid Username or Password Please Try Again');
}

mysqli_close($connect);
