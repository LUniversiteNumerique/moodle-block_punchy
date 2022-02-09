<?php

namespace block_punchy\output;

defined('MOODLE_INTERNAL') || die();

use renderable;
use renderer_base;
use templatable;

class content implements renderable, templatable
{
    public $text;

    public function __construct($text)
    {
        $this->text = $text;
    }

    public function export_for_template(renderer_base $output)
    {
        $data = array(
            'content' => $this->text,
        );
        return $data;
    }
}
