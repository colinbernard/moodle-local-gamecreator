<?php

defined('MOODLE_INTERNAL') || die();

if ($hassiteconfig) {

	$settings = new admin_externalpage('local_gamecreator', get_string('pluginname', 'local_gamecreator'), "$CFG->wwwroot/local/gamecreator/index.php");

	$ADMIN->add('localplugins', $settings);

}