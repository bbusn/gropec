<head>
    <!-- LOADER -->
    <style type="text/css">
         html, body, div, span, applet, object, iframe, h1, h2, h3, h4, h5, h6, p, blockquote, pre, a, abbr, acronym, address, big, cite, code, del, dfn, em, img, ins, kbd, q, s, samp, small, strike, strong, sub, sup, tt, var, b, u, i, center, dl, dt, dd, ol, ul, li, fieldset, form, label, legend, table, caption, tbody, tfoot, thead, tr, th, td, article, aside, canvas, details, embed, figure, figcaption, footer, header, hgroup, menu, nav, output, ruby, section, summary, time, mark, audio, video {margin: 0;padding: 0;border: 0;font-size: 100%;font: inherit;vertical-align: baseline;}article, aside, details, figcaption, figure, footer, header, hgroup, menu, nav, section {display: block;}body {line-height: 1;}ol, ul {list-style: none;}blockquote, q {quotes: none;}blockquote:before, blockquote:after, q:before, q:after {content: '';content: none;}table {border-collapse: collapse;border-spacing: 0;}:root {--primaryFont: 'Roboto', sans-serif;--primaryColor: #ffa026;--tertiaryColor: #404040;--white: #ffffff;--black: #000000;}html {font-family: var(--primaryFont);}body {overflow: hidden;background: #000000;width: 100dvw;height: 100dvh;}.flex-center-center {display: -webkit-box;display: -ms-flexbox;display: flex;-webkit-box-pack: center;-ms-flex-pack: center;justify-content: center;-webkit-box-align: center;-ms-flex-align: center;align-items: center;}.flex-column {-webkit-box-orient: vertical;-webkit-box-direction: normal;-ms-flex-direction: column;flex-direction: column;}.no-select {user-select: none;-ms-user-select: none;-moz-user-select: none;-webkit-user-select: none;}#app-container {-webkit-box-sizing: border-box;box-sizing: border-box;padding-bottom: constant(safe-area-inset-bottom);padding-bottom: env(safe-area-inset-bottom);overflow: hidden;width: 100%;height: 100%;max-width: 320px;max-height: 650px;background: var(--tertiaryColor);border-radius: 30px;}#app {position: relative;width: 90%;height: 95%;background: var(--black);border-radius: 25px;overflow: hidden;}#loader {pointer-events: none;z-index: 110;height: 100%;width: 100%;background: var(--black);position: absolute;}#loader span {height: 47px;width: 55px;background-image: url('data:image/webp;base64,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');background-position: center;background-repeat: no-repeat;background-size: cover;visibility: hidden;opacity: 0;-webkit-animation: popup 0.4s forwards ease-in-out, scale 2s infinite 0.6s;animation: popup 0.4s forwards ease-in-out, scale 2s infinite 0.6s;margin-top: -100px;}@-webkit-keyframes popup {0% {opacity: 0;-webkit-transform: scale(0);transform: scale(0);visibility: hidden;}1% {opacity: 0;-webkit-transform: scale(0);transform: scale(0);visibility: visible;}90% {opacity: 1;-webkit-transform: scale(1.1);transform: scale(1.1);visibility: visible;}100% {opacity: 1;-webkit-transform: scale(1);transform: scale(1);visibility: visible;}}@keyframes popup {0% {opacity: 0;-webkit-transform: scale(0);transform: scale(0);visibility: hidden;}1% {opacity: 0;-webkit-transform: scale(0);transform: scale(0);visibility: visible;}90% {opacity: 1;-webkit-transform: scale(1.1);transform: scale(1.1);visibility: visible;}100% {opacity: 1;-webkit-transform: scale(1);transform: scale(1);visibility: visible;}}@-webkit-keyframes scale {0% {-webkit-transform: scale(1);transform: scale(1);}10% {-webkit-transform: scale(1.2);transform: scale(1.2);}15% {-webkit-transform: scale(1);transform: scale(1);}35% {-webkit-transform: scale(1.2);transform: scale(1.2);}40% {-webkit-transform: scale(1);transform: scale(1);}100% {-webkit-transform: scale(1);transform: scale(1);}}@keyframes scale {0% {-webkit-transform: scale(1);transform: scale(1);}10% {-webkit-transform: scale(1.2);transform: scale(1.2);}15% {-webkit-transform: scale(1);transform: scale(1);}35% {-webkit-transform: scale(1.2);transform: scale(1.2);}40% {-webkit-transform: scale(1);transform: scale(1);}100% {-webkit-transform: scale(1);transform: scale(1);}}@media screen and (orientation: landscape) and (max-width: 940px) {#orientation-block {display: -webkit-box !important;display: -ms-flexbox !important;display: flex !important;}#app-container {max-width: 100%;max-height: 100%;border-radius: 0;}#app {width: 100%;height: 100%;border-radius: 0;}}@media screen and (max-width: 440px) and (min-width: 0px) and (orientation: portrait) {#app-container {width: 100%;height: 100%;max-width: 440px;max-height: 100vh;border-radius: 0px;background: none;}#app {width: 100%;height: 100%;border-radius: 0px;}}@media screen and (max-height: 600px) and (min-height: 0px) {#orientation-block {display: -webkit-box !important;display: -ms-flexbox !important;display: flex !important;}}#orientation-block {display: none;gap: 25px;-webkit-box-pack: center;-ms-flex-pack: center;justify-content: center;-webkit-box-align: center;-ms-flex-align: center;align-items: center;text-align: center;position: absolute;top: 0;left: 0;width: 100%;height: 100%;background-color: var(--black);z-index: 100;}#orientation-block p {font-size: 18px;color: var(--white);font-family: var(--primaryFont);width: 75%;margin-top: -25px;}* {-webkit-tap-highlight-color: rgba(255, 255, 255, 0);}@-webkit-keyframes disappear {0% {opacity: 1;visibility: visible;}99% {opacity: 0;visibility: visible;}100% {opacity: 0;visibility: hidden;}}@keyframes disappear {0% {opacity: 1;visibility: visible;}99% {opacity: 0;visibility: visible;}100% {opacity: 0;visibility: hidden;}}@-webkit-keyframes appear {0% {visibility: hidden;opacity: 0;}1% {visibility: visible;opacity: 0;}100% {opacity: 1;visibility: visible;}}@keyframes appear {0% {visibility: hidden;opacity: 0;}1% {visibility: visible;opacity: 0;}100% {opacity: 1;visibility: visible;}}.appear {-webkit-animation: appear 0.3s ease-in-out forwards;animation: appear 0.3s ease-in-out forwards;}.disappear {-webkit-animation: disappear 0.2s ease-in-out forwards;animation: disappear 0.2s ease-in-out forwards;}
    </style>
    <script>
        function getSubname() {
            let currentURL = window.location.href;
            let cleanedURL = currentURL.replace(/\/+$/, '');
            let urlSegments = cleanedURL.split('/');
            let subname = urlSegments.length > <?= ROOT_SEGMENTS; ?> ? urlSegments[<?= ROOT_SEGMENTS; ?>] : '';
            return subname;
        }
        const subname = getSubname();
        window.addEventListener('load', function() {
            const loader = document.getElementById('loader');
            loader.classList.add('disappear');
            console.info('%c__________________ Gropec __________________', 'color: #d5851d; font-size: 14px; font-weight: bold;');
            console.info('%c- Version : <?= VERSION ?>', 'color: #a4a9a9; font-size: 14px; font-weight: bold;');
            console.info('%c- Auteur : <?= AUTHOR_URL ?>', 'color: #a4a9a9; font-size: 14px;');
            console.info('%c____________________________________________', 'color: #d5851d; font-size: 14px; font-weight: bold;');
            
            const returnButton = document.getElementById('return');
            if (returnButton) {
                returnButton.addEventListener('click', () => {
                    window.history.back();
                });
            }

            setTimeout(() => {
                loader.style.display = 'none';
            }, 400);
        });
    </script>
    <!-- METAS -->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Découvrez Gropec, une application de sport pour se motiver entre amis">
    <meta name="keywords" content="Gropec, Compétition sport entre amis, Groupe de sport, Jeu sport amis, Motivation sport amis">
    <meta name="robots" content="index, follow">
    <meta name="googlebot" content="index, follow">
    <meta property="og:type" content="website">
    <meta property="og:url" content="https://www.gropec.fr/">
    <meta property="og:image" content="https://www.gropec.fr/public/images/logo.webp">
    <meta property="og:title" content="Gropec - <?php if (isset($title)){echo $title;}else{echo 'Sport entre amis';}; ?>">
    <meta property="og:description" content="Découvrez Gropec, une application de sport pour se motiver entre amis">

    <!-- METAS GENERATED -->
    <meta name="apple-mobile-web-app-title" content="Gropec">
    <meta name="application-name" content="Gropec">
    <meta name="msapplication-TileColor" content="#000000">
    <meta name="theme-color" content="#000000">

    <!-- STYLESHEETS -->

    <!-- MAIN.CSS -->
    <link rel="preload" href="<?= ROOT ?>public/css/main.css<?= V_QUERY ?>" as="style" onload="this.onload=null;this.rel='stylesheet'">
    <noscript><link rel="stylesheet" href="<?= ROOT ?>public/css/main.css<?= V_QUERY ?>"></noscript>
    
    <?php if (isset($footer)) : ?>
    <!-- FOOTER.CSS -->
        <link rel="preload" href="<?= ROOT ?>public/css/layout/footer.css<?= V_QUERY ?>" as="style" onload="this.onload=null;this.rel='stylesheet'">
        <noscript><link rel="stylesheet" href="<?= ROOT ?>public/css/layout/footer.css<?= V_QUERY ?>"></noscript>
    <?php endif; ?>

    <?php if (isset($buttons)) : ?>
    <!-- BUTTONS.CSS -->
        <link rel="preload" href="<?= ROOT ?>public/css/components/buttons.css<?= V_QUERY ?>" as="style" onload="this.onload=null;this.rel='stylesheet'">
        <noscript><link rel="stylesheet" href="<?= ROOT ?>public/css/components/buttons.css<?= V_QUERY ?>"></noscript>
    <?php endif; ?>

    <?php if (isset($inputs)) : ?>
    <!-- INPUTS.CSS -->
        <link rel="preload" href="<?= ROOT ?>public/css/components/inputs.css<?= V_QUERY ?>" as="style" onload="this.onload=null;this.rel='stylesheet'">
        <noscript><link rel="stylesheet" href="<?= ROOT ?>public/css/components/inputs.css<?= V_QUERY ?>"></noscript>
    <?php endif; ?>

    <?php if (isset($confirm)) : ?>
    <!-- CONFIRM.CSS -->
        <link rel="preload" href="<?= ROOT ?>public/css/components/confirm.css<?= V_QUERY ?>" as="style" onload="this.onload=null;this.rel='stylesheet'">
        <noscript><link rel="stylesheet" href="<?= ROOT ?>public/css/components/confirm.css<?= V_QUERY ?>"></noscript>
    <?php endif; ?>

    <?php if (isset($scroll)) : ?>
    <!-- SCROLL.CSS -->
        <link rel="preload" href="<?= ROOT ?>public/css/components/scroll.css<?= V_QUERY ?>" as="style" onload="this.onload=null;this.rel='stylesheet'">
        <noscript><link rel="stylesheet" href="<?= ROOT ?>public/css/components/scroll.css<?= V_QUERY ?>"></noscript>
    <?php endif; ?>

    <?php if (isset($links)){echo $links;}; ?>
    
    <!-- FAVICONS GENERATED -->
    <link rel="apple-touch-icon" sizes="180x180" href="<?= ROOT ?>apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="<?= ROOT ?>favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="192x192" href="<?= ROOT ?>android-chrome-192x192.png">
    <link rel="icon" type="image/png" sizes="16x16" href="<?= ROOT ?>favicon-16x16.png">
    <link rel="manifest" href="<?= ROOT ?>site.webmanifest">
    <link rel="mask-icon" href="<?= ROOT ?>safari-pinned-tab.svg" color="#000000">
    <link rel="canonical" href="https://www.gropec.fr/">

    <!-- FAVICON -->
    <link rel="shortcut icon" href="<?= ROOT ?>favicon.ico" type="image/x-icon">

    <!-- SCRIPTS -->
    <?php if (isset($footer)) : ?>
        <script src="<?= ROOT ?>public/js/nav.js<?= V_QUERY ?>" defer></script>
    <?php endif; ?>

    <!-- TITLE -->
    <title>Gropec - <?php if (isset($title)){echo $title;}else{echo 'Sport entre amis';}; ?></title>
</head>
