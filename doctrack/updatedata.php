<?php
include "config.php";
// UPDATE USER


$name = mysqli_real_escape_string($connect, $_POST['name']);
$email = mysqli_real_escape_string($connect, $_POST['email']);
$mobile = mysqli_real_escape_string($connect, $_POST['mobile']);
$id = mysqli_real_escape_string($connect, $_POST['id']);

$query = "UPDATE registereduser SET 
name = '$name',
email = '$email',
mobile = '$mobile'
    WHERE id = $id";
$results = mysqli_query($connect, $query);
if ($results > 0) {
    echo "user updated successfully";
}
