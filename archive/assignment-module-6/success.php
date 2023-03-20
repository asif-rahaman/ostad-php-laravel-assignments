<?php
$title = "Registration Success";
require("header.php");
session_start();
$name = $_SESSION['fullname'];
?>
<div class="pricing-header p-3 pb-md-4 mx-auto text-center">
	<h1 class="display-4 fw-normal">Registration Successful!</h1>
	<p class="fs-5 text-muted">Congratulations, <?php echo $name; ?>. Your registration is complete.</p>
	<p class="fs-5 text-muted">Here are the details you entered:</p>
</div>

<table class="table table-striped table-hover align-middle text-center">
	<thead class="table-dark">
		<tr>
			<th scope="col">Name</th>
			<th scope="col">Email</th>
			<th scope="col">Profile Picture</th>
		</tr>
	</thead>
	<tbody>
		<?php


		$file = fopen("users.csv", "r");

		while (($data = fgetcsv($file)) !== FALSE) {
			$username = str_replace(' ', '', $data[0]);
			// echo "User Name ";
			// var_dump($username);
			//echo "<br>";
			// var_dump($_SESSION['username']);
			// echo "Session Data ";
			//echo "<br>";
			if ($username == $_SESSION['username']) {
				echo "<tr>";
				echo "<td>" . $data[0] . "</td>";
				echo "<td>" . $data[1] . "</td>";
				echo "<td><img src='uploads/" . $data[2] . "' height='100'></td>";
				echo "</tr>";
			}
		}
		fclose($file);
		?>
	</tbody>
</table>
<div class="text-center pt-3">
	<a class="btn btn-primary btn-lg align-center" href="user-info.php" role="button">See All User Info</a>
</div>
<?php include("footer.php"); ?>