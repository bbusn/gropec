<!DOCTYPE html>
<html lang="fr-FR">
<!-- PASSWORD -->
<?php 

$title = 'Modifier le mot de passe';
$buttons = true;
$inputs = true;
$return = true;
$footer = true;
$links = '
    <!-- PASSWORD.CSS -->
    <link rel="preload" href="' . ROOT . 'public/css/pages/user/password.css' . V_QUERY . '" as="style" onload="this.onload=null;this.rel=\'stylesheet\'">
    <noscript><link rel="stylesheet" href="' . ROOT . 'public/css/pages/user/password.css' . V_QUERY . '"></noscript>
';

require('resources/views/layout/head.php'); 

?>
<body class="flex-center-center flex-column">
    <div id="app-container" class="flex-center-center flex-column">
        <div id="app" class="flex-center-center flex-column">
            <?php require('resources/views/layout/loader.php'); ?>
            <?php require('resources/views/layout/orientation_block.php'); ?>
            <?php require('resources/views/layout/header.php'); ?>
            <main class="password flex-evenly-center flex-column">
                <div id="title" class="flex-center-center flex-column">
                    <h1>Modifier le mot de passe</h1>
                </div>
                <form class="modify-password flex-center-center flex-column" action="" method="post">
                    <div class="flex-center-center flex-column">
                        <input type="hidden" name="modify-password">
                        <label for="old-password">Ancien mot de passe</label>
                        <input type="password" name="old-password" class="flex-center-center">
                    </div>
                    <div class="flex-center-center flex-column">
                        <label for="password">Nouveau mot de passe</label>
                        <input type="password" name="password" class="flex-center-center">
                    </div>
                    <div class="flex-center-center flex-column">
                        <label for="password-confirm">Confirmer le mot de passe</label>
                        <input type="password" name="password-confirm" class="flex-center-center">
                    </div>
                    <input type="submit" value="Modifier" class="primary-button flex-center-center">
                </form>
            </main>
            <?php require('resources/views/layout/footer.php'); ?>
        </div>
    </div>
</body>
</html>

