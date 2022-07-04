<?php


defined('MOODLE_INTERNAL') || die;

function cc_add_licence($licence) {
    global $DB;

    $id = $DB->insert_record('punchy_licence', $licence);
    
    if ($id) {
        return $id;
    }
    throw new moodle_exception('errorinsertingrecord', 'block_punchy');
}