<?php


function create_arrange_game($foldername, $arrangeform) {
	global $CFG;

	mkdir($CFG->dirroot . '/LOR/games/arrange/versions/' . $foldername);

	$status = $arrangeform->save_file('image1', $CFG->dirroot . '/LOR/games/arrange/versions/'.$foldername.'/1.jpg');
	$status = $arrangeform->save_file('image2', $CFG->dirroot . '/LOR/games/arrange/versions/'.$foldername.'/2.jpg');
	$status = $arrangeform->save_file('image3', $CFG->dirroot . '/LOR/games/arrange/versions/'.$foldername.'/3.jpg');
	$status = $arrangeform->save_file('image4', $CFG->dirroot . '/LOR/games/arrange/versions/'.$foldername.'/4.jpg');

	$link = new moodle_url("/LOR/games/arrange/arrange.php?title=" . rawurlencode($foldername));
	return $link;
}