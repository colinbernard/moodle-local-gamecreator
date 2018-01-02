<?php

require_once(__DIR__ . '/../../config.php'); // standard config file
require_once(__DIR__ . '/../gamespage/locallib.php');
require_once('locallib.php');
require_login(); // make sure user is logged in


// make sure id arg is set
if (isset($_GET['id'])) {

  $game_id = $_GET['id'];


  // setting up the page
  $PAGE->set_context(get_system_context());
  $PAGE->set_pagelayout('standard');
  $PAGE->set_title("BCLN Game Creator");
  $PAGE->set_heading("Game Approval");
  $PAGE->set_url(new moodle_url('/local/gamecreator/approval.php', array('id' => $game_id)));
  echo $OUTPUT->header();

  // make sure user is admin user
  if (is_siteadmin()) {

    // Make sure game status is 'pending'
    $sql = 'SELECT id, status, date_created, description, link, title, cid, pid, width, height FROM {game} WHERE id=?';
    $game = $DB->get_record_sql($sql, array($game_id));

    $category = local_gamespage_get_game_category_from_id($game->cid);
    $platform = local_gamespage_get_game_platform_from_id($game->pid);

    if ($game->status === "pending") {

        // check if action is set
          if (isset($_GET['action'])) {
            $action = $_GET['action'];
            if ($action === "a") {
              // Approve
              $dataobject = new stdClass();
              $dataobject->id = $game_id;
              $dataobject->status = "approved";
              $DB->update_record('game', $dataobject);

              local_gamecreator_send_approved_email($game_id);
              ?>
              <p>Game approved!</p>
              <p><a href="https://bclearningnetwork.com/local/gamespage/showgame.php?id=<?=$game_id?>">Link to Game</a></p>
              <?php
            } else if ($action === "r") {
              // Reject
              $dataobject = new stdClass();
              $dataobject->id = $game_id;
              $dataobject->status = "rejected";
              $DB->update_record('game', $dataobject);

              local_gamecreator_send_rejected_email($game_id)
              ?>
              <p>Game rejected!</p>
              <?php

            } else {
              ?><p>Unidentified action!</p><?php
            }
          } else {




?>

<!-- TODO: replace these with better links -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<link rel="stylesheet" href="styles.css">


<div "container-fluid">
  <div class="row" id="game-info">
    <h1><?=$game->title?></h1>
    <ul>
      <li><b>Category</b>: <?=$category->name?></li>
      <li><b>Platform</b>: <?=$platform->name?></li>
      <li><b>Date Created:</b> <?=date("F Y", strtotime($game->date_created))?></li> <!-- Date in format: June 2017 -->
    </ul>
    <p><?=$game->description?></p>
  </div>
  <div class="row">
    <p><iframe src="<?=$game->link?>" allowfullscreen="" frameborder="0" height="<?=$game->height?>" width="<?=$game->width?>"></iframe></p>
  </div>

  <div class="row text-centered">
    <a href="approval.php?id=<?=$game_id?>&action=a"><button>Approve</button></a>
    <a href="approval.php?id=<?=$game_id?>&action=r"><button>Reject</button></a>
  </div>
</div>


<?php
}
} else {
  ?><p>This game is <?=$game->status?>.</p><?php
}
  } else {
    echo "<p>You do not have access to this page.</p>";
  }

} else {
    echo "<p>You do not have access to this page.</p>";
}

echo $OUTPUT->footer();

?>
