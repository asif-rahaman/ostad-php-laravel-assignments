<?php
$title = "All User Information";
require("header.php");
session_start();
?>
<div class="pricing-header p-3 pb-md-4 mx-auto text-center">
	<h1 class="display-4 fw-normal">All User Information</h1>
	<p class="fs-5 text-muted">All the available user information in the CSV file are shown here.</p>
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
			echo "<tr>";
			echo "<td>" . $data[0] . "</td>";
			echo "<td>" . $data[1] . "</td>";
			echo "<td><img src='uploads/" . $data[2] . "' height='100'></td>";
			echo "</tr>";
		}
		fclose($file);
		?>
	</tbody>
</table>

<?php include("footer.php"); ?>