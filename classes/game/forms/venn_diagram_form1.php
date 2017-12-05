<?php

namespace local_gamecreator\game\forms;

defined('MOODLE_INTERNAL') || die;

require_once($CFG->libdir.'/formslib.php');

use moodleform;

class venn_diagram_form1 extends moodleform {
	protected function definition() {
		global $CFG;

		$mform = $this->_form;

		// Title
		$mform->addElement('text', 'gametitle', get_string('gametitle', 'local_gamecreator'));
		$mform->setType('gametitle', PARAM_TEXT);
		$mform->addHelpButton('gametitle', 'gametitle_venn', 'local_gamecreator');
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

		// Questions
		$numbers = [];
		for ($i = 1; $i <= 30; $i++) {
			$numbers[] = $i;
		}

		$mform->addElement('select', 'numquestions', get_string('numquestions_venn', 'local_gamecreator'), $numbers);
		$mform->addRule('numquestions', get_string('required'), 'required', null);

		if (isset($_SESSION['numquestions'])) {
			$mform->setDefault('numquestions', $_SESSION['numquestions']);
		} else {
			$mform->setDefault('numquestions', 14);
		}

		for ($i = 1; $i <= 10; $i++) {
			$numbers[] = $i;
		}

		$mform->addElement('select', 'questions_per_level', get_string('questions_per_level', 'local_gamecreator'), $numbers);
		$mform->addRule('questions_per_level', get_string('required'), 'required', null);

		if (isset($_SESSION['questions_per_level'])) {
			$mform->setDefault('questions_per_level', $_SESSION['questions_per_level']);
		} else {
			$mform->setDefault('questions_per_level', 4);
		}


		// Next button
		$this->add_action_buttons(true, get_string('next', 'local_gamecreator'));



	}

	public function validation($data, $files) {
		global $CFG;


		$errors = parent::validation($data, $files);

		$title = $data['gametitle'];
		$description = $data['gamedescription'];

		$filename = $CFG->dirroot . '/LOR/games/venn_diagram/versions/' . $title;

		if (file_exists($filename)) {
			$errors['gametitle'] = get_string('versionexists', 'local_gamecreator');
		}

		if (strlen($title) > 30) {
			$errors['gametitle'] = get_string('gametitle_error', 'local_gamecreator');
		}

		if (strlen($description) > 400) {
			$errors['gamedescription'] = get_string('gamedescription_error', 'local_gamecreator');
		}

		return $errors;
	}
}
