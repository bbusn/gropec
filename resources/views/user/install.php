<!DOCTYPE html>
<html lang="fr-FR">
<!-- INSTALL -->
<?php 

$buttons = true;
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
            <div class="main-container install flex-center-center flex-column  no-select">
                <div id="title" class="flex-center-center flex-column">
                    <img src="<?= ROOT ?>public/images/logo.webp" alt="gropec-logo" width="54" height="54">
                    <h1>Gropec</h1>
                    <h2>Application de sport entre amis</h2>
                </div>
                <button id="install" class="primary-button flex-center-center">Installer</button>
                <button id="web" class="tertiary-button flex-center-center">Utiliser la version web</button>
                <div class="infos flex-center-center flex-column">
                    <p class="help flex-center-center">Si le bouton "installer" ne fonctionne pas, cherchez l'option pour l'installer vous-même sur votre navigateur. Si elle est n'est pas présente, cliquez sur utiliser la version web (moins optimisée).</p>
                    <div class="legal flex-center-center">
                        <a href="<?= ROOT ?>privacy">Confidentialité</a>
                        <a href="<?= ROOT ?>terms">Mentions légales</a>
                    </div>
                </div>
                <form id="installed-form" action="" method="post">
                    <input type="hidden" name="installed">
                </form>
                <form id="refused-form" action="" method="post">
                    <input type="hidden" name="refused">
                </form>
                <form id="web-form" action="" method="post">
                    <input type="hidden" name="web">
                </form>
            </div>
        </div>
    </div>
</body>
<script src="<?= ROOT ?>public/js/install.js<?= V_QUERY ?>" defer></script>
</html>

