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
    unset($SESSION->last_created_folder_name); // Applies to games requiring a folder with only one form.

    foreach (self::get_all_games() as $game) {
  		$game->form_index = 0;
  	}

  }

  public static function get_all_games() {
  	return array(
      new game("Balloons", array("balloonsinfo1", "balloonsinfo2"), array("balloons_form1", "balloons_form2"), "balloons", 920, 720, true),
      new game("Arrange", array("arrangeinfo"), array("arrange_form"), "arrange", 600, 700),
      new game("Categories2", array("categories2info"), array("categories2_form"), "categories2", 600, 700),
      new game("Categories3", array("categories3info"), array("categories3_form"), "categories3", 600, 700),
      new game("Spider Love", array("spiderloveinfo"), array("spiderlove_form"), "spiderlove", 600, 700),
      new game("Venn Diagram", array("venndiagraminfo1", "venndiagraminfo2"), array("venn_diagram_form1", "venn_diagram_form2"), "venn_diagram", 660, 490),
      new game("Image Labelling", array("imagelabelsinfo", "imagelabelsinfo2"), array("image_labels_form1", "image_labels_form2"), "image_labels", 560, 610),
      new game("Invaders", array("invadersinfo", "invadersinfo2"), array("invaders_form1", "invaders_form2"), "invaders", 910, 710, true)
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

  public static function set_custom_data($data) {
    global $SESSION;
    $SESSION->custom_data = $data;
  }

  public static function clear_custom_data() {
    global $SESSION;
    unset($SESSION->custom_data);
  }

  public static function get_custom_data() {
    global $SESSION;

    if (isset($SESSION->custom_data)) {
      return $SESSION->custom_data;
    }
    return null;
  }


}

?>
