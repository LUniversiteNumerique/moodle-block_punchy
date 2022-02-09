<?php

defined('MOODLE_INTERNAL') || die();

class block_punchy extends block_base
{
    public function init()
    {
        $this->title = get_string('pluginname', 'block_punchy');
    }

    public function instance_allow_multiple()
    {
        return false;
    }

    public function has_config()
    {
        return true;
    }

    public function instance_allow_config()
    {
        return true;
    }

    public function get_content()
    {
        $this->content = new stdClass();
        $this->content->text = "<p>Un projet de L'Université Numérique alliée à un consortium de partenaires :<p>
                            <ul>
                                <li>Pour répondre à une forte demande de supports de formations hybrides facilement réutilisables</li>
                                <li>Pour engager une démarche générale, systémique et collective visant la création et le partage de ressources pédagogiques numériques à large potentiel de réutilisation, révision et adaptation à des contextes divers</li>
                            </ul>";
        return $this->content;
    }
}
