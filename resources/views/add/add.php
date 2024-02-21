<!DOCTYPE html>
<html lang="fr-FR">
<!-- ADD -->
<?php 

$title = 'Ajouter';
$footer = true;
$links = '
    <!-- ADD.CSS -->
    <link rel="preload" href="' . ROOT . 'public/css/pages/add/add.css' . V_QUERY . '" as="style" onload="this.onload=null;this.rel=\'stylesheet\'">
    <noscript><link rel="stylesheet" href="' . ROOT . 'public/css/pages/add/add.css' . V_QUERY . '"></noscript>
';


require('resources/views/layout/head.php'); 

?>
<body class="flex-center-center flex-column">
    <div id="app-container" class="flex-center-center flex-column">
        <div id="app" class="flex-center-center flex-column">
            <?php require('resources/views/layout/loader.php'); ?>
            <?php require('resources/views/layout/orientation_block.php'); ?>
            <?php require('resources/views/layout/header.php'); ?>
            <div class="main-container add flex-center-center flex-column">
                <div id="title" class="flex-center-center flex-column">
                    <h1>Ajouter</h1>
                </div>
                <div class="add-actions flex-between-center no-select">
                    <a href="<?= ROOT ?>add/training" class="add-action training flex-center-center flex-column">
                        <img class="no-select" src="<?= ROOT ?>public/images/icons/muscle.svg" alt="training-icon" height="32" width="32">
                        <p>Entrainement</p>
                    </a>
                    <a href="<?= ROOT ?>add/performance" class="add-action performance flex-center-center flex-column">
                        <img class="no-select" src="<?= ROOT ?>public/images/icons/target.svg" alt="performance-icon" height="35" width="35">                    
                        <p>Performance</p>
                    </a>
                </div>
            </div>
            <?php require('resources/views/layout/footer.php'); ?>
        </div>
    </div>
</body>
</html>

