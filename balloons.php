<?php


require_once(__DIR__ . '/../../config.php');
require_once('game_forms/balloons_form1.php');
require_once('game_forms/balloons_form2.php');
require_once('initial_form.php');



// set up the page
$title = get_string('pluginname', 'local_gamecreator');
$pagetitle = $title;
$url = new moodle_url("/local/gamecreator/balloons.php");
$PAGE->set_url($url);
$PAGE->set_title($title);
$PAGE->set_heading($title);
$PAGE->set_context(context_system::instance());
$PAGE->set_pagelayout('standard');

$initial_output = $PAGE->get_renderer('local_gamecreator');

echo $OUTPUT->header();
echo $OUTPUT->heading(get_string('heading', 'local_gamecreator'));

$initialform = new initial_form("index.php");
$balloonsform1 = new balloons_form1();
$balloonsform2 = new balloons_form2();


if ($balloonsform1->is_cancelled()) {

	
	// display short text description on initial form page
	$initialinfo = format_text(get_string('initialinfo', 'local_gamecreator'), FORMAT_MARKDOWN);
	echo $OUTPUT->box($initialinfo);

	// show the initial form
	$initialform->display();

	// show initial HTML
	$renderable = new \local_gamecreator\output\initial_html();
	echo $initial_output->render($renderable);

} else if ($fromform = $balloonsform1->get_data()) {

	$_SESSION['numlevels'] = $fromform->numlevels;
	$_SESSION['numquestions'] = $fromform->numquestions;
	$_SESSION['gametitle'] = $fromform->gametitle;
	$_SESSION['gamedescription'] = $fromform->gamedescription;

	$balloonsform2 = new balloons_form2("balloons2.php", array('numlevels'=>$fromform->numlevels, 'numquestions'=>$fromform->numquestions, 'title'=>$fromform->gametitle, 'description'=>$fromform->gamedescription));
	$info = format_text(get_string('balloonsinfo2', 'local_gamecreator'), FORMAT_MARKDOWN);
	echo $OUTPUT->box($info);
	$balloonsform2->display();


} else {

	$info = format_text(get_string('balloonsinfo', 'local_gamecreator'), FORMAT_MARKDOWN);
	echo $OUTPUT->box($info);
	$balloonsform1->display();
}

echo $OUTPUT->footer();

?>