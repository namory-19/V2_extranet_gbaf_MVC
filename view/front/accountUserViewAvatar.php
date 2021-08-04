<!-- View of account area page : to change avatar image-->

<?php ob_start(); ?>
    <div class="infos_perso">
        <h2>
            Mon avatar
        </h2>
        <p>
            Vous trouverez ci-dessous votre image de profil actuelle. Il vous est possible de la changer autant de fois que vous désirez.
        </p>
            <div class="avatar_img">
            <p>
            <strong>Votre image de profil actuelle est : </strong>
            </p>
            <?php 
            require_once 'controller/front/frontControllerAvatar.php';
             ?>
            <img src="<?php echo viewImgAvatar(); ?>" alt="image profil">
            <br>
            </div>
        <div class="formulaire_infos_perso">
            <form id="ancre_avatar" action="index.php?controller=account#ancre_avatar" method="post" enctype="multipart/form-data">
                    <div class="send_image">
                        <label for="avatar"><strong>Envoyer une nouvelle image <br>(type autorisé : png, gif, jpg, jpeg et poids <= 1mo) :  </strong><br></label>
                        <br>
                        <input type="file" id="avatar" name="avatar" required>
                    </div>
                    <br>
                <input type="submit" value="Envoyer" class="button_submit">
            </form>
        </div>
        <?php $alert = updateImageAvatar(); ?>
        <?= (isset($alert)) ? $alert : ''; ?>
    </div>
    <br>
    </section>

    <?php $content4 = ob_get_clean(); ?>