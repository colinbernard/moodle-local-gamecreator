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
		$mform->addRule('gametitle', get_string('required'), 'required', null);

		// Description
		$mform->addElement('textarea', 'gamedescription', get_string('gamedescription', 'local_gamecreator'), 'wrap="virtual" rows="3" cols="50"');
		$mform->setType('gamedescription', PARAM_TEXT);
		$mform->addHelpButton('gamedescription', 'gamedescription', 'local_gamecreator');
		$mform->addRule('gamedescription', get_string('required'), 'required', null);

		// Levels
		$numbers = [];
		for ($i = 1; $i <= 8; $i++) {
			$numbers[] = $i;
		}

		$mform->addElement('select', 'numlevels', get_string('numlevels', 'local_gamecreator'), $numbers);
		$mform->setDefault('numlevels', 4);
		$mform->addRule('numlevels', get_string('required'), 'required', null);

		$mform->addElement('select', 'numquestions', get_string('numquestions', 'local_gamecreator'), $numbers);
		$mform->setDefault('numquestions', 3);
		$mform->addRule('numquestions', get_string('required'), 'required', null);


		// Create Game Button
		$this->add_action_buttons(true, get_string('next', 'local_gamecreator'));
		


	}

	public function validation($data, $files) {

		$errors = parent::validation($data, $files);

		$title = $data['gametitle'];
		$description = $data['gamedescription'];

		if (strlen($title) > 31) {
			$errors['gametitle'] = get_string('gametitle_error', 'local_gamecreator');
		}

		if (strlen($description > 70)) {
			$errors['gamedescription'] = get_string('gamedescription_error', 'local_gamecreator');
		}

		return $errors;
	}
}