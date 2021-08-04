<!-- Header elements of website -->

<?php ob_start(); ?>
<?php require_once 'controller/front/frontControllerAvatar.php';?>
<header>
    <div class="container_logo_gabf">
        <a href="index.php?controller=home"><img src="../public/img/logo_gbaf.png" alt="logo GBAF"></a>
    </div>
    <?php if (isset($_SESSION['id_user'])) 
    {
    ?> 
    <div class="bloc_user">
                    <div class="icon_user">
                    <?php $avatarImg = viewImgAvatar(); ?>
                        <img class="img_icon_user" src="<?php echo $avatarImg ? $avatarImg : $_SESSION['url_img_avatar_user'] ?>" alt="Avatar utilisateur"> 
                </div>
                <div class="user">
                <p>
                    <strong><?php echo htmlspecialchars($_SESSION['surname']) ?></strong> 
                    <strong><?php echo htmlspecialchars($_SESSION['name']) ?></strong> 
                    <br>
                    <a href="index.php?controller=account">Mon compte</a> /
                    <a href="index.php?controller=disconnect">Déconnexion</a> 
                    <br>
                    <?php if ($_SESSION['usergroup'] == 2) 
                    {
                    ?>
                    <a href="index.php?controller=adminhome">Espace admin</a> /
                    <a href="index.php?controller=home">Front office</a>
                    <?php
                    }
                    ?>
                </p>
    </div>
    <?php
    }
    ?>   
</header>
<?php $header = ob_get_clean(); ?>