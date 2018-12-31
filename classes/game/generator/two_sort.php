<?php

namespace local_gamecreator\game\generator;

defined('MOODLE_INTERNAL') || die;

use moodle_url;

class two_sort {
	public static function generate($data, &$form) {
    global $CFG;

    // Initialize to_json, an object which will be converted to JSON later.
    $to_json = new \stdClass();
    $to_json->title = $data->title;
    $to_json->left = $data->left;
    $to_json->right = $data->right;
    $to_json->items = [];

    // Convert the form data to an associative array.
    $data = (array) $data;

    // For each question.
    for ($i = 0; $i <= $data['numitems']; $i++) {
      // Create an item object.
      $item = new \stdClass();

      // Access the item text from the form data array.
      $item->name = $data["item_$i"];

      // Access the item column.
      $item->column = $data["column_$i"];

      // Push this item onto the array.
      $to_json->items[] = $item;
    }

    // Create JSON file with version data.
		$file = fopen("../../LOR/games/two_sort/versions/$title.json", 'w');
		fwrite($file, json_encode($to_json));
		fclose($file);

    // Create URL for this version and return it.
		$link = new moodle_url("/LOR/games/two_sort/index.php?title=" . rawurlencode($title));
		$link = str_replace("http:", "https:", $link);
		return $link;
	}
}
