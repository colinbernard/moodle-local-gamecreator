<?php




// Standard GPL and phpdocs
require_once(__DIR__ . '/../../config.php');
require_once('initial_form.php');
require_once('game_forms/balloons_form.php');

// set up the page
$title = get_string('pluginname', 'local_gamecreator');
$pagetitle = $title;
$url = new moodle_url("/local/gamecreator/index.php");
$PAGE->set_url($url);
$PAGE->set_title($title);
$PAGE->set_heading($title);
$PAGE->set_context(context_system::instance());
$PAGE->set_pagelayout('standard');


$PAGE->requires->js( new moodle_url($CFG->wwwroot . '/local/gamecreator/js/onselect.js'));

echo $OUTPUT->header();
echo $OUTPUT->heading(get_string('heading', 'local_gamecreator'));

$initialform = new initial_form();
$balloonsform = new balloons_form();

if ($fromform = $balloonsform->get_data()) {

	if ($fromform->submitbutton == get_string('next', 'local_gamecreator')) {

		$balloonsform = new balloons_form(null, array('numlevels'=>$fromform->numlevels, 'numquestions'=>$fromform->numquestions));
		$info = format_text(get_string('balloonsinfo2', 'local_gamecreator'), FORMAT_MARKDOWN);
		echo $OUTPUT->box($info);
		$balloonsform->display();

	} else if ($fromform->submitbutton == get_string('creategame', 'local_gamecreator')) {

		echo "Balloons game created!";


	}


} else if ($fromform = $initialform->get_data()) {

	$gametype = $fromform->gametype;
	$balloonsform = null;
	$info = null;

	switch ($gametype) {
		case 0 :
			$balloonsform = new balloons_form();
			$info = format_text(get_string('balloonsinfo', 'local_gamecreator'), FORMAT_MARKDOWN);
			echo $OUTPUT->box($info);
			$balloonsform->display();
			break;
		case 1 :
			echo "Not available yet.";
			break;
		case 2 :
			echo "Not available yet.";
			break;
		case 3 :
			echo "Not available yet.";
			break;
		case 4 :
			echo "Not available yet.";
			break;
	}

} else {

	// display short text description on initial form page
	$initialinfo = format_text(get_string('initialinfo', 'local_gamecreator'), FORMAT_MARKDOWN);
	echo $OUTPUT->box($initialinfo);

	// show the initial form
	$initialform->display();
}



echo $OUTPUT->footer();

?>