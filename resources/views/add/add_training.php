<!DOCTYPE html>
<html lang="fr-FR">
<!-- ADD TRAINING -->
<?php
$title = 'Ajouter un entrainement';
$buttons = true;
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
            <main class="add-training flex-evenly-center flex-column">
                <div id="title" class="flex-center-center flex-column">
                    <h1>Je me suis entrainé</h1>
                    <h2>Sélectionner le sport pratiqué et la durée de votre entrainement</h2>
                </div>
                <form method="post" action="" class="add-actions flex-center-center no-select flex-column">
                    <label for="sport">Sport</label>   
                    <select name="sport" id="sport" class="flex-center-center">
                        <option value="musculation">Musculation</option>
                        <option value="running">Course à pied</option>
                        <option value="cycling">Vélo</option>
                        <option value="boxing">Boxe anglaise</option>
                        <option value="calisthenics">Calisthénie</option>
                    </select>
                    <div class="time-container flex-center-center flex-column">
                        <label for="time">Durée</label>
                        <div id="time-indicator">0
                            <span>min</span>
                        </div>
                        <input type="range" id="time" name="time" min="0" max="180" steps="1" value="0">
                    </div>
                    <input class="primary-button" type="submit" value="Ajouter">
                </form>
            </main>
            <?php require('resources/views/layout/footer.php'); ?>
        </div>
    </div>
    <script src="<?= ROOT ?>public/js/training.js"></script>
</body>
</html>

