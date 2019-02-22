<?php

namespace local_gamecreator\game\generator;

defined('MOODLE_INTERNAL') || die;

use moodle_url;

class memory {
	public static function generate($data, &$game_form) {
		global $CFG;

		$foldername = $data->foldername;

		mkdir($CFG->dirroot . '/_LOR/games/memory/versions/' . $foldername);

		// 'true' parameter means if there are existing images they can be overwritten.
		$game_form->save_file('1-1', "$CFG->dirroot/_LOR/games/memory/versions/$foldername/1-1.jpg", true);
    $game_form->save_file('1-2', "$CFG->dirroot/_LOR/games/memory/versions/$foldername/1-2.jpg", true);
    $game_form->save_file('2-1', "$CFG->dirroot/_LOR/games/memory/versions/$foldername/2-1.jpg", true);
    $game_form->save_file('2-2', "$CFG->dirroot/_LOR/games/memory/versions/$foldername/2-2.jpg", true);
    $game_form->save_file('3-1', "$CFG->dirroot/_LOR/games/memory/versions/$foldername/3-1.jpg", true);
    $game_form->save_file('3-2', "$CFG->dirroot/_LOR/games/memory/versions/$foldername/3-2.jpg", true);
    $game_form->save_file('4-1', "$CFG->dirroot/_LOR/games/memory/versions/$foldername/4-1.jpg", true);
    $game_form->save_file('4-2', "$CFG->dirroot/_LOR/games/memory/versions/$foldername/4-2.jpg", true);
    $game_form->save_file('5-1', "$CFG->dirroot/_LOR/games/memory/versions/$foldername/5-1.jpg", true);
    $game_form->save_file('5-2', "$CFG->dirroot/_LOR/games/memory/versions/$foldername/5-2.jpg", true);

		$link = new moodle_url("/_LOR/games/memory/memory.php?title=" . rawurlencode($foldername));
		$link = str_replace("http:", "https:", $link);

		return $link;
	}
}
