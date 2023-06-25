<?php session_start(); 
include 'connect.php';
if (isset($_COOKIE['remember_token'])) {
    $email = $_COOKIE['remember_token'];

    // Retrieve user details from the database using the email
    $loginquery = "SELECT * FROM `userdtls` WHERE email='$email' and state='active'";
    $result = mysqli_query($con, $loginquery);
    $emailcount = mysqli_num_rows($result);

    if ($emailcount) {
      $db = mysqli_fetch_array($result);
      $_SESSION['firstname'] = $db['Full_name'];
    } 
  } else if (!isset($_SESSION['firstname'])) {
    header('location:login.php');
  }
  
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <?php include 'dependancies.php'; ?>
    <title>Your Dashboard</title>
</head>
<body>
    <h1>
        Welcome to our site
    </h1>
    
    <h2>Greetings, <?php echo $_SESSION['firstname']; ?></h2>
    <a href="logout.php"><button type="button">Log Out</button></a>
</body>
</html>