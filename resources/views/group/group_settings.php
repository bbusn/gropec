<!DOCTYPE html>
<html lang="fr-FR">
<!-- GROUP SETTINGS -->
<?php 

$title = 'Paramètres du groupe';  
$buttons = true;
$return = true;
$footer = true;
$links = '
    <!-- GROUP-SETTINGS.CSS -->
    <link rel="preload" href="' . ROOT . 'public/css/pages/group/group-settings.css' . V_QUERY . '" as="style" onload="this.onload=null;this.rel=\'stylesheet\'">
    <noscript><link rel="stylesheet" href="' . ROOT . 'public/css/pages/group/group-settings.css' . V_QUERY . '"></noscript>
';


require('resources/views/layout/head.php'); 

?>
<body class="flex-center-center flex-column">
    <div id="app-container" class="flex-center-center flex-column">
        <div id="app" class="flex-center-center flex-column">
            <?php require('resources/views/layout/loader.php'); ?>
            <?php require('resources/views/layout/orientation_block.php'); ?>
            <?php require('resources/views/layout/header.php'); ?>
            <main class="group flex-evenly-center flex-column">
                <div id="title" class="flex-center-center flex-column">
                    <h1>Paramètres</h1>
                </div>
                <div class="group-actions flex-center-center flex-column no-select">
                    <form class="flex-center-center flex-column no-select" action="" method="post">
                        <input type="hidden" name="leave-group">
                        <input type="submit" value="Quitter le groupe" class="quaternary-button flex-center-center ">
                    </form>
                </div>
            </main>
            <?php require('resources/views/layout/footer.php'); ?>
        </div>
    </div>
</body>
</html>

