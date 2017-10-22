<?php


function create_balloons_game($data) {

	$title = $data['title'];

	$file = fopen("../../LOR/games/balloons/versions/" . $title . '.json', 'w');	
	fwrite($file, json_encode($data));
	fclose($file);

	$link = new moodle_url("/LOR/games/balloons/balloons.php?title=" . rawurlencode($title));

	return $link;
}