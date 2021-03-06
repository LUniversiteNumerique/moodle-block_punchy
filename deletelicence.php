<?php
// This file is part of Moodle - http://moodle.org/
//
// Moodle is free software: you can redistribute it and/or modify
// it under the terms of the GNU General Public License as published by
// the Free Software Foundation, either version 3 of the License, or
// (at your option) any later version.
//
// Moodle is distributed in the hope that it will be useful,
// but WITHOUT ANY WARRANTY; without even the implied warranty of
// MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
// GNU General Public License for more details.
//
// You should have received a copy of the GNU General Public License
// along with Moodle.  If not, see <http://www.gnu.org/licenses/>.

/**
 * PUNCHY block settings
 *
 * @package    block_punchy
 * @copyright  2022 L'Université Numérique
 * @license    http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

require_once('../../config.php');
require_once($CFG->libdir.'/adminlib.php');
require_once("$CFG->dirroot/blocks/punchy/locallib.php");

// No guest autologin.
require_login(0, false);
require_sesskey();
admin_externalpage_setup('manageblocks');

$itemid = required_param('itemid', PARAM_INT);
$returnto = optional_param('returnto', '', PARAM_ALPHA);
$returnurl = $CFG->wwwroot;

if ($returnto == 'configure') {
    $returnurl = new moodle_url($CFG->wwwroot . '/blocks/punchy/configure.php');
}

if ($itemid) {
    delete_licence($itemid, $returnurl);
}
