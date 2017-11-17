<?php


defined('MOODLE_INTERNAL') || die;

require_once($CFG->libdir.'/formslib.php');
//require_once(__DIR__.'/locallib.php');

class initial_form extends moodleform {
	protected function definition() {
		global $CFG;

		$initialform = $this->_form;

		$initialform->addElement('select', 'gametype', get_string('gametype_select', 'local_gamecreator'),
			['Balloons', 'Arrange', 'Categories2', 'Categories3', 'SpiderLove', 'Venn Diagram', 'Image Labelling']);

		$this->add_action_buttons(false, get_string('next', 'local_gamecreator'));
	}
}
