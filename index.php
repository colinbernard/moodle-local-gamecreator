<?php

use \local_gamecreator\game\handler;

require_once(__DIR__ . '/../../config.php');
require_once('initial_form.php');


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


require_login();


$initial_form = new initial_form();

// check if the initial form has been submitted
if ($fromform = $initial_form->get_data()) {

	// set the current game
	handler::set_current_game($fromform->gametype);
	redirect(new moodle_url("/local/gamecreator/create.php"));

} else {
	show_initial_form();
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
