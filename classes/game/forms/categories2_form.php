<?php

namespace local_gamecreator\game\forms;

defined('MOODLE_INTERNAL') || die;

require_once($CFG->libdir.'/formslib.php');

use moodleform;
class categories2_form extends moodleform {
	protected function definition() {
		global $CFG;

		$mform = $this->_form;

		$mform->addElement('text', 'foldername', get_string('foldername', 'local_gamecreator'));
		$mform->setType('foldername', PARAM_TEXT);
		$mform->addRule('foldername', get_string('required'), 'required', null);

		$mform->addElement('text', 'answers', get_string('answer', 'local_gamecreator'));
		$mform->setType('answers', PARAM_INT);
		$mform->addRule('answers', get_string('required'), 'required', null);

		$mform->addElement('header', 'categoriesheader', get_string('categoriesheader', 'local_gamecreator'));

		$mform->addElement('filepicker', 'category1', get_string('categoryimage', 'local_gamecreator').' 1', null, array('maxbytes'=>1000000, 'accepted_types'=>array('.png', '.jpg')));
		$mform->addElement('filepicker', 'category2', get_string('categoryimage', 'local_gamecreator').' 2', null, array('maxbytes'=>1000000, 'accepted_types'=>array('.png', '.jpg')));
		$mform->addRule('category1', get_string('required'), 'required', null);
		$mform->addRule('category2', get_string('required'), 'required', null);

		$mform->addElement('header', 'questionsheader', get_string('questionsheader', 'local_gamecreator'));

		$mform->addElement('filepicker', 'question1', get_string('questionimage', 'local_gamecreator').' 1', null, array('maxbytes'=>1000000, 'accepted_types'=>array('.png', '.jpg')));
		$mform->addElement('filepicker', 'question2', get_string('questionimage', 'local_gamecreator').' 2', null, array('maxbytes'=>1000000, 'accepted_types'=>array('.png', '.jpg')));
		$mform->addElement('filepicker', 'question3', get_string('questionimage', 'local_gamecreator').' 3', null, array('maxbytes'=>1000000, 'accepted_types'=>array('.png', '.jpg')));
		$mform->addElement('filepicker', 'question4', get_string('questionimage', 'local_gamecreator').' 4', null, array('maxbytes'=>1000000, 'accepted_types'=>array('.png', '.jpg')));
		$mform->addElement('filepicker', 'question5', get_string('questionimage', 'local_gamecreator').' 5', null, array('maxbytes'=>1000000, 'accepted_types'=>array('.png', '.jpg')));
		$mform->addRule('question1', get_string('required'), 'required', null);
		$mform->addRule('question2', get_string('required'), 'required', null);
		$mform->addRule('question3', get_string('required'), 'required', null);
		$mform->addRule('question4', get_string('required'), 'required', null);
		$mform->addRule('question5', get_string('required'), 'required', null);


		$this->add_action_buttons(true, get_string('creategame', 'local_gamecreator'));
	}

	public function validation($data, $files) {
		global $CFG;

		$errors = parent::validation($data, $files);

		$foldername = $data['foldername'];
		$filename = $CFG->dirroot . '/LOR/games/potato_categories2/versions/' . $foldername;


		if (file_exists($filename)) {
			$errors['foldername'] = get_string('versionexists', 'local_gamecreator');
		}


		if (strlen((string)$data['answers']) != 5) {
			$errors['answers'] = get_string('answers_error', 'local_gamecreator');
		}

		$str = (string)$data['answers'];
		for ($i = 0; $i < strlen($str); $i++) {
			$char = substr($str, $i, 1);

			if (!($char == "1" || $char == "2")) {
				$errors['answers'] = get_string('answers_error2', 'local_gamecreator');
			}
		}

		return $errors;
	}
}
