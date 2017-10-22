<?php


defined('MOODLE_INTERNAL') || die;

require_once($CFG->libdir.'/formslib.php');

class balloons_form2 extends moodleform {
	protected function definition() {
		global $CFG;

		$mform = $this->_form;


		for ($level = 0; $level <= $this->_customdata['numlevels']; $level++) {

			// header
			$mform->addElement('header', "levelheader$level", get_string('level', 'local_gamecreator')." ".($level+1));

			// level name
			$mform->addElement('text', "levelname$level", get_string('levelname', 'local_gamecreator'));
			$mform->setType("levelname$level", PARAM_TEXT);
			$mform->setDefault("levelname$level", "Level " . ($level+1));
			$mform->addHelpButton("levelname$level", 'levelname', 'local_gamecreator');

			// speed
			$radioarray = array();
			$radioarray[] = $mform->createElement('radio', "levelspeed$level", '', get_string('speed_increase', 'local_gamecreator'), 1);
			$radioarray[] = $mform->createElement('radio', "levelspeed$level", '', get_string('speed_decrease', 'local_gamecreator'), -1);
			$radioarray[] = $mform->createElement('radio', "levelspeed$level", '', get_string('speed_no', 'local_gamecreator'), 0);
	        $mform->addGroup($radioarray, 'balloonspeed', get_string('speed', 'local_gamecreator'), array(' '), false);
	        $mform->setDefault("levelspeed$level", 0);
	        $mform->addHelpButton("balloonspeed", "speed", 'local_gamecreator');

			for ($question = 0; $question <= $this->_customdata['numquestions']; $question++) {
				
				// question
				$mform->addElement('text', "q_".$level.$question, get_string('question', 'local_gamecreator'));
				$mform->setType("q_".$level.$question, PARAM_TEXT);

				// answer
				$mform->addElement('text', "a_".$level.$question, get_string('answer', 'local_gamecreator'));
				$mform->setType("a_".$level.$question, PARAM_TEXT);

				// options
				for ($i = 0; $i < 4; $i++) {
					$mform->addElement('text', "o_".$level.$question.$i, get_string('option', 'local_gamecreator'));
					$mform->setType("o_".$level.$question.$i, PARAM_TEXT);
				}
			}
		}

		$mform->addElement('hidden', 'numlevels', $this->_customdata['numlevels']);
		$mform->setType('numlevels', PARAM_RAW);
		$mform->addElement('hidden', 'numquestions', $this->_customdata['numquestions']);
		$mform->setType('numquestions', PARAM_RAW);
		$mform->addElement('hidden', 'title', $this->_customdata['title']);
		$mform->setType('title', PARAM_RAW);
		$mform->addElement('hidden', 'description', $this->_customdata['description']);
		$mform->setType('description', PARAM_RAW);
		$this->add_action_buttons(true, get_string('creategame', 'local_gamecreator'));

	}

	// TODO: validation
}