<!-- template of website -->


<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="public/css/style.css">
    <title><?= ($title) ? $title : 'Extranet GBAF'; ?></title>
    <meta name="description" content="<?= (isset($metaDescription)) ? $metaDescription : 'Extranet GBAF'; ?>">
    <meta name="keywords" content="<?= (isset($metaKeywords)) ? $metaKeywords : 'Extranet GBAF'; ?>">

</head>
<body>
    <?= $header ?>
    <?= $content ?>
    <?= (isset($content2)) ? $content2 : ''; ?></title>
    <?= (isset($content3)) ? $content3 : ''; ?></title>
    <?= (isset($content4)) ? $content4 : ''; ?></title>
    <?= (isset($comment)) ? $comment : ''; ?></title>
    <?= $footer ?>
</body>
</html>