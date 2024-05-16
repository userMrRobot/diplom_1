<?php 
session_start();
require_once  'function.php';

$user_email = $_POST['email'];
$user_password = $_POST['password'];

$result = login_user($user_email,$user_password);


?>