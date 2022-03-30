create database myshop;
use myshop;

create table admin 
(   
    adminId int primary key auto_increment , 
    firstname varchar(30)   , 
    surname varchar(30)     ,
    username varchar(30)    ,
    password varchar(30)    ,

    unique(username)
    
);



create table Category 
(
    categoryId int primary key auto_increment ,
    categoryName varchar(50) ,
    categoryPicture text ,
    unique(categoryName)
);


create table Product 
(
    productId int primary key auto_increment ,
    productName text , 
    productPrice float ,
    productDescription text ,
    productPicture text,
    categoryId  int 
);

ALTER TABLE Product ADD CONSTRAINT fk_Product_Category foreign key (categoryId) REFERENCES Category(categoryId) ON DELETE CASCADE ON UPDATE  CASCADE;

create table User 
(
    userId int primary key auto_increment ,
    firstname varchar(30) ,
    surname varchar(30) , 
    email varchar(30) ,
    password varchar(30) ,
    birthday date ,
    phone text ,
    adress varchar(39) , 
    unique(email)
) ;


/* --------------------------------------- en cours de création



create table Order 
(
    orderId int primary key auto_increment , 
    orderQuantity int(11) ,
    orderDate date ,


    userId 
    productId ,
)


creation d'une table Commande

id de la commande

prix total de la commande  

id de l'utilisateur pour pouvoir utiliser son numero de telephone 

*/ 



