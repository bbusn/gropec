<!DOCTYPE html>
<html lang="fr-FR">
<!-- START -->
<?php 

$buttons = true;
$links = '
    <!-- START.CSS -->
    <link rel="preload" href="' . ROOT . 'public/css/pages/start/start.css' . V_QUERY . '" as="style" onload="this.onload=null;this.rel=\'stylesheet\'">
    <noscript><link rel="stylesheet" href="' . ROOT . 'public/css/pages/start/start.css' . V_QUERY . '"></noscript>
';

require('resources/views/layout/head.php'); 

?>
<body class="flex-center-center flex-column">
    <div id="app-container" class="flex-center-center flex-column">
        <div id="app" class="flex-center-center flex-column">
            <?php require('resources/views/layout/loader.php'); ?>
            <?php require('resources/views/layout/header.php'); ?>
            <?php require('resources/views/layout/orientation_block.php'); ?>
            <main class="start flex-center-center flex-column no-select">
                <div id="title" class="flex-center-center flex-column">
                    <img src="<?= ROOT ?>public/images/logo.webp" alt="gropec-logo" width="54" height="54">
                    <h1>Gropec</h1>
                    <h2>Application de sport entre amis</h2>
                </div>
                <button id="start" class="primary-button flex-center-center">Commencer</button>
                <p>En cliquant sur Commencer, vous consentez à l'utilisation de cookies fonctionnels uniquement.</p>
                <div class="infos flex-center-center flex-column">
                    <div class="legal flex-center-center">
                        <a href="<?= ROOT ?>privacy">Confidentialité</a>
                        <a href="<?= ROOT ?>terms">Mentions légales</a>
                    </div>
                </div>
                <form id="start-form" action="" method="post">
                    <input type="hidden" name="started">
                </form>
            </main>
        </div>
    </div>
</body>
<script src="<?= ROOT ?>public/js/start.js<?= V_QUERY ?>" defer></script>
</html>

