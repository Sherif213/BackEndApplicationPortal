<?php
// success.php
session_start();

// Check if the registration was successful (you can customize this based on your needs)
if (!isset($_SESSION['success'])) {
    header('Location: register.php'); // Redirect if session success message is not set
    exit();
}

// Clear success message after showing
unset($_SESSION['success']);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registration Successful</title>
    <script>
        // Redirect after 10 seconds
        setTimeout(function() {
            window.location.href = 'login.php'; // Redirect to login page
        }, 10000); // 10 seconds
    </script>
    
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="fonts/icomoon/style.css">

    <link rel="stylesheet" href="../../src/css/owl.carousel.min.css">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="../../src/css/bootstrap.min.css">
    
    <!-- Style -->
    <link rel="stylesheet" href="../../src/css/login.css">

</head>
<body>
<div class="half">
    <div class="bg order-1 order-md-2" style="background-image: url('../../images/registerationSuccess.jpg'); background-position: center;"></div>
    <div class="contents order-2 order-md-1">

      <div class="container">
        <div class="row align-items-center justify-content-center">
            
          <div class="col-md-6">
            <div class="form-block text-center"> <!-- Add text-center class here -->
              <div class="text-center mb-5">
              <script src="https://unpkg.com/@dotlottie/player-component@2.7.12/dist/dotlottie-player.mjs" type="module"></script>
              <dotlottie-player src="https://lottie.host/8579b1cc-7d08-4078-b0f5-544b7eb051f3/Fxv4OpNlSq.lottie" background="transparent" speed="0.9" style="width: 300px; height: 300px; margin: 0 auto;" autoplay></dotlottie-player> <!-- Add margin: 0 auto; to center the player -->
              <h3><strong>Registration Successful!</strong></h3>
              <p>Thank you for registering. You will be redirected to the login page shortly.</p>
              </div>

              <a href="login.php" class="btn btn-block btn-danger" role="button" id='button_link'>Go to Login</a>
              
              

        
            </div>
          </div>
        </div>
      </div>
    </div>

    
  </div>
    
    

    <script src="js/jquery-3.3.1.min.js"></script>
    <script src="js/popper.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/main.js"></script>

</body>
</html>
