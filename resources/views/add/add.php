<!DOCTYPE html>
<html lang="fr-FR">
<!-- ADD -->
<?php 

$title = 'Ajouter';
$buttons = true;
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
            <main class="add flex-center-center flex-column">
                <div id="title" class="flex-center-center flex-column">
                    <h1>Ajouter</h1>
                </div>
                <div class="add-actions flex-center-center no-select flex-column">
                    <a href="<?= ROOT ?>add/training" class="primary-button training flex-center-center">
                        <p>Entrainement</p>
                    </a>
                    <a href="<?= ROOT ?>add/performance" class="quaternary-button performance flex-center-center">
                        <p>Performance</p>
                    </a>
                </div>
            </main>
            <?php require('resources/views/layout/footer.php'); ?>
        </div>
    </div>
</body>
</html>

