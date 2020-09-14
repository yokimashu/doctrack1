<?php
include "config.php";
// UPDATE USER


$id = mysqli_real_escape_string($connect, $_POST['id']);

$query = "DELETE FROM registereduser
    WHERE id = $id";
$results = mysqli_query($connect, $query);
if ($results > 0) {
    echo "user deleted successfully";
}
?>