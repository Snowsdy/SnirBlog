<?php 
require 'config/functions.php';

if($_POST){
    echo '<pre>' . print_r($_POST, true) . '</pre>';
    header('Location: index.php');
}
?>