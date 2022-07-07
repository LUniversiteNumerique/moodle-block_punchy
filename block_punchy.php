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

defined('MOODLE_INTERNAL') || die;

require_once("$CFG->dirroot/blocks/punchy/locallib.php");

class block_punchy extends block_base
{
    public function init() {
        $this->title = get_string('defaulttitle', 'block_punchy');
    }

    public function instance_allow_multiple() {
        return false;
    }

    public function has_config() {
        return true;
    }

    public function instance_allow_config() {
        return true;
    }

    public function get_content() {
        $this->content = new stdClass();
        $image = $this->config && $this->config->image ? $this->config->image : 'unit-punchy';
        $defaultlicence = get_config('block_punchy', 'default_licence');
        $licenceid = $this->config && $this->config->licence ? $this->config->licence : $defaultlicence;
        $text = get_string('defaulttext', 'block_punchy');

        if (!empty($this->config->text['text'])) {
            $text = $this->config->text['text'];
        }

        if (!$licence = get_licence($licenceid)) {
            $licence = new \stdClass();
            $licence->licencename = null;
            $licence->licenceurl = null;
            $licence->licenceimage = null;
        }

        $content = new \block_punchy\output\content(
            $text,
            $image,
            $licence->licencename,
            $licence->licenceurl,
            $licence->licenceimage
        );
        $renderer = $this->page->get_renderer('block_punchy');
        $this->content->text = $renderer->render($content);

        return $this->content;
    }

    public function specialization() {
        $defaulttitle = get_string('defaulttitle', 'block_punchy');
        $defaulttext = get_string('defaulttext', 'block_punchy');

        if (isset($this->config)) {
            $this->title = empty($this->config->title) ? $defaulttitle : $this->config->title;
            $this->text = empty($this->config->text) ? $defaulttext : $this->config->text;
        }
    }

    public function applicable_formats() {
        return array(
            'admin' => false,
            'site-index' => false,
            'course-view' => true,
            'mod' => true,
            'my' => false,
        );
    }
}
