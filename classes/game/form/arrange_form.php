<?php

namespace local_gamecreator\game\form;

defined('MOODLE_INTERNAL') || die;

require_once($CFG->libdir.'/formslib.php');

use moodleform;

class arrange_form extends moodleform {

	protected function definition() {
		global $CFG;

		$mform = $this->_form;

		$mform->addElement('text', 'foldername', get_string('foldername', 'local_gamecreator'));
		$mform->setType('foldername', PARAM_TEXT);
		$mform->addRule('foldername', get_string('required'), 'required', null);


		$mform->addElement('filepicker', 'image1', get_string('image', 'local_gamecreator').' 1', null, array('maxbytes'=>1000000, 'accepted_types'=>array('.png', '.jpg')));
		$mform->addElement('filepicker', 'image2', get_string('image', 'local_gamecreator').' 2', null, array('maxbytes'=>1000000, 'accepted_types'=>array('.png', '.jpg')));
		$mform->addElement('filepicker', 'image3', get_string('image', 'local_gamecreator').' 3', null, array('maxbytes'=>1000000, 'accepted_types'=>array('.png', '.jpg')));
		$mform->addElement('filepicker', 'image4', get_string('image', 'local_gamecreator').' 4', null, array('maxbytes'=>1000000, 'accepted_types'=>array('.png', '.jpg')));

		$mform->addRule('image1', get_string('required'), 'required', null);
		$mform->addRule('image2', get_string('required'), 'required', null);
		$mform->addRule('image3', get_string('required'), 'required', null);
		$mform->addRule('image4', get_string('required'), 'required', null);

		$this->add_action_buttons(true, get_string('creategame', 'local_gamecreator'));
	}

	public function validation($data, $files) {
		global $CFG;
		global $SESSION; // Required for checking if we are editing a game we just created.

		$errors = parent::validation($data, $files);

		$foldername = $data['foldername'];
		$filename = $CFG->dirroot . '/LOR/games/arrange/versions/' . $foldername;

		// Check if the folder already exists AND we aren't editing the game we just created.
		if (file_exists($filename) && $SESSION->last_created_folder_name != $foldername) {
			$errors['foldername'] = get_string('versionexists', 'local_gamecreator');
		} else {
			// The folder will be created, store the foldername in case we need to edit the game and allow overwriting it.
			$SESSION->last_created_folder_name = $foldername;
		}

		return $errors;
	}
}
