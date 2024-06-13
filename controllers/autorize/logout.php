<?php
session_start();
session_unset();
session_destroy();

// Перенаправлення на головну сторінку
header('Location: /view/Main');
exit();
?>