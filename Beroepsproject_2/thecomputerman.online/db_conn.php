<?php 

$sName = "mysql.c70niya5c.service.one";
$uName = "c70niya5c_stoner";
$pass = "2dab5DEA36?";
$db_name = "c70niya5c_blog_db";

try {
    $conn = new PDO("mysql:host=$sName;dbname=$db_name", 
                    $uName, $pass);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
}catch(PDOException $e){
  echo "Connection failed : ". $e->getMessage();
}