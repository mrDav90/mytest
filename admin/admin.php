<?php 
    include_once('../library/library.php');
    header('Access-Control-Allow-Origin: *'); 

    if (isset($_POST["username"])) {
        $username = $_POST["username"];
        $password = $_POST["password"];

        $exec = Connexion($username , $password);

        if($exec)
        {
            echo "succes";
        }
        else
        {
            echo "failure";
        }
    }
?>