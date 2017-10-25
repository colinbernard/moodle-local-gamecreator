<?php

require_once(__DIR__ . '/../../config.php');
require_once('game_forms/balloons_form1.php');
require_once('game_forms/balloons_form2.php');
require_once('generator/balloons.php');

// set up the page
$title = get_string('pluginname', 'local_gamecreator');
$pagetitle = $title;
$url = new moodle_url("/local/gamecreator/index.php");
$PAGE->set_url($url);
$PAGE->set_title($title);
$PAGE->set_heading($title);
$PAGE->set_context(context_system::instance());
$PAGE->set_pagelayout('standard');

$success_output = $PAGE->get_renderer('local_gamecreator');

echo $OUTPUT->header();
echo $OUTPUT->heading(get_string('heading', 'local_gamecreator'));

$balloonsform1 = new balloons_form1();
$balloonsform2 = new balloons_form2("balloons2.php", array('numlevels'=>$_SESSION['numlevels'], 'numquestions'=>$_SESSION['numquestions'], 'title'=>$_SESSION['gametitle'], 'description'=>$_SESSION['gamedescription']));


if ($balloonsform2->is_cancelled()) {

	$balloonsform1 = new balloons_form1("balloons.php");
	$info = format_text(get_string('balloonsinfo', 'local_gamecreator'), FORMAT_MARKDOWN);
	echo $OUTPUT->box($info);
	$balloonsform1->display();

} else if ($fromform = $balloonsform2->get_data()) {

	$link = create_balloons_game($_POST);

	$renderable = new \local_gamecreator\output\success_html($link, 920, 720);
	echo $success_output->render($renderable);

} else {
	$info = format_text(get_string('balloonsinfo2', 'local_gamecreator'), FORMAT_MARKDOWN);
	echo $OUTPUT->box($info);
	$balloonsform2->display();
}

?>