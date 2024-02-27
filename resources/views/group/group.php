<!DOCTYPE html>
<html lang="fr-FR">
<!-- GROUP -->
<?php 

$title = 'Groupe d\'amis';  
$buttons = true;
$footer = true;
$links = '
    <!-- GROUP.CSS -->
    <link rel="preload" href="' . ROOT . 'public/css/pages/group/group.css' . V_QUERY . '" as="style" onload="this.onload=null;this.rel=\'stylesheet\'">
    <noscript><link rel="stylesheet" href="' . ROOT . 'public/css/pages/group/group.css' . V_QUERY . '"></noscript>
    <!-- INPUTS.CSS -->
    <link rel="preload" href="' . ROOT . 'public/css/components/inputs.css' . V_QUERY . '" as="style" onload="this.onload=null;this.rel=\'stylesheet\'">
    <noscript><link rel="stylesheet" href="' . ROOT . 'public/css/components/inputs.css' . V_QUERY . '"></noscript>
';


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
                    <?php if (isset($_SESSION['user']['group']['users'])) : ?>
                        <ul class="group-users flex-center-center flex-wrap no-select">
                            <?php foreach ($_SESSION['user']['group']['users'] as $user) : ?>
                                <?php if ($user['username'] === $_SESSION['user']['username']) : ?>
                                    <li>
                                        <a class="user flex-start-center flex-column" href="<?= ROOT ?>user">
                                            <span></span>
                                            (vous)
                                        </a>
                                    </li>
                                <?php else : ?>
                                    <li>
                                        <a class="flex-start-center flex-column" href="<?= ROOT ?>group/user/<?= $user['username'] ?>">
                                            <span></span>
                                            <?= $user['username'] ?>
                                        </a>
                                    </li>
                                <?php endif; ?>
                            <?php endforeach; ?>
                        </ul>
                    <?php endif; ?>
                    <form class="group-actions flex-center-center flex-column no-select" action="" method="post">
                        <input type="hidden" name="leave-group">
                        <input type="submit" value="Quitter le groupe" class="quaternary-button flex-center-center ">
                    </form>
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
            <?php require('resources/views/layout/footer.php'); ?>
        </div>
    </div>
</body>
</html>

