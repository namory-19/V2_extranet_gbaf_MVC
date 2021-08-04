<!-- template of flash message -->

<?php ob_start(); ?>

<div class="msg_<?php echo $type ?>">
<p><?php echo $message ?></p>
</div>

<?php $alert = ob_get_clean(); ?>
