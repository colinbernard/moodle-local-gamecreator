<?php


require_once(__DIR__ . '/../../config.php');
require_once('game_forms/arrange_form.php');
require_once('initial_form.php');
require_once('generator/arrange.php');



// set up the page
$title = get_string('pluginname', 'local_gamecreator');
$pagetitle = $title;
$url = new moodle_url("/local/gamecreator/arrange.php");
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
$arrangeform = new arrange_form();



if ($arrangeform->is_cancelled()) {

	
	// display short text description on initial form page
	$initialinfo = format_text(get_string('initialinfo', 'local_gamecreator'), FORMAT_MARKDOWN);
	echo $OUTPUT->box($initialinfo);


	// show initial HTML
	$renderable = new \local_gamecreator\output\initial_html();
	echo $initial_output->render($renderable);

	// show the initial form
	$initialform->display();

} else if ($fromform = $arrangeform->get_data()) {

	$link = create_arrange_game($fromform->foldername, $arrangeform);

	$renderable = new \local_gamecreator\output\success_html($link, 600, 800);
	echo $success_output->render($renderable);


} else {

	$info = format_text(get_string('arrangeinfo', 'local_gamecreator'), FORMAT_MARKDOWN);
	echo $OUTPUT->box($info);
	$arrangeform->display();
}

echo $OUTPUT->footer();

?>