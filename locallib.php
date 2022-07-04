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

function delete_licence($itemid, $redirecto) {
    global $DB;

    $params = ['id' => $itemid];
    if ($DB->delete_records('block_punchy_licences', $params)) {
        $redirecto = new moodle_url('/blocks/punchy/configure.php');
        redirect($redirecto);
    }
    throw new moodle_exception('errordeletingrecord', 'block_punchy');
}

function get_licences_names() {
    global $DB;

    $licences = $DB->get_records('block_punchy_licences');
    $items = [];
    foreach($licences as $licence) {
        $licencename = $licence->licenceurl;
        if (strpos($licence->licenceurl, 'creativecommons.org') !== false) {
            $licenceexp = explode('/', $licence->licenceurl);
            $licencename = $licenceexp[count($licenceexp)-3];
        }

        $items[$licence->id] = $licencename;
    }
    return $items;
}


function get_licence($id) {
    global $DB;

    $licence = $DB->get_record('block_punchy_licences', array('id' => $id));
    return $licence;
}
