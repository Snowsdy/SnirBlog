<?php
$tokenpath = array(
    'host' => '',
    'dbname' => '',
    'charset' => 'utf8',
    'name' => '',
    'mdp' => ''    
);
$bdd = new PDO('mysql:host='.$tokenpath['host'].';dbname='.$tokenpath['dbname'].';charset='.$tokenpath['charset'], $tokenpath['name'], $tokenpath['mdp']);
$bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
?>
