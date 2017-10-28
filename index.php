<?php


require_once(__DIR__ . '/../../config.php');
require_once('initial_form.php');
require_once('game_forms/balloons_form1.php');
require_once('game_forms/arrange_form.php');
require_once('game_forms/categories2_form.php');
require_once('game_forms/categories3_form.php');
require_once('game_forms/spiderlove_form.php');


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
$initial_output = $PAGE->get_renderer('local_gamecreator');


echo $OUTPUT->header();
echo $OUTPUT->heading(get_string('heading', 'local_gamecreator'));

$initialform = new initial_form();

if ($fromform = $initialform->get_data()) {

	$gametype = $fromform->gametype;
	$info = null;

	switch ($gametype) {
		case 0 :
			$balloonsform1 = new balloons_form1("balloons.php");
			$info = format_text(get_string('balloonsinfo', 'local_gamecreator'), FORMAT_MARKDOWN);
			echo $OUTPUT->box($info);
			$balloonsform1->display();
			break;
		case 1 :
			$arrangeform = new arrange_form("arrange.php");
			$info = format_text(get_string('arrangeinfo', 'local_gamecreator'), FORMAT_MARKDOWN);
			echo $OUTPUT->box($info);
			$arrangeform->display();
			break;
		case 2 :
			$categories2form = new categories2_form("categories2.php");
			$info = format_text(get_string('categories2info', 'local_gamecreator'), FORMAT_MARKDOWN);
			echo $OUTPUT->box($info);
			$categories2form->display();		
			break;
		case 3 :
			$categories3form = new categories3_form("categories3.php");
			$info = format_text(get_string('categories3info', 'local_gamecreator'), FORMAT_MARKDOWN);
			echo $OUTPUT->box($info);
			$categories3form->display();		
			break;
		case 4 :
			$spiderloveform = new spiderlove_form("spiderlove.php");
			$info = format_text(get_string('spiderloveinfo', 'local_gamecreator'), FORMAT_MARKDOWN);
			echo $OUTPUT->box($info);
			$spiderloveform->display();		
			break;
	}

} else {

	// display short text description on initial form page
	$initialinfo = format_text(get_string('initialinfo', 'local_gamecreator'), FORMAT_MARKDOWN);
	echo $OUTPUT->box($initialinfo);


	// show the initial form
	$initialform->display();

	// show initial HTML
	$renderable = new \local_gamecreator\output\initial_html();
	echo $initial_output->render($renderable);
	
}



echo $OUTPUT->footer();

?>