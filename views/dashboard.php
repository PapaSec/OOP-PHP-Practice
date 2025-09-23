<h1>Welcome, <?= htmlspecialchars($user->getUsername()); ?>!</h1>
<p>Role: <?= $user->getRole(); ?></p>

<?php if ($user instanceof AdminUser) : ?>
    <p>Permissions: <?= implode(", ", $user->getPermissions()); ?></p>

<?php endif; ?>