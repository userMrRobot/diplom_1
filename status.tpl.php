<?php 
session_start();
require "function.php";

$user_id = $_SESSION['id_create'];
$status= $_POST['select'];
// dump($_SESSION);
// dump($status);

$user_status = ['online' => 'Онлайн',
                'busy' => 'Не беспокоить',
                'ofline' => 'Отошел'];

foreach ($user_status as $stat){
    if ($status === $stat){
       $key = array_search($stat,$user_status );
       
    }
}

set_status($user_id, $key);
set_flash_message('success','Статус успешно обновлен');
redirect_to('page_profile.php');


?>