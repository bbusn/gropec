<!DOCTYPE html>
<html lang="fr-FR">
<!-- SIGN IN -->
<?php 

$title = 'Se connecter';
$footer = true;
$buttons = true;
$links = '
    <!-- AUTHENTIFICATION.CSS -->
    <link rel="preload" href="' . ROOT . 'public/css/pages/user/authentification.css' . V_QUERY . '" as="style" onload="this.onload=null;this.rel=\'stylesheet\'">
    <noscript><link rel="stylesheet" href="' . ROOT . 'public/css/pages/user/authentification.css' . V_QUERY . '"></noscript>
    <!-- INPUTS.CSS -->
    <link rel="preload" href="' . ROOT . 'public/css/components/inputs.css' . V_QUERY . '" as="style" onload="this.onload=null;this.rel=\'stylesheet\'">
    <noscript><link rel="stylesheet" href="' . ROOT . 'public/css/components/inputs.css' . V_QUERY . '"></noscript>
';
require('resources/views/layout/head.php'); 

?>
<body class="flex-center-center flex-column">
    <div id="app-container" class="flex-center-center flex-column">
        <div id="app" class="flex-center-center flex-column">
            <?php require('resources/views/layout/loader.php'); ?>
            <?php require('resources/views/layout/orientation_block.php'); ?>
            <?php require('resources/views/layout/header.php'); ?>
            <div class="main-container authentification flex-center-center flex-column no-select">
                <div id="title" class="flex-center-center flex-column">
                    <img src="<?= ROOT ?>public/images/logo.webp" alt="gropec-logo" width="54" height="54">
                    <h1>Se connecter</h1>
                </div>
                <form class="sign-in flex-center-center flex-column" action="" method="post">
                    <label for="username">Nom d'utilisateur</label>
                    <input type="text" id="username" name="username">                        
                    <label for="password">Mot de passe</label>
                    <input type="password" id="password" name="password">
                    <input type="submit" class="primary-button flex-center-center" value="Se connecter">
                    <a class="secondary-button flex-center-center" href="<?= ROOT ?>user/sign-up">Je n'ai pas de compte</a>
                </form>
                <?php if (!isset($_SESSION['app'])): ?>
                <form class="back-install" action="" method="post">
                    <input type="hidden" name="back-install">
                    <input type="submit" class="tertiary-button flex-center-center" value="Revenir à l'installation">
                </form>
                <?php endif; ?>
            </div>
            <?php require('resources/views/layout/footer.php'); ?>
        </div>
    </div>
</body>
</html>

