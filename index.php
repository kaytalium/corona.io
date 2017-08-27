<?php
session_start(); 
/*
Add page validator to index page
this file will redirect unauthorize users to the login page
**/
include 'core/pageValidator.php';
validateUseraccess('login.php');

