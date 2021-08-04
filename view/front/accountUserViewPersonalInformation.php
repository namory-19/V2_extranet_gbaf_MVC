<!-- View of account area page : to change personnal information -->

<?php $title = "Paramètre du compte sur l'extranet GBAF"; ?>

<?php ob_start(); ?>

    <section class="informations_user">
    <div class="h1_moncompte_center">
            <h1>
                Mon compte à l'extranet GBAF
            </h1>
     </div>
    <p>
        Retrouvez sur cette page toutes vos informations personnelles (nom, prénom, mail, identifiant, ...), vos commentaires, vos likes et bien plus encore!
        C'est également ici que vous pourrez modifier vos données (mot de passe, avatar, identifiant, ...)
    </p>
    <div class="infos_perso">
        <h2>
            Mes informations personnelles
        </h2>
        <p>
            Vous trouverez ci-dessous vos informations personnelles. Ces dernières sont facilement modifiables.
        </p>
        <div class="formulaire_infos_perso">
            <form action="index.php?controller=account" method="post"> 
                    <div class="formulaire_nom">
                        <label for="name"><strong>Nom : </strong></label>
                        <br>
                        <input type="text" id="name" name="nom" value="<?php echo isset($_POST['nom'])? htmlspecialchars(strtoupper($_POST['nom'])) : htmlspecialchars($_SESSION['name']);?>" autofocus required> 
                    </div>
                    <br>
                    <div class="formulaire_prenom">
                        <label for="surname"><strong>Prénom : </strong></label>
                        <br>
                        <input type="text" id="surname" name="prenom" value="<?php echo isset($_POST['prenom'])? htmlspecialchars($_POST['prenom']) : htmlspecialchars($_SESSION['surname']);?>" required> 
                    </div>
                    <br>
                    <div class="formulaire_mail">
                        <label for="mail"><strong>Mail : </strong></label>
                        <br>
                        <input type="email" id="mail" name="mail" value="<?php echo isset($_POST['mail'])? htmlspecialchars($_POST['mail']) : htmlspecialchars($_SESSION['mail']);?>" onpaste="return false;" required> 
                    </div>
                    <br>
                <input id="ancre_name" type="submit" value="Modifier" class="button_submit">
            </form>
        </div>
        <?= (isset($alert)) ? $alert : ''; ?>
    </div>
    <div class="separator"></div>

    <?php $content = ob_get_clean(); ?>
   <?php require_once 'view/elements/footer.php'; ?>
   <?php require_once 'view/elements/header.php'; ?>
   <?php require_once 'view/front/accountUserViewAvatar.php';?>
   <?php require_once 'view/front/accountUserViewSecretAnswer.php';?>
   <?php require_once 'view/front/accountUserViewConnectionInformation.php'; ;?>
   <?php require_once 'view/template.php'; ?>