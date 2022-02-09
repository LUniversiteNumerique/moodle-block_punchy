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
        $text = get_string('defaulttext', 'block_punchy');

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
