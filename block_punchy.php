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
        $text = "<p>Un projet de L'Université Numérique alliée à un consortium de partenaires :<p>
                            <ul>
                                <li>Pour répondre à une forte demande de supports de formations hybrides facilement réutilisables</li>
                                <li>Pour engager une démarche générale, systémique et collective visant la création et le partage de ressources pédagogiques numériques à large potentiel de réutilisation, révision et adaptation à des contextes divers</li>
                            </ul>";

        $content = new \block_punchy\output\content($text);
        $renderer = $this->page->get_renderer('block_punchy');
        $this->content->text = $renderer->render($content);

        return $this->content;
    }

    public function specialization()
    {
        if (isset($this->config)) {
            if (empty($this->config->title)) {
                $this->title = get_string('defaulttitle', 'block_punchy');
            } else {
                $this->title = $this->config->title;
            }

            if (empty($this->config->text)) {
                $this->text = get_string('defaulttext', 'block_punchy');
            } else {
                $this->text = $this->config->text;
            }
        }
    }
}
