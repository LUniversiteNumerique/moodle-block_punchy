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

defined('MOODLE_INTERNAL') || die;

require_once("$CFG->dirroot/blocks/punchy/locallib.php");

if ($ADMIN->fulltree) {
    global $DB;

    $settings->add(new admin_setting_configtext(
        'punchy/cc_licence_url',
        get_string('cc_licence_url', 'block_punchy'),
        get_string('cc_licence_url_desc', 'block_punchy'),
        ''
    ));

    $settings->add(new admin_setting_configtext(
        'punchy/cc_image_url',
        get_string('cc_image_url', 'block_punchy'),
        get_string('cc_image_url_desc', 'block_punchy'),
        ''
    ));
}