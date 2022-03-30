<?php

include_once('../library/library.php');
header('Access-Control-Allow-Origin: *'); 
header('Access-Control-Allow-Methods: GET , POST , PUT , DELETE'); 

$method = $_SERVER["REQUEST_METHOD"];

switch ($method) {
    case 'POST':
        if(isset($_POST["password"]))
        {
            $password = $_POST["password"];
            $username = $_POST["username"];

            $res = updatePassword($password , $username);

            if($res)
            {
                echo "succes";
            }
            else
            {
                echo "echec";
            }
        }
        break;
    
    default:
        # code...
        break;
}


?>