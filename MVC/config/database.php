<?php
define("DB_HOST","localhost");
define("DB_NAME","testgateau");
define("DB_USER","root");
define("DB_PASSWORD","");

function getPDO(){
    try{
        $pdo = new PDO("mysql:host=" . DB_HOST . ";dbname=" . DB_NAME, DB_USER, DB_PASSWORD);
        $pdo->setAttribute(PDO::ATTR_CASE, PDO::CASE_LOWER);
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        return $pdo;
    }catch(PDOException $e){
        die("Erreur". $e->getMessage());
    }
}   