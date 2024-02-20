<!DOCTYPE html>
<html lang="fr-FR">
<!-- USER -->
<?php 

$title = 'Profil';
$buttons = true;
$created = explode(' ', $_SESSION['user']['created']);
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
            <div class="main-container user flex-center-center flex-column">
                <div id="title" class="flex-center-center flex-column">
                    <img src="<?= ROOT ?>public/images/logo.webp" alt="gropec-logo" width="54" height="54">
                    <h1>Bonjour<?php if (isset($_SESSION['user']['username'])){echo  ", <span>". $_SESSION['user']['username'] . "</span>";}?></h1>
                </div>
                <?php if (isset($_SESSION['user'])) : ?>
                <div class="flex-center-center flex-column">
                    <h2>Vous êtes inscrit depuis le</h2>
                    <h2><?= $created[0] ?> à <?= $created[1] ?></h2>
                </div>
                <form class="sign-out-form flex-center-center flex-column" action="" method="post">
                    <input type="hidden" name="sign-out">
                    <input type="submit" value="Se déconnecter" class="quaternary-button flex-center-center">
                </form>
                <?php endif; ?>
            </div>
            <?php require('resources/views/layout/footer.php'); ?>
        </div>
    </div>
</body>
</html>

