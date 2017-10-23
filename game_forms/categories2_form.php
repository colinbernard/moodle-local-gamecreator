<?php


defined('MOODLE_INTERNAL') || die;

require_once($CFG->libdir.'/formslib.php');

class categories2_form extends moodleform {
	protected function definition() {
		global $CFG;

		$mform = $this->_form;

		$mform->addElement('text', 'foldername', get_string('foldername', 'local_gamecreator'));
		$mform->setType('foldername', PARAM_TEXT);
		$mform->addRule('foldername', get_string('required'), 'required', null);

		$mform->addElement('text', 'answers', get_string('answer', 'local_gamecreator'));
		$mform->setType('answers', PARAM_TEXT);
		$mform->addRule('answers', get_string('required'), 'required', null);

		$mform->addElement('header', 'categoriesheader', get_string('categoriesheader', 'local_gamecreator'));

		$mform->addElement('filepicker', 'category1', get_string('categoryimage', 'local_gamecreator').' 1', null, array('maxbytes'=>1000000, 'accepted_types'=>array('.png')));
		$mform->addElement('filepicker', 'category2', get_string('categoryimage', 'local_gamecreator').' 2', null, array('maxbytes'=>1000000, 'accepted_types'=>array('.png')));
		$mform->addRule('category1', get_string('required'), 'required', null);
		$mform->addRule('category2', get_string('required'), 'required', null);

		$mform->addElement('header', 'questionsheader', get_string('questionsheader', 'local_gamecreator'));

		$mform->addElement('filepicker', 'question1', get_string('questionimage', 'local_gamecreator').' 1', null, array('maxbytes'=>1000000, 'accepted_types'=>array('.png')));
		$mform->addElement('filepicker', 'question2', get_string('questionimage', 'local_gamecreator').' 2', null, array('maxbytes'=>1000000, 'accepted_types'=>array('.png')));
		$mform->addElement('filepicker', 'question3', get_string('questionimage', 'local_gamecreator').' 3', null, array('maxbytes'=>1000000, 'accepted_types'=>array('.png')));
		$mform->addElement('filepicker', 'question4', get_string('questionimage', 'local_gamecreator').' 4', null, array('maxbytes'=>1000000, 'accepted_types'=>array('.png')));
		$mform->addElement('filepicker', 'question5', get_string('questionimage', 'local_gamecreator').' 5', null, array('maxbytes'=>1000000, 'accepted_types'=>array('.png')));
		$mform->addRule('question1', get_string('required'), 'required', null);
		$mform->addRule('question2', get_string('required'), 'required', null);
		$mform->addRule('question3', get_string('required'), 'required', null);
		$mform->addRule('question4', get_string('required'), 'required', null);
		$mform->addRule('question5', get_string('required'), 'required', null);


		$this->add_action_buttons(true, get_string('creategame', 'local_gamecreator'));
	}

	// TODO: validation
}