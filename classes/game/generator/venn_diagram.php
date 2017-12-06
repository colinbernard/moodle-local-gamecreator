<?php

namespace local_gamecreator\game\generator;

defined('MOODLE_INTERNAL') || die;

use moodle_url;

class venn_diagram {
	public static function generate($data, $game_form = null) {
		global $CFG;

		$title = $data->title;

		$file = fopen("../../LOR/games/venn_diagram/versions/" . $title . '.json', 'w');
		fwrite($file, json_encode($data));
		fclose($file);

		$link = new moodle_url("/LOR/games/venn_diagram/venn_diagram.php?title=" . rawurlencode($title));
		$link = str_replace("http:", "https:", $link);

		return $link;
	}
}
