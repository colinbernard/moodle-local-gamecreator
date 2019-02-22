<?php

namespace local_gamecreator\game\generator;

defined('MOODLE_INTERNAL') || die;

use moodle_url;

class arrange {
	public static function generate($data, &$game_form) {
		global $CFG;

		$foldername = $data->foldername;

		mkdir($CFG->dirroot . '/_LOR/games/arrange/versions/' . $foldername);

		// 'true' parameter means if there are existing images they can be overwritten.
		$game_form->save_file('image1', $CFG->dirroot . '/_LOR/games/arrange/versions/'.$foldername.'/4.jpg', true);
		$game_form->save_file('image2', $CFG->dirroot . '/_LOR/games/arrange/versions/'.$foldername.'/3.jpg', true);
		$game_form->save_file('image3', $CFG->dirroot . '/_LOR/games/arrange/versions/'.$foldername.'/2.jpg', true);
		$game_form->save_file('image4', $CFG->dirroot . '/_LOR/games/arrange/versions/'.$foldername.'/1.jpg', true);

		$link = new moodle_url("/_LOR/games/arrange/arrange.php?title=" . rawurlencode($foldername));
		$link = str_replace("http:", "https:", $link);

		return $link;
	}
}
