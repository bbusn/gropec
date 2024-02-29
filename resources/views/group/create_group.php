<!DOCTYPE html>
<html lang="fr-FR">
<!-- GROUP -->
<?php 

$title = 'Créer un groupe';
$return = true;
$buttons = true;
$inputs = true;
$footer = true;
$links = '
    <!-- CREATE_GROUP.CSS -->
    <link rel="preload" href="' . ROOT . 'public/css/pages/group/create-group.css' . V_QUERY . '" as="style" onload="this.onload=null;this.rel=\'stylesheet\'">
    <noscript><link rel="stylesheet" href="' . ROOT . 'public/css/pages/group/create-group.css' . V_QUERY . '"></noscript>
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
                    <h1>Créer votre propre groupe d'amis</h1>
                    <h2>Inviter jusqu'à 9 personnes à l'aide du code unique.</h2>
                </div>
                <form class="group-actions flex-center-center flex-column no-select" action="" method="post">
                    <input type="hidden" name="create-group">
                    <label for="name">Nom du groupe</label>
                    <input type="text" id="name" name="name">
                    <input type="submit" class="flex-center-center primary-button" value="Créer le groupe">
                </form>
            </main>
            <?php require('resources/views/layout/footer.php'); ?>
        </div>
    </div>
</body>
</html>

