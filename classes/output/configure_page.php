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


namespace block_punchy\output;

require_once($CFG->dirroot.'/blocks/punchy/locallib.php');

use moodle_url;
use renderable;
use templatable;
use renderer_base;
use stdClass;
use help_icon;


class configure_page implements renderable, templatable {
    /**
     * Export this data so it can be used as the context for a mustache template.
     *
     * @param renderer_base $output The renderer
     * @return stdClass
     */
    public function export_for_template(renderer_base $output) {
        $namehelp = new help_icon('cc_licence_name_desc', 'block_punchy');
        $licencehelp = new help_icon('cc_licence_url_desc', 'block_punchy');
        $imagehelp = new help_icon('cc_image_url_desc', 'block_punchy');

        $licences = get_licences();

        $data = new stdClass();
        $data->licences = $licences;

        $deleteurl = new moodle_url('/blocks/punchy/deletelicence.php', array('sesskey' => sesskey(), 'returnto' => 'configure'));
        $data->deleteurl = $deleteurl->out();

        $data->namehelp = $namehelp;
        $data->licencehelp = $licencehelp;
        $data->imagehelp = $imagehelp;

        return $data;
    }
}
