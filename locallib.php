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
	$record->author_email = $data->email;
	$record->cid = $data->category;
	$record->pid = $data->platform;
	$record->status = "pending"; // submitted games require approval

	$game_id = $DB->insert_record('game', $record);

	$approval_link = 'https://bclearningnetwork.com/local/gamecreator/approval.php?id=' . $game_id;

	// Send email to request approval
	$subject = "BCLN Game Approval";
	$message_text = "";
	$message_html = '<p>A game is needing approval. Please follow the below link to evaluate the submitted game.</p><a href="'.$approval_link.'">'.$approval_link.'</a>';


	// to admin user
	$to_user = new stdClass();
	$to_user->email = "colinjbernard@hotmail.com";
	$to_user->firstname = "Colin";
	$to_user->lastname = "Bernard";
	$to_user->maildisplay = true;
	$to_user->mailformat = 1; // 0 (zero) text-only emails, 1 (one) for HTML/Text emails.
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
	$from_user->mailformat = 1; // 0 (zero) text-only emails, 1 (one) for HTML/Text emails.
	$from_user->id = $CFG->supportid;
	$from_user->firstnamephonetic = "";
	$from_user->lastnamephonetic = "";
	$from_user->middlename = "";
	$from_user->alternatename = "";


	email_to_user($to_user, $from_user, $subject, $message_text, $message_html, ",", false);


	return $game_id;
}

function local_gamecreator_send_approved_email($game_id) {
	global $DB;
	global $USER;
	global $CFG;

	$link = "https://bclearningnetwork.com/local/gamespage/showgame.php?id=" . $game_id;

	$sql = 'SELECT id, status, date_created, description, link, title, cid, pid, width, height, author, author_email FROM {game} WHERE id=?';
	$game = $DB->get_record_sql($sql, array($game_id));

	// Send email to request approval
	$subject = "BCLN Game Approval";
	$message_text = "";
	$message_html = '<p>Your game has been approved and is available from the <a href="https://bclearningnetwork.com/local/gamespage/index.php">BCLN Games Page</a>. Thank you for your submission! Below is a link to your game.</p><p><a href="'.$link.'">'.$link.'</a></p>';


	// to the user who submitted the game
	$to_user = new stdClass();
	$to_user->email = $game->author_email;
	$to_user->firstname = $game->author;
	$to_user->lastname = "";
	$to_user->maildisplay = true;
	$to_user->mailformat = 1; // 0 (zero) text-only emails, 1 (one) for HTML/Text emails.
	$to_user->id = -1;
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
	$from_user->mailformat = 1; // 0 (zero) text-only emails, 1 (one) for HTML/Text emails.
	$from_user->id = $USER->id;
	$from_user->firstnamephonetic = "";
	$from_user->lastnamephonetic = "";
	$from_user->middlename = "";
	$from_user->alternatename = "";


	email_to_user($to_user, $from_user, $subject, $message_text, $message_html, ",", false);
}

function local_gamecreator_send_rejected_email($game_id) {
	global $DB;
	global $USER;
	global $CFG;

	$sql = 'SELECT id, status, date_created, description, link, title, cid, pid, width, height, author, author_email FROM {game} WHERE id=?';
	$game = $DB->get_record_sql($sql, array($game_id));

	// Send email to request approval
	$subject = "BCLN Game Approval";
	$message_text = "";
	$message_html = '<p>Unfortunately, your game has not been approved to the <a href="https://bclearningnetwork.com/local/gamespage/index.php">BCLN Games Page</a>. Thank you for your submission. Contact colinjbernard@hotmail.com for details. Below is a link to your game.</p><p><a href="'.$game->link.'">'.$game->link.'</a></p>';


	// to the user who submitted the game
	$to_user = new stdClass();
	$to_user->email = $game->author_email;
	$to_user->firstname = $game->author;
	$to_user->lastname = "";
	$to_user->maildisplay = true;
	$to_user->mailformat = 1; // 0 (zero) text-only emails, 1 (one) for HTML/Text emails.
	$to_user->id = -1;
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
	$from_user->mailformat = 1; // 0 (zero) text-only emails, 1 (one) for HTML/Text emails.
	$from_user->id = $USER->id;
	$from_user->firstnamephonetic = "";
	$from_user->lastnamephonetic = "";
	$from_user->middlename = "";
	$from_user->alternatename = "";


	email_to_user($to_user, $from_user, $subject, $message_text, $message_html, ",", false);
}
