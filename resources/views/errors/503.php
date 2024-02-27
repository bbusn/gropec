<!DOCTYPE html>
<html lang="fr-FR">
<!-- ERROR 404 -->
<?php 

$title = 'Erreur 503';
$footer = true;
require('resources/views/layout/head.php'); 

?>
<body class="flex-center-center flex-column">
    <div id="app-container" class="flex-center-center flex-column">
        <div id="app" class="flex-center-center flex-column">
            <?php require('resources/views/layout/loader.php'); ?>
            <?php require('resources/views/layout/orientation_block.php'); ?>
            <?php require('resources/views/layout/header.php'); ?>
            <main class="503 flex-center-center flex-column">
                <div id="title" class="flex-center-center flex-column">
                    <img src="<?= ROOT ?>public/images/logo.webp" class="no-select" alt="gropec-logo" width="54" height="54">
                    <h1>Erreur 503</h1>
                    <h2>Cette page est temporairement indisponible. Utilisez la navigation pour revenir à l'accueil.</h2>
                </div>
            </main>
            <?php require('resources/views/layout/footer.php'); ?>
        </div>
    </div>
</body>
</html>

