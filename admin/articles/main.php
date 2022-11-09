<?php
session_start();
require_once '../../config/functions.php';

$articles = getArticles();

if ($_SESSION['admin']) : ?>

    <html lang="fr">

    <head>
        <title>Gestion des Articles</title>
        <?php require_once '../../components/header.php'; ?>
        <link rel="stylesheet" href="../css/header.css">
        <link rel="stylesheet" href="../css/footer.css">
        <link rel="stylesheet" href="../css/main.css">
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
                <!-- Affichage des articles sous cette forme :
        - ID    Titre   Actions:    Edit    Remove  Publish/Unpublish
        -->
                <button class="add_btn"><a href="add.php">Ajouter</a></button>
                <table>
                    <thead>
                        <th>Id</th>
                        <th>Titre</th>
                        <th>Auteur</th>
                        <th colspan="3">Actions</th>
                    </thead>
                    <?php foreach ($articles as $article) : ?>
                        <tbody>
                            <tr>
                                <td><?= $article->id ?></td>
                                <td>
                                    <a href="<?= BASE_URL . "article.php?id=$article->id" ?>"><?= $article->title ?></a>
                                </td>
                                <td><?= $article->author ?></td>
                                <td>
                                    <a href="edit.php?id=<?= $article->id ?>" class="edit">
                                        Edit
                                    </a>
                                </td>
                                <td>
                                    <a href="delete.php?id=<?= $article->id ?>" class="delete">
                                        Delete
                                    </a>
                                </td>
                                <td>
                                    <a href="publish.php?id=<?= $article->id ?>" class="publish">
                                        <?php if ($article->publie) : ?>
                                            Unpublish
                                        <?php else : ?>
                                            Publish
                                        <?php endif; ?>
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
    <?php header('Location: ' . BASE_URL . 'index.php'); ?>
<?php endif; ?>