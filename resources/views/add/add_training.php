<!DOCTYPE html>
<html lang="fr-FR">
<!-- ADD TRAINING -->
<?php 

$title = 'Ajouter un entrainement';
$return = true;
$footer = true;
$links = '
    <!-- ADD-TRAINING.CSS -->
    <link rel="preload" href="' . ROOT . 'public/css/pages/add/add-training.css' . V_QUERY . '" as="style" onload="this.onload=null;this.rel=\'stylesheet\'">
    <noscript><link rel="stylesheet" href="' . ROOT . 'public/css/pages/add/add-training.css' . V_QUERY . '"></noscript>
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
                    <h1>Je me suis entrainé</h1>
                </div>
                <div class="add-actions flex-between-center no-select">
                    <form method="post" action="">
                        <label for="date">Date</label>
                        <input type="date" id="date" name="date">
                        <label for="time">Durée</label>
                        <input type="range" id="time" name="date">
                        <input type="submit" value="Ajouter">
                    </form>
                </div>
            </main>
            <?php require('resources/views/layout/footer.php'); ?>
        </div>
    </div>
</body>
</html>

