<?php

use \local_gamecreator\game\handler;

require_once(__DIR__ . '/../../config.php');
require_once('initial_form.php');
require_once('locallib.php');


// set up the page
$title = get_string('pluginname', 'local_gamecreator');
$pagetitle = $title;
$url = new moodle_url("/local/gamecreator/index.php");
$context = context_system::instance();
$PAGE->set_context($context);
$PAGE->set_url($url);
$PAGE->set_title($title);
$PAGE->set_heading($title);
$PAGE->set_pagelayout('standard');

$initial_output = $PAGE->get_renderer('local_gamecreator');
$success_output = $PAGE->get_renderer('local_gamecreator');

echo $OUTPUT->header();
echo $OUTPUT->heading(get_string('heading', 'local_gamecreator'));


//var_dump(get_users_by_capability($context, 'local/gamecreator:viewplugin'));
var_dump(get_users_by_capability($context, 'moodle/course:update'));

require_capability('local/gamecreator:viewplugin', $context);

$initial_form = new initial_form();


// check is there is no game selected or if start screen is desired.
if (is_null(handler::get_current_game()) || isset($_GET['start'])) {

	// check if the initial form has been submitted
	if ($fromform = $initial_form->get_data()) {

		// set the current game
		handler::set_current_game($fromform->gametype);

		// then display the form for the current game
		$game_form = handler::get_current_game()->display_first_form();

	} else {
		show_initial_form();
	}

// there is a game selected
} else {

	$game = handler::get_current_game();
	$game_form = $game->get_current_form(handler::get_custom_data()); // use custom data if this is second form


	// the game form was cancelled
	if ($game_form->is_cancelled()) {

	  // If there is a previous form then show it
	  if ($game->display_previous_form()) {

	  } else { // else show the initial form

			// reset the current game
			handler::reset_current_game();
			show_initial_form();

	  }

		// the game form has been submitted
	} else if ($fromform = $game_form->get_data()) {

	  // if there is another form then show that form and send it custom data
	  if ($game->display_next_form($fromform)) {
			// store session data
			handler::set_custom_data($fromform);
		// else generate the game
	  } else {

			if ($game->requires_POST_data) {
				$link = $game->generate($_POST, $game_form);
			} else {
				$link = $game->generate($fromform, $game_form);
			}

	  	$renderable = new \local_gamecreator\output\success_html($link, $game->width, $game->height);
	  	echo $success_output->render($renderable);

	  	$info = format_text(get_string($game->get_current_info(), 'local_gamecreator'), FORMAT_MARKDOWN);
	  	echo $OUTPUT->box($info);
	  	$game_form->display();
			?></div><?php
	  }

		// show the game form
	} else {

		$info = format_text(get_string($game->get_current_info(), 'local_gamecreator'), FORMAT_MARKDOWN);
		echo $OUTPUT->box($info);
		$game_form->display();

	}


}

function show_initial_form() {
	global $OUTPUT;
	global $initial_form;
	global $initial_output;

	handler::reset_current_game();
	handler::clear_custom_data();

	$initialinfo = format_text(get_string('initialinfo', 'local_gamecreator'), FORMAT_MARKDOWN);
	echo $OUTPUT->box($initialinfo);

	// show the initial form
	$initial_form->display();

	// show initial HTML
	$renderable = new \local_gamecreator\output\initial_html();
	echo $initial_output->render($renderable);
}





echo $OUTPUT->footer();

?>
