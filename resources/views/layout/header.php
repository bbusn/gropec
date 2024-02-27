<!-- HEADER -->
<header class="flex-center-center flex-column">
    <div class="header-container flex-start-center">
        <div class="header-main flex-start-center">
            <?php if (isset($return)) : ?>
            <div class="header-return">
                <?php if (!isset($return_installation)) : ?>
                <button id="return" class="flex-center-center no-select">
                    <img src="<?= ROOT ?>public/images/icons/return.svg" alt="return-icon" width="28" height="28">
                </button>
                <?php else : ?>
                    <?php if (!isset($_SESSION['app'])): ?>
                    <form action="" method="post">
                        <input type="hidden" name="back-install">
                        <input type="submit" id="return-installation" class="flex-center-center" value="">
                    </form>
                    <?php endif; ?> 
                <?php endif; ?> 
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
