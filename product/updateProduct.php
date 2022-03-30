<?php 

    include_once('../library/library.php');
    header('Access-Control-Allow-Origin: *'); 
    header('Access-Control-Allow-Methods: GET , POST , PUT , DELETE'); 

    $conn = connectDB();

    if(isset($_POST['productId']) && isset($_FILES["productPicture"]))
    {
        $productId = $_POST['productId'] ;
        $productName = $_POST['productName'] ;
        $productPrice = $_POST['productPrice'] ;
        $productDescription = $_POST['productDescription'] ;
        $productPicture = $_FILES['productPicture']['name'][0] ;
        $tmpProductPicture = $_FILES['productPicture']['tmp_name'][0];
        $categoryName = $_POST["productCategory"];
        $categoryId = getCategoryId($categoryName) ;
        

        $root = '../assets/';
        $upload = move_uploaded_file($tmpProductPicture , $root.$productPicture);
        if($upload)
        {
            $exec = updateProduct($productId , $productName , $productPrice , $productDescription  , $productPicture , $categoryId );
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
?>