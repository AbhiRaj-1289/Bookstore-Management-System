<?php
session_start();

if (!empty($_POST)) {
    extract($_POST);
    $_SESSION['error'] = array();

    // Validations
    if (empty($fnm)) {
        $_SESSION['error']['fnm'] = "Please enter Full Name";
    }

    if (empty($mno)) {
        $_SESSION['error']['mno'] = "Please enter Mobile Number";
    } elseif (!is_numeric($mno)) {
        $_SESSION['error']['mno'] = "Please enter a valid numeric Mobile Number";
    }

    if (empty($email)) {
        $_SESSION['error']['email'] = "Please enter E-Mail ID";
    }

    if (empty($msg)) {
        $_SESSION['error']['msg'] = "Please enter Message";
    }

    // If errors exist, redirect back
    if (!empty($_SESSION['error'])) {
        header("Location: contact.php");
        exit;
    }

    // If no errors, insert into DB
    include("includes/connection.php");  // This must define $link (mysqli connection)

    $t = time();

    $fnm = mysqli_real_escape_string($link, $fnm);
    $mno = mysqli_real_escape_string($link, $mno);
    $email = mysqli_real_escape_string($link, $email);
    $msg = mysqli_real_escape_string($link, $msg);

    $q = "INSERT INTO contact(c_fnm, c_mno, c_email, c_msg, c_time) 
          VALUES ('$fnm', '$mno', '$email', '$msg', '$t')";

    if (mysqli_query($link, $q)) {
        // Success
        $_SESSION['success'] = "Message submitted successfully.";
    } else {
        // Query error
        $_SESSION['error']['db'] = "Database error: " . mysqli_error($link);
    }

    header("Location: contact.php");
    exit;
} else {
    header("Location: contact.php");
    exit;
}
