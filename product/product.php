<?php 
    include_once('../library/library.php');
    header('Access-Control-Allow-Origin: *'); 
    header('Access-Control-Allow-Methods: GET , POST , PUT , DELETE'); 

    $conn = connectDB();
    $method = $_SERVER['REQUEST_METHOD'];
    
    switch ($method) {
        case 'GET':
               

                if(isset($_GET['categoryId']))
                {
                    $categoryId = $_GET["categoryId"];
                    $req = "SELECT * FROM product where categoryId = $categoryId ";
                    $res = $conn -> query($req) ;
                    $row = $res -> fetchAll(PDO::FETCH_OBJ);
                    echo json_encode($row);

                }
                else
                {
                    $req = "SELECT * FROM product";
                    $res = $conn -> query($req) ;
                    $row = $res -> fetchAll(PDO::FETCH_OBJ);
                    echo json_encode($row);
                }
            break;

        case 'POST':

                if(isset($_POST['productName']) && isset($_FILES["productPicture"]))
                {
                    $productName = $_POST['productName'] ;
                    $productPrice = $_POST['productPrice'] ;
                    $productDescription = $_POST['productDescription'] ;
                    $productPicture = $_FILES['productPicture']['name'][0] ;
                    $tmpProductPicture = $_FILES['productPicture']['tmp_name'][0];
                    $categoryName = $_POST["productCategory"];
                    $categoryId = getCategoryId($categoryName)  ;

                    $root = '../assets/';
                    $upload = move_uploaded_file($tmpProductPicture , $root.$productPicture);
                    if($upload)
                    {
                        $exec = addProduct($productName , $productPrice , $productDescription  , $productPicture , $categoryId);
                        if($exec)
                        {
                            echo "succes";
                        }
                        else
                        {
                            echo "echec";
                        }
                    }



                }
            break;
        

        case 'PUT':

            break;


        case 'DELETE':
            if (isset($_GET["productId"])) {
                $productId = $_GET["productId"];
                $exec =  deleteProduct($productId);
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