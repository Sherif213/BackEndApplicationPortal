<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="fonts/icomoon/style.css">

    <link rel="stylesheet" href="../../src/css/owl.carousel.min.css">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="../../src/css/bootstrap.min.css">
    
    <!-- Style -->
    <link rel="stylesheet" href="../../src/css/login.css">

    <title>UNESCO APPLICATION PORTAL</title>
  </head>
  <body>
  

  <div class="half">
    <div class="bg order-1 order-md-2" style="background-image: url('../../images/loginPage.jpg'); background-position: center;"></div>
    <div class="contents order-2 order-md-1">

      <div class="container">
        <div class="row align-items-center justify-content-center">
          <div class="col-md-6">
            <div class="form-block">
              <div class="text-center mb-5">
              <h3>Restore <strong>Password</strong></h3>
              <!-- <p class="mb-4">Lorem ipsum dolor sit amet elit. Sapiente sit aut eos consectetur adipisicing.</p> -->
              </div>
              <form action="send_code.php" method="post">
                <div class="form-group first">
                  <label for="email">Email</label>
                  <input type="email" class="form-control" placeholder="your-email@gmail.com" id="forgotten_email" name="forgotten_email">
                </div>
                
                <div class="d-sm-flex mb-5 align-items-center">
                  
                  <span class="ml-auto"><a href="login.php" class="forgot-pass">Already have an account?</a></span> 
                </div>

                <input type="submit" value="Send Code" class="btn btn-block btn-primary">
                <a href="register.php" class="btn btn-block btn-danger" role="button" id='button_link'>Register</a>

              </form>
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