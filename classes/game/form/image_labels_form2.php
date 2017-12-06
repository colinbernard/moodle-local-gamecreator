<?php

namespace local_gamecreator\game\form;

defined('MOODLE_INTERNAL') || die;

require_once($CFG->libdir.'/formslib.php');

use moodleform;

class image_labels_form2 extends moodleform {
	protected function definition() {
		global $CFG;

		$mform = $this->_form;

		$mform->addElement('filepicker', 'mainpic', get_string('image', 'local_gamecreator').' 1', null, array('maxbytes'=>1000000, 'accepted_types'=>array('.png', '.jpg')));
		$mform->addRule('mainpic', get_string('required'), 'required', null);


		// for each question
		for ($question = 0; $question <= $this->_customdata['numquestions']; $question++) {

			// question
			$mform->addElement('text', 'q'.$question, get_string('question', 'local_gamecreator')." ".($question + 1));
			$mform->setType('q'.$question, PARAM_RAW);

			// answer
			$letters = ['A', 'B', 'C', 'D', 'E', 'F', 'G', 'H'];
			$letters = array_slice($letters, 0, $this->_customdata['numbuttons']+2);
			$mform->addElement('select', 'a'.$question, get_string('image_labels_answer', 'local_gamecreator') . " " . ($question + 1), $letters);
			$mform->setDefault('a'.$question, 'A');

		}


		// hidden info from previous form
		$mform->addElement('hidden', 'numquestions', $this->_customdata['numquestions']);
		$mform->setType('numquestions', PARAM_RAW);
		$mform->addElement('hidden', 'numbuttons', $this->_customdata['numbuttons']);
		$mform->setType('numbuttons', PARAM_RAW);
		$mform->addElement('hidden', 'title', $this->_customdata['title']);
		$mform->setType('title', PARAM_RAW);

		$this->add_action_buttons(true, get_string('creategame', 'local_gamecreator'));
	}

	public function validation($data, $files) {

		$errors = parent::validation($data, $files);


		$numquestions = $data['numquestions'];


		// make sure all fields are completed
		// can't use 'required' since number of fields varies.
		for ($i = 0; $i <= $numquestions; $i++) {
			if (empty($data['q'.$i])) {
				$errors['q'.$i] = get_string('missing', 'local_gamecreator');
			}
		}

		return $errors;
	}
}
