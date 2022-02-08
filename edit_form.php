<?php

defined('MOODLE_INTERNAL') || die();

class block_punchy_edit_form extends block_edit_form
{
    protected function specific_definition($mform)
    {
        // Titre de l'en-tête de section selon le fichier de langue.
        $mform->addElement('header', 'config_header', get_string('blocksettings', 'block'));

        // MODIFIER LE TITRE DU BLOC
        $mform->addElement('text', 'config_title', get_string('blocktitle', 'block_punchy'));
        $mform->setDefault('config_title', 'Titre');
        $mform->setType('config_title', PARAM_TEXT);
    }
}
