<?php

class local_gamecreator_game_handler {

  private static $current_game = null;

  public static function set_current_game($index) {
    self::$current_game = self::get_all_games()[$index];
  }

  public static function get_current_game() {
    return self::$current_game;
  }

  public static function reset_current_game() {
    self::$current_game = null;
  }

  public static function get_all_games() {
  	return array(
      new local_gamecreator_game("Balloons", array("balloonsinfo1", "balloonsinfo2"), array("balloons_form1", "balloons_form2"), "balloons.php", 920, 720, true),
      new local_gamecreator_game("Arrange", array("arrangeinfo"), array("arrange_form"), "arrange.php", 600, 800)
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
