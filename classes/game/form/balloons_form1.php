<?php

namespace local_gamecreator\game\form;

defined('MOODLE_INTERNAL') || die;

require_once($CFG->libdir.'/formslib.php');

use moodleform;

class balloons_form1 extends moodleform {
	protected function definition() {
		global $CFG;

		$mform = $this->_form;

		// Title
		$mform->addElement('text', 'gametitle', get_string('gametitle', 'local_gamecreator'));
		$mform->setType('gametitle', PARAM_TEXT);
		$mform->addHelpButton('gametitle', 'gametitle', 'local_gamecreator');
		$mform->addRule('gametitle', get_string('required'), 'required', null);

		if (isset($_SESSION['gametitle'])) {
			$mform->setDefault('gametitle', $_SESSION['gametitle']);
		}

		// Description
		$mform->addElement('textarea', 'gamedescription', get_string('gamedescription', 'local_gamecreator'), 'wrap="virtual" rows="3" cols="50"');
		$mform->setType('gamedescription', PARAM_TEXT);
		$mform->addHelpButton('gamedescription', 'gamedescription', 'local_gamecreator');
		$mform->addRule('gamedescription', get_string('required'), 'required', null);

		if (isset($_SESSION['gamedescription'])) {
			$mform->setDefault('gamedescription', $_SESSION['gamedescription']);
		}

		// Levels
		$numbers = [];
		for ($i = 1; $i <= 8; $i++) {
			$numbers[] = $i;
		}

		$mform->addElement('select', 'numlevels', get_string('numlevels', 'local_gamecreator'), $numbers);
		$mform->addRule('numlevels', get_string('required'), 'required', null);

		if (isset($_SESSION['numlevels'])) {
			$mform->setDefault('numlevels', $_SESSION['numlevels']);
		} else {
			$mform->setDefault('numlevels', 4);
		}

		$mform->addElement('select', 'numquestions', get_string('numquestions', 'local_gamecreator'), $numbers);
		$mform->addRule('numquestions', get_string('required'), 'required', null);

		if (isset($_SESSION['numquestions'])) {
			$mform->setDefault('numquestions', $_SESSION['numquestions']);
		} else {
			$mform->setDefault('numquestions', 3);
		}


		// Create Game Button
		$this->add_action_buttons(true, get_string('next', 'local_gamecreator'));



	}

	public function validation($data, $files) {
		global $CFG;


		$errors = parent::validation($data, $files);

		$title = $data['gametitle'];
		$description = $data['gamedescription'];

		$filename = $CFG->dirroot . '/LOR/games/balloons/versions/' . $title . ".json";

		if (file_exists($filename)) {
			$errors['gametitle'] = get_string('versionexists', 'local_gamecreator');
		}

		if (strlen($title) > 30) {
			$errors['gametitle'] = get_string('gametitle_error', 'local_gamecreator');
		}

		if (strlen($description) > 165) {
			$errors['gamedescription'] = get_string('gamedescription_error', 'local_gamecreator');
		}

		return $errors;
	}
}
