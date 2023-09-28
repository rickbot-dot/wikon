<?php

function check_session() {
    return session_status() === PHP_SESSION_ACTIVE;
}

if (check_session()) {
    if ($_COOKIE["session_id"] !== $_SESSION['id']) {
        // Redirect or display an error message
        exit("Another user is running this script, sorry for the incovenience.");
    }
}

session_start();
setcookie("session_id", $_SESSION['id'], time() + 1440, "/");

echo <<<HTML

<h1>Wikon Installer</h1>

HTML;
