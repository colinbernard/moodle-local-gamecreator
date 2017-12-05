<?php

class local_gamecreator_game {
  var $name;
  var $info;
  var $game_forms;
  var $generator;
  var $width;
  var $height;
  var $requires_POST_data;

  var $form_index = 0;

  function __construct($name, $info, $game_forms, $generator, $width, $height, $requires_POST_data = false) {
    $this->name = $name;
    $this->info = $info;
    $this->game_forms = $game_forms;
    $this->generator = $generator;
    $this->width = $width;
    $this->height = $height;
    $this->requires_POST_data = $requires_POST_data;
  }

  function generate() {
    call_user_func('/../generator/' . $generator);
  }

  function display_first_form() {
    $class =  "\\local_gamecreator\\game_forms\\".$this->game_forms[0];
    $form = new $class();
    $form->display();
  }

  function display_next_form() {
    if ($form_index < count($game_forms) - 1) {
      $form_index++;
      $game_forms[$form_index]->display(); // show the form
      return true;
    }
    return false;
  }

  function display_previous_form() {
    if ($form_index - 1 >= 0) {
      $form_index--;
      $game_forms[$form_index]->display();
      return true;
    } else {
      return false;
    }
  }

}

?>
