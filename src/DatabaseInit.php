<?php
/* SPDX-License-Identifier: GPL-2.0-or-later
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
 *
 * This is a script that will load the appropiate database.
 * The context of the "Appropiate database" is complex, as Wikon identifies
 * it with several variables. For convienence, each vanilla database-related
 * variable is prefixed with "wDB".
 */

// MySQL support (why not?)
function connectToMySQLDatabase() {
  try {
    global $WIKI_DATABASE_CONN, $wDBhost, $wDBuser, $wDBpass, $wDBname;
    $WIKI_DATABASE_CONN = new mysqli($wDBhost, $wDBuser, $wDBpass, $wDBname);
  } catch (Exception $e) {
    $error = "MySQL returned an error: <code>$e</code><br><br>Please confirm that the database, user, and server name do not have typos, and that the password is correct.";
    require "ErrorShow.php";
  }
}

// SQLite support
function connectToSQLiteDatabase() {
  global $WIKI_DATABASE_CONN, $wDBfile;
  if (!$wDBfile) {
    $error = "Please set \$wDBfile to the database file to use for this wiki.";
    require "ErrorShow.php";
  }
  $WIKI_DATABASE_CONN = new SQLite3($wDBfile);
}

// Postgres support
function connectToPostgresDatabase() {
  try {
    global $WIKI_DATABASE_CONN, $wDBhost, $wDBuser, $wDBpass, $wDBname;
    $WIKI_DATABASE_CONN = pg_connect("host=$wDBhost dbname=$wDBname user=$wDBuser password=$wDBpass");
  } catch (Exception $e) {
    $error = "Postgres returned an error: <code>$e</code><br><br>Please confirm that the database, user, and server name do not have typos, and that the password is correct.";
    require "ErrorShow.php";
  }
}

// Connect to the database based on the value of $wDBsoftware
switch ($wDBsoftware) {

  case "mysqli":
    connectToMySQLDatabase();
    break;
  case "sqlite":
    connectToSQLiteDatabase();
    break;
  case "postgres":
    connectToPostgresDatabase();
    break;
  default:
    error_log("Couldn't get a database.");
    $error = "Your LocalSettings.php file is set up to utilize a software that is not compatible with Wikon's specifications. \$wDBsoftware must be one of the following: mysqli, sqlite, or postgres. If you need help, please refer to the installation guide or <a href='https://github.com/TylerMS887/wikon/issues/new/choose'>create a new issue</a> to report a bug or request a feature.";
    require "ErrorShow.php";
}
