<div id="login" class="login">
    <div class="login-content">
        <form class="box" action="login.php" method="post">
            <span class="close" id="close">&times;</span>
            <h1>Login</h1>
            <b style="color: red;">
                <?php 
                    if (!empty($_SESSION['erreurLogin'])) {
                        foreach ($_SESSION['erreurLogin'] as $error) {
                            echo $error;
                        }
                        unset($_SESSION['erreurLogin']);
                    }
                    ?>
                </b style="color: red;">
                <input type="text" name="pseudo" placeholder="Pseudo">
                <input type="password" name="mdp" placeholder="Mot de passe">
                <input type="submit" name="login_button" value="Login">
        </form>
    </div>
</div>