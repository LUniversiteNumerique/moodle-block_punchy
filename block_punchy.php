<?php

defined('MOODLE_INTERNAL') || die();

class punchy extends block_base
{
    public function init()
    {
        $this->title = get_string('pluginname', 'punchy');
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
