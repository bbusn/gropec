<!DOCTYPE html>
<html lang="fr-FR">
<!-- SIGN UP -->
<?php 

$title = 'S\'inscrire';
$top_title = $title;
$buttons = true;
$inputs = true;
$return = true;
$return_installation = true;
$footer = true;
$links = '
    <!-- AUTHENTIFICATION.CSS -->
    <link rel="preload" href="' . ROOT . 'public/css/pages/user/authentification.css' . V_QUERY . '" as="style" onload="this.onload=null;this.rel=\'stylesheet\'">
    <noscript><link rel="stylesheet" href="' . ROOT . 'public/css/pages/user/authentification.css' . V_QUERY . '"></noscript>
';

require('resources/views/layout/head.php'); 

?>
<body class="flex-center-center flex-column">
    <div id="app-container" class="flex-center-center flex-column">
        <div id="app" class="flex-center-center flex-column">
            <?php require('resources/views/layout/loader.php'); ?>
            <?php require('resources/views/layout/orientation_block.php'); ?>
            <?php require('resources/views/layout/header.php'); ?>
            <main class="authentification flex-center-center flex-column no-select">
                <h2 style="margin-bottom:20px;">La création de compte est indisponible, veuillez réessayer d'ici quelques jours.</h2>
                <a class="secondary-button flex-center-center" href="<?= ROOT ?>user/sign-in">J'ai déjà un compte</a>
            </main>
            <?php require('resources/views/layout/footer.php'); ?>
        </div>
    </div>
</body>
</html>

