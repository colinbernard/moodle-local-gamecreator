<?php


namespace local_gamecreator\output;                                                                                                         
 
use renderable;                                                                                                                     
use renderer_base;                                                                                                                  
use templatable;                                                                                                                    
use stdClass;                                                                                                                       
 
class initial_html implements renderable, templatable {                                                                                                                                                                         
 
    public function __construct() {                                                                                        
                                                                 
    }
 
    /**                                                                                                                             
     * Export this data so it can be used as the context for a mustache template.                                                   
     *                                                                                                                              
     * @return stdClass                                                                                                             
     */                                                                                                                             
    public function export_for_template(renderer_base $output) {                                                                    
        $data = new stdClass();                                                                                                                                                               
        return $data;                                                                                                               
    }
}