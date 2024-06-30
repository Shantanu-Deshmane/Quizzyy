<?php
session_start();
session_unset();
session_destroy();
header("Location: home.php"); // Redirect to the homepage after logging out
exit();
?>
