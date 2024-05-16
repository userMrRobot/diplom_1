<?php 
session_start();
require "function.php";

$username = $_POST["name"];
$user_job = $_POST["job_title"];
$user_number = $_POST["phone"];
$user_adrres = $_POST["address"];
$user_email = $_POST["email"];
$user_password = $_POST["password"];
$user_status = $_POST['status'];
$user_avatar = $_FILES['image'];
$user_link_vk = $_POST['vk'];
$user_link_telegram = $_POST['tg'];
$user_link_instagram = $_POST['inst'];

// $user_id = get_user_by_email($user_email);
// var_dump($user_id);

// if (isset($user_id)){
//     $_SESSION['danger'] = 'данный логин уже занят, введите другой';
//     redirect_to('create_user.php');
// }
// регестрируем пользователя и добавляем данные в 1ю таблицу возвращаем id
// айди нашего пользователя
$user_new_id = add_user($user_email, $user_password);
// $user_new_id = 2;
// var_dump($user_new_id);
// добавляем инфу о пользователе во вторую таблицу
user_inform_update($user_new_id, $username, $user_job, $user_number, $user_adrres,$user_email);
// добавляем инфу о статусе в 2таблицу
set_user_status($user_status,$user_new_id );
add_image($user_avatar,$user_new_id);
add_link_user($user_link_vk,$user_link_telegram,$user_link_instagram,$user_new_id);

set_flash_message('success','запись успешно добавлена');
redirect_to('users.php');


?>