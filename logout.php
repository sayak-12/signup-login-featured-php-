<?php
include 'connect.php';
// Delete the remember_token cookie by setting it to expire in the past
if (isset($_COOKIE['remember_token'])) {
    setcookie('remember_token', '', time() - 3600, '/');
}

session_start();
session_destroy();
?>
<script>
    alert("Logged out successfully");
    location.replace("login.php");
</script>
<?php


?>