<ul class="<?= $ulClass ?>">
    <?php foreach ($mainMenu as $menuItem) : ?>
        <li><a href="
        <?= isset($_SESSION['authorized']) && $_SESSION['authorized'] == 'true' ? $menuItem['path'] : '/' ?>" class=<?= isCurrentUrl($menuItem['path']) ? 'active' : '' ?>>
                <?= cutTitle($menuItem['title']) ?>
            </a>
        </li>
    <?php endforeach; ?>   
</ul>