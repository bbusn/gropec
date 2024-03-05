<!DOCTYPE html>
<html lang="fr-FR">
<!-- GROUP -->
<?php 

$title = 'Membres du groupe ' . $_SESSION['user']['group']['name'];  
$buttons = true;
$return = true;
$footer = true;
$links = '
    <!-- GROUP-USERS.CSS -->
    <link rel="preload" href="' . ROOT . 'public/css/pages/group/group-users.css' . V_QUERY . '" as="style" onload="this.onload=null;this.rel=\'stylesheet\'">
    <noscript><link rel="stylesheet" href="' . ROOT . 'public/css/pages/group/group-users.css' . V_QUERY . '"></noscript>
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
                <div id="title" class="flex-center-center flex-column">
                    <h1><span>Membres du groupe</span></h1>
                </div>
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
            </main>
            <?php require('resources/views/layout/footer.php'); ?>
        </div>
    </div>
</body>
</html>

