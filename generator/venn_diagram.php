<?php


function create_venn_diagram_game($data) {
	global $CFG;

	$title = $data['title'];
	
	$file = fopen("../../LOR/games/venn_diagram/versions/" . $title . '.json', 'w');
	fwrite($file, json_encode($data));
	fclose($file);

	$link = new moodle_url("/LOR/games/venn_diagram/venn_diagram.php?title=" . rawurlencode($title));
	$link = str_replace("http:", "https:", $link);

	return $link;
}
