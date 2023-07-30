<?php
$wikon_version = WIKON;
echo <<<EOF
<style>body{font-family:Arial,sans-serif;padding:10px;text-align:center}h1{font-weight:normal}</style>
<h1>Wikon $wikon_version internal error</h1>
<p>$error</p>
EOF;
header("HTTP/1.1 500 Internal Server Error");
exit;
