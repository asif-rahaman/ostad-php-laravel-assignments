<?php
$title = "User Registration";
require("header.php");
session_start();
?>
<div class="pricing-header p-3 pb-md-4 mx-auto text-center">
	<h1 class="display-4 fw-normal">User Login</h1>
</div>
<main class="form-signin w-100 m-auto">
	<form method="post" action="">
	<div class="form-row">
	<div class="col-md-12 mb-3">
		<label>Email Address:</label><br>
		<input type="email" name="email"  class="form-control" required>
	</div>
	<div class="col-md-12 mb-3">
		<label>Password:</label><br>
		<input type="password" name="password"  class="form-control" required>
	</div>
		<input  class="btn btn-primary btn-lg" type="submit" name="login" value="Login">
	</div>
	</form>

	<?php
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
				header('Location: welcome.php');
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