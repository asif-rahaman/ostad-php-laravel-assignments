<?php
$title = "User Registration";
require("header.php");
?>
<div class="pricing-header p-3 pb-md-4 mx-auto text-center">
	<h1 class="display-4 fw-normal">User Login</h1>
</div>
<main class="form-signin w-100 m-auto">
	<form method="post" action="">
		<label>Email Address:</label><br>
		<input type="email" name="email" required><br><br>
		<label>Password:</label><br>
		<input type="password" name="password" required><br><br>
		<input type="submit" name="login" value="Login">
	</form>

	<?php
	// if(isset($_POST['login'])){
	// 	$email = $_POST['email'];
	// 	$password = $_POST['password'];

	// 	// Validation
	// 	if(empty($email) || empty($password)){
	// 		echo "<p style='color:red'>Both fields are required.</p>";
	// 	}
	// 	else{
	// 		// Check if email and password match in database or do something else
	// 		// For now, just use a hardcoded value for demonstration purposes
	// 		$valid_email = 'test@example.com';
	// 		$valid_password = 'password';

	// 		if($email == $valid_email && $password == $valid_password){
	// 			// Successful login, redirect to welcome page with first name
	// 			$first_name = 'John'; // Assume the first name is retrieved from the database
	// 			header('Location: welcome.php?name='.$first_name);
	// 			exit;
	//      }   
	// CSV file path
	$file_path = 'users.csv';

	if (isset($_POST['login'])) {
		$email = $_POST['email'];
		$password = $_POST['password'];

		// Read CSV file
		if (($file_handle = fopen($file_path, "r")) !== FALSE) {
			$valid_login = false;
			while (($data = fgetcsv($file_handle, 1000, ",")) !== FALSE) {
				// Check if email and password match
				if ($data[2] == $email && $data[3] == $password) {
					$valid_login = true;
					break;
				}
			}
			fclose($file_handle);

			if ($valid_login) {
				// Successful login, redirect to welcome page with first name
				$first_name = $data[0]; // Assuming the first name is in the third column
				$_SESSION ['first_name'] = $first_name;
				header('Location: welcome.php?name=' . $first_name);
				exit;
			} else {
				// Invalid login, display error message
				echo "<p style='color:red'>Invalid email or password.</p>";
			}
		} else {
			// Error opening CSV file, display error message
			echo "<p style='color:red'>Error opening CSV file.</p>";
		}
	}
	?>
</main>
<?php include("footer.php"); ?>