<?php
$wikon_version = WIKON;
echo <<<EOF
<h1>Wikon $wikon_version internal error</h1>
<p>$error</p>
EOF;
header("HTTP/1.1 500 Internal Server Error");
exit;
