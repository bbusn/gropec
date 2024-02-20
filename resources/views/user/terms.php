<!DOCTYPE html>
<html lang="fr-FR">
<!-- TERMS -->
<?php 

$title = 'Mentions légales';
$buttons = true;
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
            <div class="legal flex-center-center flex-column">
                <div id="title" class="flex-center-center flex-column">
                    <h1 class="terms">Mentions légales</h1>
                    <h2>Dernière mise à jour : 09/01/2024</h2>
                    <h3>Informations légales</h3>
                    <p>Nom du site : Gropec<br>Propriétaire : Benoît Busnardo<br>Adresse : 84 route de St Innocent, 73100, Aix-les-bains, France<br>Numéro de téléphone : +33 7 68 79 97 69<br>Adresse e-mail : benoit.busnardo@gmail.com</p>
                    <h3>Hébergement</h3>
                    <p>Nom de l'hébergeur : OVH<br>Adresse : 2 rue Kellermann, 59100 Roubaix, France<br>Numéro de téléphone de l'hébergeur : +33 972 101 007</p>
                    <h3>Propriété intellectuelle</h3>
                    <p>Le contenu du site (textes, images, vidéos, etc.) est la propriété de Benoît Busnardo. Toute reproduction ou utilisation non autorisée est interdite.</p>
                    <h3>Protection des données personnelles</h3>
                    <p>Les informations collectées sur ce site sont traitées conformément à notre politique de confidentialité accessible depuis ce <a href="<?= ROOT ?>privacy" class="legal-link">lien</a>.</p>
                    <h3>Cookies</h3>
                    <p>Ce site utilise des cookies. Pour plus d'informations, veuillez consulter notre politique en matière de cookies accessible depuis ce <a href="<?= ROOT ?>privacy" class="legal-link">lien</a>.</p>
                    <h3>Responsabilité</h3>
                    <p>Nous ne pouvons être tenus responsables des informations fournies sur ce site. Les utilisateurs sont invités à vérifier l'exactitude des informations avant de les utiliser.</p>
                    <h3>Liens externes</h3>
                    <p>Ce site peut contenir des liens vers des sites externes. Nous ne sommes pas responsables du contenu ou des pratiques de ces sites.</p>
                    <h3>Droit applicable</h3>
                    <p>Ce site est soumis au droit applicable en France.</p>
                </div>
                <?php require('resources/views/layout/back.php'); ?>
            </div>
        </div>
    </div>
</body>
</html>

