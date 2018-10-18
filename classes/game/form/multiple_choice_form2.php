<?php

namespace local_gamecreator\game\form;

defined('MOODLE_INTERNAL') || die;

require_once($CFG->libdir.'/formslib.php');

use moodleform;

class multiple_choice_form2 extends moodleform {
	protected function definition() {
		global $CFG;

		$mform = $this->_form;

		for ($question = 0; $question <= $this->_customdata->numquestions; $question++) {

			// header
			$mform->addElement('header', "questionheader$question", get_string('question', 'local_gamecreator')." ".($question+1));

      // question
      $mform->addElement('text', "q_$question", get_string('question', 'local_gamecreator'));
	    $mform->addRule("q_$question", get_string('required'), 'required', null);
      $mform->setType("q_$question", PARAM_TEXT);

      // question image
      $mform->addElement('filepicker', "image_$question", get_string('image', 'local_gamecreator'), null, array('maxbytes'=>1000000, 'accepted_types'=>array('.png', '.jpg')));

      // answer
      $mform->addElement('text', "a_$question", get_string('answer', 'local_gamecreator'));
	    $mform->addRule("a_$question", get_string('required'), 'required', null);
      $mform->setType("a_$question", PARAM_TEXT);

			// options (3)
			for ($i = 0; $i < 3; $i++) {
				$mform->addElement('text', "o_$question"."_".$i, get_string('option', 'local_gamecreator'));
  	    $mform->addRule("o_$question"."_".$i, get_string('required'), 'required', null);
				$mform->setType("o_$question"."_".$i, PARAM_TEXT);
			}
		}

		$mform->addElement('hidden', 'numquestions', $this->_customdata->numquestions);
		$mform->setType('numquestions', PARAM_RAW);
		$mform->addElement('hidden', 'numquestions', $this->_customdata->numquestions);
		$mform->setType('numquestions', PARAM_RAW);
		$mform->addElement('hidden', 'title', $this->_customdata->quiztitle);
		$mform->setType('title', PARAM_RAW);
		$mform->addElement('hidden', 'instructions', $this->_customdata->quizinstructions);
		$mform->setType('instructions', PARAM_RAW);
		$this->add_action_buttons(true, get_string('createquiz', 'local_gamecreator'));

	}

	public function validation($data, $files) {
		$errors = parent::validation($data, $files);
		return $errors;
	}
}
