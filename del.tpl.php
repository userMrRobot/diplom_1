<?php 
session_start();
require "function.php";

echo "мы тут";
if (!empty($_GET['id'])){
    $user_del_id = $_GET['id'];
    
}
dump($user_del_id);
$my_login_id = $_SESSION['user']['id'];

if ($user_del_id === $my_login_id){
    
    delete_user_info($user_del_id);
    delete_user_email($user_del_id);
    unset($_SESSION['user']);
    set_flash_message('success','Профиль успешно удален');
    redirect_to('page_login.php');
}

delete_user_info($user_del_id);
delete_user_email($user_del_id);
set_flash_message('success','Профиль успешно удален');
redirect_to('users.php');


// $user_inf = (get_user_by_id($_SESSION['id_create'])) ;
// dump($user_inf);



?>