<?php

namespace local_gamecreator\game\generator;

defined('MOODLE_INTERNAL') || die;

use moodle_url;

class image_labels {
	public static function generate($data, &$game_form = null) {
		global $CFG;

		$title = $data->title;;

		// make a directory for the version
		mkdir($CFG->dirroot . '/LOR/games/image_labels/versions/' . $title);

		// save the image
		$game_form->save_file('mainpic', $CFG->dirroot . '/LOR/games/image_labels/versions/'.$title.'/mainpic.jpg', true);

		// create JSON file with question and answer data
		$file = fopen("../../LOR/games/image_labels/versions/" . $title . '/questions.json', 'w');

		$towrite = [];
		for ($i = 0; $i <= $data->numquestions; $i++) {
			$question = 'q'.$i;
			$answer = 'a'.$i;
			$towrite[] = ['question' => $data->$question, 'answer' => self::digits_to_letters($data->$answer)];
		}

		fwrite($file, json_encode($towrite));
		fclose($file);

		// create JSON file with number of labels data
		$file = fopen("../../LOR/games/image_labels/versions/" . $title . '/data.json', 'w');
		fwrite($file, json_encode($data->numbuttons + 2));
		fclose($file);

		// generate link to game
		$link = new moodle_url("/LOR/games/image_labels/index.php?title=" . rawurlencode($title));
		$link = str_replace("http:", "https:", $link);

		return $link;
	}

	private static function digits_to_letters($input) {
	    return strtr($input, "01234567", "ABCDEFGH");
	}
}
