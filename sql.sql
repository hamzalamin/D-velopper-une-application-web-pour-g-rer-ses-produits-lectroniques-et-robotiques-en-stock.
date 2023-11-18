drop database Electro_naccer;
create database Electro_naccer;
use Electro_naccer;





create table User (
    UserId int PRIMARY KEY ,
   
    Passwords varchar(20) not null
   
);
describe User;
 INSERT INTO User(UserId, Passwords)
 VALUES (14,"hamza");

 CREATE TABLE Category (
    Category_Id INT PRIMARY key,
    Category_nam varchar(20)
 );
 insert into Category 
 values (1,"smarte watches"),
  (2,"home-menage"),
  (3,"laptops");
 
 create table products (
    Product_Id int PRIMARY key,
    Product_name varchar(20),
    Product_img varchar(50),
    prix_unitair float,
    mini_de_stok int, 
    max_de_stok int,
    categoryy_ID int,
    foreign key(categoryy_ID) references Category(Category_Id)
 );

 insert into products (Product_Id,Product_name,Product_img,prix_unitair,mini_de_stok,max_de_stok,categoryy_ID)
   values
(1, 'laptop meni', 'images/13.jpg', 2360, 40, 10, 3),

(2, 'frezer', 'images/2.jpg', 2260, 30, 120, 2),

(3, 'smart wtch 5 samsung', 'images/9.jpg', 20.50, 13, 10, 1),

(4, 'smart wtch 2560', 'images/10.jpg', 2550, 30, 20, 1),

(5, 'laptop thinkpad', 'images/8.jpg', 2490, 30, 100, 3),

(6, 'television', 'images/3.jpg', 1790, 12, 100, 2),

(7, 'smart wtch drtz ', 'images/12.jpg', 2500, 14, 10, 1),

(8, 'smart wtch Due', 'images/1-.jpg', 1580, 20, 90, 1),

(9, 'laptop dell', 'images/7.jpg', 2875, 16, 180, 3),

(10, 'machine Pro Mini', 'images/1.jpg', 3025, 50, 20, 2),

(11, 'laptop hp', 'images/6.jpg', 1945, 10, 70, 3),
 
(12, 'hyteds pro', 'images/OIP.jpg', 2130, 40, 130, 2),
 
(13, 'laptop think book', 'images/14.jpg', 1675, 20, 8, 3),

(14, 'smart wtch 5 Nano', 'images/11.jpg', 1875, 10, 80, 1),

(15, 'macbook', 'images/5.jpg', 2080, 30, 120, 3);



