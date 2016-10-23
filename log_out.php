<?php
setcookie('found_user', '');
setcookie('username', '');
setcookie('music', '');
setcookie('art', '');
setcookie('fashion', '');
setcookie('politics', '');
setcookie('earth', '');
setcookie('food', '');
setcookie('tech', '');
setcookie('animal', '');
setcookie('science', '');
setcookie('sports', '');
session_start();
unset($SESSION);
session_destroy();
header('Location: index.html')
?>
