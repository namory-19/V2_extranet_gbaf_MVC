<!-- View of registration page -->

<?php $title = "Page d'inscription à l'extranet GBAF"; ?>

<?php ob_start(); ?>

    <section class="page_connexion_inscription">
        <div class="h1_connexion_inscription">
            <h1>
                Formulaire d'inscription à l'extranet GBAF
            </h1>
        </div>
        <div class="formulaire_connexion_inscription">
            <form action="index.php?controller=registration" method="post">
                    <div class="formulaire_nom">
                        <label for="name">Nom : </label>
                        <br>
                        <input type="text" id="name" name="name" value="<?php echo isset($_POST['name'])? htmlspecialchars($_POST['name']) : ''?>" autofocus required> 
                    </div>
                    <br>
                    <div class="formulaire_prenom">
                        <label for="surname">Prénom : </label>
                        <br>
                        <input type="text" id="surname" name="surname" value="<?php echo isset($_POST['surname'])? htmlspecialchars($_POST['surname']) : ''?>" required> 
                    </div>
                    <br>
                    <div class="formulaire_mail">
                        <label for="mail">Mail : </label>
                        <br>
                        <input type="email" id="mail" name="mail" value="<?php echo isset($_POST['mail'])? htmlspecialchars($_POST['mail']) : ''?>" oncopy="return false;" oncut="return false;" required> 
                    </div>
                    <br>
                    <div class="formulaire_mail">
                        <label for="remail">Retapez votre adresse mail : </label>
                        <br>
                        <input type="email" id="remail" name="remail" value="<?php echo isset($_POST['remail'])? htmlspecialchars($_POST['remail']) : ''?>" onpaste="return false;" required>
                    </div>
                    <br>
                    <div class="formulaire_identifiant">
                        <label for="identifiant">Identifiant : </label>
                        <br>
                        <input type="text" id="username" name="username" value="<?php echo isset($_POST['username'])? htmlspecialchars($_POST['username']) : ''?>" required> 
                    </div>
                    <br>
                    <div class="pass">
                        <label for="pass">Mot de passe (Minimum : 8 à 15 caractères, 1 majuscule, 1 miniscule, 1 chiffre, 1 caractère spécial ) : </label>
                        <br>
                        <input type="password" id="password" name="password" pattern="^(?=.*[A-Z])(?=.*[a-z])(?=.*\d)(?=.*[-+!*$@%_])([-+!*$@%_\w]{8,15})$" required>
                    </div>
                    <br>
                    <div class="repass">
                        <label for="repass">Retapez votre mot de passe : </label>
                        <br>
                        <input type="password" id="repassword" name="repassword" pattern="^(?=.*[A-Z])(?=.*[a-z])(?=.*\d)(?=.*[-+!*$@%_])([-+!*$@%_\w]{8,15})$" required> 
                    </div>
                    <br>
                    <div class="question">
                    <label for="question">Choisissez une question secrète : </label> 
                        <select name="question" id="question" required>
                            <option value="Quelle est votre ville de naissance?" selected >Quelle est votre ville de naissance?</option>
                            <option value="Quel est votre chanteur/groupe préféré?">Quel est votre chanteur/groupe préféré?</option>
                            <option value="Dans quel pays aimeriez-vous voyager?">Dans quel pays aimeriez-vous voyager?</option>
                            <option value="Quelle est votre boisson préférée?">Quelle est votre boisson préférée?</option>
                        </select>
                    </div>
                    <br>
                    <div class="reponse">
                        <label for="reponse">Votre réponse : </label> 
                        <br>
                        <input type="text" id="answer" name="answer" value="<?php echo isset($_POST['answer'])? htmlspecialchars($_POST['answer']) : ''?>" required>
                    </div>
                    <br>
                <input type="submit" value="S'inscrire" class="button_submit">
            </form>
        </div>
        <?= (isset($alert)) ? $alert : ''; ?>
        <p>
            Déjà inscrit? <a href="index.php?controller=connection" target="_blank" rel="noopener noreferrer">Cliquez ici</a> pour vous connecter à l'extranet GBAF. 
        </p>
    </section>

    <?php $content = ob_get_clean(); ?>
   <?php require_once 'view/elements/footer.php'; ?>
   <?php require_once 'view/elements/header.php'; ?>
   <?php require_once 'view/template.php'; ?>