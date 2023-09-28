<?php

$session_max_lifetime = ini_get("session.gc_maxlifetime");
if ($_COOKIE["session_id"] !== $_SESSION['id']) {
    // Redirect or display an error message
    exit("Another user is running this script, sorry for the incovenience.");
}

session_start();
setcookie("session_id", $_SESSION['id'], time() + $session_max_lifetime, "/");

echo <<<HTML

<h1>Wikon Installer</h1>

HTML;
