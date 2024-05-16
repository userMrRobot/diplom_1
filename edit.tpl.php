<?php 
session_start();
require "function.php";



$username = $_POST["name"];
$user_job = $_POST["job_title"];
$user_number = $_POST["phone"];
$user_adrres = $_POST["address"];
$user_id = $_SESSION['id_edit'];
// var_dump($user_id);




user_inform_create($user_id, $username, $user_job, $user_number, $user_adrres);

set_flash_message('success','профиль успешно обновлен');

redirect_to('page_profile.php');







?>