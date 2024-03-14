<?php

    try{
        $mysqlClient = new PDO('mysql:host=localhost;dbname=bdelection;charset=utf8',
        'root',
        '',
        [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]
    );
        
    }catch(Exception $e){
        die('erreur :' . $e->getMessage());
    }
?>