<?php

require_once(__DIR__ . '/../../config.php'); // standard config file
require_once('addtodb_form.php');
require_once('locallib.php');

// setting up the page
$title = get_string('pluginname', 'local_gamecreator');
$PAGE->set_context(get_system_context());
$PAGE->set_pagelayout('standard');
$PAGE->set_title($title);
$PAGE->set_heading($title);
$PAGE->set_url($CFG->wwwroot.'/local/gamecreator/addtodb');




echo $OUTPUT->header();
?>

<h2>Add your game to the BCLN Games Page</h2>

<?php

$addtodb_form = new addtodb_form(null, array('width' => $_POST['width'], 'height' => $_POST['height'], 'link' => $_POST['link']));

if ($addtodb_form->is_cancelled()) {

  // go back to generated game page
  ?><script>window.history.go(-2);</script><?php

} else if ($fromform = $addtodb_form->get_data()) {

  \local_gamecreator\game\handler::clear_custom_data();
  \local_gamecreator\game\handler::reset_current_game();

  $id = local_gamecreator_add_to_db($fromform);
  redirect($CFG->wwwroot .'/local/gamespage/index.php');

} else {
  $addtodb_form->display();
}

?>

<?php if (isset($id)): ?>
  <p>Success! You can find your game <a href="<?=$CFG->wwwroot?>/local/gamespage/index.php">here</a>.</p>
<?php endif ?>

<?php
echo $OUTPUT->footer();
?>
