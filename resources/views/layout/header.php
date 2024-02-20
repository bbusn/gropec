<!-- HEADER -->
<header class="flex-center-center flex-column">
    <?php if (isset($_SESSION['alert'])) : ?>
    <div class="flex-center-center flex-column alert-<?= $_SESSION['alert']['type'];?>">
        <?php if (isset($_SESSION['alert'])) : ?>
            <?= $_SESSION['alert']['message'] ?>
            <?php unset($_SESSION['alert']); ?>
        <?php endif; ?>
    </div>
    <?php endif; ?>
</header>
