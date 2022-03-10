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

namespace block_punchy\output;

use renderable;
use renderer_base;
use templatable;

class content implements renderable, templatable
{
    public $text;
    public $image;
    
    /**
     * Constructor.
     *
     * @param  string $text
     * @param  string $image
     * @return void
     */
    public function __construct($text, $image)
    {
        $this->text = $text;
        $this->image = $image;
    }

    public function export_for_template(renderer_base $output)
    {
        $data = array(
            'content' => $this->text,
            'image' => $output->image_url($this->image, 'block_punchy')->out(),
        );
        return $data;
    }
}
