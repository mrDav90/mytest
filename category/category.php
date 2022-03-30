<?php 
    include_once('../library/library.php');
    header('Access-Control-Allow-Origin: *'); 
    header('Access-Control-Allow-Methods: GET , POST , PUT , DELETE'); 

    $conn = connectDB();
    $method = $_SERVER['REQUEST_METHOD'];
    
    switch ($method) {
        case 'GET':
                $req = "SELECT * FROM category";
                $res = $conn -> query($req) ;
                $row = $res -> fetchAll(PDO::FETCH_OBJ);
                echo json_encode($row);
                
            break;

        case 'POST':

                if(isset($_POST['categoryName']) && isset($_FILES['categoryPicture']) )
                {
                    $categoryName = $_POST['categoryName'] ;
                    $categoryPicture = $_FILES["categoryPicture"]["name"][0];
                    $tmpCategoryPicture = $_FILES["categoryPicture"]["tmp_name"][0];

                    $root = "../assets/";

                    $upload = move_uploaded_file($tmpCategoryPicture , $root.$categoryPicture);
                    if($upload)
                    {
                       $res = addCategory($categoryName , $categoryPicture);
                       if($res)
                       {
                           echo "succes";
                       }
                       else
                       {
                           echo "echec ";
                       }
                    }

                }

            break;
        

        case 'PUT':
 
            break;


        case 'DELETE':
            if (isset($_GET["categoryId"])) {
                $categoryId = $_GET["categoryId"];
                $exec =  deleteCategory($categoryId);
                if($exec)
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