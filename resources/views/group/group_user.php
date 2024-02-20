<!DOCTYPE html>
<html lang="fr-FR">
<!-- USER -->
<?php 

$title = 'Profil de ' . $_SESSION['user']['group']['user']['username'];
$created = explode(' ', $_SESSION['user']['group']['user']['created']);
$buttons = true;
$footer = true;
$links = '
    <!-- GROUP-USER.CSS -->
    <link rel="preload" href="' . ROOT . 'public/css/pages/group/group-user.css' . V_QUERY . '" as="style" onload="this.onload=null;this.rel=\'stylesheet\'">
    <noscript><link rel="stylesheet" href="' . ROOT . 'public/css/pages/group/group-user.css' . V_QUERY . '"></noscript>
';


require('resources/views/layout/head.php'); 

?>
<body class="flex-center-center flex-column">
    <div id="app-container" class="flex-center-center flex-column">
        <div id="app" class="flex-center-center flex-column">
            <?php require('resources/views/layout/loader.php'); ?>
            <?php require('resources/views/layout/orientation_block.php'); ?>
            <?php require('resources/views/layout/header.php'); ?>
            <div class="main-container user flex-center-center flex-column">
                <div id="title" class="flex-center-center flex-column">
                    <img src="<?= ROOT ?>public/images/logo.webp" alt="gropec-logo" width="54" height="54">
                    <h1><span><?= $_SESSION['user']['group']['user']['username'] ?></span></h1>
                    <h2>Inscrit depuis le</h2>
                    <h2><?= $created[0] ?> à <?= $created[1] ?></h2>
                </div>
            </div>
            <?php require('resources/views/layout/footer.php'); ?>
        </div>
    </div>
</body>
</html>

