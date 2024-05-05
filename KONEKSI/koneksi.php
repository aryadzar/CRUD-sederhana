<?php

$server = 'localhost';
$user = 'root';
$pass = '';
$db = 'CRUD-php';

$conn = mysqli_connect($server, $user, $pass, $db);

if(!$conn){
    echo "ERROR SQL : ". mysqli_connect_error();
    return;
}

