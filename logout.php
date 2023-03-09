<?php
session_start();
session_unset();
session_destroy();
setcookie('usuario');
setcookie('sessao');
header("Location:login.php");
?>