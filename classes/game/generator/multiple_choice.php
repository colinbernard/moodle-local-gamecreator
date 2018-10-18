<?php

namespace local_gamecreator\game\generator;

defined('MOODLE_INTERNAL') || die;

use moodle_url;

class multiple_choice {
	public static function generate($data, &$game_form) {

		$title = $data['title'];

		$file = fopen("../../LOR/games/multiple_choice/versions/" . $title . '.json', 'w');
		$success = fwrite($file, json_encode($data));
		fclose($file);

    // save image
    $foldername = $data->foldername;

		mkdir($CFG->dirroot . '/LOR/games/multiple_choice/versions/' . $foldername);

		// 'true' parameter means if there are existing images they can be overwritten.
		$game_form->save_file('image1', $CFG->dirroot . '/LOR/games/multiple_choice/versions/'.$foldername.'/4.jpg', true);

		$link = new moodle_url("/LOR/games/multiple_choice/index.php?title=" . rawurlencode($title));
		$link = str_replace("http:", "https:", $link);

		return $link;
	}
}
