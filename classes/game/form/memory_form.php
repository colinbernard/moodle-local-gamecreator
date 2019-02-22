<?php

namespace local_gamecreator\game\form;

defined('MOODLE_INTERNAL') || die;

require_once($CFG->libdir.'/formslib.php');

use moodleform;

class memory_form extends moodleform {

	protected function definition() {
		global $CFG;

		$mform = $this->_form;

		$mform->addElement('text', 'foldername', get_string('foldername', 'local_gamecreator'));
		$mform->setType('foldername', PARAM_TEXT);
		$mform->addRule('foldername', get_string('required'), 'required', null);

    $mform->addElement('header', 'pair1header', get_string('pair', 'local_gamecreator') . ' 1');
		$mform->addElement('filepicker', '1-1', get_string('image', 'local_gamecreator').' 1-1', null, array('maxbytes'=>1000000, 'accepted_types'=>array('.jpg')));
    $mform->addElement('filepicker', '1-2', get_string('image', 'local_gamecreator').' 1-2', null, array('maxbytes'=>1000000, 'accepted_types'=>array('.jpg')));
		$mform->addRule('1-1', get_string('required'), 'required', null);
    $mform->addRule('1-2', get_string('required'), 'required', null);

    $mform->addElement('header', 'pair2header', get_string('pair', 'local_gamecreator') . ' 2');
    $mform->addElement('filepicker', '2-1', get_string('image', 'local_gamecreator').' 2-1', null, array('maxbytes'=>1000000, 'accepted_types'=>array('.jpg')));
    $mform->addElement('filepicker', '2-2', get_string('image', 'local_gamecreator').' 2-2', null, array('maxbytes'=>1000000, 'accepted_types'=>array('.jpg')));
    $mform->addRule('2-1', get_string('required'), 'required', null);
    $mform->addRule('2-2', get_string('required'), 'required', null);

    $mform->addElement('header', 'pair3header', get_string('pair', 'local_gamecreator') . ' 3');
		$mform->addElement('filepicker', '3-1', get_string('image', 'local_gamecreator').' 3-1', null, array('maxbytes'=>1000000, 'accepted_types'=>array('.jpg')));
    $mform->addElement('filepicker', '3-2', get_string('image', 'local_gamecreator').' 3-2', null, array('maxbytes'=>1000000, 'accepted_types'=>array('.jpg')));
		$mform->addRule('3-1', get_string('required'), 'required', null);
    $mform->addRule('3-2', get_string('required'), 'required', null);

    $mform->addElement('header', 'pair4header', get_string('pair', 'local_gamecreator') . ' 4');
    $mform->addElement('filepicker', '4-1', get_string('image', 'local_gamecreator').' 4-1', null, array('maxbytes'=>1000000, 'accepted_types'=>array('.jpg')));
    $mform->addElement('filepicker', '4-2', get_string('image', 'local_gamecreator').' 4-2', null, array('maxbytes'=>1000000, 'accepted_types'=>array('.jpg')));
    $mform->addRule('4-1', get_string('required'), 'required', null);
    $mform->addRule('4-2', get_string('required'), 'required', null);

    $mform->addElement('header', 'pair5header', get_string('pair', 'local_gamecreator') . ' 5');
    $mform->addElement('filepicker', '5-1', get_string('image', 'local_gamecreator').' 5-1', null, array('maxbytes'=>1000000, 'accepted_types'=>array('.jpg')));
    $mform->addElement('filepicker', '5-2', get_string('image', 'local_gamecreator').' 5-2', null, array('maxbytes'=>1000000, 'accepted_types'=>array('.jpg')));
    $mform->addRule('5-1', get_string('required'), 'required', null);
    $mform->addRule('5-2', get_string('required'), 'required', null);

		$this->add_action_buttons(true, get_string('creategame', 'local_gamecreator'));
	}

	public function validation($data, $files) {
		global $CFG;
		global $SESSION; // Required for checking if we are editing a game we just created.

		$errors = parent::validation($data, $files);

		$foldername = $data['foldername'];
		$filename = $CFG->dirroot . '/_LOR/games/memory/versions/' . $foldername;

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
