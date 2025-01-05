<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400&display=swap" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <link rel="stylesheet" href="fonts/icomoon/style.css">
    <link rel="stylesheet" href="../../src/css/owl.carousel.min.css">
    <link rel="stylesheet" href="../../src/css/bootstrap.min.css">
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
                <form id="registration-form" action="submit_registeration.php" method="post">
                  <div class="form-group first">
                    <label for="username">Username</label>
                    <input type="text" class="form-control" placeholder="ExpiredOnion_Tar" id="username" name="username">
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
                    <input type="email" class="form-control" placeholder="example@example.ex" id="email" name="email">
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
                  <div id="form-error-message" class="alert alert-danger" style="display: none;">
                    Please correct the errors before submitting.
                  </div>
                  <input type="submit" value="Sign up" class="btn btn-block btn-primary">
                  <a href="login.php" class="btn btn-block btn-danger" role="button" id="button_link">Login</a>
                </form>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

    <script>
      $(document).ready(function() {

        // Highlight invalid fields
        function highlightInvalidField(id) {
          $(id).addClass('invalid-field');
        }

        // Remove highlight from valid fields
        function removeHighlight(id) {
          $(id).removeClass('invalid-field');
        }

        // Regex patterns
        var emailRegex = /^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/;
        var usernameRegex = /^[a-zA-Z0-9_]{5,15}$/; // 5 to 15 characters, letters, numbers, and underscores
        var passwordRegex = /^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]{8,}$/; // At least 8 chars, 1 upper, 1 lower, 1 number, 1 special char
        var nameRegex = /^[A-Za-z]+$/;

        // Real-time email validation with AJAX
        $('#email').on('input', function() {
          var email = $(this).val();
          if (!emailRegex.test(email)) {
            $('#email-error').text('Please enter a valid email address.').show();
            highlightInvalidField('#email');
          } else {
            $('#email-error').hide();
            removeHighlight('#email');
            // Check if email already exists via AJAX
            $.ajax({
              url: 'info_validation.php',
              type: 'POST',
              data: { email: email },
              success: function(response) {
                var result = JSON.parse(response);
                if (result.status === 'error') {
                  $('#email-error').text(result.message).show();
                  highlightInvalidField('#email');
                } else {
                  $('#email-error').text(result.message).hide();
                  removeHighlight('#email');
                }
              },
              error: function() {
                $('#email-error').text('An error occurred.').show();
                highlightInvalidField('#email');
              }
            });
          }
        });

        // Real-time username validation with AJAX
        $('#username').on('input', function() {
          var username = $(this).val();
          if (!usernameRegex.test(username)) {
            $('#username-error').text('Username must be 5-15 characters and can only contain letters, numbers, and underscores.').show();
            highlightInvalidField('#username');
          } else {
            $('#username-error').hide();
            removeHighlight('#username');
            // Check if username already exists via AJAX
            $.ajax({
              url: 'info_validation.php',
              type: 'POST',
              data: { username: username },
              success: function(response) {
                var result = JSON.parse(response);
                if (result.status === 'error') {
                  $('#username-error').text(result.message).show();
                  highlightInvalidField('#username');
                } else {
                  $('#username-error').text(result.message).hide();
                  removeHighlight('#username');
                }
              },
              error: function() {
                $('#username-error').text('An error occurred.').show();
                highlightInvalidField('#username');
              }
            });
          }
        });

        // Real-time password validation
        $('#password').on('input', function() {
          var password = $(this).val();

          if (password === "") {
    $('#password-error').text('Password cannot be empty.').show();
    highlightInvalidField('#password');}
    else if (!passwordRegex.test(password)) {
            $('#password-error').text('Password must be at least 8 characters long, with at least one uppercase letter, one number, and one special character.').show();
            highlightInvalidField('#password');
          } else {
            $('#password-error').hide();
            removeHighlight('#password');
          }
        });

        // Real-time first name validation
        $('#first_name').on('input', function() {
          var firstName = $(this).val();
          if (!nameRegex.test(firstName)) {
            $('#first-name-error').text('Only Letters Allowed.').show();
            highlightInvalidField('#first_name');
          } else {
            $('#first-name-error').hide();
            removeHighlight('#first_name');
          }
        });

        // Real-time last name validation
        $('#last_name').on('input', function() {
          var lastName = $(this).val();
          if (!nameRegex.test(lastName)) {
            $('#last-name-error').text('Only Letters Allowed.').show();
            highlightInvalidField('#last_name');
          } else {
            $('#last-name-error').hide();
            removeHighlight('#last_name');
          }
        });

        // Form submission validation
        $('#registration-form').on('submit', function(event) {
          var isValid = true;

          var email =$('#email').val();
          if(email === ""){
            $('#email-error').text('Email Cannot be empty.').show();
            highlightInvalidField('#email');
            isValid = false;
          }else if (!emailRegex.test($('#email').val())) {
            highlightInvalidField('#email');
            isValid = false;
          }

          var username =$('#username').val();
          if(username === ""){
            $('#username-error').text('Username Cannot be empty.').show();
            highlightInvalidField('#username');
            isValid = false;
          }else if (!usernameRegex.test($('#username').val())) {
            highlightInvalidField('#username');
            isValid = false;
          }else {
          $('#username-error').hide();
          removeHighlight('#password');
        }

          var password = $('#password').val();
          if (password === "") {
          $('#password-error').text('Password cannot be empty.').show();
          highlightInvalidField('#password');
          isValid = false;
        } else if (!passwordRegex.test(password)) {
          $('#password-error').text('Password must be at least 8 characters long, with at least one uppercase letter, one number, and one special character.').show();
          highlightInvalidField('#password');
          isValid = false;
        } else {
          $('#password-error').hide();
          removeHighlight('#password');
        }
          if (!nameRegex.test($('#first_name').val())) {
            highlightInvalidField('#first_name');
            isValid = false;
          }
          if (!nameRegex.test($('#last_name').val())) {
            highlightInvalidField('#last_name');
            isValid = false;
          }

          // Prevent form submission if invalid
          if (!isValid) {
            event.preventDefault();
            $('#form-error-message').show();  // Show the error message
          } else {
            $('#form-error-message').hide();  // Hide the error message
          }
        });
      });
    </script>

    <script src="js/popper.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/main.js"></script>
  </body>
</html>
