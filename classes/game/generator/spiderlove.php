<?php

namespace local_gamecreator\game\generator;

defined('MOODLE_INTERNAL') || die;

use moodle_url;

class spiderlove {
	public static function generate($data, &$game_form = null) {
		global $CFG;

		$foldername = $data->foldername;

		mkdir($CFG->dirroot . '/_LOR/games/spiderlove/versions/' . $foldername);

		// 'true' parameter means if there are existing images they can be overwritten.
		$game_form->save_file('left1', $CFG->dirroot . '/_LOR/games/spiderlove/versions/'.$foldername.'/left1.jpg', true);
		$game_form->save_file('left2', $CFG->dirroot . '/_LOR/games/spiderlove/versions/'.$foldername.'/left2.jpg', true);
		$game_form->save_file('left3', $CFG->dirroot . '/_LOR/games/spiderlove/versions/'.$foldername.'/left3.jpg', true);
		$game_form->save_file('left4', $CFG->dirroot . '/_LOR/games/spiderlove/versions/'.$foldername.'/left4.jpg', true);
		$game_form->save_file('left5', $CFG->dirroot . '/_LOR/games/spiderlove/versions/'.$foldername.'/left5.jpg', true);

		$game_form->save_file('right1', $CFG->dirroot . '/_LOR/games/spiderlove/versions/'.$foldername.'/right1.jpg', true);
		$game_form->save_file('right2', $CFG->dirroot . '/_LOR/games/spiderlove/versions/'.$foldername.'/right2.jpg', true);
		$game_form->save_file('right3', $CFG->dirroot . '/_LOR/games/spiderlove/versions/'.$foldername.'/right3.jpg', true);
		$game_form->save_file('right4', $CFG->dirroot . '/_LOR/games/spiderlove/versions/'.$foldername.'/right4.jpg', true);
		$game_form->save_file('right5', $CFG->dirroot . '/_LOR/games/spiderlove/versions/'.$foldername.'/right5.jpg', true);


		$link = new moodle_url("/_LOR/games/spiderlove/spiders.php?title=" . rawurlencode($foldername));
		$link = str_replace("http:", "https:", $link);


		return $link;
	}
}
