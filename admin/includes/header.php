<div class="header">
    <h2 class="logo"><span>Snir</span>Blog</h2>
    <input type="checkbox" id="chk">
    <label for="chk" class="show-menu-btn">
        <i class="fas fa-ellipsis-h"></i>
    </label>

    <ul class="menu">
        <?php if (isset($_SESSION['pseudo'])) : ?>
            <a style="color: black;">Bienvenue <b style="color: black;"><?= strtoupper($_SESSION['pseudo']) ?></b></a>
            <a href="<?= BASE_URL . "login.php?logout" ?>">Se déconnecter</a>
        <?php else : ?>
            <a id="login_btn">
                <i class="fa fa-sign-in"></i> Se connecter
            </a>
            <a id="signUp_btn">Créer un compte</a>
        <?php endif; ?>
        <a href="<?= BASE_URL . "index.php" ?>">Accueil</a>
        <?php if (isset($_SESSION['admin']) && $_SESSION['admin']) : ?>
            <a href="<?= BASE_URL . "admin/index.php" ?>">Tableau de bord</a>
        <?php endif; ?>
        <a href="#">A propos</a>
        <label for="chk" class="hide-menu-btn">
            <i class="fas fa-times"></i>
        </label>
    </ul> 
</div>