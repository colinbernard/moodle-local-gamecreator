<?php


function local_gamecreator_add_to_db($data) {
	global $DB;
	global $USER;
	global $CFG;

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
	$record->status = "pending"; // submitted games require approval

	$game_id = $DB->insert_record('game', $record);

	// Send email to request approval
	$subject = "BCLN Game Approval";
	$message_text = "A game is needing approval.";
	$message_html = "html";


	// to admin user
	$to_user = new stdClass();
	$to_user->email = "colinjbernard@hotmail.com";
	$to_user->firstname = "Colin";
	$to_user->lastname = "Bernard";
	$to_user->maildisplay = true;
	$to_user->mailformat = 0; // 0 (zero) text-only emails, 1 (one) for HTML/Text emails.
	$to_user->id = 2368;
	$to_user->firstnamephonetic = "";
	$to_user->lastnamephonetic = "";
	$to_user->middlename = "";
	$to_user->alternatename = "";

	// from BCLN user
	$from_user = new stdClass();
	$from_user->email = $CFG->supportemail;
	$from_user->firstname = $CFG->supportname;
	$from_user->lastname = "";
	$from_user->maildisplay = true;
	$from_user->mailformat = 0; // 0 (zero) text-only emails, 1 (one) for HTML/Text emails.
	$from_user->id = $USER->id;
	$from_user->firstnamephonetic = "";
	$from_user->lastnamephonetic = "";
	$from_user->middlename = "";
	$from_user->alternatename = "";


	email_to_user($to_user, $from_user, $subject, $message_text, $message_html, ",", false);


	return $game_id;
}
