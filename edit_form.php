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

require_once("$CFG->dirroot/blocks/punchy/locallib.php");

class block_punchy_edit_form extends block_edit_form
{
    protected function specific_definition($mform)
    {
        // Titre de l'en-tête de section selon le fichier de langue.
        $mform->addElement('header', 'config_header', get_string('blocksettings', 'block'));

        // Block title.
        $mform->addElement('text', 'config_title', get_string('blocktitle', 'block_punchy'));
        $mform->setDefault('config_title', "Partageons l'Université Numérique et des Cursus HYbrides");
        $mform->setType('config_title', PARAM_TEXT);

        // Block text.
        $mform->addElement('editor', 'config_text', get_string('blockstring', 'block_punchy'));
        $mform->setType('config_text', PARAM_RAW);

        // Images.
        $options = array(
            'aunege-punchy' => 'AUNEGE',
            'iutenligne-punchy' => 'IUTenLigne',
            'uness-punchy' => 'UNESS',
            'unit-punchy' => 'UNIT',
            'uoh-punchy' => 'UOH',
            'uved-punchy' => 'UVED'
        );
        $mform->addElement('select', 'config_image', get_string('image', 'block_punchy'), $options);
        $mform->setDefault('config_image', 'unit-punchy');

        // Licences.
        $licences = get_licences_names();
        $mform->addElement('select', 'config_licence', get_string('licences', 'block_punchy'), $licences);
        $mform->setDefault('config_licence', '');
    }
}
