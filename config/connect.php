<?php
$tokenpath = array(
    'host' => 'localhost',
    'dbname' => 'blogTest',
    'charset' => 'utf8',
    'name' => 'Snows',
    'mdp' => 'MoRello2598@#-=+'    
);
$bdd = new PDO('mysql:host='.$tokenpath['host'].';dbname='.$tokenpath['dbname'].';charset='.$tokenpath['charset'], $tokenpath['name'], $tokenpath['mdp']);
$bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
?>