<?php


function create_arrange_game($foldername, $arrangeform) {
	global $CFG;

	mkdir($CFG->dirroot . '/LOR/games/arrange/versions/' . $foldername);

	$filename = $arrangeform->get_new_filename('image1');
	$status = $arrangeform->save_file('image1', $CFG->dirroot . '/LOR/games/arrange/versions/'.$foldername.'/'.$filename);

	$filename = $arrangeform->get_new_filename('image2');
	$status = $arrangeform->save_file('image2', $CFG->dirroot . '/LOR/games/arrange/versions/'.$foldername.'/'.$filename);

	$filename = $arrangeform->get_new_filename('image3');
	$status = $arrangeform->save_file('image3', $CFG->dirroot . '/LOR/games/arrange/versions/'.$foldername.'/'.$filename);

	$filename = $arrangeform->get_new_filename('image4');
	$status = $arrangeform->save_file('image4', $CFG->dirroot . '/LOR/games/arrange/versions/'.$foldername.'/'.$filename);

	$link = new moodle_url("/LOR/games/arrange/arrange.php?title=" . rawurlencode($foldername));
	return $link;
}