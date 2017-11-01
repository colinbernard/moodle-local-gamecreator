<?php


function create_spiderlove_game($foldername, $form) {
	global $CFG;

	mkdir($CFG->dirroot . '/LOR/games/spiderlove/versions/' . $foldername);

	$form->save_file('left1', $CFG->dirroot . '/LOR/games/spiderlove/versions/'.$foldername.'/left1.jpg');
	$form->save_file('left2', $CFG->dirroot . '/LOR/games/spiderlove/versions/'.$foldername.'/left2.jpg');
	$form->save_file('left3', $CFG->dirroot . '/LOR/games/spiderlove/versions/'.$foldername.'/left3.jpg');
	$form->save_file('left4', $CFG->dirroot . '/LOR/games/spiderlove/versions/'.$foldername.'/left4.jpg');
	$form->save_file('left5', $CFG->dirroot . '/LOR/games/spiderlove/versions/'.$foldername.'/left5.jpg');

	$form->save_file('right1', $CFG->dirroot . '/LOR/games/spiderlove/versions/'.$foldername.'/right1.jpg');
	$form->save_file('right2', $CFG->dirroot . '/LOR/games/spiderlove/versions/'.$foldername.'/right2.jpg');
	$form->save_file('right3', $CFG->dirroot . '/LOR/games/spiderlove/versions/'.$foldername.'/right3.jpg');
	$form->save_file('right4', $CFG->dirroot . '/LOR/games/spiderlove/versions/'.$foldername.'/right4.jpg');
	$form->save_file('right5', $CFG->dirroot . '/LOR/games/spiderlove/versions/'.$foldername.'/right5.jpg');


	$link = new moodle_url("/LOR/games/spiderlove/spiders.php?title=" . rawurlencode($foldername));
	$link = str_replace("http:", "https:", $link);


	return $link;
}