<?php


defined('MOODLE_INTERNAL') || die;

require_once($CFG->libdir.'/formslib.php');

class balloons_form extends moodleform {
	protected function definition() {
		global $CFG;

		$balloonsform = $this->_form;

		if (isset($this->_customdata['numlevels']) && isset($this->_customdata['numquestions'])) {

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
				$radioarray[] = $balloonsform->createElement('radio', "levelspeed$level", '', get_string('speed_increase', 'local_gamecreator'), "inc$level");
				$radioarray[] = $balloonsform->createElement('radio', "levelspeed$level", '', get_string('speed_decrease', 'local_gamecreator'), "dec$level");
				$radioarray[] = $balloonsform->createElement('radio', "levelspeed$level", '', get_string('speed_no', 'local_gamecreator'), "no$level");
		        $balloonsform->addGroup($radioarray, 'balloonspeed', get_string('speed', 'local_gamecreator'), array(' '), false);
		        $balloonsform->setDefault("levelspeed$level", "no$level");
		        $balloonsform->addHelpButton("balloonspeed", "speed", 'local_gamecreator');

				for ($question = 0; $question <= $this->_customdata['numquestions']; $question++) {
					
					// question
					$balloonsform->addElement('text', "q_".$level.$question, get_string('question', 'local_gamecreator'));
					$balloonsform->setType("q_".$level.$question, PARAM_TEXT);

					// answer
					$balloonsform->addElement('text', "a_".$level.$question, get_string('answer', 'local_gamecreator'));
					$balloonsform->setType("a_".$level.$question, PARAM_TEXT);

					// options
					for ($i = 0; $i < 4; $i++) {
						$balloonsform->addElement('text', "o_".$level.$question.$i, get_string('option', 'local_gamecreator'));
						$balloonsform->setType("o_".$level.$question.$i, PARAM_TEXT);
					}
				}
			}

			$this->add_action_buttons(true, get_string('creategame', 'local_gamecreator'));

		} else {

			// Title
			$balloonsform->addElement('text', 'gametitle', get_string('gametitle', 'local_gamecreator'));
			$balloonsform->setType('gametitle', PARAM_TEXT);
			$balloonsform->addHelpButton('gametitle', 'gametitle', 'local_gamecreator');


			// Description
			$balloonsform->addElement('textarea', 'gamedescription', get_string('gamedescription', 'local_gamecreator'), 'wrap="virtual" rows="3" cols="50"');
			$balloonsform->setType('gamedescription', PARAM_TEXT);
			$balloonsform->addHelpButton('gamedescription', 'gamedescription', 'local_gamecreator');

			// Levels
			$numbers = [];
			for ($i = 1; $i <= 8; $i++) {
				$numbers[] = $i;
			}
			$balloonsform->addElement('select', 'numlevels', get_string('numlevels', 'local_gamecreator'), $numbers);
			$balloonsform->setDefault('numlevels', 4);
			$balloonsform->addElement('select', 'numquestions', get_string('numquestions', 'local_gamecreator'), $numbers);
			$balloonsform->setDefault('numquestions', 3);


			// Create Game Button
			$this->add_action_buttons(true, get_string('next', 'local_gamecreator'));
		}


	}

	// TODO: validation
}