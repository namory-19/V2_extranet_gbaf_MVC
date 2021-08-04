<!-- View of home page -->

<?php $title = "Acceuil de l'extranet GBAF"; ?>

<?php ob_start(); ?>

   <section class="home_about_gabf">
       <h1>
       Extranet de la GBAF
       </h1>
       <p> Le Groupement Banque Assurance Français (GBAF) est une fédération
           représentant les <strong>6 grands groupes français</strong> : 
       </p>
           <ul>
           <li>Paribas</li>
           <li>BPCE</li>
           <li>Crédit Agricole</li>
           <li>Crédit Mutuel-CIC</li>
           <li>Société Générale</li>
           <li>La Banque Postale</li>
           </ul>
       <p>  
           Ces entités représentent près de <strong>80 millions de comptes</strong> sur le territoire
           national.
           <br>
           Le GBAF est le représentant de la profession bancaire et des assureurs sur tous les axes de la réglementation financière française. 
           Sa mission est de promouvoir l'activité bancaire à l’échelle nationale. C’est aussi un interlocuteur privilégié des pouvoirs publics.
       </p>
       <div class="home_ban_gbaf">
       <img src="public/img/ban_gbaf_home.jpg" alt="Bannière GBAF, plus 80 millions de comptes en gestion">
       </div>
   </section>  
   <section class="home_about_actors">
       <h2>
       Les acteurs et partenaires de la GBAF
       </h2>
       <p> Les produits et services bancaires sont nombreux et très variés. Afin de
           renseigner au mieux les clients, les salariés des 340 agences des banques et
           assurances en France (agents, chargés de clientèle, conseillers financiers, etc.) recherchaient jusqu'ici sur Internet des informations portant sur des produits bancaires et des financeurs, entre autres.
           <br><br>
           Aujourd’hui, et à fin de faciliter le travail de ces derniers, le GBAF met à disposition une base de données pour chercher ces informations de manière fiable et rapide ou pour donner son avis sur les partenaires et acteurs du secteur bancaire, tels que les associations ou les financeurs solidaires.
           <br><br>
           Le GBAF propose donc aux salariés des grands groupes français un point d’entrée unique, répertoriant un grand nombre d’informations sur les partenaires et acteurs du groupe ainsi que sur les produits et services bancaires et financiers.
           <br><br>
           Sur cet extranet, chaque salariés peut aussi poster un commentaire et donner son avis sur un acteur ou partenaire.
       </p>
   </section>
   <section id="pagination_go">  
   <?php
   while ($selectActorsPostsWithPaging=$req->fetch())
    {
        ?>
        <div class="home_bloc_actors_container">
            <div class="home_logo_bloc_actors">
                    <img src="<?php echo $selectActorsPostsWithPaging['url_img_actors']?>" alt="logo <?php echo $selectActorsPostsWithPaging['title_post_actors']?>"> 
            </div>
            <div class="home_text_bloc_actors">
                <h3>
                <?php echo htmlspecialchars($selectActorsPostsWithPaging['title_post_actors']) 
                ?>
                </h3>
                <p>
                <?php echo htmlspecialchars(textShort($selectActorsPostsWithPaging['content_post_actors'], 130)); 
                ?> ...
                </p>
            </div>
            <div class="home_read_more_bloc_actors">
                <a href="index.php?controller=actorsposts&urlpost=<?php echo $selectActorsPostsWithPaging['url_post_actors']?>" target="_blank" rel="noopener noreferrer"><div class="home_read_more_bloc_actors_button">Lire la suite</div></a>
            </div>
        </div>
    <?php  
    }
    ?>
    <div class="pagination"> 
    <?php 
        for ($numberOfPagesPosts = 1; $numberOfPagesPosts <= $totalNumberOfPages; $numberOfPagesPosts++) 
        {
            echo '<a href="index.php?controller=home&page='.$numberOfPagesPosts.'#pagination_go">page ' .$numberOfPagesPosts .'</a> | '; 
        }
    ?>
    </div>
   </section>
   
   <?php $content = ob_get_clean(); ?>
   <?php require_once 'view/elements/footer.php'; ?>
   <?php require_once 'view/elements/header.php'; ?>
   <?php require_once 'view/template.php'; ?>

