<!DOCTYPE html>
<html lang="fr-FR">
<!-- HOME -->
<?php 

$title = 'Accueil';
$footer = true;
$description = explode('-', $_SESSION['version']['description']);
$user_id = $_SESSION['user']['id'];
$week_days = ['monday'=>'Lundi', 'Tuesday'=>'Mardi', 'wednesday'=>'Mercredi', 'thursday'=>'Jeudi', 'friday'=>'Vendredi', 'saturday'=>'Samedi', 'sunday'=>'Dimanche'];
$current_date = date('Y-m-d');
$date = new DateTime($_SESSION['user']['history']['last']['date']);

if ($date->format('Y-m-d') == $current_date) {
    $last_training = $date->format('H:i');
} else {
    $last_training = $week_days[$_SESSION['user']['history']['last']['day']] . ' ' . $date->format('m-d');
}
$links = '
    <!-- HOME.CSS -->
    <link rel="preload" href="' . ROOT . 'public/css/pages/home/home.css' . V_QUERY . '" as="style" onload="this.onload=null;this.rel=\'stylesheet\'">
    <noscript><link rel="stylesheet" href="' . ROOT . 'public/css/pages/home/home.css' . V_QUERY . '"></noscript>
';


require('resources/views/layout/head.php'); 

?>
<body class="flex-center-center flex-column">
    <div id="app-container" class="flex-center-center flex-column">
        <div id="app" class="flex-center-center flex-column">
            <?php require('resources/views/layout/loader.php'); ?>
            <?php require('resources/views/layout/orientation_block.php'); ?>
            <?php require('resources/views/layout/header.php'); ?>
            <main class="home flex-between-center flex-column">
                <div id="title" class="flex-center-start flex-column">
                    <h1>Bonjour, <span><?= $_SESSION['user']['username'] ?></span></h1>
                </div>
                <div class="trainings flex-center-center flex-column">
                    <h2>Entrainements</h2>
                    <div class="flex-center-center flex-column">
                        <p class="flex-center-center"><?php if (!empty($last_training)) {echo 'Votre dernier entrainement remonte à ' . $last_training;} else {echo 'Enregistrer un premier entrainement dans l\'onglet "Ajouter"';}?></p>
                    </div>
                </div>
                <div class="updates flex-center-center flex-column">
                    <h2>Nouveautés</h2>
                    <div class="update flex-center-center flex-column">
                        <h3>Version <?= $_SESSION['version']['number'] ?></h3>
                        <?php foreach($description as $desc) : ?>
                            <p class="upgrade"><?= $desc ?></p>
                        <?php endforeach; ?>
                    </div>
                </div>
            </main>
            <?php require('resources/views/layout/footer.php'); ?>
        </div>
    </div>
</body>
</html>

