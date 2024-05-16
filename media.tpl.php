<?php 
session_start();
require "function.php";

$user_avatar = $_FILES['image'];
$user_id = $_SESSION['id_create'];



add_image($user_avatar, $user_id);

set_flash_message('success','фото успешно обновлено');

redirect_to('page_profile.php');






?>