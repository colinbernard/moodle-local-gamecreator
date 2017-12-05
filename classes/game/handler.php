<?php

namespace local_gamecreator\game;

class handler {

  public static function set_current_game($index) {
    global $SESSION;
    $SESSION->current_game = self::get_all_games()[$index];
  }

  public static function get_current_game() {
    global $SESSION;
    if (isset($SESSION->current_game)) {
      return $SESSION->current_game;
    }
    return null;
  }

  public static function reset_current_game() {
    global $SESSION;
    unset($SESSION->current_game);
  }

  public static function get_all_games() {
  	return array(
      new game("Balloons", array("balloonsinfo1", "balloonsinfo2"), array("balloons_form1", "balloons_form2"), "balloons.php", 920, 720, true),
      new game("Arrange", array("arrangeinfo"), array("arrange_form"), "arrange.php", 600, 800)
    );
  }

  public static function get_all_game_names() {
  	$names = [];
  	foreach (self::get_all_games() as $game) {
  		$names[] = $game->name;
  	}

  	return $names;
  }

  public static function get_game_from_index($index) {
  	return self::get_all_games()[$index];
  }

}

?>
