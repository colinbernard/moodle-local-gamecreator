<?php


require_once(__DIR__ . '/../../config.php');
require_once('initial_form.php');
require_once('game_forms/balloons_form1.php');
require_once('game_forms/balloons_form2.php');
require_once('game_forms/arrange_form.php');
require_once('game_forms/categories2_form.php');
require_once('game_forms/categories3_form.php');
require_once('game_forms/spiderlove_form.php');
require_once('generator/balloons.php');
require_once('generator/arrange.php');
require_once('generator/categories2.php');
require_once('generator/categories3.php');
require_once('generator/spiderlove.php');

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
$balloonsform1 = new balloons_form1();
$balloonsform2 = new balloons_form2();
$arrangeform = new arrange_form();
$categories2form = new categories2_form();
$categories3form = new categories3_form();
$spiderloveform = new spiderlove_form();

if ($fromform = $balloonsform1->get_data()) {


	$balloonsform2 = new balloons_form2(null, array('numlevels'=>$fromform->numlevels, 'numquestions'=>$fromform->numquestions, 'title'=>$fromform->gametitle, 'description'=>$fromform->gamedescription));
	$info = format_text(get_string('balloonsinfo2', 'local_gamecreator'), FORMAT_MARKDOWN);
	echo $OUTPUT->box($info);
	$balloonsform2->display();


} else if ($fromform = $balloonsform2->get_data()) {

	$link = create_balloons_game($_POST);

	$renderable = new \local_gamecreator\output\success_html($link, 920, 720);
	echo $success_output->render($renderable);

} else if ($fromform = $arrangeform->get_data()) {

	$link = create_arrange_game($fromform->foldername, $arrangeform);

	$renderable = new \local_gamecreator\output\success_html($link, 600, 800);
	echo $success_output->render($renderable);

} else if ($fromform = $categories2form->get_data()) {

	$link = create_categories2_game($fromform->foldername, $fromform->answers, $categories2form);

	$renderable = new \local_gamecreator\output\success_html($link, 600, 800);
	echo $success_output->render($renderable);


} else if ($fromform = $categories3form->get_data()) {

	$link = create_categories3_game($fromform->foldername, $fromform->answers, $categories3form);

	$renderable = new \local_gamecreator\output\success_html($link, 600, 800);
	echo $success_output->render($renderable);

} else if ($fromform = $spiderloveform->get_data()) {

	$link = create_spiderlove_game($fromform->foldername, $spiderloveform);

	$renderable = new \local_gamecreator\output\success_html($link, 600, 800);
	echo $success_output->render($renderable);

} else if ($fromform = $initialform->get_data()) {

	$gametype = $fromform->gametype;
	$balloonsform = null;
	$info = null;

	switch ($gametype) {
		case 0 :
			$balloonsform = new balloons_form1();
			$info = format_text(get_string('balloonsinfo', 'local_gamecreator'), FORMAT_MARKDOWN);
			echo $OUTPUT->box($info);
			$balloonsform->display();
			break;
		case 1 :
			$arrangeform = new arrange_form();
			$info = format_text(get_string('arrangeinfo', 'local_gamecreator'), FORMAT_MARKDOWN);
			echo $OUTPUT->box($info);
			$arrangeform->display();
			break;
		case 2 :
			$categories2form = new categories2_form();
			$info = format_text(get_string('categories2info', 'local_gamecreator'), FORMAT_MARKDOWN);
			echo $OUTPUT->box($info);
			$categories2form->display();		
			break;
		case 3 :
			$categories3form = new categories3_form();
			$info = format_text(get_string('categories3info', 'local_gamecreator'), FORMAT_MARKDOWN);
			echo $OUTPUT->box($info);
			$categories3form->display();		
			break;
		case 4 :
			$spiderloveform = new spiderlove_form();
			$info = format_text(get_string('spiderloveinfo', 'local_gamecreator'), FORMAT_MARKDOWN);
			echo $OUTPUT->box($info);
			$spiderloveform->display();		
			break;
	}

} else {

	// display short text description on initial form page
	$initialinfo = format_text(get_string('initialinfo', 'local_gamecreator'), FORMAT_MARKDOWN);
	echo $OUTPUT->box($initialinfo);

	// show initial HTML
	$renderable = new \local_gamecreator\output\initial_html();
	echo $initial_output->render($renderable);

	// show the initial form
	$initialform->display();
}



echo $OUTPUT->footer();

?>