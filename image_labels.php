<?php


require_once(__DIR__ . '/../../config.php');
require_once('game_forms/image_labels_form1.php');
require_once('game_forms/image_labels_form2.php');
require_once('initial_form.php');



// set up the page
$title = get_string('pluginname', 'local_gamecreator');
$pagetitle = $title;
$url = new moodle_url("/local/gamecreator/image_labels.php");
$PAGE->set_url($url);
$PAGE->set_title($title);
$PAGE->set_heading($title);
$PAGE->set_context(context_system::instance());
$PAGE->set_pagelayout('standard');

$initial_output = $PAGE->get_renderer('local_gamecreator');

echo $OUTPUT->header();
echo $OUTPUT->heading(get_string('heading', 'local_gamecreator'));

$initialform = new initial_form("index.php");
$imagelabelsform1 = new image_labels_form1();
$imagelabelsform2 = new image_labels_form2();


if ($imagelabelsform1->is_cancelled()) {


	// display short text description on initial form page
	$initialinfo = format_text(get_string('initialinfo', 'local_gamecreator'), FORMAT_MARKDOWN);
	echo $OUTPUT->box($initialinfo);

	// show the initial form
	$initialform->display();

	unset($_SESSION['gametitle']);
	unset($_SESSION['gamedescription']);
	unset($_SESSION['numlevels']);
	unset($_SESSION['numquestions']);
	unset($_SESSION['questions_per_level']);
	unset($_SESSION['numbuttons']);

	// show initial HTML
	$renderable = new \local_gamecreator\output\initial_html();
	echo $initial_output->render($renderable);

} else if ($fromform = $imagelabelsform1->get_data()) {

	$_SESSION['numquestions'] = $fromform->numquestions;
	$_SESSION['gametitle'] = $fromform->gametitle;
	$_SESSION['numbuttons'] = $fromform->numbuttons;

	$imagelabelsform2 = new image_labels_form2("image_labels2.php", array('numquestions'=>$fromform->numquestions, 'numbuttons'=>$fromform->numbuttons, 'title'=>$fromform->gametitle));
	$info = format_text(get_string('imagelabelsinfo2', 'local_gamecreator'), FORMAT_MARKDOWN);
	echo $OUTPUT->box($info);
	$imagelabelsform2->display();


} else {

	$info = format_text(get_string('imagelabelsinfo', 'local_gamecreator'), FORMAT_MARKDOWN);
	echo $OUTPUT->box($info);
	$imagelabelsform1->display();
}

echo $OUTPUT->footer();

?>
