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

// No guest autologin.
require_login(0, false);
admin_externalpage_setup('manageblocks');

$configurelicenceparam = optional_param('cc-licence-url', '', PARAM_URL);
$configureimageparam   = optional_param('cc-image-url', '', PARAM_URL);

if ($configurelicenceparam && $configureimageparam) {
    $licence = new stdClass();
    $licence->licenceurl = $configurelicenceparam;
    $licence->licenceimg = $configureimageparam;
    cc_add_licence($licence);
}

$pageurl = new moodle_url('/block/punchy/configure.php');
$PAGE->set_url($pageurl);
$PAGE->set_title("{$SITE->shortname}: " . get_string('toolregistration', 'mod_lti'));
$PAGE->requires->string_for_js('success', 'moodle');
$PAGE->requires->string_for_js('error', 'moodle');
$PAGE->requires->string_for_js('successfullycreatedtooltype', 'mod_lti');
$PAGE->requires->string_for_js('failedtocreatetooltype', 'mod_lti');
$output = $PAGE->get_renderer('block_punchy');


echo $output->header();

$page = new \block_punchy\output\configure_page();
echo $output->render($page);

echo $output->footer();