<?php


defined('MOODLE_INTERNAL') || die;

require_once($CFG->libdir.'/formslib.php');

class arrange_form extends moodleform {
	protected function definition() {
		global $CFG;

		$mform = $this->_form;

		$mform->addElement('text', 'foldername', get_string('foldername', 'local_gamecreator'));
		$mform->setType('foldername', PARAM_TEXT);
		$mform->addRule('foldername', get_string('required'), 'required', null);


		$mform->addElement('filepicker', 'image1', get_string('image', 'local_gamecreator').' 1', null, array('maxbytes'=>1000000, 'accepted_types'=>array('.jpg')));
		$mform->addElement('filepicker', 'image2', get_string('image', 'local_gamecreator').' 2', null, array('maxbytes'=>1000000, 'accepted_types'=>array('.jpg')));
		$mform->addElement('filepicker', 'image3', get_string('image', 'local_gamecreator').' 3', null, array('maxbytes'=>1000000, 'accepted_types'=>array('.jpg')));
		$mform->addElement('filepicker', 'image4', get_string('image', 'local_gamecreator').' 4', null, array('maxbytes'=>1000000, 'accepted_types'=>array('.jpg')));

		$mform->addRule('image1', get_string('required'), 'required', null);
		$mform->addRule('image2', get_string('required'), 'required', null);
		$mform->addRule('image3', get_string('required'), 'required', null);
		$mform->addRule('image4', get_string('required'), 'required', null);

		$this->add_action_buttons(true, get_string('creategame', 'local_gamecreator'));
	}

	public function validation($data, $files) {
		global $CFG;
		
		$errors = parent::validation($data, $files);

		$foldername = $data['foldername'];
		$filename = $CFG->dirroot . '/LOR/games/arrange/versions/' . $foldername;

		if (file_exists($filename)) {
			$errors['foldername'] = get_string('versionexists', 'local_gamecreator');
		}


		return $errors;
	}
}