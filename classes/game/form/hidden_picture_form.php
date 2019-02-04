<?php

namespace local_gamecreator\game\form;

defined('MOODLE_INTERNAL') || die;

require_once($CFG->libdir.'/formslib.php');

use moodleform;

class hidden_picture_form extends moodleform {
	protected function definition() {
		global $CFG;

		$mform = $this->_form;

    // Title.
    $mform->addElement('text', 'title', get_string('title', 'local_gamecreator'));
    $mform->setType('title', PARAM_TEXT);
    $mform->addHelpButton('title', 'hidden_picture_title', 'local_gamecreator');
    $mform->addRule('title', get_string('required'), 'required', null);

		// Prompt.
		$mform->addElement('text', 'prompt', get_string('hidden_picture_prompt', 'local_gamecreator'));
		$mform->setType('prompt', PARAM_TEXT);
		$mform->addHelpButton('prompt', 'hidden_picture_prompt', 'local_gamecreator');
		$mform->addRule('prompt', get_string('required'), 'required', null);
    $mform->setDefault('prompt', get_string('hidden_picture_prompt_default'));

    // Congratulations.
    $mform->addElement('text', 'congratulations', get_string('hidden_picture_congratulations', 'local_gamecreator'));
    $mform->setType('congratulations', PARAM_TEXT);
    $mform->addHelpButton('congratulations', 'hidden_picture_congratulations', 'local_gamecreator');
    $mform->addRule('congratulations', get_string('required'), 'required', null);
    $mform->setDefault('congratulations', get_string('hidden_picture_congratulations_default'));

    // Font-size.
    $font_sizes_arr = [12, 14, 16, 18, 20, 22, 24, 26, 28, 30];
    $mform->addElement('select', 'font_size', get_string('hidden_picture_font_size', 'local_gamecreator'), $font_sizes_arr);
    $mform->addHelpButton('font_size', 'hidden_picture_font_size', 'local_gamecreator');
    $mform->addRule('font_size', get_string('required'), 'required', null);
    $mform->setDefault('font_size', 20);

    // Questions & Answers header.
    $mform->addElement('header', 'dataheader', get_string('hidden_picture_header'));

    // 16 questions and answers.
    for ($i = 0; $i < 16; $i++) {

      // Question i.
      $mform->addElement('text', "question$i", get_string('question', 'local_gamecreator') . ($i + 1));
      $mform->setType("question$i", PARAM_RAW);
      $mform->addRule("question$i", get_string('required'), 'required', null);

      // Answer i.
      $mform->addElement('text', "answer$i", get_string('question', 'local_gamecreator') . ($i + 1));
      $mform->setType("answer$i", PARAM_RAW);
      $mform->addRule("answer$i", get_string('required'), 'required', null);
    }

		$this->add_action_buttons(true, get_string('next', 'local_gamecreator'));
	}

	public function validation($data, $files) {
		global $CFG;

		$errors = parent::validation($data, $files);

    $filename = $CFG->dirroot . "/LOR/games/hidden_picture/versions/$title.json";

    if (file_exists($filename)) {
      $errors['title'] = get_string('versionexists', 'local_gamecreator');
    }

    if (strlen($title) > 100) {
      $errors['title'] = get_string('title_error', 'local_gamecreator');
    }


		if (strlen($data['prompt']) > 100) {
			$errors['prompt'] = get_string('too_long', 'local_gamecreator');
		}

    if (strlen($data['congratulations']) > 100) {
			$errors['congratulations'] = get_string('too_long', 'local_gamecreator');
		}

    for ($i = 0; $i < 16; $i++) {

      if (strlen($data["question$i"]) > 50) {
        $errors["question$i"] = get_string('too_long', 'local_gamecreator');
      }

      if (strlen($data["answer$i"]) > 50) {
        $errors["answer$i"] = get_string('too_long', 'local_gamecreator');
      }

    }

		return $errors;
	}
}
