<?php

$config = json_decode(file_get_contents (__DIR__ . '/config/prod/db.json'));

$connection = new PDO($config->dsn,$config->user,$config->pswd
        
, array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));

var_dump($connection);


?>