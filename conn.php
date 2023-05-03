<?php
$conn = mysqli_connect("localhost", "root", "", "lawyeric");
if (!$conn) {
    die("Can't Connect to databse: " . mysqli_connect_error());
}
?>