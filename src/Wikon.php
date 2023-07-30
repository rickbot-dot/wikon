<?php
/* SPDX-License-Identifier- GPL-2.0-or-later
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

// Check the value of $wDBsoftware
switch ($wDBsoftware) {
  // If set to mysqli, define WIKI_DATABASE_CONN as a mysqli connection
  case "mysqli":
    error_log("Connecting to MySQL database", 0);
    $WIKI_DATABASE_CONN = new mysqli($wDBhost, $wDBuser, $wDBpass, $wDBname);
    break;
  // If set to sqlite, define WIKI_DATABASE_CONN as an SQLite connection
  case "sqlite":
    error_log("Connecting to SQLite database", 0);
    if (!$wDBfile) {
      $error = "Please provide the file to use for Wikon.";
      require "ErrorShow.php";
    }
    $WIKI_DATABASE_CONN = new SQLite3($wDBfile);
    break;
  // If set to postgres, define WIKI_DATABASE_CONN as a postgres connection
  case "postgres":
    error_log("Connecting to Postgres database", 0);
    $WIKI_DATABASE_CONN = pg_connect("host=$wDBhost dbname=$wDBname user=$wDBuser password=$wDBpass");
    break;
  // If set to anything else, set $error and run ErrorShow.php
  default:
    $error = "Your LocalSettings.php file is configured to use a software that is not supported by Wikon. \$wDBsoftware must be one of the following: mysqli, sqlite, or postgres. If you need help, please refer to the installation guide or <a href='https://github.com/TylerMS887/wikon/issues/new/choose'>create a new issue</a> to report a bug or request a feature.";
    require "ErrorShow.php";
}
