<?php

namespace local_gamecreator\game\generator;

defined('MOODLE_INTERNAL') || die;

use moodle_url;

class balloons {
	public static function generate($data, $game_form = null) {

		$title = $data['title'];

		$file = fopen("../../_LOR/games/balloons/versions/" . $title . '.json', 'w');
		$success = fwrite($file, json_encode($data));
		fclose($file);

		$link = new moodle_url("/_LOR/games/balloons/balloons.php?title=" . rawurlencode($title));
		$link = str_replace("http:", "https:", $link);

		return $link;
	}
}
