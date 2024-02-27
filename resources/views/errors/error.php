<!DOCTYPE html>
<html lang="fr-FR">
<!-- ERROR -->
<?php 

$title = 'Erreur';
$footer = true;
require('resources/views/layout/head.php'); 

?>
<body class="flex-center-center flex-column">
    <div id="app-container" class="flex-center-center flex-column">
        <div id="app" class="flex-center-center flex-column">
            <?php require('resources/views/layout/loader.php'); ?>
            <?php require('resources/views/layout/orientation_block.php'); ?>
            <?php require('resources/views/layout/header.php'); ?>
            <main class="error flex-center-center flex-column">
                <div id="title" class="flex-center-center flex-column">
                    <img src="<?= ROOT ?>public/images/logo.webp" class="no-select" alt="gropec-logo" width="54" height="54">
                    <h1>Erreur</h1>
                    <h2>Vous avez rencontré une erreur, si le problème persiste veuillez contacter le développeur.</h2>
                </div>
            </main>
            <?php require('resources/views/layout/footer.php'); ?>
        </div>
    </div>
</body>
</html>

