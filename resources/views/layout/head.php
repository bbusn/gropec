<head>
    <!-- LOADER -->
    <style type="text/css">
         html, body, div, span, applet, object, iframe, h1, h2, h3, h4, h5, h6, p, blockquote, pre, a, abbr, acronym, address, big, cite, code, del, dfn, em, img, ins, kbd, q, s, samp, small, strike, strong, sub, sup, tt, var, b, u, i, center, dl, dt, dd, ol, ul, li, fieldset, form, label, legend, table, caption, tbody, tfoot, thead, tr, th, td, article, aside, canvas, details, embed, figure, figcaption, footer, header, hgroup, menu, nav, output, ruby, section, summary, time, mark, audio, video {margin: 0;padding: 0;border: 0;font-size: 100%;font: inherit;vertical-align: baseline;}article, aside, details, figcaption, figure, footer, header, hgroup, menu, nav, section {display: block;}body {line-height: 1;}ol, ul {list-style: none;}blockquote, q {quotes: none;}blockquote:before, blockquote:after, q:before, q:after {content: '';content: none;}table {border-collapse: collapse;border-spacing: 0;}:root {--primaryFont: 'Roboto', sans-serif;--primaryColor: #ffa026;--tertiaryColor: #404040;--white: #ffffff;--black: #000000;}html {font-size: 1.8vw;font-family: var(--primaryFont);}body {overflow: hidden;background: #000000;width: 100dvw;height: 100dvh;}.flex-center-center {display: -webkit-box;display: -ms-flexbox;display: flex;-webkit-box-pack: center;-ms-flex-pack: center;justify-content: center;-webkit-box-align: center;-ms-flex-align: center;align-items: center;}.flex-column {-webkit-box-orient: vertical;-webkit-box-direction: normal;-ms-flex-direction: column;flex-direction: column;}.no-select {user-select: none;-ms-user-select: none;-moz-user-select: none;-webkit-user-select: none;}#app-container {-webkit-box-sizing: border-box;box-sizing: border-box;padding-bottom: constant(safe-area-inset-bottom);padding-bottom: env(safe-area-inset-bottom);overflow: hidden;width: 100%;height: 100%;max-width: 320px;max-height: 650px;background: var(--tertiaryColor);border-radius: 30px;}#app {position: relative;width: 90%;height: 95%;background: var(--black);border-radius: 25px;overflow: hidden;}#loader {pointer-events: none;z-index: 110;height: 100%;width: 100%;background: var(--black);position: absolute;}#loader span {width: 50px;height: 43px;background-image: url('data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAADIAAAArCAYAAAA65tviAAAAIGNIUk0AAHomAACAhAAA+gAAAIDoAAB1MAAA6mAAADqYAAAXcJy6UTwAAAAGYktHRAD/AP8A/6C9p5MAAAAHdElNRQfoAhMRJxtD6yqQAAAIoklEQVRo3tWZeXRU1RnAf/e+92Ymk5lkspCENQmQYAiJkFiptmptBRTEHhSo4r7gsX+J1nqq1qWeLmrVI64tirY9riDuK4igllSgEBQoSwiCCSQh62SZ5b157/aPETBKkoFJpX7nzDlzZr7vve/3ffd+997vCpIUpRSEmzTen7IQJ3oN4D4K8xaEdivwpDh/W1J+yGRBANj6oI3UPkXq+0GoxIyEjXTtQhrbkEbSLujJPkAIgYq0Qc4Pl7H7hXw6tt6ME0sbwEyhp9QTKHuIEeeswZUOzEjKj8HJiDsDfKMjDD1rFcjuBCwUQtZTumANoy9SjJietAtJZ0QpBcqGzBMVdW+Z4CQ2tBwHrC6HNyrA8CcNcswZUUqhzgRqFsMpOmy8NQ3UCJCJBEcg9RQ6a4bhyTGQLtQnl6NWX3jMICIRhw/JgTWw91VIGwfj5sMHM6HoigDtW0o5UHUuse4ziLZXoOyBK5c0ghi+NSBew5WxHN/IOgrmOlTfAZ5cKL8Vsk867Kjo39V+o6d69sHu52D5JXCdMtBTsxByJNIIAm34CorZ/fwMQo1TsLrG40RTEw6hY6UTbZ+O0CuwuqfhylhEZsUWEEUIGcPw1wCtPJdmM+0DlNmJcPVdQ/rEVLEwOBbU/sPLjkWzcAVK8GQPxwwWo3tb0b0NdO+dgNVVhhPzg5NIgvsSG3fWBrxDd9JVW4qWYpOSt4lIcwNOtIbKe98k50cdCA2hHblUf+vNqvpOOOGXkJIHDavT2HTHlYQP3ABkg9AAF2ADMZTjBkcmAfB1VxyEtFCOCyEAEQUnhtA7SB/3VyrueYr0okasbvjiRcS4+QOA1DwT/+LO9LP9savo2XcTjjViEDw9dtG9TWSUP0HpgsdxzGYibYiRvUt2r6qlmtdCVy1Emlxs/vMcevbdcNwhAGKhXNo2zWfDb+dgBt3Uvx2vml8rRBI4/OOeZfDe76F57RjM9stxrPzjzXBI7Mhwwg2XsvuFSuyoi3sEfHg+6sU8lFJo6inAaoeHp8PEc1LJzi4h2jwPq+dsUN7j7f9hUSA0H1bnaMwOg1EnBglu78JX6HDPlQj18mjwjdXR9BJikemYbTOwo2UoO3C8XT8iDIB0NSFkFXrqo0y8+yPWLbCFWjFNYoYmY7bfhbJPRTm+JEvpdwQkQPN8jCfnTgp+8U/JqAty8WTOwzGnomK+Q0r/1/KVf3bkdMJNt9OwolzSVfsDQg3n9lL4PoljngbqYknHtnmYwZHH258kRKez5lKhXhnfjYp5+V6m46AoJMpK/X5DAAg1SPuk4yoKzd0wOEfdQRfpIBJtYsgo2Sc/drQgCiGiIOz/HYQCd6Aez5BdCM0cUF0g0FP9RwciZANGYAmaez2oBCN21Bwm0niL7Mn3ornrD63mfeorg7ZNsxMHEVobRtrTZFXcQkrefWjezwcdQogYRuoKYuGnya58CWm8iitzBwinHxJJaP/YxECE3oOv4FmGTX0Cqe+j7OZ3yZr0CK7AF4NIAZ7canJ/vJCZ66spvKibQNn9pBU9Clj9m8oE20FSC5N3+r8o+00jAKvmRCi+9h0++900UIWDUvmk0YMn5w0mP7KGvUsdQgfgy9ea8Y1qAuUMaD7gGARwrDTq3rmEqmtPIrg93vHZu6wVJ7odYUSSpwDcGRsJjHufJSNCGAHI/7mg8o9FqNi1xI/XfYtykLgy1hM/g/en6CLafCYd2+biK/RQMBeckEnmxJXonp0JBWMgsa1ahp61i6Kr4fGp8OWbblrWzkFxKqD1bSgcfAU7JSm5ixEygagqAyGHIjUv+bMg3AKxUB222T4oQ8sKRvjPwxGaPoLrq8COeGmtPh3H6r9HJoRFxoQlkiGTP8JX+GECr1K9qofZDt17bVRscNYUZdsEtzqEGsCxASWwTReogaLUSfvmdRIr9CWIFUhXV//kuoXmqseJxZvUrgxIHWkg9KT7x4dhvhqiwe3QWRNB99YhZN8VS3N3kZr/F7IqP5VU/iFE1qT3cGV82OcaJ6SJ4d/K+AVLscMmjauhZR0Exmeje32DMkfiJPHP8GlQODfMmEsewzu8CiHNb+lpKd0EJrzAmHl/56R7W7S7Kt6EcFOIWLdAqDKUk3n4lKhAurrwj/6AWPffCDeuInLApv5dGHWeTlPVLKyO83Asb9LzRMgN+McsBxFjwo3gK1R4cg4g5B66anOIhUcBehzC00l6yUsUXLCQ0RfVEOtWOtIAlz+Cv+AVgjUe7Mh1OGYJOG6kay/urLcZc9kiCuduYd31CrMjno3WDTq2eQJCZA3OOuI2yD3DoLMmIoSIt6da1pvk/WQ1rdWdWP9uwbHKAQf3kNUMn/okBbN3AQ66D13MXIt6Bsg5tYeUIc/jH7uD1o3nEgtlEChdTkbpJ2y9vxFXOhRdg8gsR70+CXQvRFtVAmtVohnRMFIlRrwDJYRAbXkAGlY6tKzdiCvjNuxoDkKzSclroPjqFtRVh3TjW5QrFJhBSC/p4eQHPsaffzeutJsov3kZ+1c0Mn4BtG5AZJbHX5o5EUbNskgr3oHubRuUOaKsEN21Fj11h9km/Ao6a8A7zEHZ+8HZhHI241gtB+fzweuGXmNCxSKguWHVbIi2wrAp8XsKet9PKKXgdgEXPljGnqUPEW39aVIQeupnuDNup6v2LbzDlZhRdfSP6JVd3fONv1cDtx3Zcs6fINKyE1/+Myh7GFbwhGPa2buza8ksf5TCeSvZ/azitUXHFItjnqXqJuDsmVB6Yxo1i2fRtvnX2OESEr/Oc9B9O8k5ZSHF85fw+sQ2ruw9XL4bkIPRny3grvtT2LP0NDTPz4g0X4ZyAqAMUEfYIwkLqbfjH/syjvk+xVetomBO1zfH/HcG0gtmwy3QWq2TXhyg7fNKAuMnEdx+MT11ExBfT5ACT+4SDP/zjJi+js6dLXRstZi2MikIgP8C/z9rlTrS5sUAAAAldEVYdGRhdGU6Y3JlYXRlADIwMjQtMDItMTlUMTc6Mzk6MjArMDA6MDC5+psGAAAAJXRFWHRkYXRlOm1vZGlmeQAyMDI0LTAyLTE5VDE3OjM5OjIwKzAwOjAwyKcjugAAACh0RVh0ZGF0ZTp0aW1lc3RhbXAAMjAyNC0wMi0xOVQxNzozOToyNyswMDowMFoVPOsAAAAASUVORK5CYII=');background-position: center;background-repeat: no-repeat;background-size: cover;visibility: hidden;opacity: 0;-webkit-animation: popup 0.4s forwards ease-in-out, scale 2s infinite 0.6s;animation: popup 0.4s forwards ease-in-out, scale 2s infinite 0.6s;margin-top: -100px;}@-webkit-keyframes popup {0% {opacity: 0;-webkit-transform: scale(0);transform: scale(0);visibility: hidden;}1% {opacity: 0;-webkit-transform: scale(0);transform: scale(0);visibility: visible;}90% {opacity: 1;-webkit-transform: scale(1.1);transform: scale(1.1);visibility: visible;}100% {opacity: 1;-webkit-transform: scale(1);transform: scale(1);visibility: visible;}}@keyframes popup {0% {opacity: 0;-webkit-transform: scale(0);transform: scale(0);visibility: hidden;}1% {opacity: 0;-webkit-transform: scale(0);transform: scale(0);visibility: visible;}90% {opacity: 1;-webkit-transform: scale(1.1);transform: scale(1.1);visibility: visible;}100% {opacity: 1;-webkit-transform: scale(1);transform: scale(1);visibility: visible;}}@-webkit-keyframes scale {0% {-webkit-transform: scale(1);transform: scale(1);}10% {-webkit-transform: scale(1.2);transform: scale(1.2);}15% {-webkit-transform: scale(1);transform: scale(1);}35% {-webkit-transform: scale(1.2);transform: scale(1.2);}40% {-webkit-transform: scale(1);transform: scale(1);}100% {-webkit-transform: scale(1);transform: scale(1);}}@keyframes scale {0% {-webkit-transform: scale(1);transform: scale(1);}10% {-webkit-transform: scale(1.2);transform: scale(1.2);}15% {-webkit-transform: scale(1);transform: scale(1);}35% {-webkit-transform: scale(1.2);transform: scale(1.2);}40% {-webkit-transform: scale(1);transform: scale(1);}100% {-webkit-transform: scale(1);transform: scale(1);}}@media screen and (orientation: landscape) and (max-width: 940px) {#orientation-block {display: -webkit-box;display: -ms-flexbox;display: flex;}#app-container {max-width: 100%;max-height: 100%;border-radius: 0;}#app {width: 100%;height: 100%;border-radius: 0;}}@media screen and (orientation: portrait) {#orientation-block {display: none;}}@media screen and (max-width: 440px) and (min-width: 0px) and (orientation: portrait) {html {font-size: 1.6vw;}#app-container {width: 100%;height: 100%;max-width: 440px;max-height: 940px;border-radius: 0px;background: var(--white);}#app {width: 100%;height: 100%;border-radius: 0px;}}@media screen and (max-width: 390px) {html {font-size: 1.4vw;}}@media screen and (max-width: 340px) {html {font-size: 1.2vw;}}@media screen and (max-height: 600px) and (min-height: 0px) {#orientation-block {display: -webkit-box;display: -ms-flexbox;display: flex;}}#orientation-block {display: none;gap: 25px;-webkit-box-pack: center;-ms-flex-pack: center;justify-content: center;-webkit-box-align: center;-ms-flex-align: center;align-items: center;text-align: center;position: absolute;top: 0;left: 0;width: 100%;height: 100%;background-color: var(--black);z-index: 100;}#orientation-block p {font-size: 18px;color: var(--white);font-family: var(--primaryFont);width: 75%;margin-top: -25px;}* {-webkit-tap-highlight-color: rgba(255, 255, 255, 0);}*::-moz-selection {background: var(--tertiaryColor);color: var(--primaryColor);}*::selection {background: var(--tertiaryColor);color: var(--primaryColor);}@-webkit-keyframes disappear {0% {opacity: 1;visibility: visible;}99% {opacity: 0;visibility: visible;}100% {opacity: 0;visibility: hidden;}}@keyframes disappear {0% {opacity: 1;visibility: visible;}99% {opacity: 0;visibility: visible;}100% {opacity: 0;visibility: hidden;}}@-webkit-keyframes appear {0% {visibility: hidden;opacity: 0;}1% {visibility: visible;opacity: 0;}100% {opacity: 1;visibility: visible;}}@keyframes appear {0% {visibility: hidden;opacity: 0;}1% {visibility: visible;opacity: 0;}100% {opacity: 1;visibility: visible;}}.appear {-webkit-animation: appear 0.3s ease-in-out forwards;animation: appear 0.3s ease-in-out forwards;}.disappear {-webkit-animation: disappear 0.2s ease-in-out forwards;animation: disappear 0.2s ease-in-out forwards;}
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
            // __________________________________________ SERVICE WORKER, TEMPORARY DISABLED
            // if ('serviceWorker' in navigator) {
            //     let serviceWorkerPath;
            //     if (subname == '') {
            //         serviceWorkerPath = 'service-worker.js';
            //     } else {
            //         serviceWorkerPath = '/gropec/service-worker.js';
            //     }
            //     navigator.serviceWorker.register(serviceWorkerPath).then(function(reg) {
            //         console.log('Gropec v<?= VERSION ?> registered at ' + reg.scope);
            //     }).catch(function(error) {
            //         console.log('Gropec v<?= VERSION ?> failed with error : ' + error);
            //     });
            // } else {
            //     console.log('No Service worker possible on this browser.');
            // } 
            // __________________________________________
            const loader = document.getElementById('loader');
            loader.classList.add('disappear');
            console.info('%c__________________ Gropec __________________', 'color: #d5851d; font-size: 14px; font-weight: bold;');
            console.info('%c- Sport entre amis -', 'color: #cb9b38; font-size: 14px; font-weight: bold;');
            console.info('%c- Version : <?= VERSION ?>', 'color: #a4a9a9; font-size: 14px; font-weight: bold;');
            console.info('%c- Auteur : <?= AUTHOR_URL ?>', 'color: #a4a9a9; font-size: 14px;');
            console.info('%c____________________________________________', 'color: #d5851d; font-size: 14px; font-weight: bold;');
            

            
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
