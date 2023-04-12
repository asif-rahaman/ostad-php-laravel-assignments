<?php

if (isset($_POST['sendmsg'])) {
    $name = $_POST['name'];
    $subject = $_POST['subject'];
    $email = $_POST['email'];
    $message = $_POST['message'];


    // Validation
    if (empty($name) || empty($email) || empty($subject) || empty($message)) {
        echo "<p style='color:red'>All fields are required.</p>";
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        echo "<p style='color:red'>Invalid email format.</p>";
    } else {
        // Registration successful, save to CSV file

        echo "<p style='color:green'>Registration successful.</p>";
    }
}
?>