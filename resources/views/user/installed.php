<!DOCTYPE html>
<html lang="fr-FR">
<!-- INSTALLED -->
<?php 

$links = '
    <!-- INSTALL.CSS -->
    <link rel="preload" href="' . ROOT . 'public/css/pages/install/install.css' . V_QUERY . '" as="style" onload="this.onload=null;this.rel=\'stylesheet\'">
    <noscript><link rel="stylesheet" href="' . ROOT . 'public/css/pages/install/install.css' . V_QUERY . '"></noscript>
';

require('resources/views/layout/head.php'); 

?>
<body class="flex-center-center flex-column">
    <div id="app-container" class="flex-center-center flex-column">
        <div id="app" class="flex-center-center flex-column">
            <?php require('resources/views/layout/loader.php'); ?>
            <?php require('resources/views/layout/header.php'); ?>
            <?php require('resources/views/layout/orientation_block.php'); ?>
            <div class="main-container installed flex-center-center flex-column">
                <div id="title" class="flex-center-center flex-column">
                    <img class="no-select" src="<?= ROOT ?>public/images/logo.webp" alt="gropec-logo" width="54" height="54">
                    <h1>Merci d'avoir installé</h1>
                    <h2>Dès lors l'application installée vous pourrez la lancer depuis votre accueil</h2>
                    <p>Si vous êtes toujours sur cette page, essayez de recharger la page ou relancer l'application. Si un problème survient avec l'application veuillez contacter le dévéveloppeur.</p>
                </div>
            </div>
        </div>
    </div>
</body>
</html>

