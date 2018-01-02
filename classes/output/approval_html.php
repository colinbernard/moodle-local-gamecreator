<?php


namespace local_gamecreator\output;

use renderable;
use renderer_base;
use templatable;
use stdClass;

class approval_html implements renderable, templatable {

    var $game = null;

    public function __construct($game) {
        $this->game = $game;
    }

    /**
     * Export this data so it can be used as the context for a mustache template.
     *
     * @return stdClass
     */
    public function export_for_template(renderer_base $output) {
        $data = new stdClass();

        $data = $game;

        return $data;
    }
}
