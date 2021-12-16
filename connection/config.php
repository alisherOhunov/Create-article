<?php

$servername = "localhost";
$username = "root";
$password = "password";
$dbname = "blog_site";

try {
    $connection = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    $connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    
} 
catch(PDOException $e) {
    echo "Error: " . $e->getMessage();
}