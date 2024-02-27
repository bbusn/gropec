<!DOCTYPE html>
<html lang="fr-FR">
<!-- PRIVACY -->
<?php 

$title = 'Confidentialité';
$top_title = $title;
$return = true;
$scroll = true;
$links = '
    <!-- LEGAL.CSS -->
    <link rel="preload" href="' . ROOT . 'public/css/pages/legal/legal.css' . V_QUERY . '" as="style" onload="this.onload=null;this.rel=\'stylesheet\'">
    <noscript><link rel="stylesheet" href="' . ROOT . 'public/css/pages/legal/legal.css' . V_QUERY . '"></noscript>
';

require('resources/views/layout/head.php'); 

?>
<body class="flex-center-center flex-column">
    <div id="app-container" class="flex-center-center flex-column">
        <div id="app" class="flex-center-center flex-column">
            <?php require('resources/views/layout/loader.php'); ?>
            <?php require('resources/views/layout/header.php'); ?>
            <?php require('resources/views/layout/orientation_block.php'); ?>
            <main class="legal flex-start-center flex-column">
                <h2>Mise à jour : 08/01/2024</h2>
                <p>Bienvenue sur gropec.fr ! Nous attachons une grande importance à la protection de vos données personnelles et à la transparence de notre démarche. Cette Politique de Confidentialité explique comment nous collectons, utilisons, partageons et protégeons vos informations lors de l'utilisation de notre site.</p>
                <h3>Collecte d'Informations</h3>
                <p>Nous collectons uniquement des données de session (cookies de sessions) représentant les seules données collectées dans une démarche temporaire. À aucun moment, elles ne sont publiées ou utilisées autrement que pour le fonctionnement de l'application.</p>
                <h3>Cookies</h3>
                <p>Les seules cookies utilisés sont les cookies de sessions stockés sur notre serveur. Ces cookies sont utilisés à des fins de connexion, d'inscription, de connexion automatique et de préfèrence de choix d'installation. Ils sont supprimés après 365 jours, durée volontairement étirée pour améliorer l'expérience utilisateur.</p>
                <h3>Vos Droits</h3>
                <p>Vous avez le droit d'accès, de rectification et de suppression de vos données. Pour exercer ces droits ou poser des questions sur notre Politique de Confidentialité, veuillez nous contacter à benoit.busnardo@gmail.com.</p>
                <h3>Notification de modification</h3>
                <p>En cas de modification de notre Politique de Confidentialité, les utilisateurs seront informés via une notification majeure sur l'application.</p>
            </main>
        </div>
    </div>
</body>
</html>

