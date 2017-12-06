<?php

namespace local_gamecreator\game\generator;

defined('MOODLE_INTERNAL') || die;

use moodle_url;

class categories2 {
	public static function generate($data, &$game_form = null) {
		global $CFG;

		$foldername = $data->foldername;

		mkdir($CFG->dirroot . '/LOR/games/potato_categories2/versions/' . $foldername);


		$answersfile = fopen($CFG->dirroot . '/LOR/games/potato_categories2/versions/' . $foldername . "/answers.txt", 'w') or die("Unable to create answers text file.");
		fwrite($answersfile, $data->answers);

		$game_form->save_file('category1', $CFG->dirroot . '/LOR/games/potato_categories2/versions/'.$foldername.'/category1.png');
		$game_form->save_file('category2', $CFG->dirroot . '/LOR/games/potato_categories2/versions/'.$foldername.'/category2.png');


		$game_form->save_file('question1', $CFG->dirroot . '/LOR/games/potato_categories2/versions/'.$foldername.'/question1.png');
		$game_form->save_file('question2', $CFG->dirroot . '/LOR/games/potato_categories2/versions/'.$foldername.'/question2.png');
		$game_form->save_file('question3', $CFG->dirroot . '/LOR/games/potato_categories2/versions/'.$foldername.'/question3.png');
		$game_form->save_file('question4', $CFG->dirroot . '/LOR/games/potato_categories2/versions/'.$foldername.'/question4.png');
		$game_form->save_file('question5', $CFG->dirroot . '/LOR/games/potato_categories2/versions/'.$foldername.'/question5.png');

		$link = new moodle_url("/LOR/games/potato_categories2/potato_categories.php?title=" . rawurlencode($foldername));
		$link = str_replace("http:", "https:", $link);

		return $link;
	}
}
