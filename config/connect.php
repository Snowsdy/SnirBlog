<?php
$tokenpath = array(
    'host' => 'localhost',
    'dbname' => 'blogtest',
    'charset' => 'utf8',
    'name' => 'root',
    'mdp' => 'root'    
);
$bdd = new PDO('mysql:host='.$tokenpath['host'].';dbname='.$tokenpath['dbname'].';charset='.$tokenpath['charset'], $tokenpath['name'], $tokenpath['mdp']);
$bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
?>
