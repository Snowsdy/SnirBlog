<?php
session_start();
require_once '../../config/functions.php';

$users = getUsers();

if (isset($_SESSION['admin']) && $_SESSION['admin']) : ?>

    <html lang="fr">

    <head>
        <title>Gestion des Articles</title>
        <?php require_once '../../components/header.php'; ?>
        <link rel="stylesheet" href="../css/header.css">
        <link rel="stylesheet" href="../css/main.css">
        <link rel="stylesheet" href="../css/footer.css">
        <link rel="stylesheet" href="../css/left_menu.css">
        <link rel="apple-touch-icon" sizes="180x180" href="../../favicon_io/apple-touch-icon.png">
        <link rel="icon" type="image/png" sizes="32x32" href="../../favicon_io/favicon-32x32.png">
        <link rel="icon" type="image/png" sizes="16x16" href="../../favicon_io/favicon-16x16.png">
        <link rel="manifest" href="../../favicon_io/site.webmanifest">
    </head>

    <body>

        <div class="bck">
            <?php include '../includes/header.php' ?>
            <?php include '../includes/left_menu.php' ?>
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
                    <?php foreach ($users as $user) : ?>
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
                                    } else {
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
                    <?php endforeach; ?>
                </table>
            </div>
            <?php include '../includes/footer.php' ?>
        </div>

    </body>

    </html>

<?php else : ?>
    <?php header('Location: ' . BASE_URL . 'index.php');
    die(); ?>
<?php endif; ?>