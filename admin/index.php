<?php 
    require '../config/functions.php';
    $user = getUser('id', 1);
    
?>
<?php if($user->admin):?>
    <?= "TU ES UN ADMIN" ?>
<?php endif;?>