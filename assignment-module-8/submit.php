<?php
session_start();

// get user inputs
$fname = $_POST['fname'];
$lname = $_POST['lname'];
//$user_name = str_replace(' ','',$name);
$email = $_POST['email'];
$password = $_POST['password'];
$confirm_password = $_POST['confirm_password'];
$errors = array();
// $profile_picture = $_FILES['profile-picture'];

// upload profile picture to server
// $upload_directory = "uploads/";
// $profile_picture_name = uniqid(). '_' .date('YmdHis') . '_' . $profile_picture['name'];
// $target_file = $upload_directory . $profile_picture_name;

//validation
if(empty($first_name) || empty($last_name) || empty($email) || empty($password) || empty($confirm_password)){
	$errors[0] = "All fields are required.";
}
elseif(!filter_var($email, FILTER_VALIDATE_EMAIL)){
	$errors[1] = "Invalid email format.";
}
elseif($password != $confirm_password){
	$errors[2] = "Password and confirm password do not match.";
}

	// Registration successful, save to database or do something else



if (count($errors) > 0) {
    $_SESSION['errors'] = $errors;
    header('Location: index.php');
    exit;
  }

  $user_data = array($fname,$lname, $email, $password);
  $file = fopen("users.csv", "a");
  fputcsv($file, $user_data);
  fclose($file);
  echo "<p style='color:green'>Registration successful.</p>";

	// save user data to csv file
	// $user_data = array($fname,$lname, $email, $password);
	// $file = fopen("users.csv", "a");
	// fputcsv($file, $user_data);
	// fclose($file);

	// set session and cookie
	// $_SESSION['fullname'] = $name;
	// $_SESSION['username'] = $user_name;
	// setcookie('username', $user_name, time() + 60, "/"); // cookie expires after 60 seconds
//	setcookie('username', $user_name, time() + (86400 * 30), "/"); // cookie expires after 30 days

	// redirect to success page
	//header("Location: success.php");
	//exit();

