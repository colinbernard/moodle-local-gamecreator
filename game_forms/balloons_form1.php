<?php


defined('MOODLE_INTERNAL') || die;

require_once($CFG->libdir.'/formslib.php');

class balloons_form1 extends moodleform {
	protected function definition() {
		global $CFG;

		$balloonsform = $this->_form;

		// Title
		$balloonsform->addElement('text', 'gametitle', get_string('gametitle', 'local_gamecreator'));
		$balloonsform->setType('gametitle', PARAM_TEXT);
		$balloonsform->addHelpButton('gametitle', 'gametitle', 'local_gamecreator');


		// Description
		$balloonsform->addElement('textarea', 'gamedescription', get_string('gamedescription', 'local_gamecreator'), 'wrap="virtual" rows="3" cols="50"');
		$balloonsform->setType('gamedescription', PARAM_TEXT);
		$balloonsform->addHelpButton('gamedescription', 'gamedescription', 'local_gamecreator');

		// Levels
		$numbers = [];
		for ($i = 1; $i <= 8; $i++) {
			$numbers[] = $i;
		}
		$balloonsform->addElement('select', 'numlevels', get_string('numlevels', 'local_gamecreator'), $numbers);
		$balloonsform->setDefault('numlevels', 4);
		$balloonsform->addElement('select', 'numquestions', get_string('numquestions', 'local_gamecreator'), $numbers);
		$balloonsform->setDefault('numquestions', 3);


		// Create Game Button
		$this->add_action_buttons(true, get_string('next', 'local_gamecreator'));
		


	}

	// TODO: validation
}