<?php
$wikon_version = WIKON;
echo <<<EOF
<h1>Wikon $wikon_version internal error</h1>
<p>$error</p>
EOF;
header("HTTP/1.1 500 Internal Server Error");
error_log("[Wikon $wikon_version] " . strip_tags(str_replace(['<br>', '<br />', '<br/>'], ' ', $error));
exit;
