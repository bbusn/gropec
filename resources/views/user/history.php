<!DOCTYPE html>
<html lang="fr-FR">
<!-- HISTORY -->
<?php 
$sports = ['running'=>'Course à Pied', 'musculation'=>'Musculation', 'cycling'=>'Vélo', 'calisthenics'=>'Callisthénie', 'boxing'=>'Boxe anglaise', 'swimming'=>'Natation', 'climbing'=>'Escalade', 'rowing'=>'Aviron', 'downhill-ski'=>'Ski alpin', 'stretchings'=>'Étirements'];
$title = 'Historique';
$current_date = date('Y-m-d');
$current_year = date('Y');
$week_days = ['monday'=>'Lundi', 'Tuesday'=>'Mardi', 'wednesday'=>'Mercredi', 'thursday'=>'Jeudi', 'friday'=>'Vendredi', 'saturday'=>'Samedi', 'sunday'=>'Dimanche'];
$return = true;
$footer = true;
if (!empty($_SESSION['user']['history'])) {
    $confirm = true;
    $buttons = true;
    $scroll = true;
}
$links = '
    <!-- HISTORY.CSS -->
    <link rel="preload" href="' . ROOT . 'public/css/pages/user/history.css' . V_QUERY . '" as="style" onload="this.onload=null;this.rel=\'stylesheet\'">
    <noscript><link rel="stylesheet" href="' . ROOT . 'public/css/pages/user/history.css' . V_QUERY . '"></noscript>
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
            <main class="history flex-center-center flex-column">
                <div id="title" class="flex-center-center flex-column">
                    <h1>Historique</h1>
                </div>
                <div class="history-container <?php if (empty($_SESSION['user']['history'])) {echo 'flex-center-center empty';}else{echo 'flex-start-center';}?> flex-column">
                    <?php if (!empty($_SESSION['user']['history'])): ?>
                        <?php foreach ($_SESSION['user']['history'] as $item) : ?>
                            <?php if (isset($item['sport'])) : ?>
                                <?php 
                                    $item_date = new DateTime($item['date']);
                                    $day_month = $item_date->format('d-m');
                                    $year = $item_date->format('Y');
                                    $day_name = $week_days[$item['day']];
                                ?>
                                <div class="training flex-center-center flex-column" data-id="<?= $item['id']?>">
                                    <div class="training-container flex-between-center">
                                        <p class="date flex-start-center"><?php echo ($item_date->format('Y-m-d') === $current_date) ? 'Aujourd\'hui<br>à ' . $item_date->format('H:i') : (($year === $current_year) ? $day_name . ' ' . $day_month . '<br>à ' . $item_date->format('H:i') : $item_date->format('Y-m-d') . '<br>à ' . $item_date->format('H:i'));?></p>
                                        <p class="sport"><?php echo $sports[$item['sport']]; ?></p>
                                        <p class="time"><?php echo formatTime($item['time']); ?></p>
                                    </div>
                                    <button class="delete-training quaternary-button flex-center-center">Supprimer</button>
                                </div>
                                <form method="post" action="" id="<?= $item['id']?>">
                                    <input type="hidden" name="training-id" value="<?= $item['id']?>">
                                </form>
                            <?php else: ?>
                                <h2>Les performances ne sont pas encore disponible</h2>
                            <?php endif; ?>
                        <?php endforeach; ?>
                        <div class="confirm flex-center-center flex-column no-select">
                            <div class="confirm-container flex-center-center flex-column">
                                <p>Êtes-vous sûr de vouloir supprimer cet entrainement ?</p>
                                <div class="confirm-actions flex-center-center flex-column">
                                    <button id="confirm" class="secondary-button flex-center-center">Confirmer</button>
                                    <button id="cancel" class="primary-button flex-center-center">Annuler</button>
                                </div>
                            </div>
                        </div>
                    <?php else : ?>
                        <h2>Ajouter un entrainement ou une performance pour la voir apparaître ici.</h2>
                    <?php endif; ?>
                </div>
            </main>
            <?php require('resources/views/layout/footer.php'); ?>
        </div>
    </div>
    <script src="<?= ROOT ?>public/js/delete-training.js<?= V_QUERY ?>"></script>
</body>
</html>