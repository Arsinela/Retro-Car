<?php
$login = $_POST['login'];
$pas = $_POST['password'];
if ($login == 'Ann' && $pas == 111)
{
    session_start();
    $_SESSION['admin'] = true;
    $script = 'adminpanel.phtml';
}
else
    $script = 'avtadministrator.html';
header("Location: $script");