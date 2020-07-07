<?php
$tokenpath = array(
    'host' => '%dev',
    'dbname' => 'blogtest',
    'charset' => 'utf8',
    'name' => 'dev',
    'mdp' => 'dev7dev'    
);
$bdd = new PDO('mysql:host='.$tokenpath['host'].';dbname='.$tokenpath['dbname'].';charset='.$tokenpath['charset'], $tokenpath['name'], $tokenpath['mdp']);
$bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
?>
