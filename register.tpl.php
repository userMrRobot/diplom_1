<?php 

session_start();
require_once 'function.php';

$user_email = $_POST['emailverify'];
$user_password = $_POST['userpassword'];

// $pdo = new PDO("mysql:host=localhost;dbname=diplom_1", 'root','');
// $sql = "SELECT * FROM users WHERE email=:email";
// $stmt = $pdo->prepare($sql);
// $stmt->execute(['email'=> $user_email]);
// $user = $stmt->fetch(PDO::FETCH_ASSOC);
$user_id = get_user_by_email($user_email);

if (!empty($user_id)){
    // echo "Пользователь стаким мейлом уже есть";
    set_flash_message('danger', "Этот эл. адрес уже занят другим пользователем.");
    redirect_to('page_register.php');
    
    exit;
}



$user_id = add_user($user_email, $user_password);

add_user_in_infAll($user_id, $user_email);

set_flash_message('success','запись успешно добавлена');

redirect_to('page_login.php');








?>