<?php include_once('header.php'); ?>
<main id="main">

  <!-- ======= Breadcrumbs ======= -->
  <section id="breadcrumbs" class="breadcrumbs">
    <div class="container">

      <div class="d-flex justify-content-between align-items-center">
        <h2>Contact</h2>
        <ol>
          <li><a href="index.php">Home</a></li>
          <li>Contact</li>
        </ol>
      </div>

    </div>
  </section><!-- End Breadcrumbs -->

  <!-- ======= Contact Section ======= -->
  <div class="map-section">
    <iframe style="border:0; width: 100%; height: 350px;" src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d12097.433213460943!2d-74.0062269!3d40.7101282!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0xb89d1fe6bc499443!2sDowntown+Conference+Center!5e0!3m2!1smk!2sbg!4v1539943755621" frameborder="0" allowfullscreen></iframe>
  </div>

  <section id="contact" class="contact">
    <div class="container">

      <div class="row justify-content-center" data-aos="fade-up">

        <div class="col-lg-10">

          <div class="info-wrap">
            <div class="row">
              <div class="col-lg-4 info">
                <i class="bi bi-geo-alt"></i>
                <h4>Location:</h4>
                <p>A108 Adam Street<br>New York, NY 535022</p>
              </div>

              <div class="col-lg-4 info mt-4 mt-lg-0">
                <i class="bi bi-envelope"></i>
                <h4>Email:</h4>
                <p>info@example.com<br>contact@example.com</p>
              </div>

              <div class="col-lg-4 info mt-4 mt-lg-0">
                <i class="bi bi-phone"></i>
                <h4>Call:</h4>
                <p>+1 5589 55488 51<br>+1 5589 22475 14</p>
              </div>
            </div>
          </div>

        </div>

      </div>

      <div class="row mt-5 justify-content-center" data-aos="fade-up">
        <div class="col-lg-10">
          <form action="" method="post" role="form" class="php-email-form">
            <div class="row">
              <div class="col-md-6 form-group">
              <label for="name" class="d-none">Name</label>
                <input type="text" name="name" class="form-control" id="name" placeholder="Your Name" required>
              </div>
              <div class="col-md-6 form-group mt-3 mt-md-0">
              <label for="email" class="d-none">Email</label>
                <input type="email" class="form-control" name="email" id="email" placeholder="Your Email" required>
              </div>
            </div>
            <div class="form-group mt-3">
            <label for="subject" class="d-none">Subject</label>
              <input type="text" class="form-control" name="subject" id="subject" placeholder="Subject" required>
            </div>
            <div class="form-group mt-3">
            <label for="message" class="d-none">Message</label>
              <textarea class="form-control" name="message" id="message" rows="5" placeholder="Message" required></textarea>
            </div>
            <div class="my-3">
              <div class="loading">Loading</div>
              <div class="error-message"></div>
              <div class="sent-message">Your message has been sent. Thank you!</div>
            </div>
            <div class="text-center"><button type="submit"  name="sendmsg">Send Message</button></div>
          </form>
          <?php

          if (isset($_POST['sendmsg'])) {
            $name = $_POST['name'];
            $subject = $_POST['subject'];
            $email = $_POST['email'];
            $message = $_POST['message'];


            // Validation
            if (empty($name) || empty($email) || empty($subject) || empty($message)) {
              echo "<div class='alert alert-danger mt-3'>All fields are required.</div>";
            } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
              echo "<div class='alert alert-danger mt-3'>Invalid email format.</div>";
            } else {
              // Registration successful, save to CSV file

              echo "<div class='alert alert-success mt-3'>Your message has been sent. Thank you!</div>";
            }
          }
          ?>
        </div>

      </div>

    </div>
  </section><!-- End Contact Section -->

</main><!-- End #main -->

<?php include_once('footer.php'); ?>