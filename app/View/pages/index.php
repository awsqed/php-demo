<?php if ($data['is_logged_in']): ?>
<a href="/profile">Profile</a>
<?php else: ?>
<a href="/login">Login</a> or 
<a href="/register">Register</a>
<?php endif; ?>