<!DOCTYPE html>
<html lang="fr-FR">
<!-- GROUP USER STATISTICS -->
<?php 
$sports = ['running'=>'Course à Pied', 'musculation'=>'Musculation', 'cycling'=>'Vélo', 'calisthenics'=>'Calisthénie', 'boxing'=>'Boxe anglaise'];
$title = 'Statistiques de ' . $_SESSION['user']['group']['user']['username'];
$return = true;
$footer = true;
$links = '
    <!-- STATISTICS.CSS -->
    <link rel="preload" href="' . ROOT . 'public/css/pages/user/statistics.css' . V_QUERY . '" as="style" onload="this.onload=null;this.rel=\'stylesheet\'">
    <noscript><link rel="stylesheet" href="' . ROOT . 'public/css/pages/user/statistics.css' . V_QUERY . '"></noscript>
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
            <main class="statistics flex-center-center flex-column">
                <div id="title" class="flex-center-center flex-column">
                    <h1>Statistiques</h1>
                </div>
                <div class="statistics-container <?php if (empty($_SESSION['user']['group']['user']['history'])) {echo 'flex-center-center empty';}else{echo 'flex-between-center';}?> flex-column">
                    <?php if (!empty($_SESSION['user']['group']['user']['history'])): ?>
                        <h3 class="flex-center-center flex-column"><?= $_SESSION['user']['group']['user']['statistics']['trainings']['count'] ?> <span>entrainement<?php if ($_SESSION['user']['group']['user']['statistics']['trainings']['count'] > 1) : ?>s<?php endif; ?></span></h3>
                        <h3 class="flex-center-center flex-column"><?php echo formatTime($_SESSION['user']['group']['user']['statistics']['trainings']['average']['time']) ?> <span>en moyenne par entrainement</span></h3>
                        <?php if ($_SESSION['user']['group']['user']['statistics']['trainings']['count'] > 1) : ?>
                            <h3 class="flex-center-center flex-column"><?php echo formatTime($_SESSION['user']['group']['user']['statistics']['trainings']['max']['time']) ?> <span>est son entrainement le plus long</span></h3>
                        <?php endif; ?>
                        <h3 class="flex-center-center flex-column"><?= $sports[$_SESSION['user']['group']['user']['statistics']['trainings']['sport']['prefered']['name']] ?><span>Sport préféré</span></h3>
                    <?php else : ?>
                        <h2><?= $_SESSION['user']['group']['user']['username'] ?> n'a pas encore ajouté d'entrainement pour l'instant.</h2>
                    <?php endif; ?>
                </div>
            </main>
            <?php require('resources/views/layout/footer.php'); ?>
        </div>
    </div>
</body>
</html>