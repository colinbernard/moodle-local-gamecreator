<?php

namespace local_gamecreator\game\form;

defined('MOODLE_INTERNAL') || die;

require_once($CFG->libdir.'/formslib.php');

use moodleform;

class multiple_choice_form1 extends moodleform {
	protected function definition() {
		global $CFG;

		$mform = $this->_form;

		// Title
		$mform->addElement('text', 'quiztitle', get_string('quiztitle', 'local_gamecreator'));
		$mform->setType('quiztitle', PARAM_TEXT);
		$mform->addHelpButton('quiztitle', 'quiztitle', 'local_gamecreator');
		$mform->addRule('quiztitle', get_string('required'), 'required', null);

		if (isset($_SESSION['quiztitle'])) {
			$mform->setDefault('quiztitle', $_SESSION['quiztitle']);
		}

		// instructions
		$mform->addElement('textarea', 'quizinstructions', get_string('quizinstructions', 'local_gamecreator'), 'wrap="virtual" rows="3" cols="50"');
		$mform->setType('quizinstructions', PARAM_TEXT);
		$mform->addHelpButton('quizinstructions', 'quizinstructions', 'local_gamecreator');
		$mform->addRule('quizinstructions', get_string('required'), 'required', null);

		if (isset($_SESSION['quizinstructions'])) {
			$mform->setDefault('quizinstructions', $_SESSION['quizinstructions']);
		}

		// # questions (1 - 250)
		$numbers = [];
		for ($i = 1; $i <= 250; $i++) {
			$numbers[] = $i;
		}

		$mform->addElement('select', 'numquestions', get_string('numquestionsquiz', 'local_gamecreator'), $numbers);
		$mform->addRule('numquestions', get_string('required'), 'required', null);

		if (isset($_SESSION['numquestions'])) {
			$mform->setDefault('numquestions', $_SESSION['numquestions']);
		} else {
			$mform->setDefault('numquestions', 9);
		}

		$this->add_action_buttons(true, get_string('next', 'local_gamecreator'));
	}

	public function validation($data, $files) {
		global $CFG;

		$errors = parent::validation($data, $files);

		$title = $data['quiztitle'];
		$instructions = $data['quizinstructions'];

		$filename = $CFG->dirroot . "/_LOR/games/multiple_choice/versions/$title/$title.json";

		if (file_exists($filename)) {
			$errors['quiztitle'] = get_string('versionexists', 'local_gamecreator');
		}

		if (strlen($title) > 40) {
			$errors['quiztitle'] = get_string('quiztitle_error', 'local_gamecreator');
		}

		if (strlen($instructions) > 400) {
			$errors['quiztitle'] = get_string('quizinstructions_error', 'local_gamecreator');
		}

		return $errors;
	}
}
