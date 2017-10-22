<?php


defined('MOODLE_INTERNAL') || die;

require_once($CFG->libdir.'/formslib.php');

class arrange_form extends moodleform {
	protected function definition() {
		global $CFG;

		$mform = $this->_form;

		$mform->addElement('text', 'foldername', get_string('foldername', 'local_gamecreator'));
		$mform->setType('foldername', PARAM_TEXT);


		$mform->addElement('filepicker', 'image1', get_string('file'), null, array('maxbytes'=>1000000, 'accepted_types'=>array('.jpg')));
		$mform->addElement('filepicker', 'image2', get_string('file'), null, array('maxbytes'=>1000000, 'accepted_types'=>array('.jpg')));
		$mform->addElement('filepicker', 'image3', get_string('file'), null, array('maxbytes'=>1000000, 'accepted_types'=>array('.jpg')));
		$mform->addElement('filepicker', 'image4', get_string('file'), null, array('maxbytes'=>1000000, 'accepted_types'=>array('.jpg')));



		$this->add_action_buttons(true, get_string('creategame', 'local_gamecreator'));
	}

	// TODO: validation
}