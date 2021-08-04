<!-- View of admin home -->

<?php $title = "Administration de l'extranet GBAF"; ?>

<?php ob_start(); ?>

<section class="home_about_admin_gbaf">
        <h1>
        Espace administrateur de l'Extranet de la GBAF
        </h1>
        <p> Bienvenue sur l'espace d'administration de l'extranet GBAF! <br>
        <p>Pour toutes questions sur l'utilisation de l'administration ou sur des problèmes, merci de contacter le super administrateur à <a href="mailto:admin@gbaf.fr">admin@gbaf.fr</a></p> 
    </section>  
    <section class="home_about_actors">
        <h2>
        Les fiches partenaires / acteurs en ligne
        </h2>
        <p>
        Vous avez ici la possibilité de consulter de voir, de créer, de modifier ou encore de supprimer des fiches. <br>
        Pour ajouter une nouvelle fiche acteur, il suffit simplement de <a href="/index.php?controller=adminactorsposts&action=add">Cliquez ici</a>.
        </p>
        <p>
        Vous trouverez ci-dessous, les dernières fiches acteurs et partenaires mise en ligne via l'administration de l'extranet GBAF. Il vous est possible de les modifier ou de les supprimer en cliquant sur les liens.
        </p>
    </section>
    <section id="pagination_go">  
   <?php
   while ($selectActorsPostsWithPaging=$req->fetch()) 
    {
        ?>
        <div class="bloc_actors_container_admin">
            <div class="home_logo_bloc_actors">
                    <img src="<?php echo $selectActorsPostsWithPaging['url_img_actors']?>" alt="logo <?php echo $selectActorsPostsWithPaging['title_post_actors']?>">
            </div>
            <div class="home_text_bloc_actors">
                <h3>
                <?php echo htmlspecialchars($selectActorsPostsWithPaging['title_post_actors']); 
                ?>
                </h3>
                <p>
                <?php echo textShort(htmlspecialchars($selectActorsPostsWithPaging['content_post_actors']), 130); 
                ?> ...
                </p>
            </div>
            <div class="home_read_more_bloc_actors">
                <a href="index.php?controller=actorsposts&urlpost=<?php echo $selectActorsPostsWithPaging['url_post_actors']?>" target="_blank" rel="noopener noreferrer"><div class="home_read_more_bloc_actors_button">Lire la suite</div></a> 
            </div>
        </div>
            <div class="bloc_modify_delete_admin"> 
        <a href="/index.php?controller=adminactorsposts&action=modify&urlpost=<?php echo $selectActorsPostsWithPaging['url_post_actors']?>" target="_blank" rel="noopener noreferrer">Modifier</a> | <a href="/index.php?controller=adminactorsposts&action=delete&urlpost=<?php echo $selectActorsPostsWithPaging['url_post_actors']?>">Supprimer</a>
        </div>
    <?php  
    }
    ?>
    <div class="pagination"> 
    <?php 
        for ($numberOfPagesPosts = 1; $numberOfPagesPosts <= $totalNumberOfPages; $numberOfPagesPosts++)
        {
            echo '<a href="index.php?controller=adminhome&page='.$numberOfPagesPosts.'#pagination_go">page ' .$numberOfPagesPosts .'</a> | ';
        }
    ?>
    </div>
   </section>

    <?php $content = ob_get_clean(); ?>
   <?php require_once 'view/elements/footer.php'; ?>
   <?php require_once 'view/elements/header.php'; ?>
   <?php require_once 'view/template.php'; ?>