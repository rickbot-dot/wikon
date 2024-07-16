<?php
$wikon_version = WIKON;
?>
<!DOCTYPE html>
<style>
body {
    font-family: Arial, sans-serif;
    text-align: center;
    display: flex;
    flex-direction: column;
    justify-content: center;
    min-height: 100vh;
    margin: 0 0 0 0;
}
h1 {
    font-weight: normal;
}
</style>
<h1>Wikon <?php echo $wikon_version; ?> internal error</h1>
<p><?php echo $error; ?></p>
EOF;
<?php
error_log("Wikon $wikon_version error, requires admin attention!! $error")
header("HTTP/1.1 500 Internal Server Error");
exit;
