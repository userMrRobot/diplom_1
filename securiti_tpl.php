<?php 
session_start();
require "function.php";

$user_id = $_SESSION['id_create'];
$user_email = $_POST['email'];
$user_password = $_POST['password'];
// $user_password_repeat = $POST['password_repeat'];

// dump($_SESSION['email_edit']);
// проеврка на меил наш это меил или нет и  есть ли такой или нет
if($user_email == $_SESSION['email_edit']){
    set_flash_message('danger','этот email уже у нас введите другой');
    redirect_to('security.php');
}

edit_credentials($user_id, $user_email, $user_password);

// после чего мы перезаписываем меил и пароль в таблицу регистрации

set_flash_message('success','Данные успешно обновлены');
redirect_to('page_profile.php');

?>