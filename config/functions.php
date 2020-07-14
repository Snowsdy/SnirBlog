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
    require ROOT_PATH . '/config/connect.php';
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
    require ROOT_PATH . '/config/connect.php';
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
    require ROOT_PATH . '/config/connect.php';
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

function addArticle($title, $author, $content, $publie, $path_img)
{
    require ROOT_PATH . '/config/connect.php';
    $req = $bdd->prepare('INSERT INTO articles (title, author, content, publication_time, publie, path_img) VALUES (?, ?, ?, NOW(), ?, ?)');
    $req->execute(array($title, $author, $content, $publie, $path_img));
    $req->closeCursor();
}

function editArticle($id, $title, $author, $content, $publication_time, $publie, $path_img)
{
    require ROOT_PATH . '/config/connect.php';
    $req = $bdd->prepare('UPDATE articles SET id = ?, title = ? , author = ?, content = ?, publication_time = ?, publie = ?, path_img = ? WHERE id = ?');
    $req->execute(array($id, $title, $author, $content, $publication_time, $publie, $path_img, $id));
    $req->closeCursor();
}

function setPublie($id, $publie)
{
    require ROOT_PATH . '/config/connect.php';
    $req = $bdd->prepare('UPDATE articles SET publie = ? WHERE id = ?');
    $req->execute(array($publie, $id));
    $req->closeCursor();
}

function removeArticle($id)
{
    require ROOT_PATH . '/config/connect.php';
    $req = $bdd->prepare('DELETE FROM articles WHERE id = ?');
    $req->execute(array($id));
    $req->closeCursor();
}

// USERS

/**
 * Fonction qui permet de récupérer les utilisateurs.
 */
function getUsers()
{
    require ROOT_PATH . '/config/connect.php';
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
    require ROOT_PATH . '/config/connect.php';
    $req = $bdd->prepare("SELECT * FROM users WHERE $param = ?");
    $req->execute(array($valParam));
    if ($req->rowCount() == 1) {
        $data = $req->fetch(PDO::FETCH_OBJ);
        return $data;
    }
    $req->closeCursor();

}

/**
 * Fonction qui ajoute un nouvel utilisateur.
 */
function addUser($nom, $prenom, $email, $pseudo, $mdp, $admin = 0)
{
    require ROOT_PATH . '/config/connect.php';
    $req = $bdd->prepare("INSERT INTO users (nom, pseudo, prenom, email, mdp, creation_time, admin) VALUES (?, ?, ?, ?, ?, NOW(), ?)");
    $req->execute(array($nom, $pseudo, $prenom, $email, $mdp, $admin));
    $req->closeCursor();
}

/**
 * Fonction qui modifie un utilisateur.
 */
function editUser($id, $nom, $prenom, $email, $pseudo, $mdp, $admin)
{
    require ROOT_PATH . '/config/connect.php';
    $req = $bdd->prepare("UPDATE users SET id = ?, nom = ? , prenom = ?, pseudo = ?, email = ?, mdp = ?, admin = ? WHERE id = ?");
    $req->execute(array($id, $nom, $prenom, $pseudo, $email, $mdp, $admin, $id));
    $req->closeCursor();
}

/**
 * Fonction qui supprime un utilisateur.
 */
function removeUser($id)
{
    require ROOT_PATH . '/config/connect.php';
    $req = $bdd->prepare('DELETE FROM users WHERE id = ?');
    $req->execute(array($id));
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
    require ROOT_PATH . '/config/connect.php';
    $req = $bdd->prepare('SELECT * FROM comments WHERE idArticle = ?');
    $req->execute(array($idArticle));
    $data = $req->fetchAll(PDO::FETCH_OBJ);
    return $data;
    $req->closeCursor();
}

/**
 * Fonction qui retourne le nombre de commentaires selon l'id de l'article.
 */
function getCommentsCount($idArticle)
{
    require ROOT_PATH . '/config/connect.php';
    $req = $bdd->prepare('SELECT count(*) AS total FROM comments WHERE idArticle = ?');
    $req->execute(array($idArticle));
    $data = $req->fetch(PDO::FETCH_OBJ);
    return $data;
    $req->closeCursor();
}

function showComment($comment)
{
    print '<div class="comment">';
    print "    <h2>$comment->title</h2>";
    print "    <h3>De : $comment->author</h3>";
    print "    <h4>Fait le : $comment->publication_time</h4>";
    print "    <p>$comment->content</p>";
}

/**
 * Fonction utilisé si pas de commentaires pour un article.
 */
function noComment()
{
    print '<h3>Pas de Commentaires !!!</h3>';
}

// AUTRES