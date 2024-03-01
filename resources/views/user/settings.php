<!DOCTYPE html>
<html lang="fr-FR">
<!-- SETTINGS -->
<?php 

$title = 'Paramètres';
$buttons = true;
$confirm = true;
$return = true;
$footer = true;
$links = '
    <!-- SETTINGS.CSS -->
    <link rel="preload" href="' . ROOT . 'public/css/pages/user/settings.css' . V_QUERY . '" as="style" onload="this.onload=null;this.rel=\'stylesheet\'">
    <noscript><link rel="stylesheet" href="' . ROOT . 'public/css/pages/user/settings.css' . V_QUERY . '"></noscript>
';

require('resources/views/layout/head.php'); 

?>
<body class="flex-center-center flex-column">
    <div id="app-container" class="flex-center-center flex-column">
        <div id="app" class="flex-center-center flex-column">
            <?php require('resources/views/layout/loader.php'); ?>
            <?php require('resources/views/layout/orientation_block.php'); ?>
            <?php require('resources/views/layout/header.php'); ?>
            <main class="settings flex-center-center flex-column">
                <div id="title" class="flex-center-center flex-column">
                    <h1>Paramètres</h1>
                </div>
                <button id="delete-account" class="quaternary-button flex-center-center">Supprimer mon compte</button>
                <a href="<?= ROOT ?>user/settings/password" class="secondary-button flex-center-center">Modifier le mot de passe</a>
                <form class="sign-out flex-center-center flex-column" action="" method="post">
                    <input type="hidden" name="sign-out">
                    <input type="submit" value="Se déconnecter" class="primary-button flex-center-center">
                </form>
            </main>
            <div class="confirm flex-center-center flex-column no-select">
                <div class="confirm-container flex-center-center flex-column">
                    <p>Êtes-vous sûr de vouloir supprimer votre compte ?</p>
                    <div class="confirm-actions flex-center-center flex-column">
                        <button id="confirm" class="secondary-button flex-center-center">Confirmer</button>
                        <button id="cancel" class="primary-button flex-center-center">Annuler</button>
                    </div>
                </div>
            </div>
            <form class="delete-account flex-center-center flex-column" action="" method="post">
                <input type="hidden" name="delete-account">
            </form>
            <?php require('resources/views/layout/footer.php'); ?>
        </div>
    </div>
    <script src="<?= ROOT ?>public/js/delete.js<?= V_QUERY ?>"></script>
</body>
</html>

