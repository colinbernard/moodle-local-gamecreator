<?php

namespace local_gamecreator\game\generator;

defined('MOODLE_INTERNAL') || die;

use moodle_url;

class balloons {
	public static function generate($data, $game_form = null) {

		$data = $data[0];
		$title = $data['title'];

		$file = fopen("../../LOR/games/balloons/versions/" . $title . '.json', 'w');
		$success = fwrite($file, json_encode($data));
		fclose($file);

		$link = new moodle_url("/LOR/games/balloons/balloons.php?title=" . rawurlencode($title));
		$link = str_replace("http:", "https:", $link);

		return $link;
	}
}
