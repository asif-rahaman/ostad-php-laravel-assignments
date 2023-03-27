<?php
session_start();
$name = $_POST['name'];
$email = $_POST['email'];

$errors = array();

if (empty($name)) {
  $errors[0] = "Name is required";
}

if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
  $errors[1] = "Invalid email format";
}

if (count($errors) > 0) {
    $_SESSION['errors'] = $errors;
    header('Location: form2.php');
    exit;
  }