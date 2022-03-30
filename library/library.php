<?php
function connectDB() //done
{
    $DB_DSN = "mysql:host=localhost;dbname=myshop";
    $DB_USER = "root";
    $DB_PASSWORD = "";


    try {
        $pdo = new PDO ($DB_DSN , $DB_USER , $DB_PASSWORD ) ; 
        return $pdo;

    } catch ( PDOException $e) {
        echo "Erreur de connexion".$e->getMessage(); 
    }
}

function Connexion($username , $password ) //done
{
    $pdo = connectDB();
    
    $request =  "SELECT username , password FROM admin ";

    $result = $pdo -> query ($request);

    while ($row = $result-> fetch())
    {
        $dbUsername = $row["username"];
        $dbPassword = $row["password"];
    }

    if (  ($username  == $dbUsername ) && ($password == $dbPassword)   )
    {
        return  true;
    }
    else
    {
        return  false;
    }

}


function addCategory($categoryName , $categoryPicture)
{
    $pdo = connectDB();

    $request = "INSERT INTO Category (categoryName , categoryPicture) VALUES ('$categoryName' , '$categoryPicture') ";
    $result = $pdo -> query($request);

    return $result;
}


function getCategoryId($categoryName) //done
{
    $pdo = connectDB();
    $request = "SELECT * FROM Category WHERE categoryName = '$categoryName' ";
    $result = $pdo -> query($request);

    while ($row = $result -> fetch()) {
        $categoryId = $row["categoryId"];
    }

    return $categoryId;

}


function getCategoryName ($categoryId)
{
    $pdo = connectDB();
    $request = "SELECT * FROM Category WHERE categoryId = '$categoryId'";
    $result = $pdo -> query($request);

    while ($row = $result -> fetch()) {
        $categoryName = $row["categoryName"];
    }

    return $categoryName;

}



function  addProduct($productName , $productPrice , $productDescription , $productPicture , $categoryId) // done
{
    $pdo = connectDB();
    $request = "INSERT INTO Product (productName , productPrice , productDescription , productPicture , categoryId) VALUES ('$productName' , $productPrice , '$productDescription', '$productPicture' , $categoryId) ";
    //$request = "INSERT INTO Product (productName , productPrice , productDescription  , categoryId) VALUES ('$productName' , $productPrice , '$productDescription' , $categoryId) ";
    $result = $pdo -> query($request);

    return $result;
}


function updateCategory($categoryId , $categoryName , $categoryPicture) // done
{
    $pdo = connectDB();
    $request = "UPDATE Category SET categoryName = '$categoryName' , categoryPicture = '$categoryPicture' WHERE categoryId = $categoryId ";
    $result = $pdo -> query($request);

    return $result;

}

function updateProduct( $productId ,$productName , $productPrice , $productDescription , $productPicture , $categoryId )
{
    $pdo = connectDB();
    $request = "UPDATE Product SET productName = '$productName' , productPrice = $productPrice , productDescription= '$productDescription' , productPicture = '$productPicture' , categoryId = $categoryId WHERE productId = $productId ";
    $result = $pdo -> query($request);
    return $result;

}

function deleteCategory($categoryId) //done
{
    $pdo = connectDB();
    $request = "DELETE FROM Category WHERE categoryId = $categoryId ";
    $result = $pdo -> query($request);

    return $result;

}

function deleteProduct($productId)
{
    $pdo = connectDB();
    $request = "DELETE FROM Product WHERE productId = $productId ";
    $result = $pdo -> query($request);

    return $result;

}

function deleteUser($userId)
{
    $pdo = connectDB();
    $request = "DELETE FROM user WHERE userId = $userId ";
    $result = $pdo -> query($request);

    return $result;

}

function currency()
{
    echo "  € ";
}

function updatePassword($password , $username)
{
    $conn = connectDB();
    $request = "UPDATE admin SET password = '$password' WHERE username = '$username' ";
    $result = $conn -> query($request);

    return $result ;
}

?>