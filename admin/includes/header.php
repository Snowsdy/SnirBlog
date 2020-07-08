<div class="header">
        <h2 class="logo"><span>Snir</span>Blog</h2>
        <input type="checkbox" id="chk">
        <label for="chk" class="show-menu-btn">
            <i class="fas fa-ellipsis-h"></i>
        </label>

        <ul class="menu">
            <?php if(isset($_SESSION['pseudo'])):?>
            Bienvenue <b><?= strtoupper($_SESSION['pseudo']) ?></b>
            <a href="login.php?logout">Se déconnecter</a>
            <?php else:?>
            <a id="login_btn">
                <i class="fa fa-sign-in"></i> Se connecter
            </a>
            <a id="signUp_btn">Créer un compte</a>
            <?php endif;?>
            <a href="<?= BASE_URL . "index.php" ?>">Accueil</a>
            <?php if($_SESSION['admin']):?>
            <a href="<?= BASE_URL . "admin/index.php" ?>">Tableau de bord</a>
            <?php endif;?>
            <a href="#">A propos</a>
            <a href="#">Nous contacter</a>
            <label for="chk" class="hide-menu-btn">
                <i class="fas fa-times"></i>
            </label>
        </ul> 
    </div>