<!-- View of actors article page -->

<?php $title = $actorPost['title_post_actors']; ?>
<?php $metaDescription = $actorPost['meta_description_actors']; ?>
<?php $metaKeywords = $actorPost['meta_keywords_actors']; ?>

<?php ob_start(); ?>

<section class="page_actors">
    <div class="logo_page_actors">
            <img src="<?php echo $actorPost['url_img_actors'] ?>" alt="<?php echo htmlspecialchars($actorPost['title_post_actors'])?>"> 
        </div>
        <div class="text_page_actors">
            <h2>
            <?php echo htmlspecialchars($actorPost['title_post_actors'])?>  
            </h2>
            <div class ="url_website"><p>
            <strong>Site web :</strong> <?php echo $actorPost['url_website_actors'] ? '<a href="'.htmlspecialchars($actorPost['url_website_actors']).'" target="_blank" rel="noopener noreferrer">' : '' ?><?php echo $actorPost['url_website_actors'] ? htmlspecialchars($actorPost['url_website_actors']): 'Aucun site web' ?></a> 
            </div></p>
            <div class="texte_actors"><p>
            <?php echo htmlspecialchars($actorPost['content_post_actors'])?></p> 
            </div>
        </div>
</section>

   <?php $content = ob_get_clean(); ?>
   <?php require_once 'view/elements/footer.php'; ?>
   <?php require_once 'view/elements/header.php'; ?>
   <?php require_once 'view/front/commentActorsView.php'; ?>
   <?php require_once 'view/template.php'; ?>