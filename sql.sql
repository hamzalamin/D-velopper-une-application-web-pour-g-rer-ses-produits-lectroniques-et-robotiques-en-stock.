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
 values (1,"laptops"),
  (2,"home-menage"),
  (3,"smarte watches");
 
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
   values(1, 'smart wtch 5 samsung', 'images/9.jpg', 20.50, 3, 120, 1),
 (2, 'smart wtch 2560', 'images/10.jpg', 20.50, 3, 120, 1),

 (3, 'smart wtch 5 Nano', 'images/11.jpg', 18.75, 1, 80, 1),

 (4, 'smart wtch drtz ', 'images/12.jpg', 25.00, 4, 150, 1),

 (5, 'smart wtch Due', 'images/13.jpg', 15.80, 2, 90, 1),

 (6, 'machine Pro Mini', 'images/1.jpg', 30.25, 5, 200, 2),

 (7, 'frezer', 'images/2.jpg', 22.60, 3, 120, 2),

 (8, 'television', 'images/3.jpg', 17.90, 2, 100, 2),

 (9, 'hyteds pro', 'images/5.jpg', 21.30, 4, 130, 2),

 (10, 'laptop hp', 'images/6.jpg', 19.45, 1, 70, 2),

 (11, 'laptop dell', 'images/7.jpg', 28.75, 6, 180, 3),

 (12, 'laptop thinkpad', 'images/8.jpg', 24.90, 3, 100, 3),

(13, 'laptop think book', 'images/14.jpg', 16.75, 2, 80, 3),

 (14, 'laptop meni', 'images/15.jpg', 23.60, 4, 150, 3),

 (15, 'macbook', 'images/16.jpg', 20.80, 3, 120,3),

(16, 'macbook air 14', 'images/17.jpg', 26.20, 5, 200, 3);

