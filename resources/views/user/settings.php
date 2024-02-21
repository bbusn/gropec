<!DOCTYPE html>
<html lang="fr-FR">
<!-- SETTINGS -->
<?php 

$title = 'Paramètres';
$buttons = true;
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
            <div class="main-container settings flex-center-center flex-column">
                <div id="title" class="flex-center-center flex-column">
                    <h1>Paramètres</h1>
                </div>
                <form class="sign-out-form flex-center-center flex-column" action="" method="post">
                    <input type="hidden" name="sign-out">
                    <input type="submit" value="Se déconnecter" class="quaternary-button flex-center-center">
                </form>
            </div>
            <?php require('resources/views/layout/footer.php'); ?>
        </div>
    </div>
</body>
</html>

