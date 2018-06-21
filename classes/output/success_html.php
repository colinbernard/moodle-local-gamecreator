<?php


namespace local_gamecreator\output;

use renderable;
use renderer_base;
use templatable;
use stdClass;

class success_html implements renderable, templatable {

    var $link = null;
    var $width = null;
    var $height = null;

    public function __construct($link, $width, $height) {
        $this->link = $link;
        $this->width = $width;
        $this->height = $height;
    }

    /**                                                                                                                             
     * Export this data so it can be used as the context for a mustache template.
     *
     * @return stdClass
     */
    public function export_for_template(renderer_base $output) {
        $data = new stdClass();
        $data->link = $this->link;
        $data->width = $this->width;
        $data->height = $this->height;
        return $data;
    }
}
