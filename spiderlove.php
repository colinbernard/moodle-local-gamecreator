<?php


require_once(__DIR__ . '/../../config.php');
require_once('game_forms/spiderlove_form.php');
require_once('initial_form.php');
require_once('generator/spiderlove.php');



// set up the page
$title = get_string('pluginname', 'local_gamecreator');
$pagetitle = $title;
$url = new moodle_url("/local/gamecreator/spiderlove.php");
$PAGE->set_url($url);
$PAGE->set_title($title);
$PAGE->set_heading($title);
$PAGE->set_context(context_system::instance());
$PAGE->set_pagelayout('standard');

$initial_output = $PAGE->get_renderer('local_gamecreator');
$success_output = $PAGE->get_renderer('local_gamecreator');


echo $OUTPUT->header();
echo $OUTPUT->heading(get_string('heading', 'local_gamecreator'));

$initialform = new initial_form("index.php");
$spiderloveform = new spiderlove_form();



if ($spiderloveform->is_cancelled()) {


	// display short text description on initial form page
	$initialinfo = format_text(get_string('initialinfo', 'local_gamecreator'), FORMAT_MARKDOWN);
	echo $OUTPUT->box($initialinfo);

	// show the initial form
	$initialform->display();

	// show initial HTML
	$renderable = new \local_gamecreator\output\initial_html();
	echo $initial_output->render($renderable);

} else if ($fromform = $spiderloveform->get_data()) {

	$link = create_spiderlove_game($fromform->foldername, $spiderloveform);

	$renderable = new \local_gamecreator\output\success_html($link, 600, 800);
	echo $success_output->render($renderable);

	$info = format_text(get_string('spiderloveinfo', 'local_gamecreator'), FORMAT_MARKDOWN);
	echo $OUTPUT->box($info);
	$spiderloveform->display();
	echo "</div>";

} else {

	$info = format_text(get_string('spiderloveinfo', 'local_gamecreator'), FORMAT_MARKDOWN);
	echo $OUTPUT->box($info);
	$spiderloveform->display();
}

echo $OUTPUT->footer();

?>
