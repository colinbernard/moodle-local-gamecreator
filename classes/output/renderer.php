<?php

namespace local_gamecreator\output;

defined('MOODLE_INTERNAL') || die;

use plugin_renderer_base;

class renderer extends plugin_renderer_base {
    /**
     * Defer to template.
     *
     * @param success_html $page
     *
     * @return string html for the page
     */
    public function render_success_html($page) {
        $data = $page->export_for_template($this);
        return parent::render_from_template('local_gamecreator/success_html', $data);
    }

    public function render_initial_html($page) {
        $data = $page->export_for_template($this);
        return parent::render_from_template('local_gamecreator/initial_html', $data);
    }

    public function render_approval_html($page) {
        $data = $page->export_for_template($this);
        return parent::render_from_template('local_gamecreator/approval_html', $data);     
    }
}
