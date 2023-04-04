<?php
$title = "Welcome";
require("header.php");
session_start();
$first_name = $_SESSION ['first_name'];

?>
<div class="pricing-header p-3 pb-md-4 mx-auto text-center">
	<h1 class="display-4 fw-normal">Login Successful!</h1>
	<p class="fs-5 text-muted">Hi, <?php echo $first_name; ?>. How are you today?</p>
	
</div>

<div class="text-center pt-3">
	<a class="btn btn-primary btn-lg align-center" href="log-out.php" role="button">Log Out</a>
</div>

<?php include("footer.php"); ?>