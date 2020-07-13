<?php 
session_start();
require_once '../../config/functions.php';

$users = getUsers();

if($_SESSION['admin']):?>

<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gestion des Articles</title>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.1/css/all.css">
    <link href="https://fonts.googleapis.com/css2?family=Ubuntu:wght@400;500&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" />
    <link href="https://fonts.googleapis.com/css2?family=Ubuntu:wght@400;500&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="../css/header.css">
    <link rel="stylesheet" href="../css/main.css">
    <link rel="stylesheet" href="../css/footer.css">
    <link rel="stylesheet" href="../css/left_menu.css">
</head>

<body>

    <div class="bck">
        <?php include '../includes/header.php'?>
        <?php include '../includes/left_menu.php'?>
        <div class="contenu">
            <button class="add_btn"><a href="add.php">Ajouter</a></button>
            <table>
                <thead>
                    <th>Id</th>
                    <th>Nom</th>
                    <th>Prénom</th>
                    <th>Email</th>
                    <th>Pseudo</th>
                    <th>Admin</th>
                    <th colspan="2">Actions</th>
                </thead>
                <?php foreach($users as $user):?>
                <tbody>
                    <tr>
                        <td><?= $user->id ?></td>
                        <td>
                            <?= $user->nom ?></a>
                        </td>
                        <td><?= $user->prenom ?></td>
                        <td><?= $user->email ?></td>
                        <td><?= $user->pseudo ?></td>
                        <td>
                            <?php 
                                if ($user->admin) {
                                    echo 'Oui';
                                }else {
                                    echo 'Non';
                                }
                            ?>
                        </td>
                        <td>
                            <a href="edit.php?id=<?= $user->id ?>" class="edit">
                                Edit
                            </a>
                        </td>
                        <td>
                            <a href="delete.php?id=<?= $user->id ?>" class="delete">
                                Delete
                            </a>
                        </td>
                    </tr>
                </tbody>
                <?php endforeach;?>
            </table>
        </div>
        <?php include '../includes/footer.php'?>
    </div>

</body>

</html>

<?php else :?>
<?php header('Location: ' . BASE_URL . 'index.php');?>
<?php endif;?>