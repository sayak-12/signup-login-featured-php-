<?php
include 'connect.php';

?>
<!DOCTYPE html>
<html>

<head>
  <?php include 'dependancies.php' ?>
  <title>Log in to your account</title>
</head>

<body>

  <div class="container">
    <h2>Reset your password</h2>
    <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="post">
        <div class="alert alert-success alert-dismissible fade show" role="alert">
          A password reset email will be sent to your account. <br>
          <b>Enter your email to proceed.</b>
          <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>

      <div class="form-group">
        <label for="Email1">Email address</label>
        <input required type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp"
          name="email">
      </div>
      <button type="submit" class="btn btn-primary w-100" name="login">Send Email</button>
    </form><br>
    
    <span>Don't have an account? <a href="signup.php" style="color: white; font-weight: bold;">Sign up here</a></span>
    <?php
    if (isset($_POST['login'])) {
      $email = $_POST['email'];

      $loginquery = "SELECT * FROM `userdtls` WHERE email='$email'";
      $result = mysqli_query($con, $loginquery);
      $emailcount = mysqli_num_rows($result);
    
      if ($emailcount) {
        $resultarr = mysqli_fetch_array($result);
        $token=$resultarr['token'];
        ?>
                <script>
                    alert("Successfully sent mail, please check");
                    Email.send({
                        SecureToken: "59dc9d11-b50d-4d3c-aceb-9a296209b1ff",
                        To: '<?php echo $email; ?>',
                        From: "sayakraha12@gmail.com",
                        Subject: "Password Reset Link",
                        Body: "<?php echo "Hi, Good day! Here is your Password reset link: " . "http://localhost/mydocs/signup-login-featured-php-/reset.php?token=$token"; ?>"
                    }).then(function (message) {
                        alert(message);
                        window.location.href = 'login.php?inemail=<?php echo $email; ?>';
                    });
                </script>

                <?php
      } else {
        ?>
        <script>
          alert("Email not registered");
        </script>
        <?php
      }

    }

    ?>
  </div>
</body>

</html>