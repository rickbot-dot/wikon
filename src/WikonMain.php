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
 */

if (!defined("WIKON")) {
  define("WIKON", "[unknown version]");
  $error = "This script was not run through the Wikon entry point, or another script that defines the WIKON constant.";
  require "ErrorShow.php";
}
require "DatabaseInit.php";
