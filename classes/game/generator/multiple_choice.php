<?php

namespace local_gamecreator\game\generator;

defined('MOODLE_INTERNAL') || die;

use moodle_url;

class multiple_choice {
	public static function generate($data, &$form) {
    global $CFG;

    // Grab the title as it will be used to create the version directory later.
    $title = $data->title;

    // Create a directory for this version.
    mkdir($CFG->dirroot . '/LOR/games/multiple_choice/versions/' . $title);

    // Initialize to_json, an object which will be converted to JSON later.
    $to_json = new \stdClass();
    $to_json->title = $data->title;
    $to_json->instructions = $data->instructions;
    $to_json->questions = [];

    // Convert the form data to an associative array.
    $data = (array) $data;

    // For each question.
    for ($i = 0; $i <= $data['numquestions']; $i++) {
      // Create a question object.
      $question = new \stdClass();

      // Access the question text from the form data array.
      $question->question = $data["q_$i"];

      // Set the image file name.
      //$question->image = "image_$i.png";
      $question->image = $form->get_new_filename("image_$i");

      // Save images in version directory.
      // 'true' parameter means if there are existing images they can be overwritten.
      $form->save_file("image_$i", $CFG->dirroot . '/LOR/games/multiple_choice/versions/'.$title.'/'.$question->image, true);

      // Access the answer text from the form data array.
      $question->answer = $data["a_$i"];

      // Create an empty options array to be loaded below.
      $question->options = [];

      // For each option.
      for ($j = 0; $j < 3; $j++) {
        // Create an option object.
        $option = new \stdClass();

        // Access the option text from the form data array.
        $option->option = $data["o_$i"."_".$j];
        $question->options[] = $option;
      }

      $to_json->questions[] = $question;
    }

    // Create JSON file with version data.
		$file = fopen("../../LOR/games/multiple_choice/versions/$title/$title.json", 'w');
		fwrite($file, json_encode($to_json));
		fclose($file);

    // Create URL for this version and return it.
		$link = new moodle_url("/LOR/games/multiple_choice/index.php?title=" . rawurlencode($title));
		$link = str_replace("http:", "https:", $link);
		return $link;
	}
}
