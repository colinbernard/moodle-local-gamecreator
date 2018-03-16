<?php

namespace local_gamecreator\game\generator;

defined('MOODLE_INTERNAL') || die;

use moodle_url;

class invaders {
	public static function generate($data, $game_form = null) {

		$title = $data['title'];

		$file = fopen("../../LOR/games/invaders/versions/" . $title . '.json', 'w');
		$success = fwrite($file, json_encode($data));
		fclose($file);

		$link = new moodle_url("/LOR/games/invaders/index.php?title=" . rawurlencode($title));
		$link = str_replace("http:", "https:", $link);

		return $link;
	}
}
