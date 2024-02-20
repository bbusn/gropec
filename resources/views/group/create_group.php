<!DOCTYPE html>
<html lang="fr-FR">
<!-- GROUP -->
<?php 

$title = 'Créer un groupe';  
$buttons = true;
$footer = true;
$links = '
    <!-- CREATE_GROUP.CSS -->
    <link rel="preload" href="' . ROOT . 'public/css/pages/group/create-group.css' . V_QUERY . '" as="style" onload="this.onload=null;this.rel=\'stylesheet\'">
    <noscript><link rel="stylesheet" href="' . ROOT . 'public/css/pages/group/create-group.css' . V_QUERY . '"></noscript>
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
            <div class="main-container group flex-evenly-center flex-column">
                <div id="title" class="flex-center-center flex-column">
                    <h1>Créer votre propre groupe d'amis</h1>
                    <h2>Inviter vos amis grâce au code unique. 9 personnes maximum</h2>
                </div>
                <form class="group-actions flex-center-center flex-column no-select" action="" method="post">
                    <input type="hidden" name="create-group">
                    <input type="text" placeholder="Nom du groupe" name="name">
                    <input type="submit" class="flex-center-center primary-button" value="Créer le groupe">
                </form>
            </div>
            <?php require('resources/views/layout/footer.php'); ?>
        </div>
    </div>
</body>
</html>

