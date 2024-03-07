<!DOCTYPE html>
<html lang="fr-FR">
<!-- USER -->
<?php 

$title = 'Profil';
$buttons = true;
$created = explode(' ', $_SESSION['user']['created']);
$footer = true;
$links = '
    <!-- USER.CSS -->
    <link rel="preload" href="' . ROOT . 'public/css/pages/user/user.css' . V_QUERY . '" as="style" onload="this.onload=null;this.rel=\'stylesheet\'">
    <noscript><link rel="stylesheet" href="' . ROOT . 'public/css/pages/user/user.css' . V_QUERY . '"></noscript>
';


require('resources/views/layout/head.php'); 

?>
<body class="flex-center-center flex-column">
    <div id="app-container" class="flex-center-center flex-column">
        <div id="app" class="flex-center-center flex-column">
            <?php require('resources/views/layout/loader.php'); ?>
            <?php require('resources/views/layout/orientation_block.php'); ?>
            <?php require('resources/views/layout/header.php'); ?>
            <main class="user flex-evenly-center flex-column">
                <div id="title" class="flex-center-start flex-column">
                    <h1 <?php if (strlen($_SESSION['user']['username']) > 12) {echo 'class="large"';}?>><span><?= $_SESSION['user']['username'] ?></span></h1>
                    <?php if (isset($_SESSION['user']['group'])) : ?>
                    <h2>Dans le groupe "<?= $_SESSION['user']['group']['name'] ?>"</h2>
                    <?php else : ?>
                    <h2>Aucun groupe</h2>
                    <?php endif; ?>
                    <h3>Inscrit depuis le <?= $created[0] ?></h3>
                </div>
               <div class="user-actions flex-center-center flex-column no-select">
                    <a href="<?= ROOT ?>user/history" class="user-action flex-center-center">
                        <img src="<?= ROOT ?>public/images/icons/history.svg" alt="journal-icon" width="15" height="15">Historique
                    </a>
                    <a href="<?= ROOT ?>user/statistics" class="user-action flex-center-center">
                        <img src="<?= ROOT ?>public/images/icons/statistics.svg" alt="statistics-icon" width="15" height="15">Statistiques
                    </a>
                    <a href="<?= ROOT ?>user/performances" class="user-action flex-center-center">
                        <img src="<?= ROOT ?>public/images/icons/performances.svg" alt="performances-icon" width="15" height="15">Performances
                    </a>
                    <a href="<?= ROOT ?>user/settings" class="user-action flex-center-center">
                        <img src="<?= ROOT ?>public/images/icons/settings.svg" alt="settings-icon" width="15" height="15">Paramètres
                    </a>
               </div>
            </main>
            <?php require('resources/views/layout/footer.php'); ?>
        </div>
    </div>
</body>
</html>

