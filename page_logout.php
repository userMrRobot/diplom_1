<?php
session_start();
session_destroy();
require "function.php";
redirect_to('users.php');




?>