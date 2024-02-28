<!DOCTYPE html>
<html lang="fr-FR">
<!-- HISTORY -->
<?php 
$sports = ['running'=>'Course à Pied', 'musculation'=>'Musculation', 'cycling'=>'Vélo', 'calisthenics'=>'Calisthénie', 'boxing'=>'Boxe anglaise'];
$title = 'Historique';
$return = true;
$footer = true;
$links = '
    <!-- HISTORY.CSS -->
    <link rel="preload" href="' . ROOT . 'public/css/pages/user/history.css' . V_QUERY . '" as="style" onload="this.onload=null;this.rel=\'stylesheet\'">
    <noscript><link rel="stylesheet" href="' . ROOT . 'public/css/pages/user/history.css' . V_QUERY . '"></noscript>
';

require('resources/views/layout/head.php'); 

?>
<body class="flex-center-center flex-column">
    <div id="app-container" class="flex-center-center flex-column">
        <div id="app" class="flex-center-center flex-column">
            <?php require('resources/views/layout/loader.php'); ?>
            <?php require('resources/views/layout/orientation_block.php'); ?>
            <?php require('resources/views/layout/header.php'); ?>
            <main class="history flex-center-center flex-column">
                <div id="title" class="flex-center-center flex-column">
                    <h1>Historique</h1>
                </div>
                <div class="history-container flex-center-center flex-column">
                    <?php if (isset($_SESSION['user']['history'])): ?>
                        <?php foreach ($_SESSION['user']['history'] as $item) : ?>
                            <?php if (isset($item['sport'])) : ?>
                                <?php $sport = $item['sport']?>
                                <div class="training flex-between-center">
                                    <p><?= $item['date'] ?></p>
                                    <p><?= $sports[$sport] ?></p>
                                    <p><?= $item['time'] ?> min</p>
                                </div>
                            <?php else: ?>
                                <h2>Les performances ne sont pas encore disponible</h2>
                            <?php endif; ?>
                        <?php endforeach; ?>
                    <?php else : ?>
                        <h2>Ajouter un entrainement ou une performance pour la voir apparaître ici.</h2>
                    <?php endif; ?>
                </div>
            </main>
            <?php require('resources/views/layout/footer.php'); ?>
        </div>
    </div>
</body>
</html>