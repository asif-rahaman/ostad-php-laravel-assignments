<?php
session_start();

// get user inputs
$name = $_POST['name'];
$user_name = str_replace(' ', '', $name);
$email = $_POST['email'];
$password = $_POST['password'];
$profile_picture = $_FILES['profile-picture'];

// upload profile picture to server
$upload_directory = "uploads/";
$profile_picture_name = date('YmdHis') . '_' . $profile_picture['name'];
$target_file = $upload_directory . $profile_picture_name;

if (move_uploaded_file($profile_picture['tmp_name'], $target_file)) {
	// save user data to csv file
	$user_data = array($name, $email, $profile_picture_name);
	$file = fopen("users.csv", "a");
	fputcsv($file, $user_data);
	fclose($file);

	// set session and cookie
	$_SESSION['username'] = $user_name;
	setcookie('username', $user_name, time() + 60, "/"); // cookie expires after 60 seconds
	//	setcookie('username', $user_name, time() + (86400 * 30), "/"); // cookie expires after 30 days

	// redirect to success page
	header("Location: success.php");
	exit();
} else {
	echo "Sorry, there was an error uploading your file.";
}
