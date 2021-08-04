
<!-- View of comments in actors article page -->

<?php ob_start(); ?>
<?php require_once 'controller/front/frontControllerCommentActors.php'; ?>
<section class="commentaire">
        <div class="commentaire_container">
            <div class="bloc_header_comment">
                <div class="nb_comment">
                    <h2 id="pagination_go">
                    <?php 
                    $numberOfComments = numberOfComments();
                    echo $numberOfComments['numberComment']?> commentaire(s)
                    </h2>
                </div>
                <div class="new_comment">
                <a href="#submit_comment"><div class="comment_button">Nouveau commentaire</div></a> 
                </div>
                <div class="counterlike_button">
                    <div class="like">
                    <p><?php $numberOfLike = viewLike(); echo $numberOfLike['numberOfLike']?></p>
                    <a href="index.php?controller=actorsposts&up=1&down=0&urlpost=<?php echo $_GET['urlpost']?>"><img src="public/img/up.png" alt="logo like"></a>
                    </div>
                    <div class="unlike">
                    <p><?php $numberOfUnlike = viewUnlike(); echo $numberOfUnlike['numberOfUnlike']?></p>
                    <a href="index.php?controller=actorsposts&up=0&down=1&urlpost=<?php echo $_GET['urlpost']?>"><img src="public/img/down.png" alt="logo unlike"></a>
                    </div>
                    <?php $alert = pushLike();?>
                </div>
            </div>
            <?php $reqAndnumberOfCommentsPage = viewCommentsActors(); 
            while($CommentsActors = $reqAndnumberOfCommentsPage[0]->fetch()) 
                {
                    ?>
                    <div class="bloc_comment">
                        <div class="bloc_comment_img">
                            <img class="bloc_comment_img" src="public/img/avatar/<?php echo $CommentsActors['url_img_avatar_user'] ?>" alt="Avatar utilisateur"> 
                        </div>
                        <div class="bloc_comment_text" >
                            <p><strong>Prénom : </strong><?php echo htmlspecialchars($CommentsActors['surname_user'])?></p>
                            <p><strong>Date : </strong> <?php echo $CommentsActors['dateComment']?></p>
                            <p><strong>Commentaire : </strong> <?php echo htmlspecialchars($CommentsActors['content_comment'])?></p>
                        </div>
                    </div>
                    <?php
                }
            ?>
            <div class="pagination">
            <?php 
                $numberOfCommentsPage = $reqAndnumberOfCommentsPage[1];
                for ($pageComments = 1; $pageComments <= $numberOfCommentsPage; $pageComments++) 
                {
                    echo '<a href="index.php?controller=actorsposts&urlpost='.$_GET['urlpost'].'&page='.$pageComments.'#pagination_go">page ' .$pageComments .'</a> | ';
                }
            ?>
            </div>
            <br>
            <br>
            <div class="bloc_submit_comment">
                <form action="index.php?controller=actorsposts&urlpost=<?php echo $_GET['urlpost']?>" method="POST">
                    <div>
                    <label for="commentaire"><strong>Votre commentaire : </strong></label>
                    <br>
                    <textarea class="text_area" name="commentaire" id="commentaire" rows="10" cols="50" required></textarea>       
                    <br>
                    </div>
                    <div id="submit_comment">
                    <a href="#submit_comment"><input type="submit" value="Envoyer" class="button_submit"></a>
                    </div>
                    <br>
                    <?php $alert = submitComment()?> 
                </form>
                <?= (isset($alert)) ? $alert : ''; ?>
            </div>
        </div>
    </section>
   
   <?php $comment = ob_get_clean(); ?>