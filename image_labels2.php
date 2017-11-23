<?php

require_once(__DIR__ . '/../../config.php');
require_once('game_forms/image_labels_form1.php');
require_once('game_forms/image_labels_form2.php');
require_once('generator/image_labels.php');

// set up the page
$title = get_string('pluginname', 'local_gamecreator');
$pagetitle = $title;
$url = new moodle_url("/local/gamecreator/image_labels2.php");
$PAGE->set_url($url);
$PAGE->set_title($title);
$PAGE->set_heading($title);
$PAGE->set_context(context_system::instance());
$PAGE->set_pagelayout('standard');

$success_output = $PAGE->get_renderer('local_gamecreator');

echo $OUTPUT->header();
echo $OUTPUT->heading(get_string('heading', 'local_gamecreator'));

$imagelabelsform1 = new image_labels_form1();
$imagelabelsform2 = new image_labels_form2("image_labels2.php", array('numquestions'=>$_SESSION['numquestions'], 'numbuttons'=>$_SESSION['numbuttons'], 'title'=>$_SESSION['gametitle']));


if ($imagelabelsform2->is_cancelled()) {

	$imagelabelsform1 = new image_labels_form1("image_labels.php");
	$info = format_text(get_string('imagelabelsinfo', 'local_gamecreator'), FORMAT_MARKDOWN);
	echo $OUTPUT->box($info);
	$imagelabelsform1->display();

} else if ($fromform = $imagelabelsform2->get_data()) {

	$link = create_image_labels_game($_POST, $imagelabelsform2);

	$renderable = new \local_gamecreator\output\success_html($link, 920, 720);
	echo $success_output->render($renderable);

	$info = format_text(get_string('imagelabelsinfo2', 'local_gamecreator'), FORMAT_MARKDOWN);
	echo $OUTPUT->box($info);
	$imagelabelsform2->display();
	echo "</div>"; // don't even ask

} else {
	$info = format_text(get_string('imagelabelsinfo2', 'local_gamecreator'), FORMAT_MARKDOWN);
	echo $OUTPUT->box($info);
	$imagelabelsform2->display();
}

?>
