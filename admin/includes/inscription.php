<div id="inscription" class="inscription">
    <div class="login-content">
        <form class="box" action="<?= BASE_URL . "register.php" ?>" method="post">
            <span class="close" id="close">&times;</span>
            <h1>inscription</h1>
            <b style="color: red;">
                <?php 
                    if (!empty($_SESSION['erreurRegister'])) {
                        foreach ($_SESSION['erreurRegister'] as $error) {
                            echo '<b style="color: red;>' . $error . '<br></b>';
                        }
                        unset($_SESSION['erreurRegister']);
                    }
                ?>
            </b style="color: red;">
            <div class="nom_prenom">
                <input type="text" name="prenom" placeholder="Prénom">
                <input type="text" name="nom" placeholder="Nom">
            </div>
            <input type="text" name="pseudo" class="marg" placeholder="Pseudo">
            <input type="text" name="email" class="marg" placeholder="Email">
            <div class="nom_prenom">
                <input type="password" id="password" name="mdp" placeholder="Mot de passe">
                <input type="password" id="passwordVerif" name="confMdp" placeholder="Confirmation Mdp">
            </div>
            <input type="submit" value="Inscription">
        </form>
    </div>
</div>