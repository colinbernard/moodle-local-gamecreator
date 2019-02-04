<?php

namespace local_gamecreator\game\generator;

defined('MOODLE_INTERNAL') || die;

use moodle_url;

class hidden_picture {
	public static function generate($data, &$form) {
    global $CFG;

    // Saving title before data is converted to assoc array.
    $title = $data->title;

    // Initialize to_json, an object which will be converted to JSON later.
    $to_json = new \stdClass();
    $to_json->title = $data->title;
    $to_json->prompt = $data->prompt;
    $to_json->congratulations = $data->congratulations;
    $to_json->font_size = $data->font_size + "px";
    $to_json->questions = [];

    // Convert the form data to an associative array.
    $data = (array) $data;

    // For each question.
    for ($i = 0; $i < 16; $i++) {
      // Create an item object.
      $item = new \stdClass();

      // Access the item text from the form data array.
      $item->question = $data["question$i"];

      // Access the item column.
      $item->answer = $data["answer$i"];

      // Push this item onto the array.
      $to_json->questions[] = $item;
    }

    // Create JSON file with version data.
		$file = fopen("../../LOR/games/hidden_picture/versions/$title.json", 'w');
		fwrite($file, json_encode($to_json));
		fclose($file);

    // Create URL for this version and return it.
		$link = new moodle_url("/LOR/games/hidden_picture/index.html?version=" . rawurlencode($title));
		$link = str_replace("http:", "https:", $link);
		return $link;
	}
}
