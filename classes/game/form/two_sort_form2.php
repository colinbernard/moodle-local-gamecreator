<?php

namespace local_gamecreator\game\form;

defined('MOODLE_INTERNAL') || die;

require_once($CFG->libdir.'/formslib.php');

use moodleform;

class two_sort_form2 extends moodleform {
	protected function definition() {
		global $CFG;

		$mform = $this->_form;

		for ($item = 0; $item <= $this->_customdata->numitems; $item++) {

      // Item name text box.
      $mform->addElement('text', "item_$item", get_string('item_name', 'local_gamecreator'));
	    $mform->addRule("item_$item", get_string('required'), 'required', null);
      $mform->addHelpButton("item_$item", 'item_name', 'local_gamecreator');
      $mform->setType("item_$item", PARAM_TEXT);

      // Column radio group.
      $radioarray = array();
      $radioarray[] = $mform->createElement('radio', "column_$item", '', $this->_customdata->left, "left");
      $radioarray[] = $mform->createElement('radio', "column_$item", '', $this->_customdata->right, "right");
      $mform->addGroup($radioarray, "correct_column", get_string('correct_column', 'local_gamecreator'), array(' '), false);
      $mform->addRule("correct_column", get_string('required'), 'required', null);
      $mform->setDefault("column_$item", "left");

		}

    // Hidden fields from previous form.
		$mform->addElement('hidden', 'numitems', $this->_customdata->numitems);
		$mform->setType('numitems', PARAM_RAW);
		$mform->addElement('hidden', 'title', $this->_customdata->title);
		$mform->setType('title', PARAM_RAW);
		$mform->addElement('hidden', 'left', $this->_customdata->left);
		$mform->setType('left', PARAM_RAW);
    $mform->addElement('hidden', 'right', $this->_customdata->right);
    $mform->setType('right', PARAM_RAW);
		$this->add_action_buttons(true, get_string('create', 'local_gamecreator'));

	}

	public function validation($data, $files) {
		$errors = parent::validation($data, $files);
		return $errors;
	}
}
