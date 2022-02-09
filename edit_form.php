<?php

defined('MOODLE_INTERNAL') || die();

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
        $mform->addElement('editor', 'config_text', get_string('blockstring', 'block_punchy'), null, get_string('defaulttext', 'block_punchy'));
        $mform->setType('config_text', PARAM_RAW);
    }
}
