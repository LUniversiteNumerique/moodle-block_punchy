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
    }
}
