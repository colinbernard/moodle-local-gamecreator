<?php

namespace local_gamecreator\game\form;

defined('MOODLE_INTERNAL') || die;

require_once($CFG->libdir.'/formslib.php');

use moodleform;

class venn_diagram_form2 extends moodleform {
	protected function definition() {
		global $CFG;

		$mform = $this->_form;

		// for each question
		for ($question = 0; $question <= $this->_customdata['numquestions']; $question++) {

			// question
			$mform->addElement('text', 'q'.$question, get_string('question', 'local_gamecreator')." ".($question + 1));
			$mform->setType('q'.$question, PARAM_RAW);

			// options
			$mform->addElement('text', 'o'.$question.'0', get_string('left', 'local_gamecreator'));
			$mform->setType('o'.$question.'0', PARAM_RAW);
			$mform->addElement('text', 'o'.$question.'1', get_string('right', 'local_gamecreator'));
			$mform->setType('o'.$question.'1', PARAM_RAW);

			// answers
			$radioarray = array();
			$radioarray[] = $mform->createElement('radio', "a".$question, '', get_string('left', 'local_gamecreator'), "left");
			$radioarray[] = $mform->createElement('radio', "a".$question, '', get_string('both', 'local_gamecreator'), "both");
			$radioarray[] = $mform->createElement('radio', "a".$question, '', get_string('right', 'local_gamecreator'), "right");
			$radioarray[] = $mform->createElement('radio', "a".$question, '', get_string('neither', 'local_gamecreator'), "neither");
			$mform->addGroup($radioarray, 'answer', get_string('venn_answer', 'local_gamecreator'), array(' '), false);
			$mform->setDefault("a".$question, "neither");
		}


		// hidden info from previous form
		$mform->addElement('hidden', 'questions_per_level', $this->_customdata['questions_per_level']);
		$mform->setType('questions_per_level', PARAM_RAW);
		$mform->addElement('hidden', 'numquestions', $this->_customdata['numquestions']);
		$mform->setType('numquestions', PARAM_RAW);
		$mform->addElement('hidden', 'title', $this->_customdata['title']);
		$mform->setType('title', PARAM_RAW);
		$mform->addElement('hidden', 'description', $this->_customdata['description']);
		$mform->setType('description', PARAM_RAW);
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
			if (empty($data['o'.$i.'0'])) {
				$errors['o'.$i.'0'] = get_string('missing', 'local_gamecreator');
			}
			if (empty($data['o'.$i.'1'])) {
				$errors['o'.$i.'1'] = get_string('missing', 'local_gamecreator');
			}
		}





		return $errors;
	}
}
