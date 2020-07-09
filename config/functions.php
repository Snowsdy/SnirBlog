<?php
/**
 * Définition de constantes pour m'aider à me retrouver dans le répertoire.
 */
define('ROOT_PATH', $_SERVER['DOCUMENT_ROOT']);
define('BASE_URL', 'http://localhost:8888/');

/**
 * Fonction qui tronque une chaîne de caractères
 * pour en faire un résumé dans l'accueil.
 */
function tronque_chaine($chaine, $lg_max = 60, $end = '...')
{
    if (strlen($chaine) > $lg_max) {
        $chaine = substr($chaine, 0, $lg_max - strlen($end)) . $end;
        return $chaine;
    }else {
        return $chaine;
    }
}

// ARTICLES

/**
 * Fonction qui récupère tous les articles (publié ou non).
 * Table 'articles' :
 * id --> clé primaire
 * title --> titre de l'article
 * author --> auteur de l'article
 * content --> contenu de l'article
 * publication_time --> date de publication
 * publie --> booléen si article publié ou pas
 * path_img --> chemin où se trouve l'image de l'article
 */
function getArticles()
{
    require '../../config/connect.php';
    $req = $bdd->prepare('SELECT * FROM articles ORDER BY id DESC');
    $req->execute();
    $data = $req->fetchAll(PDO::FETCH_OBJ);
    return $data;
    $req->closeCursor();
}

/**
 * Fonction qui récupère uniquement les articles publiés.
 */
function getArticlesPublies()
{
    require 'config/connect.php';
    $req = $bdd->prepare('SELECT * FROM articles WHERE publie = 1');
    $req->execute();
    $data = $req->fetchAll(PDO::FETCH_OBJ);
    return $data;
    $req->closeCursor();
}

/**
 * Fonction qui permet d'afficher à la suite les articles.
 */
function showArticle($article)
{
    print '<div class="post">';
    print '  <div class="inner-post">';
    print "      <img src=\"" . '/' . $article->path_img . "\"/>";
    print '      <div class="post-info">';
    print "          <h4><a href=\"article.php?id=" . $article->id . "\">" . tronque_chaine($article->title, 22) . "</a></h4>";
    print '          <div>';
    print "              <i class=\"fa fa-user-o\"></i> " . $article->author;
    print '              &nbsp;';
    print "              <i class=\"fa fa-calendar\"></i> " . $article->publication_time;
    print '          </div>';
    print '      </div>';
    print '  </div>';
    print '</div>';
}

/**
 * Fonction qui permet de récupérer un article.
 */
function getArticle($id)
{
    require 'config/connect.php';
    $req = $bdd->prepare('SELECT * FROM articles WHERE id = ?');
    $req->execute(array($id));
    if ($req->rowCount() == 1) {
        $data = $req->fetch(PDO::FETCH_OBJ);
        return $data;
    } else {
        header('Location: index.php');
    }
    $req->closeCursor();
}

// USERS

/**
 * Fonction qui permet de récupérer les utilisateurs.
 */
function getUsers()
{
    require 'config/connect.php';
    $req = $bdd->prepare('SELECT * FROM users ORDER BY id DESC');
    $req->execute();
    $data = $req->fetchAll(PDO::FETCH_OBJ);
    return $data;
    $req->closeCursor();
}

/**
 * Fonction qui permet de recupérer un utilisateur selon le paramètre passé.
 */
function getUser($param, $valParam)
{
    require 'connect.php';
    $req = $bdd->prepare("SELECT * FROM users WHERE $param = ?");
    $req->execute(array($valParam));
    if ($req->rowCount() == 1) {
        $data = $req->fetch(PDO::FETCH_OBJ);
        return $data;
    } else {
        header('Location: index.php');
    }
    $req->closeCursor();

}

/**
 * Fonction qui ajoute un nouvel utilisateur.
 */
function addUser($nom, $prenom, $email, $pseudo, $mdp, $admin = 0)
{
    require 'config/connect.php';
    $req = $bdd->prepare("INSERT INTO users (nom, pseudo, prenom, email, mdp, creation_time, admin) VALUES (?, ?, ?, ?, ?, NOW(), ?)");
    $req->execute(array($nom, $pseudo, $prenom, $email, $mdp, $admin));
    $req->closeCursor();
}

// COMMENTS

/**
 * Fonction qui récupère les commentaires d'un article selon son id.
 * Table 'comments' :
 * id --> clé primaire
 * idArticle --> clé étrangère
 * title --> titre du commentaire
 * idUser --> auteur du commentaire
 * content --> contenu du commentaire
 * publication_time --> date de publication
 */
function getComments($idArticle)
{
    require 'config/connect.php';
    $req = $bdd->prepare('SELECT * FROM comments WHERE idArticle = ?');
    $req->execute(array($idArticle));
    $data = $req->fetchAll(PDO::FETCH_OBJ);
    return $data;
    $req->closeCursor();
}