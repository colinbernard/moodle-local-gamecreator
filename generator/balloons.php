<?php


function create_balloons_game($data) {

	$title = $data['title'];

	$file = fopen("../../LOR/games/balloons/versions/" . $title . '.json', 'w');
	$success = fwrite($file, json_encode($data));
	fclose($file);

	$link = new moodle_url("/LOR/games/balloons/balloons.php?title=" . rawurlencode($title));
	$link = str_replace("http:", "https:", $link);

	return $link;
}
