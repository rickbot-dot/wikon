<?php
/*
 * If you are seeing this code in your web browser, your server
 * is probably not configured properly to run PHP applications!
 *
 * See the INSTALL, UPGRADE, and FAQ files for more information
 * and pointers to samples.
 *
 * This is the entrypoint to other parts of wikon.
 */

// Define Wikon version, used to identify the software
define("WIKON", "1.0");

// Load LocalSettings.php, if it doesn't exist, direct the sysop to installer
if (!file_exists("LocalSettings.php")) {
  $error = "LocalSettings.php not found.<br>Please <a href=\"wiki-install/web/install.php\">set up the wiki</a> first.";
  require "error.php";
}
require "LocalSettings.php";

// Expose the version in headers
header("Wikon-Version: " . WIKON);

// Run Wikon itself
require "src/Wikon.php";
