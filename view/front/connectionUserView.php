<!-- View of connection page -->

<?php $title = "Page de connexion à l'extranet GBAF"; ?>

<?php ob_start(); ?>
    <section class="page_connexion_inscription">
        <div class="h1_connexion_inscription">
            <h1>
                Formulaire de connexion à l'extranet GBAF
            </h1>
        </div>
        <div class="formulaire_connexion_inscription">
            <form action="index.php?controller=connection" method="post">
                <div class="formulaire_identifiant">
                <label for="identifiant">Identifiant : </label>
                <br>
                <input type="text" id="identifiant" name="username" value="<?php if (isset($_SESSION['username'])){echo htmlspecialchars($_SESSION['username']);}  elseif (isset($_COOKIE['username'])) {echo htmlspecialchars($_COOKIE['username']);}  else {echo '';}?>" autofocus required>
                </div>
                <br>
                <div class="pass">
                <label for="pass">Mot de passe : </label>
                <br>
                <input type="password" id="pass" name="password" value="<?php if (isset($_SESSION['password'])){echo $_SESSION['password'];}  elseif (isset($_COOKIE['password'])) {echo $_COOKIE['password'];}  else {echo '';}?>" required>
                </div>
                <br>
                <div class="remember">
                <label for="remember">Se souvenir de moi : </label>
                <input type="checkbox" id="remember" name="remember_me">
                </div>
                <br>
                <input type="submit" value="Se connecter" class="button_submit">
            </form>
        </div>
        <?= (isset($alert)) ? $alert : ''; ?>
        <p>
            Vous avez oublié votre mot de passe? <a href="index.php?controller=idpassforgot" target="_blank" rel="noopener noreferrer">Cliquez ici</a> pour le regénérer.
        </p>
        <p>
            Toujours pas inscrit? <a href="index.php?controller=registration" target="_blank" rel="noopener noreferrer">Cliquez ici</a> pour créer votre compte à l'extranet GBAF.
        </p>
    </section>

   <?php $content = ob_get_clean(); ?>
   <?php require_once 'view/elements/footer.php'; ?>
   <?php require_once 'view/elements/header.php'; ?>
   <?php require_once 'view/template.php'; ?>