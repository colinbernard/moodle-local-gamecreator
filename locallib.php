<?php


function local_gamecreator_add_to_db($data) {
	global $DB;

	date_default_timezone_set('America/Los_Angeles'); // PST

	$record = new stdClass();
	$record->title = $data->title;
	$record->description = $data->description;
	//$record->image = 'https://bclearningnetwork.com/LOR/games/balloons/preview.png';
	$record->width = $data->width;
	$record->height = $data->height;
	$record->link = $data->link;
	$record->date_created = date("Ymd");
	$record->author = $data->author;
	$record->cid = $data->category;
	$record->pid = $data->platform;

	return $DB->insert_record('game', $record);
}
