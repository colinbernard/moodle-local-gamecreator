<?php


require_once(__DIR__ . '/../../config.php');
require_once('game_forms/venn_diagram_form1.php');
require_once('game_forms/venn_diagram_form2.php');
require_once('initial_form.php');



// set up the page
$title = get_string('pluginname', 'local_gamecreator');
$pagetitle = $title;
$url = new moodle_url("/local/gamecreator/venn_diagram.php");
$PAGE->set_url($url);
$PAGE->set_title($title);
$PAGE->set_heading($title);
$PAGE->set_context(context_system::instance());
$PAGE->set_pagelayout('standard');

$initial_output = $PAGE->get_renderer('local_gamecreator');

echo $OUTPUT->header();
echo $OUTPUT->heading(get_string('heading', 'local_gamecreator'));

$initialform = new initial_form("index.php");
$venndiagramform1 = new venn_diagram_form1();
$venndiagramform2 = new venn_diagram_form2();


if ($venndiagramform1->is_cancelled()) {


	// display short text description on initial form page
	$initialinfo = format_text(get_string('initialinfo', 'local_gamecreator'), FORMAT_MARKDOWN);
	echo $OUTPUT->box($initialinfo);

	// show the initial form
	$initialform->display();

	// show initial HTML
	$renderable = new \local_gamecreator\output\initial_html();
	echo $initial_output->render($renderable);

} else if ($fromform = $venndiagramform1->get_data()) {

	$_SESSION['questions_per_level'] = $fromform->questions_per_level;
	$_SESSION['numquestions'] = $fromform->numquestions;
	$_SESSION['gametitle'] = $fromform->gametitle;
	$_SESSION['gamedescription'] = $fromform->gamedescription;

	$venndiagramform2 = new venn_diagram_form2("venn_diagram2.php", array('questions_per_level'=>$fromform->questions_per_level, 'numquestions'=>$fromform->numquestions, 'title'=>$fromform->gametitle, 'description'=>$fromform->gamedescription));
	$info = format_text(get_string('venndiagraminfo2', 'local_gamecreator'), FORMAT_MARKDOWN);
	echo $OUTPUT->box($info);
	$venndiagramform2->display();


} else {

	$info = format_text(get_string('venndiagraminfo', 'local_gamecreator'), FORMAT_MARKDOWN);
	echo $OUTPUT->box($info);
	$venndiagramform1->display();
}

echo $OUTPUT->footer();

?>
