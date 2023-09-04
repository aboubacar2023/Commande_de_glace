<?php
session_start();
unset($_SESSION['connecte']);
header('location: log.php');
?>