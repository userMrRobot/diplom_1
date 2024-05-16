<?php
session_start();

function dump($data){

    echo '<pre>'. print_r($data, 1) .'</pre>';
    
    }
function get_user_by_email($user_email){
    $pdo = new PDO("mysql:host=localhost;dbname=diplom_1", 'root','');
    $sql = "SELECT * FROM reg_user WHERE email=:email";
    $stmt = $pdo->prepare($sql);
    $stmt->execute(['email'=> $user_email]);
    $user = $stmt->fetch(PDO::FETCH_ASSOC);
    // return $user["id"];
    return $user['id'];
}
// функция регистрации меил и пароль  в БД
function add_user($user_email, $user_password){
    // проверяем не занято мыло
    $busy_email = get_user_by_email($user_email);
    if (isset($busy_email)){
        $_SESSION['danger'] = 'данный логин уже занят, введите другой';
        redirect_to('create_user.php');
    }
    // тут мы записываем данные в таб reg_user для регистрации и послед входа
    $pdo = new PDO("mysql:host=localhost;dbname=diplom_1", 'root','');
    $sql = "INSERT INTO reg_user(email,password) VALUES(:email,:password)";
    $stmt = $pdo->prepare($sql);
    $stmt->execute(['email'=>$user_email, 'password'=>password_hash($user_password, PASSWORD_DEFAULT)]);
// тут мы записываем мыло чтобы вывести его в карточке пользователя
    // $sql = "INSERT INTO users_1(email) VALUES(:email)";
    // $stmt = $pdo->prepare($sql);
    // $stmt->execute(['email'=>$user_email]);
// тут мы получаем ид пользователя чтобы его вернуть из ф-и
    $sql = "SELECT * FROM reg_user WHERE email=:email";
    $stmt = $pdo->prepare($sql);
    $stmt->execute(['email'=> $user_email]);
    $user = $stmt->fetch(PDO::FETCH_ASSOC);
    return $user["id"];
   
    // вернет id пользователя
}

function add_user_in_infAll($id, $email){
    $pdo = new PDO("mysql:host=localhost;dbname=diplom_1", 'root','');

    $sql = "SELECT * FROM users_1 WHERE id=:id";
    $stmt = $pdo->prepare($sql);
    $stmt->execute(['id'=> $id]);
    $user_id_result = $stmt->fetch(PDO::FETCH_ASSOC);

    if (!empty($user_id_result)){
        // тут мы обновляем запись в таблице  users_1 для вывода мыла в карточке товара
        $sql = "UPDATE users_1 SET email = :email WHERE users_1 . id = :id";
        $stmt = $pdo->prepare($sql);
        $stmt->execute(['id' => $id, 'email'=> $email]);
        // echo "мы обновили запись";
        exit;

    }
    
        // тут мы создаем карточку товара для зарегестрированного нового пользователя с формы Регистрация (не добавить пользователя)

        $sql = "INSERT INTO users_1 (id, username, job_title, status, image, phone, address, email, vk, tg, inst) VALUES (:id, 'noname', 'zavod', 'online', 'img/demo/avatars/avatar-m.png', '11111111', '', :email, NULL, NULL, NULL)";
        $stmt = $pdo->prepare($sql);
        $stmt->execute(['id' => $id, 'email'=> $email]);
        // echo "мы добавили запись во вторую таблицу";
    
}
//изменение инфы о пользователе
function user_inform_create($id, $name, $job, $number, $adress){
    $pdo = new PDO("mysql:host=localhost;dbname=diplom_1", 'root','');
    $sql = "SELECT * FROM users_1 WHERE id = :id";
    $stmt = $pdo->prepare($sql);
    $stmt->execute(['id' => $id]);
    $input_user = $stmt->fetch(PDO::FETCH_ASSOC);
    
    if(empty($input_user['id'])){
        echo "пользователя с айди $input_user нет,создадим";
        $sql = "INSERT INTO users_1(username, job_title,status,image, phone, address, id,email) VALUE(:username,:job_title,'','',:phone,:address,:id,'')";
        $stmt = $pdo->prepare($sql);
        $stmt->execute(['username' =>$name ,'job_title' => $job,'phone' =>$number ,'address' =>$adress ,'id' => $id]);
        // echo "Запись добавлена";
    }
    else{
        $sql = "UPDATE users_1 SET username = :username, job_title = :job_title , phone = :phone, address = :address WHERE users_1 . id = :id";
        $stmt = $pdo->prepare($sql);
        $stmt->execute(['username' =>$name ,'job_title' => $job,'phone' =>$number ,'address' =>$adress ,'id' => $id]);
        // echo "данные успешно обновлены";
    }

}

// фун-я используется при добавление нового пользователя
function user_inform_update($id, $name, $job, $number, $adress, $email){
    $pdo = new PDO("mysql:host=localhost;dbname=diplom_1", 'root','');
    $sql = "SELECT * FROM users_1 WHERE id = :id";
    $stmt = $pdo->prepare($sql);
    $stmt->execute(['id' => $id]);
    $input_user = $stmt->fetch(PDO::FETCH_ASSOC);
    
    if(empty($input_user['id'])){
        // echo "пользователя с айди $input_user нет,создадим";
        $sql = "INSERT INTO users_1(username, job_title,status,image, phone, address, id,email) VALUE(:username,:job_title,'','',:phone,:address, :id, :email)";
        $stmt = $pdo->prepare($sql);
        $stmt->execute(['username' =>$name ,'job_title' => $job,'phone' =>$number ,'address' =>$adress ,'id' => $id,':email' => $email]);
        // echo "Запись добавлена";
    }
    else{
        $sql = "UPDATE users_1 SET username = :username, job_title = :job_title , phone = :phone, address = :address, email = :email WHERE users_1 . id = :id";
        $stmt = $pdo->prepare($sql);
        $stmt->execute(['username' =>$name ,'job_title' => $job,'phone' =>$number ,'address' =>$adress ,'id' => $id,':email' => $email]);
        // echo "данные успешно обновлены";
    }

}
// изменение статуса
// ф-я берет айди, если такой есть, находит у него поле статус и изменяет его, ничего не возвращает
function set_user_status($status, $id){
    $pdo = new PDO("mysql:host=localhost;dbname=diplom_1",'root','');
    $sql = "SELECT * FROM users_1 WHERE id=:id";
    $stmt=$pdo->prepare($sql);
    $stmt->execute(['id'=>$id]);
    $result = $stmt->fetch(PDO::FETCH_ASSOC);

    if (empty($result)){
        echo "такого айди нет";
    }
    else{
        $sql = "UPDATE users_1 SET status = :status WHERE users_1 . id = :id";
        $stmt = $pdo->prepare($sql);
        $stmt->execute(['status' => $status, 'id' => $id]);
        
    }
   
}

// фун-я добавления аватарки пользователю по id
function add_image($image, $id){
    $result = pathinfo($image["name"]);
    $file_img_name = uniqid() . "." .$result["extension"];
    $file_img_path = "img/demo/avatars/".$file_img_name;
    move_uploaded_file($image["tmp_name"], 'img/demo/avatars/'.$file_img_name);
    $pdo = new PDO("mysql:host=localhost;dbname=diplom_1",'root','');
    $sql = "UPDATE users_1 SET image = :image WHERE users_1 . id = :id;";
    $stmt = $pdo->prepare($sql);
    $stmt -> execute(['image'=> $file_img_path, 'id'=>$id]);
    // echo "foto norm";
    
}
// фун-я принимает ссылку на соц сети и id и записывает в таблицу users_1
function add_link_user($vk,$tg,$inst,$id){
    $pdo = new PDO("mysql:host=localhost;dbname=diplom_1",'root','');
    $sql = "UPDATE users_1 SET 	vk= :vk, tg = :tg, inst = :inst WHERE users_1 . id = :id";
    $stmt = $pdo ->prepare($sql);
    $stmt->execute(['vk'=>$vk ,'tg'=> $tg,'inst'=> $inst,'id'=> $id]);
    // echo "link upp";

}
// фун-я авторизации порльзователя
function login_user($user_email, $user_password){
// проверка на наличие такого емаил
    $pdo = new PDO("mysql:host=localhost;dbname=diplom_1", 'root','');
    $sql = "SELECT * FROM reg_user WHERE email=:email";
    $stmt = $pdo->prepare($sql);
    $stmt->execute(['email'=> $user_email]);
    $user = $stmt->fetch(PDO::FETCH_ASSOC);

    if (empty($user)){
        set_flash_message('danger', "Логин не верный");
        redirect_to("page_login.php");
        
        return false;
        
}

if (!password_verify($user_password , $user['password'])){
    set_flash_message('danger', "Пароль не верный");
    redirect_to("page_login.php");
    return FALSE;
    
}

$_SESSION['user'] = ['id' => $user["id"],'email'=>$user["email"], 'user_role' => $user["user_role"]];
redirect_to("users.php");
return true;
}



// ф-я записи сообщения в сессию
function set_flash_message($name, $message){
    $_SESSION[$name] = $message;
    // подготовить флеш сообщение через иф записывает в сессию
}

// вывод сообщения в пуш уведомление
function display_flash_message($name){
    // вывести флеш сообщение 
    if(isset($_SESSION[$name])){
        echo "<div class=\"alert alert-{$name} text-dark\" role=\"alert\">{$_SESSION[$name]}</div>";
        unset($_SESSION[$name]);
    }
}


// ф-я перенаправления на страницу
function redirect_to($path){

    header("location: $path");
    exit;
}
// ф-я проверки авторизованый пользователь
function is_logged_in(){
    if (isset($_SESSION["user"]["id"])){
        return true;
    }
    else{
        return false;
    }
}
// ф-я проверки не авторизованный пользователь
function is_not_logged_in(){
if (!empty($_SESSION["user"]["id"])){
    return false;
}
else{
    return true;
}
}
// функ-я проверки авторизованный пользователь или нет текущий юзер
function get_enter_user(){
    if(is_logged_in()){
        return $_SESSION["user"];
    }
    else{
        return false;
    }
}

function get_status($status){
    if ($status == "online"){
        echo "success";
} elseif($status == "busy"){
    echo "secondary";
}
else{
    echo "danger";
}

}
// ф-я сравнения ид того кто зашел и ид в базе данных
function is_equal($user, $enter_user){
    return $user["id"] === $enter_user["id"];
}
// ф-я проверки админ ли пользователь
function is_admin($array){
    if ($array["user_role"] === "admin"){
        return true;
    }
    else{
        return false;
    }
}
// ф-я получения и вывод инфы для польз-ей с последующим выводом их в карточке
function get_users(){
$pdo = new PDO("mysql:host=localhost;dbname=diplom_1", 'root','');
$sql = "SELECT * FROM users_1";
$stmt = $pdo->prepare($sql);
$stmt->execute();
$users_db = $stmt->fetchAll(PDO::FETCH_ASSOC);
return $users_db;


}
// фун-я проверки залогиненый юзер и юзер для редактирования один и тот жеили нет
// id того кто залогинился из масива сессии и   id того человека которого будем менять
// ? хз чо с ней делать..
function is_author($loged_user_id, $edit_user_id){
    if($loged_user_id === $edit_user_id){
        return true;
    }
    else{
        return false;
    }
}

// фун-я находит пользователя по ид
function get_user_by_id($id){
    $pdo = new PDO("mysql:host=localhost;dbname=diplom_1", 'root', '');
    $sql = "SELECT * FROM users_1 WHERE id = :id";
    $stmt = $pdo->prepare($sql);
    $stmt->execute(['id' => $id]);
    $user_info = $stmt->fetchAll(PDO::FETCH_ASSOC);
    return $user_info;

}

function get_user_by_id_email($id){
    $pdo = new PDO("mysql:host=localhost;dbname=diplom_1", 'root', '');
    $sql = "SELECT * FROM reg_user WHERE id = :id";
    $stmt = $pdo->prepare($sql);
    $stmt->execute(['id' => $id]);
    $user_info = $stmt->fetchAll(PDO::FETCH_ASSOC);
    return $user_info;
}

function edit_credentials($user_id, $email, $password){

    $result_id = get_user_by_email($email);
    if(!empty($result_id)){
        set_flash_message('danger','этот email уже занят введите другой');
        redirect_to('security.php');
    }

    $pdo = new PDO("mysql:host=localhost;dbname=diplom_1", 'root','');
    // изменяем в первой таблице
    $sql = "UPDATE reg_user SET email = :email ,password = :password WHERE reg_user . id = :id";
    // UPDATE `reg_user` SET `email` = 'valera@ya.ri' WHERE `reg_user`.`id` = 1
    $stmt = $pdo->prepare($sql);
    $stmt->execute(['email'=>$email, 'password'=>password_hash($password, PASSWORD_DEFAULT), 'id' => $user_id]);
    // изменяем мыло во второй таблице
    $sql = "UPDATE users_1 SET email = :email WHERE users_1 . id = :id";
    $stmt = $pdo->prepare($sql);
    $stmt->execute(['email'=>$email, 'id' => $user_id]);


    
}

function set_status($id, $status){

    $pdo = new PDO("mysql:host=localhost;dbname=diplom_1", 'root', '');
    $sql = "UPDATE users_1 SET status = :status WHERE users_1 . id = :id";
    $stmt = $pdo->prepare($sql);
    $stmt -> execute(['id' => $id, 'status' => $status]);
    // echo "статус изменен";
}

function has_image($user_id, $image){
    exit;
}

function upload_avatar($user_id, $image){
    exit;
}

function delete_user_info($user_id){

    $pdo = new PDO("mysql:host=localhost;dbname=diplom_1", 'root','');
    $sql = "DELETE FROM users_1 WHERE users_1 . id = :id";
    $stmt = $pdo->prepare($sql);
    $stmt->execute(['id' => $user_id]);

    $sql = "DELETE FROM reg_user WHERE reg_user . id = :id";
    $stmt = $pdo->prepare($sql);
    $stmt->execute(['id' => $user_id]);
    

}
function delete_user_email($user_id){

    $pdo = new PDO("mysql:host=localhost;dbname=diplom_1", 'root','');
    $sql = "DELETE FROM reg_user WHERE reg_user . id = :id";
    $stmt = $pdo->prepare($sql);
    $stmt->execute(['id' => $user_id]);
    

}

?>