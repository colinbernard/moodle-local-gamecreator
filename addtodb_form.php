<?php


defined('MOODLE_INTERNAL') || die;

require_once($CFG->libdir.'/formslib.php');
require_once(__DIR__ . '/../gamespage/locallib.php');


class addtodb_form extends moodleform {
	protected function definition() {
		global $CFG;

    $categories = local_gamespage_get_all_game_categories();
    $platforms = local_gamespage_get_all_game_platforms();

    $categories_arr = [];
    $platforms_arr = [];

    foreach ($categories as $category) {
      $categories_arr[$category->id] = $category->name;
    }

    foreach ($platforms as $platform) {
      $platforms_arr[$platform->id] = $platform->name;
    }


		$mform = $this->_form;

		$mform->addElement('text', 'title', get_string('title', 'local_gamecreator'));
		$mform->setType('title', PARAM_TEXT);
		$mform->addRule('title', get_string('required'), 'required', null);

    $mform->addElement('text', 'description', get_string('description', 'local_gamecreator'));
    $mform->setType('description', PARAM_TEXT);
    $mform->addRule('description', get_string('required'), 'required', null);

    $mform->addElement('text', 'author', get_string('author', 'local_gamecreator'));
    $mform->setType('author', PARAM_TEXT);
    $mform->addRule('author', get_string('required'), 'required', null);

    $mform->addElement('select', 'category', get_string('category', 'local_gamecreator'), $categories_arr);

    $mform->addElement('select', 'platform', get_string('platform', 'local_gamecreator'), $platforms_arr);

    // hidden
    $mform->addElement('hidden', 'width', $this->_customdata['width']);
		$mform->setType('width', PARAM_RAW);
		$mform->addElement('hidden', 'height', $this->_customdata['height']);
		$mform->setType('height', PARAM_RAW);
		$mform->addElement('hidden', 'link', $this->_customdata['link']);
		$mform->setType('link', PARAM_RAW);



		$this->add_action_buttons(true, get_string('submit', 'local_gamecreator'));
	}

	public function validation($data, $files) {
		global $CFG;

		$errors = parent::validation($data, $files);


		return $errors;
	}
}
