<!-- View of account area page : to change connection information-->

<?php ob_start(); ?>

    <div class="infos_perso">
        <h2>
            Mes informations de connexion
        </h2>
        <p>
            Vous trouverez ci-dessous vos informations de connexion. Il vous est possible de changer votre identifiant et votre mot de passe aisément.
        </p>
        <div class="formulaire_infos_perso">
            <form id="connection_information" action="index.php?controller=account#connection_information" method="post"> 
                    <div class="formulaire_identifiant">
                        <label for="identifiant"><strong>Identifiant :  </strong></label>
                        <br>
                        <input type="text" id="identifiant" name="username" value="<?php echo isset($_POST['username'])? htmlspecialchars($_POST['username']) : htmlspecialchars($_SESSION['username']);?>" required> 
                    </div>
                    <br>
                    <div class="pass">
                        <label for="pass"><strong>Mot de passe actuel : </strong></label>
                        <br>
                        <input type="password" id="actualpass" name="actualpass" pattern="^(?=.*[A-Z])(?=.*[a-z])(?=.*\d)(?=.*[-+!*$@%_])([-+!*$@%_\w]{8,15})$" required> 
                    </div>
                    <br>
                    <div class="pass">
                        <label for="pass"><strong>Nouveau mot de passe (Minimum : 8 à 15 caractères, 1 majuscule, 1 miniscule, 1 chiffre, 1 caractère spécial ) :  </strong></label>
                        <br>
                        <input type="password" id="pass" name="password" pattern="^(?=.*[A-Z])(?=.*[a-z])(?=.*\d)(?=.*[-+!*$@%_])([-+!*$@%_\w]{8,15})$" required> 
                    </div>
                    <br>
                    <div class="repass">
                        <label for="repass"><strong>Retapez votre nouveau mot de passe :  </strong></label>
                        <br>
                        <input type="password" id="repass" name="repassword" pattern="^(?=.*[A-Z])(?=.*[a-z])(?=.*\d)(?=.*[-+!*$@%_])([-+!*$@%_\w]{8,15})$" required> 
                    </div>
                    <br>
                <input type="submit" value="Modifier" class="button_submit">
            </form>
        </div>
        <?php $alert = updateDataConnexion() ?>
    <?= (isset($alert)) ? $alert : ''; ?>
    </div>
    <div class="separator"></div>
    
    <?php $content2 = ob_get_clean(); ?>