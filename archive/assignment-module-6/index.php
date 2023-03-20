<?php
$title = "User Registration";
require("header.php");
?>
<div class="pricing-header p-3 pb-md-4 mx-auto text-center">
    <h1 class="display-4 fw-normal">Registration Form</h1>
    <p class="fs-5 text-muted">Please provide your information bellow.</p>
</div>
<main class="form-signin w-100 m-auto">
    <!-- <h2 class="h3 mb-3 fw-normal text-center">Please provide your Info</h2> -->
    <form class="needs-validation text-left" novalidate action="submit.php" method="post" enctype="multipart/form-data">
        <div class="form-row">
            <div class="col-md-12 mb-3">
                <label for="name">Name</label>
                <input type="text" class="form-control" name="name" id="name" placeholder="Full name" value="" required>
                <div class="invalid-feedback">
                    Please write your Full name.
                </div>
            </div>
            <div class="col-md-12 mb-3">
                <label for="email">Email</label>
                <input type="email" class="form-control" name="email" id="email" placeholder="Your Email" value="" required>
                <div class="invalid-feedback">
                    Please provide a valid Email.
                </div>
            </div>
            <div class="col-md-12 mb-3">
                <label for="password">Password</label>

                <input type="password" class="form-control" name="password" id="password" placeholder="Password" aria-describedby="inputGroupPrepend" required>
                <div class="invalid-feedback">
                    Please choose a password.
                </div>

            </div>
            <div class="col-md-12 mb-3">
                <div class="custom-file">
                    <input type="file" class="custom-file-input" name="profile-picture" id="profile-picture" accept="image/png, image/jpeg" required>
                    <label class="custom-file-label" for="profile-picture">Choose Image File...</label>
                    <div class="invalid-feedback">Please provide image in JPG or PNG Format </div>
                </div>
            </div>
        </div>

        <div class="form-group mb-3">
            <div class="form-check">
                <input class="form-check-input" type="checkbox" value="" id="invalidCheck" required>
                <label class="form-check-label" for="invalidCheck">
                    Agree to terms and conditions
                </label>
                <div class="invalid-feedback">
                    You must agree before submitting.
                </div>
            </div>
        </div>
        <button class="btn btn-primary btn-lg" type="submit">Submit</button>
    </form>

</main>
<?php include("footer.php"); ?>