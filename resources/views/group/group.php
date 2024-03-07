<!DOCTYPE html>
<html lang="fr-FR">
<!-- GROUP -->
<?php 
$sports = ['running'=>'Course à Pied', 'musculation'=>'Musculation', 'cycling'=>'Vélo', 'calisthenics'=>'Callisthénie', 'boxing'=>'Boxe anglaise', 'swimming'=>'Natation', 'climbing'=>'Escalade', 'rowing'=>'Aviron', 'downhill-ski'=>'Ski alpin', 'stretchings'=>'Étirements'];
$title = 'Groupe d\'amis';  
$buttons = true;
if (empty($_SESSION['user']['group'])) {
    $inputs = true;
}
if (!empty($_SESSION['user']['group']['today']['trainings'])) {
    $scroll = true;
}
$footer = true;
$links = '
    <!-- GROUP.CSS -->
    <link rel="preload" href="' . ROOT . 'public/css/pages/group/group.css' . V_QUERY . '" as="style" onload="this.onload=null;this.rel=\'stylesheet\'">
    <noscript><link rel="stylesheet" href="' . ROOT . 'public/css/pages/group/group.css' . V_QUERY . '"></noscript>
';

function formatTime($time) {
    if ($time > 60) {
        $minutes = $time % 60;
        if ($minutes < 10) {
            $minutes = '0' . $minutes;
        }
        return floor($time / 60) . ' h ' . $minutes;
    } else {
        return $time . ' min';
    }
}

require('resources/views/layout/head.php'); 

?>
<body class="flex-center-center flex-column">
    <div id="app-container" class="flex-center-center flex-column">
        <div id="app" class="flex-center-center flex-column">
            <?php require('resources/views/layout/loader.php'); ?>
            <?php require('resources/views/layout/orientation_block.php'); ?>
            <?php require('resources/views/layout/header.php'); ?>
            <main class="group flex-evenly-center flex-column">
                <?php if (isset($_SESSION['user']['group'])) : ?>
                    <div id="title" class="flex-center-center flex-column">
                        <h1><span><?= $_SESSION['user']['group']['name'] ?></span></h1>
                        <h2>Code : <?= $_SESSION['user']['group']['code'] ?></h2>
                    </div>
                    <div class="group-today flex-center-center flex-column no-select">
                        <?php if (!empty($_SESSION['user']['group']['today']['trainings'])) : ?>
                            <h2>Aujourd'hui</h2>
                            <div class="group-today-trainings flex-start-center flex-column">
                                <?php foreach ($_SESSION['user']['group']['today']['trainings'] as $training) : ?>
                                    <div class="group-today-training <?php if ($training['username'] !== $_SESSION['user']['username']) : ?>user<?php else: ?><?php endif;?> flex-evenly-center" data-href="<?php if ($training['username'] !== $_SESSION['user']['username']) : ?><?= ROOT ?>group/user/<?= $training['username']; ?><?php else : ?><?= ROOT ?>user<?php endif; ?>">
                                        <div class="flex-start-center">
                                            <img src="<?= ROOT ?>public/images/sports/<?= $training['sport'] ?>.svg" alt="training-icon" width="15" height="15">
                                            <?= $sports[$training['sport']] ?>
                                        </div>
                                        <span><?php if ($training['username'] !== $_SESSION['user']['username']) {echo $training['username'];} else {echo '(vous)';} ?></span>
                                        <span><?php echo formatTime($training['time']); ?></span>
                                    </div>
                                <?php endforeach; ?>
                            </div>
                        <?php else : ?>
                            <h2>Aucun membre ne s'est entrainé aujourd'hui</h2>
                        <?php endif; ?>
                        <img class="group-image" src="<?= ROOT ?>public/images/group/background.webp" alt="group-background">
                        <div class="group-image-rgba"></div>
                    </div>
                    <div class="group-actions flex-center-center flex-column no-select">
                        <a href="<?= ROOT ?>group/users" class="flex-center-center quaternary-button">
                            <img src="<?= ROOT ?>public/images/icons/group.svg" alt="group-icon" width="18" height="18">
                            Membres du groupe
                        </a>
                        <a href="<?= ROOT ?>group/settings" class="flex-center-center quaternary-button">
                            <img src="<?= ROOT ?>public/images/icons/settings.svg" alt="group-icon" width="15" height="15">
                            Paramètres
                        </a>
                    </div>
                <?php else : ?>
                    <div id="title" class="flex-center-center flex-column no-select">
                        <h1><span>Vous n'avez pas encore de groupe</span></h1>
                        <h2>Rejoignez-en un ou créez le vôtre</h2>
                    </div>
                    <form class="group-actions flex-center-center flex-column no-select" action="" method="post">
                        <div class="flex-center-center flex-column">
                            <input type="hidden" name="join-group">
                            <label for="code">Code de groupe</label>
                            <input type="text" id="code" name="code">
                            <input type="submit" class="flex-center-center primary-button" value="Rejoindre le groupe">
                        </div>
                        <h2>ou</h2>                    
                        <a href="<?= ROOT ?>group/create" class="flex-center-center secondary-button">Créer un groupe</a>
                    </form>
                <?php endif; ?>
            </main>
            <?php if (!empty($_SESSION['user']['group']['today']['trainings'])) : ?>
                <script src="<?= ROOT ?>public/js/group.js"></script>
            <?php endif; ?>
            <?php require('resources/views/layout/footer.php'); ?>
        </div>
    </div>
</body>
</html>

