<?php

namespace local_gamecreator\game\form;

defined('MOODLE_INTERNAL') || die;

require_once($CFG->libdir.'/formslib.php');

use moodleform;

class two_sort_form1 extends moodleform {
	protected function definition() {
		global $CFG;

		$mform = $this->_form;

		// Title.
		$mform->addElement('text', 'title', get_string('title', 'local_gamecreator'));
		$mform->setType('title', PARAM_TEXT);
		$mform->addHelpButton('title', 'two_sort_title', 'local_gamecreator');
		$mform->addRule('title', get_string('required'), 'required', null);

		if (isset($_SESSION['title'])) {
			$mform->setDefault('title', $_SESSION['title']);
		}

		// Left column name.
    $mform->addElement('text', 'left', get_string('left_column', 'local_gamecreator'));
		$mform->setType('left', PARAM_TEXT);
		$mform->addRule('left', get_string('required'), 'required', null);

		if (isset($_SESSION['left'])) {
			$mform->setDefault('left', $_SESSION['left']);
		}

    // Right column name.
    $mform->addElement('text', 'right', get_string('right_column', 'local_gamecreator'));
    $mform->setType('right', PARAM_TEXT);
    $mform->addRule('right', get_string('required'), 'required', null);

    if (isset($_SESSION['right'])) {
      $mform->setDefault('right', $_SESSION['right']);
    }

		// # questions (1 - 25)
		$numbers = [];
		for ($i = 1; $i <= 25; $i++) {
			$numbers[] = $i;
		}

		$mform->addElement('select', 'numitems', get_string('two_sort_number_of_items', 'local_gamecreator'), $numbers);
		$mform->addRule('numitems', get_string('required'), 'required', null);

		if (isset($_SESSION['numitems'])) {
			$mform->setDefault('numitems', $_SESSION['numitems']);
		} else {
			$mform->setDefault('numitems', 9);
		}

		$this->add_action_buttons(true, get_string('next', 'local_gamecreator'));
	}

	public function validation($data, $files) {
		global $CFG;

		$errors = parent::validation($data, $files);

		$title = $data['title'];
		$left_column = $data['left'];
    $right_column = $data['right'];

		$filename = $CFG->dirroot . "/LOR/games/two_sort/versions/$title.json";

		if (file_exists($filename)) {
			$errors['title'] = get_string('versionexists', 'local_gamecreator');
		}

		if (strlen($title) > 40) {
			$errors['title'] = get_string('title_error', 'local_gamecreator');
		}

		if (strlen($left_column) > 30) {
			$errors['left'] = get_string('too_long', 'local_gamecreator');
		}

    if (strlen($right_column) > 30) {
      $errors['right'] = get_string('too_long', 'local_gamecreator');
    }

		return $errors;
	}
}
