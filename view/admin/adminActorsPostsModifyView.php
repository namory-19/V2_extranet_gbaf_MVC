<!-- View of admin page to modify an actor post-->

<?php $title = "Page de modification des fiches acteurs et partenaires sur l'extranet GBAF"; ?>

<?php ob_start(); ?>
    
    <section class="home_about_admin_gbaf">
        <h1>
        Modifier la "fiche acteur" : <?php echo $actorPost['title_post_actors'] ?> 
        </h1>
        <p> 
            Vous avez ici la possibilité de modifier cette fiche "partenaires ou acteurs"
        </p>
        <form action="/index.php?controller=adminactorsposts&action=modify&urlpost=<?php echo $actorPost['url_post_actors'] ?>" method="post" enctype="multipart/form-data">
                <div>
                <label for="titre"><strong>Titre : </strong></label>
                <br>
                <input class="text_area" type="text" id="title" name="title" size="80" value="<?php echo htmlspecialchars($actorPost['title_post_actors']) ?>" autofocus required> 
                </div>
                <br>
                <div>
                <label for="url_website"><strong>URL site web : </strong></label>
                <br>
                <input class="text_area" type="url" id="url_website" name="url_website" size="80" value="<?php echo htmlspecialchars($actorPost['url_website_actors'])?>"> 
                </div>
                <br>
                <div>
                <label for="texte"><strong>Texte : </strong></label>
                <br>
                <textarea class="text_area" name="text" id="text" rows="10" cols="50"required><?php echo htmlspecialchars($actorPost['content_post_actors'])?></textarea> 
                </div>
                <br>
                <div>
                <strong>L'image actuelle est : </strong>
                <br>
                <img class ="img_resp" src="<?php echo $actorPost['url_img_actors']?>" alt="image fiche acteur">
                <br>
                </div>
                <div>
                <br>
                <label for="img_actors"><strong>Changer l'image <br>(type autorisé : png, gif, jpg, jpeg et poids <= 1mo) :  </strong><br></label> 
                <br>
                <input type="file" id="img_actors" name="img_actors">
                </div>
                <div>
                <br>
                <label for="url"><strong>Meta keyword (mots clés séparés par une virgule) : </strong></label>
                <br>
                <input class="text_area" type="text" id="meta_keywords" name="meta_keywords" size="80" value="<?php echo $actorPost['meta_keywords_actors']?>">
                </div>
                <br>
                <div>
                <label for="url"><strong>Meta description (description courte) : </strong></label>
                <br>
                <input class="text_area" type="text" id="meta_description" name="meta_description" size="80" value="<?php echo $actorPost['meta_description_actors']?>">
                </div>
                <br>
                <br>
                <div>
                Une fois vos informations enregistrées, vous pouvez revenir à l'accueil des pages acteurs en<a href="index.php?controller=adminhome"> cliquant ici</a>.
                </div>
                <br>
                <input type="submit" value="Enregistrer" class="button_submit">
            </form>
            <?= (isset($alert)) ? $alert : ''; ?>
    </section> 

    <?php $content = ob_get_clean(); ?>
   <?php require_once 'view/elements/footer.php'; ?>
   <?php require_once 'view/elements/header.php'; ?>
  <?php require_once 'view/template.php'; ?>