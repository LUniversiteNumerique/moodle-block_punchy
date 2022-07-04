<?php


defined('MOODLE_INTERNAL') || die;

function cc_add_licence($licence) {
    global $DB;

    if ($licence->licenceurl && $licence->licenceimage) {
        $id = $DB->insert_record('block_punchy_licences', $licence);

        if ($id) {
            $url = new moodle_url('/blocks/punchy/configure.php');
            redirect($url);
        }
    }
    throw new moodle_exception('errorinsertingrecord', 'block_punchy');
}

function get_licences() {
    global $DB;

    $licences = $DB->get_records('block_punchy_licences');
    $items = [];
    foreach($licences as $licence) {
        array_push($items, (array) $licence);
    }
    return $items;
}