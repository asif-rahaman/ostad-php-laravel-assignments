<?php
$title = "User Registration";
require("header.php");
?>
<div class="pricing-header p-3 pb-md-4 mx-auto text-center">
    <h1 class="display-4 fw-normal">Registration Form</h1>
    <p class="fs-5 text-muted">Please provide your information bellow.</p>
</div>
<main class="form-signin w-100 m-auto">
    <form method="post" action="">
        <div class="form-row">
            <div class="col-md-12 mb-3">
                <label>First Name:</label><br>
                <input type="text" class="form-control" name="first_name" required>
            </div>
            <div class="col-md-12 mb-3">
            <label>Last Name:</label><br>
            <input type="text" class="form-control" name="last_name" required>
            </div>
            <div class="col-md-12 mb-3">
            <label>Email Address:</label><br>
            <input type="email" class="form-control" name="email" required>
            </div>
            <div class="col-md-12 mb-3">
            <label>Password:</label><br>
            <input type="password" class="form-control" name="password" required>
            </div>
            <div class="col-md-12">
            <label>Confirm Password:</label><br>
            <input type="password" class="form-control" name="confirm_password" required><br>
            </div>
            <div class="col-md-12 mb-3 text-center">
             <input class="btn btn-primary btn-lg" type="submit" name="register" value="Register">
            </div>
        </div>
    </form>

    <?php
    if (isset($_POST['register'])) {
        $first_name = $_POST['first_name'];
        $last_name = $_POST['last_name'];
        $email = $_POST['email'];
        $password = $_POST['password'];
        $confirm_password = $_POST['confirm_password'];

        // Validation
        if (empty($first_name) || empty($last_name) || empty($email) || empty($password) || empty($confirm_password)) {
            echo "<p style='color:red'>All fields are required.</p>";
        } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            echo "<p style='color:red'>Invalid email format.</p>";
        } elseif ($password != $confirm_password) {
            echo "<p style='color:red'>Password and confirm password do not match.</p>";
        } else {
            // Registration successful, save to CSV file
            $user_data = array($first_name, $last_name, $email, $password);
            $file = fopen("users.csv", "a");
            fputcsv($file, $user_data);
            fclose($file);
            echo "<p style='color:green'>Registration successful.</p>";
        }
    }
    ?>
</main>
<?php include("footer.php"); ?>