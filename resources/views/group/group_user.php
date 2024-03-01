<!DOCTYPE html>
<html lang="fr-FR">
<!-- USER -->
<?php 

$title = 'Profil de ' . $_SESSION['user']['group']['user']['username'];
$created = explode(' ', $_SESSION['user']['group']['user']['created']);
$return = true;
$buttons = true;
$footer = true;
$links = '
    <!-- USER.CSS -->
    <link rel="preload" href="' . ROOT . 'public/css/pages/user/user.css' . V_QUERY . '" as="style" onload="this.onload=null;this.rel=\'stylesheet\'">
    <noscript><link rel="stylesheet" href="' . ROOT . 'public/css/pages/user/user.css' . V_QUERY . '"></noscript>
';


require('resources/views/layout/head.php'); 

?>
<body class="flex-center-center flex-column">
    <div id="app-container" class="flex-center-center flex-column">
        <div id="app" class="flex-center-center flex-column">
            <?php require('resources/views/layout/loader.php'); ?>
            <?php require('resources/views/layout/orientation_block.php'); ?>
            <?php require('resources/views/layout/header.php'); ?>
            <main class="group-user flex-center-center flex-column">
                <div id="title" class="flex-center-center flex-column">
                    <img src="<?= ROOT ?>public/images/logo.webp" alt="gropec-logo" width="54" height="54">
                    <h1><span><?= $_SESSION['user']['group']['user']['username'] ?></span></h1>
                    <h2>Inscrit depuis le</h2>
                    <h2><?= $created[0] ?> à <?= $created[1] ?></h2>
                </div>
                <div class="user-actions flex-center-center flex-column no-select">
                    <a href="<?= ROOT ?>group/user/<?= $_SESSION['user']['group']['user']['username'] ?>/history" class="user-action flex-center-center">
                        <img src="<?= ROOT ?>public/images/icons/history.svg" alt="journal-icon" width="15" height="15">Historique
                    </a>
                </div>
            </main>
            <?php require('resources/views/layout/footer.php'); ?>
        </div>
    </div>
</body>
</html>

