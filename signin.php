<?php
session_start();
$error_message = '';

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = trim($_POST['username']);
    $password = trim($_POST['password']);

    // Hardcoded admin credentials
    $correct_username = 'ecosphereadmin1';
    $correct_password = '091234578';

    // Check if the provided username and password match the hardcoded credentials
    if ($username === $correct_username && $password === $correct_password) {
        $_SESSION['admin'] = $username; // Store the admin username in session
        
        // Clear output buffer and prevent any accidental output
        ob_start();

        // Redirect to admin dashboard
        header("Location: admin_dashboard.php");
        exit(); 
    } else {
        $error_message = "Invalid username or password.";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Admin Log In | EcoSphere</title>
  <link rel="stylesheet" href="css_folder/signin.css">
</head>
<body>
  <nav class="navbar">
    <a href="landing_page.php">Back to Landing Page</a>
    <span class="navbar-brand">Admin Login Page</span>
  </nav>

  <div class="container">
    <form id="loginForm" method="POST">
      <label for="username" class="form-label">Admin Username</label>
      <input type="text" id="username" name="username" class="form-control" enable>
      
      <label for="password" class="form-label">Password</label>
      <input type="password" id="password" name="password" class="form-control" required>
    

      <div style="margin-bottom: 15px;">
        <a href="forgot_password.php">Forgot your password?</a>
      </div>

      <button type="submit" class="btn-primary">Login</button>

      <?php if (!empty($error_message)): ?>
          <div class="error-text"><?php echo $error_message; ?></div>
      <?php endif; ?>
    </form>
  </div>

  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <script src="https://cdn.jsdelivr.net/jquery.validation/1.19.3/jquery.validate.min.js"></script>
  <script>
    $(document).ready(function(){
        $.validator.addMethod("validPassword", function(value, element) {
            return this.optional(element) || /^(?=.*[A-Za-z])(?=.*\d)[A-Za-z\d]{8,20}$/.test(value);
        }, "Password must be 8-20 characters long, contain letters and numbers.");

        $("#loginForm").validate({
            rules: {
                username: {
                    required: true
                },
                password: {
                    required: true,
                    validPassword: true
                }
            },
            messages: {
                username: {
                    required: "Admin username is required"
                },
                password: {
                    required: "Password is required"
                }
            }
        });
    });
  </script>
</body>
</html>
