# Database Config

This file will outline the various documentation of the database design. from this design we will be able to build out the needed php scripts .


## Table Structure 

Create table PersonInfo
(
    last_name varchar(50),
    first_name varchar(50),
    gender char(1)
    email varchar(50),
    password varchar(50),
    alternate_email varchar(50),


    primary key(email)

)


