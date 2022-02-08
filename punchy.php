<?php

defined('MOODLE_INTERNAL') || die();

class punchy extends block_base
{
    public function init()
    {
        $this->title = get_string('pluginname', 'punchy');
    }
}
