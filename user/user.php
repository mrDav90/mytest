<?php

    include_once('../library/library.php');
    header('Access-Control-Allow-Origin: *');
    header('Access-Control-Allow-Methods: GET , POST , PUT , DELETE'); 
    $conn = connectDB();

    $method = $_SERVER["REQUEST_METHOD"];

    switch ($method) {
        case 'GET':
            
            $req = "SELECT * FROM user";
            $res = $conn -> query($req) ;
            $row = $res -> fetchAll(PDO::FETCH_OBJ);

           echo json_encode($row);

        break;

        case 'POST':
            if (isset($_POST['surname'])) {
                $surname = $_POST['surname'];
                $firstname = $_POST['firstname'];
                $username = $_POST['username'];
                $password = $_POST['password'];

                $req = "INSERT into (surname , firstname , username , password) VALUES ('$surname','$firstname','$username','$password')";

                $res = $conn -> query($req);

                echo json_encode($res);

                if($res)
                {
                    echo "Données bien enregistrées";
                }
                else
                {
                    echo "Erreur d'enreistrement";
                }
            }

        break;

        case 'DELETE':
                $conn = connectDB();
                if (isset($_GET["userId"])) {
                    $userId = $_GET["userId"];
                    $exec = deleteUser($userId);

                    if($exec)
                    {
                        echo "utilisateur retirée";
                    }
                    else
                    {
                        echo "echec de la suppression";
                    }
                }
               
            break;

        case 'PUT':
        # code...
        break;
        
        default:
            # code...
            break;
    }



    
    
    

   // echo $data;

        
    

?>