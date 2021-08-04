<!-- View of id pass forgot page -->

<?php $title = "Mot de passe oublié pour l'accès à l'extranet GBAF"; ?>

<?php ob_start(); ?>

    <section class="page_connexion_inscription">
        <div class="h1_connexion_inscription">
            <h1>
                Mot de passe oublié
            </h1>
        </div>
        <div class="formulaire_connexion_inscription">
            <form action="index.php?controller=idpassforgot" method="post">
                    <div class="formulaire_identifiant">
                        <label for="identifiant">Identifiant : </label>
                        <br>
                        <input type="text" id="identifiant" name="username" value="<?php echo isset($_POST['username'])? $_POST['username'] : ''?>" autofocus required> 
                    </div>
                    <br>
                    <?php
                    
                    $returnControlAccount = controlAccount();

                    if (is_array($returnControlAccount))
                    {
                        $UserIsRegistred = $returnControlAccount;
                    }
                    else
                    {
                        $alert = $returnControlAccount;
                    }


                    if (isset($UserIsRegistred))
                    {
                    ?>
                            <div class="question">
                                <p>
                                    Répondez à la question suivante et saisissez votre nouveau mot de passe : <br><?php echo htmlspecialchars($UserIsRegistred['question_user']); ?>
                                </p>
                            </div>
                            <br> 
                            <div class="reponse">
                                <label for="reponse">Votre réponse : </label>
                                <br>
                                <input type="text" id="reponse" name="reponse" required>
                            </div>
                            <br>
                            <br>
                            <div class="pass">
                                <label for="pass">Votre nouveau mot de passe (Minimum : 8 à 15 caractères, 1 majuscule, 1 miniscule, 1 chiffre, 1 caractère spécial ) : </label>
                                <br>
                                <input type="password" id="pass" name="password" pattern="^(?=.*[A-Z])(?=.*[a-z])(?=.*\d)(?=.*[-+!*$@%_])([-+!*$@%_\w]{8,15})$" required> 

                            </div>
                            <br>
                            <br>
                            <div class="repass">
                                <label for="repass">Retapez votre nouveau mot de passe : </label>
                                <br>
                                <input type="password" id="repass" name="repassword" pattern="^(?=.*[A-Z])(?=.*[a-z])(?=.*\d)(?=.*[-+!*$@%_])([-+!*$@%_\w]{8,15})$" required> 

                            </div>
                            <br>
                            <?php 
                        }?>
                <input type="submit" value="Envoyer" class="button_submit">
            </form>
            <?php $alert = changePassUser();?>
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