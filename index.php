<?php


require_once(__DIR__ . '/../../config.php');
require_once('initial_form.php');
require_once('locallib.php');


// set up the page
$title = get_string('pluginname', 'local_gamecreator');
$pagetitle = $title;
$url = new moodle_url("/local/gamecreator/index.php");
$PAGE->set_url($url);
$PAGE->set_title($title);
$PAGE->set_heading($title);
$PAGE->set_context(context_system::instance());
$PAGE->set_pagelayout('standard');

$initial_output = $PAGE->get_renderer('local_gamecreator');

echo $OUTPUT->header();
echo $OUTPUT->heading(get_string('heading', 'local_gamecreator'));

$initial_form = new initial_form();

if (is_null(local_gamecreator_game_handler::get_current_game())) {

	if ($fromform = $initial_form->get_data()) {

		// set the current game
		local_gamecreator_game_handler::set_current_game($fromform->gametype);

		// then display the form for the current game
		$game_form = local_gamecreator_game_handler::get_current_game()->display_first_form();

	} else {
		show_initial_form();
	}

} else {

	if ($game_form->is_cancelled()) {

	  // if there is a previous form then show it
	  if ($game->displayPreviousForm()) {

	  } else { // else show the initial form

			// reset the current game
			local_gamecreator_game_handler::reset_current_game();
			show_initial_form();

	  }


	} else if ($fromform = $game_form->get_data()) {

	  // if there is another form then show that form and send it custom data
	  if ($game->displayNextForm()) {

	  } else {

	    // else generate the game
	  	$link = create_arrange_game($fromform->foldername, $arrangeform);

	  	$renderable = new \local_gamecreator\output\success_html($link, $game->width, $game->height);
	  	echo $success_output->render($renderable);

	  	$info = format_text(get_string($game->info, 'local_gamecreator'), FORMAT_MARKDOWN);
	  	echo $OUTPUT->box($info);
	  	$game_form->display();
	  	echo "</div>";

	  }

	} else {

	  // display the form
		$info = format_text(get_string($game->info, 'local_gamecreator'), FORMAT_MARKDOWN);
		echo $OUTPUT->box($info);
		$game_form->display();

	}


}

function show_initial_form() {
	global $OUTPUT;
	global $initial_form;
	global $initial_output;

	unset($_SESSION['gametitle']);
	unset($_SESSION['gamedescription']);
	unset($_SESSION['numlevels']);
	unset($_SESSION['numquestions']);
	unset($_SESSION['questions_per_level']);
	unset($_SESSION['numbuttons']);

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
