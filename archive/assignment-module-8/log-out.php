<?php
session_start();
unset($_SESSION['first_name']);
session_unset();
header('Location: index.php');
exit;