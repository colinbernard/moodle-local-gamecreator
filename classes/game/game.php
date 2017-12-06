<?php

namespace local_gamecreator\game;


class game {

  var $name;
  var $info;
  var $game_forms;
  var $generator;
  var $width;
  var $height;
  var $requires_POST_data;

  var $form_index = 0;

  public function __construct($name, $info, $game_forms, $generator, $width, $height, $requires_POST_data = false) {
    $this->name = $name;
    $this->info = $info;
    $this->game_forms = $game_forms;
    $this->generator = $generator;
    $this->width = $width;
    $this->height = $height;
    $this->requires_POST_data = $requires_POST_data;
  }

  public function generate($data, $game_form) {
    return call_user_func_array('\\' . __NAMESPACE__ . "\\generator\\" . $this->generator . '::generate', array($data, &$game_form));
  }

  public function display_first_form() {
    $this->init_game_form(0)->display();
  }

  public function display_next_form($custom_data = null) {
    if ($this->form_index < count($this->game_forms) - 1) {
      $this->form_index++;
      $this->init_game_form($this->form_index, $custom_data)->display(); // show the form
      return true;
    }
    return false;
  }

  public function display_previous_form() {
    if ($this->form_index - 1 >= 0) {
      $this->form_index--;
      $this->init_game_form($this->form_index)->display(); // show the form
      return true;
    } else {
      return false;
    }
  }

  public function get_current_form($custom_data = null) {
    return $this->init_game_form($this->form_index, $custom_data);
  }

  public function get_current_info() {
    return $this->info[$this->form_index];
  }

  private function init_game_form($index, $custom_data = null) {
    $class =  "\\local_gamecreator\\game\\form\\" . $this->game_forms[$index];
    return new $class(null, $custom_data);
  }

}

?>
