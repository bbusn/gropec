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
                    <div class="custom-dropdown flex-center-center" id="sportsDropdown">
                        <div class="selected-option flex-center-center flex-column">Choisissez un sport</div>
                        <div class="dropdown-options">
                            <div class="option" data-value="musculation">Musculation</div>
                            <div class="option" data-value="calisthenics">Callisthénie</div>
                            <div class="option" data-value="running">Course à pied</div>
                            <div class="option" data-value="stretchings">Étirements</div>
                            <div class="option" data-value="cycling">Vélo</div>
                            <div class="option" data-value="boxing">Boxe anglaise</div>
                            <div class="option" data-value="swimming">Natation</div>
                            <div class="option" data-value="climbing">Escalade</div>
                            <div class="option" data-value="rowing">Aviron</div>
                            <div class="option" data-value="downhill-ski">Ski alpin</div>
                        </div>
                    </div>
                    <input type="hidden" name="sport" value="" id="sport">
                    <div class="time-container flex-center-center flex-column">
                        <div id="time-indicator" class="flex-center-center">0
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
    <script src="<?= ROOT ?>public/js/training.js<?= V_QUERY ?>"></script>
</body>
</html>

