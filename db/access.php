<?php

defined('MOODLE_INTERNAL') || die();

$capabilities = array(
  'local/gamecreator:viewplugin' => array(
    'captype'      => 'write',
    'contextlevel' => CONTEXT_USER,
    'archetypes' => array(
        'guest'          => CAP_PREVENT,
        'student'        => CAP_PREVENT,
        'teacher'        => CAP_ALLOW,
        'editingteacher' => CAP_ALLOW,
        'coursecreator'  => CAP_ALLOW,
        'manager'        => CAP_ALLOW
    )
  ),
);
