<h1><?php print $data['title']; ?></h1>

<?php print $data['form']; ?>

<?php if (isset ($data['message'])): ?>

    <p><?php print $data['message']; ?></p>

<?php endif; ?>
