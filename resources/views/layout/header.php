<!-- HEADER -->
<header class="flex-center-center flex-column <?php if (isset($return)) : ?>background<?php endif; ?>">
    <div class="header-container flex-start-center">
        <div class="header-main flex-start-center">
            <?php if (isset($return)) : ?>
            <div class="header-return">
                <button id="return" class="flex-center-center no-select">
                    <img src="<?= ROOT ?>public/images/icons/return.svg" alt="return-icon" width="28" height="28">
                </button>
            </div>
            <?php endif; ?>
            <?php if (isset($top_title)) : ?>
            <h1><?= $top_title ?></h1>
            <?php endif; ?>
        </div>
    </div>
    <?php if (isset($_SESSION['alert'])) : ?>
    <div class="flex-center-center flex-column alert-<?= $_SESSION['alert']['type'];?>">
        <?php if (isset($_SESSION['alert'])) : ?>
            <?= $_SESSION['alert']['message'] ?>
            <?php unset($_SESSION['alert']); ?>
        <?php endif; ?>
    </div>
    <?php endif; ?>
</header>
