<?php
/***************************************************************
 *               Wikon 1.0 - Pre-Release                       *
 ***************************************************************
 * If you are seeing this in your web browser, your server     *
 * is probably not configured properly to run PHP applications!*
 *                                                             *
 * See the INSTALL, UPGRADE, and FAQ files for more information*
 * and pointers to samples.                                    *
 * You may be able to solve this issue by enabling the "php"   *
 * server module if you use Apache (which most users do).      *
 *                                                             *
 * If you are not the admin of the wiki server, then the server*
 * may be upgrading PHP versions or repairing from an error or *
 * (D)DoS attack. Please try again in a few minutes.           *
 *                                                             *
 * This is the entrypoint to other parts of wikon.             *
 **************************************************************/
/* SPDX-License-Identifer: GPL-2.0-or-later
 * This file is part of Wikon.
 *
 * Wikon is free software: you can redistribute it and/or modify
 * it under the terms of the GNU General Public License as published by
 * the Free Software Foundation, either version 2 of the License, or
 * (at your option) any later version.
 *
 * Wikon is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 * GNU General Public License for more details.
 *
 * You should have received a copy of the GNU General Public License
 * along with Wikon.  If not, see <https://www.gnu.org/licenses/>.
 */

// Define Wikon version and path, used to identify the software
define("WIKON", "1.0");
$IP = __DIR__;

// Load LocalSettings.php, if it doesn't exist, direct the sysop to installer
if (!file_exists("LocalSettings.php")) {
  $error = "LocalSettings.php not found.<br>Please <a href=\"wikiconf/install.php\">set up the wiki</a> first.";
  require "src/ErrorShow.php";
}
require "LocalSettings.php";

// Expose the software version in headers
header("Wikon-Version: " . WIKON);

// Run Wikon itself
require "src/Wikon.php";
