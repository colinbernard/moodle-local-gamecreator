<?php


defined('MOODLE_INTERNAL') || die;

require_once($CFG->libdir.'/formslib.php');

class balloons_form1 extends moodleform {
	protected function definition() {
		global $CFG;

		$mform = $this->_form;

		// Title
		$mform->addElement('text', 'gametitle', get_string('gametitle', 'local_gamecreator'));
		$mform->setType('gametitle', PARAM_TEXT);
		$mform->addHelpButton('gametitle', 'gametitle', 'local_gamecreator');


		// Description
		$mform->addElement('textarea', 'gamedescription', get_string('gamedescription', 'local_gamecreator'), 'wrap="virtual" rows="3" cols="50"');
		$mform->setType('gamedescription', PARAM_TEXT);
		$mform->addHelpButton('gamedescription', 'gamedescription', 'local_gamecreator');

		// Levels
		$numbers = [];
		for ($i = 1; $i <= 8; $i++) {
			$numbers[] = $i;
		}
		$mform->addElement('select', 'numlevels', get_string('numlevels', 'local_gamecreator'), $numbers);
		$mform->setDefault('numlevels', 4);
		$mform->addElement('select', 'numquestions', get_string('numquestions', 'local_gamecreator'), $numbers);
		$mform->setDefault('numquestions', 3);


		// Create Game Button
		$this->add_action_buttons(true, get_string('next', 'local_gamecreator'));
		


	}

	// TODO: validation
}