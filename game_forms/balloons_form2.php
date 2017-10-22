<?php


defined('MOODLE_INTERNAL') || die;

require_once($CFG->libdir.'/formslib.php');

class balloons_form2 extends moodleform {
	protected function definition() {
		global $CFG;

		$balloonsform = $this->_form;


		for ($level = 0; $level <= $this->_customdata['numlevels']; $level++) {

			// header
			$balloonsform->addElement('header', "levelheader$level", get_string('level', 'local_gamecreator')." ".($level+1));

			// level name
			$balloonsform->addElement('text', "levelname$level", get_string('levelname', 'local_gamecreator'));
			$balloonsform->setType("levelname$level", PARAM_TEXT);
			$balloonsform->setDefault("levelname$level", "Level " . ($level+1));
			$balloonsform->addHelpButton("levelname$level", 'levelname', 'local_gamecreator');

			// speed
			$radioarray = array();
			$radioarray[] = $balloonsform->createElement('radio', "levelspeed$level", '', get_string('speed_increase', 'local_gamecreator'), 1);
			$radioarray[] = $balloonsform->createElement('radio', "levelspeed$level", '', get_string('speed_decrease', 'local_gamecreator'), -1);
			$radioarray[] = $balloonsform->createElement('radio', "levelspeed$level", '', get_string('speed_no', 'local_gamecreator'), 0);
	        $balloonsform->addGroup($radioarray, 'balloonspeed', get_string('speed', 'local_gamecreator'), array(' '), false);
	        $balloonsform->setDefault("levelspeed$level", 0);
	        $balloonsform->addHelpButton("balloonspeed", "speed", 'local_gamecreator');

			for ($question = 0; $question <= $this->_customdata['numquestions']; $question++) {
				
				// question
				$balloonsform->addElement('text', "q_".$level.$question, get_string('question', 'local_gamecreator'));
				$balloonsform->setType("q_".$level.$question, PARAM_TEXT);

				// answer
				$balloonsform->addElement('text', "a_".$level.$question, get_string('answer', 'local_gamecreator'));
				$balloonsform->setType("a_".$level.$question, PARAM_TEXT);

				// options
				for ($i = 0; $i < 5; $i++) {
					$balloonsform->addElement('text', "o_".$level.$question.$i, get_string('option', 'local_gamecreator'));
					$balloonsform->setType("o_".$level.$question.$i, PARAM_TEXT);
				}
			}
		}

		$balloonsform->addElement('hidden', 'numlevels', $this->_customdata['numlevels']);
		$balloonsform->setType('numlevels', PARAM_RAW);
		$balloonsform->addElement('hidden', 'numquestions', $this->_customdata['numquestions']);
		$balloonsform->setType('numquestions', PARAM_RAW);
		$balloonsform->addElement('hidden', 'title', $this->_customdata['title']);
		$balloonsform->setType('title', PARAM_RAW);
		$balloonsform->addElement('hidden', 'description', $this->_customdata['description']);
		$balloonsform->setType('description', PARAM_RAW);
		$this->add_action_buttons(true, get_string('creategame', 'local_gamecreator'));

	}

	// TODO: validation
}