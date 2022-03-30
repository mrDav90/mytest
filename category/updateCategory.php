<?php 

    include_once('../library/library.php');
    header('Access-Control-Allow-Origin: *'); 
    header('Access-Control-Allow-Methods: GET , POST , PUT , DELETE'); 

    $conn = connectDB();

    if (isset($_POST['categoryId'])  &&  isset($_FILES['categoryPicture'])) {
        $categoryId = $_POST['categoryId'];
        $categoryName = $_POST['categoryName'];
        $categoryPicture = $_FILES['categoryPicture']['name'][0];
        $tmpCategoryPicture = $_FILES['categoryPicture']['tmp_name'][0];
        $root = '../assets/';
        $upload = move_uploaded_file($tmpCategoryPicture, $root.$categoryPicture );
        if($upload)
        {
            $exec = updateCategory($categoryId , $categoryName , $categoryPicture);

            if($exec)
            {
                echo "succes";
            }
            else{
                echo "echec";
            }
        }

    } 
?>