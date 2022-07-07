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
 * PUNCHY block
 *
 * @package    block_punchy
 * @copyright  2022 L'Université Numérique
 * @license    http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die;

require_once("$CFG->dirroot/blocks/punchy/locallib.php");

if ($ADMIN->fulltree) {
    $configureurl = "{$CFG->wwwroot}/blocks/punchy/configure.php?action=add&amp;sesskey={$USER->sesskey}";
    $configurestr = get_string('configuration', 'block_punchy');

    $template = <<< EOD
    <div class="yui-content mb-5">
        <div>
            <div><a style="margin-top:.25em" href="{$configureurl}">{$configurestr}</a></div>
        </div>
    </div>
    EOD;

    $settings->add(new admin_setting_heading('block_punchy', new lang_string('configuration_settings', 'block_punchy') .
        null, $template));
    
    $settings->add(new admin_setting_configselect(
        'block_punchy/default_licence',
        new lang_string('default_licence', 'block_punchy'),
        new lang_string('default_licence_desc', 'block_punchy'),
        null,
        get_licences_names())
    );
}
