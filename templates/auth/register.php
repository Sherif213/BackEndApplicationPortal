<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400&display=swap" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

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
    <div class="bg order-1 order-md-2" style="background-image: url('../../images/register.jpg'); background-position: center;"></div>
    <div class="contents order-2 order-md-1">

      <div class="container">
        <div class="row align-items-center justify-content-center">
          <div class="col-md-6">
            <div class="form-block">
              <div class="text-center mb-5">
              <h3>Register to <strong>UNESCO IAU</strong></h3>
              
              </div>
              <form action="submit_registeration.php" method="post">
                <div class="form-group first">
                  <label for="username">Username</label>
                  <input type="text" class="form-control" placeholder="ExpiredOnion_Tar" id="username" name ="username">
                  <span id="username-error" style="color: red; display: none;"></span>
                </div>
                <div class="twoSection">
                    <div class="twoSectionSector">
                        <label for="FirstName">First Name</label>
                        <input type="text" class="form-control" placeholder="john" id="first_name" name="first_name">
                        <span id="first-name-error" style="color: red; display: none;"></span>
                    </div>
                    <div class="twoSectionSector">
                        <label for="LastName">Last Name</label>
                        <input type="text" class="form-control" placeholder="Doe" id="last_name" name="last_name">
                        <span id="last-name-error" style="color: red; display: none;"></span>
                    </div>
                </div>
                
                <div class="form-group first">
                  <label for="email">Email</label>
                  <input type="email" class="form-control" placeholder="example@example.ex" id="email" name = "email">
                  <span id="email-error" style="color: red; display: none;"></span>
                </div>
                <div class="form-group last mb-3">
                  <label for="password">Password</label>
                  <input type="password" class="form-control" placeholder="Your Password" id="password" name="password">
                  <span id="password-error" style="color: red; display: none;"></span>
                </div>
                
                <div class="d-sm-flex mb-5 align-items-center">
                  <label class="control control--checkbox mb-3 mb-sm-0"><span class="caption">Remember me</span>
                    <input type="checkbox" checked="checked"/>
                    <div class="control__indicator"></div>
                  </label>
                  <span class="ml-auto"><a href="forget_password.php" class="forgot-pass">Forgot Password</a></span> 
                </div>

                <input type="submit" value="Sign up" class="btn btn-block btn-primary">
                <a href="login.php" class="btn btn-block btn-danger" role="button" id='button_link'>Login</a>

              </form>
            </div>
          </div>
        </div>
      </div>
    </div>

    
  </div>
  <script>
        $(document).ready(function() {
        // Regex patterns
        var emailRegex = /^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/;
        var usernameRegex = /^[a-zA-Z0-9_]{5,15}$/;  // 5 to 15 characters, letters, numbers, and underscores
        var passwordRegex = /^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]{8,}$/; // At least 8 chars, 1 upper, 1 lower, 1 number, 1 special char
        var nameRegex = /^[A-Za-z]+$/;

        // Real-time email validation
        $('#email').on('input', function() {
            var email = $(this).val();
            if (!emailRegex.test(email)) {
                $('#email-error').text('Please enter a valid email address.').show();
            } else {
                $('#email-error').hide();
                // Check if email already exists via AJAX
                $.ajax({
                    url: 'info_validation.php',
                    type: 'POST',
                    data: { email: email },
                    success: function(response) {
                        var result = JSON.parse(response);
                        if (result.status === 'error') {
                            $('#email-error').text(result.message).show();
                        } else {
                            $('#email-error').text(result.message).hide();
                        }
                    },
                    error: function() {
                        $('#email-error').text('An error occurred.').show();
                    }
                });
            }
        });

        // Real-time username validation
        $('#username').on('input', function() {
            var username = $(this).val();
            if (!usernameRegex.test(username)) {
                $('#username-error').text('Username must be 5-15 characters and can only contain letters, numbers, and underscores.').show();
            } else {
                $('#username-error').hide();
                // Check if username already exists via AJAX
                $.ajax({
                    url: 'info_validation.php',
                    type: 'POST',
                    data: { username: username },
                    success: function(response) {
                        var result = JSON.parse(response);
                        if (result.status === 'error') {
                            $('#username-error').text(result.message).show();
                        } else {
                            $('#username-error').text(result.message).hide();
                        }
                    },
                    error: function() {
                        $('#username-error').text('An error occurred.').show();
                    }
                });
            }
        });

        // Real-time password validation
        $('#password').on('input', function() {
            var password = $(this).val();
            if (!passwordRegex.test(password)) {
                $('#password-error').text('Password must be at least 8 characters long, with at least one uppercase letter, one number, and one special character.').show();
            } else {
                $('#password-error').hide();
            }
        });

        $('#first_name').on('input', function() {
            var firstName = $(this).val();
            if (!nameRegex.test(firstName)) {
                $('#first-name-error').text('Only Letters Allowed.').show();
            } else {
                $('#first-name-error').hide();
            }
        });

        // Real-time last name validation
        $('#last_name').on('input', function() {
            var lastName = $(this).val();
            if (!nameRegex.test(lastName)) {
                $('#last-name-error').text('Only Letters Allowed.').show();
            } else {
                $('#last-name-error').hide();
            }
        });
    });
    </script>
    

    <script src="js/jquery-3.3.1.min.js"></script>
    <script src="js/popper.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/main.js"></script>
  </body>
</html>