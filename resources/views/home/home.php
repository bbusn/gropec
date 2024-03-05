<!DOCTYPE html>
<html lang="fr-FR">
<!-- HOME -->
<?php 

$title = 'Accueil';
$footer = true;
$buttons = true;
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
            <main class="home flex-evenly-center flex-column">
                <div id="title" class="flex-center-start flex-column">
                    <h1>Bonjour, <span><?= $_SESSION['user']['username'] ?></span></h1>
                </div>
            </main>
            <?php require('resources/views/layout/footer.php'); ?>
        </div>
    </div>
</body>
</html>

