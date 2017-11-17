<?php

require_once(__DIR__ . '/../../config.php');
require_once('game_forms/venn_diagram_form1.php');
require_once('game_forms/venn_diagram_form2.php');
require_once('generator/venn_diagram.php');

// set up the page
$title = get_string('pluginname', 'local_gamecreator');
$pagetitle = $title;
$url = new moodle_url("/local/gamecreator/venn_diagram2.php");
$PAGE->set_url($url);
$PAGE->set_title($title);
$PAGE->set_heading($title);
$PAGE->set_context(context_system::instance());
$PAGE->set_pagelayout('standard');

$success_output = $PAGE->get_renderer('local_gamecreator');

echo $OUTPUT->header();
echo $OUTPUT->heading(get_string('heading', 'local_gamecreator'));

$venndiagramform1 = new venn_diagram_form1();
$venndiagramform2 = new venn_diagram_form2("venn_diagram2.php", array('questions_per_level'=>$_SESSION['questions_per_level'], 'numquestions'=>$_SESSION['numquestions'], 'title'=>$_SESSION['gametitle'], 'description'=>$_SESSION['gamedescription']));


if ($venndiagramform2->is_cancelled()) {

	$venndiagramform1 = new venn_diagram_form1("venn_diagram.php");
	$info = format_text(get_string('venndiagraminfo', 'local_gamecreator'), FORMAT_MARKDOWN);
	echo $OUTPUT->box($info);
	$venndiagramform1->display();

} else if ($fromform = $venndiagramform2->get_data()) {

	$link = create_venn_diagram_game($_POST);

	$renderable = new \local_gamecreator\output\success_html($link, 920, 720);
	echo $success_output->render($renderable);

	$info = format_text(get_string('venndiagraminfo2', 'local_gamecreator'), FORMAT_MARKDOWN);
	echo $OUTPUT->box($info);
	$venndiagramform2->display();
	echo "</div>"; // don't even ask

} else {
	$info = format_text(get_string('venndiagraminfo2', 'local_gamecreator'), FORMAT_MARKDOWN);
	echo $OUTPUT->box($info);
	$venndiagramform2->display();
}

?>
