<!DOCTYPE html>
<html>
<head>
	<title>Answer</title>
	<style>
		table {
			border-collapse: collapse;
			width: 80%;
			margin: 20px 0;
			font-size: 1.2em;
			font-family: sans-serif;
		}
		th, td {
			text-align: left;
			padding: 8px;
			border-bottom: 1px solid #ddd;
		}
		th {
			background-color: #000000;
			color: white;
		}
		tr:nth-child(even) {
			background-color: #f2f2f2;
		}
		form {
			margin-top: 20px;
		}
		label, input[type="submit"] {
			display: block;
			margin-bottom: 10px;
			font-size: 1.2em;
			font-family: sans-serif;
		}
        .container{
            width: 75%;
            margin:0 auto;
        }
	</style>

</head>
<body>
	<h1 style="text-align:center;">INFO TABLE</h1>
    <div class="container">   
	<table>
		<thead>
			<tr>
				<th>Name</th>
				<th>Age</th>
			</tr>
		</thead>
		<tbody>
			<tr>
				<td>John</td>
				<td>25</td>
			</tr>
			<tr>
				<td>Sarah</td>
				<td>30</td>
			</tr>
			<tr>
				<td>Mike</td>
				<td>28</td>
			</tr>
			<?php
				// check if the form has been submitted
				if(isset($_POST['name']) && isset($_POST['age'])) {
					$name = $_POST['name'];
					$age = $_POST['age'];
					// add the new row to the table
					echo "<tr><td>$name</td><td>$age</td></tr>";
				}
			?>
		</tbody>
	</table>
	<form method="post">
		<label for="name">Name:</label>
		<input type="text" name="name" id="name" required>
		<label for="age">Age:</label>
		<input type="number" name="age" id="age" required><br><br>
		<input type="submit" value="Add to Table">
	</form>
    </div>
</body>
</html>
