<?php
$link = mysqli_connect("localhost", "root", "", "bookstore");

if (!$link) {
    die("Connection failed: " . mysqli_connect_error());
}
?>
