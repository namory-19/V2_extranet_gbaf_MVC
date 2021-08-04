<!-- View of admin page to create an actor post-->

<?php $title = "Page d'ajout d'acteurs et partenaires sur l'extranet GBAF"; ?>

<?php ob_start(); ?>

    <section class="home_about_admin_gbaf">
        <h1>
        Ajouter une nouvelle "fiche acteur"
        </h1>
        <p> 
            Vous avez ici la possibilité d'ajouter une nouvelle fiche "partenaires ou acteurs" ou de revenir à <a href="/index.php?controller=adminhome">l'accueil de l'admin</a>.
        </p>
        <form action="/index.php?controller=adminactorsposts&action=add" method="post" enctype="multipart/form-data">
                <div>
                <label for="titre"><strong>Titre : </strong></label>
                <br>
                <input class="text_area" type="text" id="title" name="title" size="80" value="" autofocus required> 
                </div>
                <br>
                <div>
                <label for="url_website"><strong>URL site web : </strong></label> 
                <br>
                <input class="text_area" type="url" id="url_website" name="url_website" size="80" value=""> 
                </div>
                <br>
                <div>
                <label for="texte"><strong>Texte : </strong></label> 
                <br>
                <textarea class="text_area" name="text" id="text" rows="10" cols="50" required></textarea> 
                </div>
                <br>
                <div>
                <label for="img_actors"><strong>Image <br>(type autorisé : png, gif, jpg, jpeg et poids <= 1mo) :  </strong><br></label> 
                <br>
                <input type="file" id="img_actors" name="img_actors"> 
                </div>
                <div>
                <br>
                <label for="url"><strong>Meta keyword (mots clés séparés par une virgule) : </strong></label>
                <br>
                <input class="text_area" type="text" id="meta_keywords" name="meta_keywords" size="80" value=""> 
                </div>
                <br>
                <div>
                <label for="url"><strong>Meta description (description courte) : </strong></label>
                <br>
                <input class="text_area" type="text" id="meta_description" name="meta_description" size="80" value=""> 
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