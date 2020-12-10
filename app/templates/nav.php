<nav>
    <ul>
        <?php foreach ($data as $title => $link): ?>
        <?php if ($title === 'ORDERS'): ?>
            <li><a class="red" href="<?php print $link; ?>"><?php print $title; ?></a></li>
        <?php else: ?>
        <li><a href="<?php print $link; ?>"><?php print $title; ?></a></li>
        <?php endif; ?>
        <?php endforeach; ?>
    </ul>
</nav>

