<?php


namespace local_gamecreator\output;                                                                                                         
 
use renderable;                                                                                                                     
use renderer_base;                                                                                                                  
use templatable;                                                                                                                    
use stdClass;                                                                                                                       
 
class success_html implements renderable, templatable {                                                                               

    var $link = null;                                                                                                
 
    public function __construct($link) {                                                                                        
        $this->link = $link;                                                                                   
    }
 
    /**                                                                                                                             
     * Export this data so it can be used as the context for a mustache template.                                                   
     *                                                                                                                              
     * @return stdClass                                                                                                             
     */                                                                                                                             
    public function export_for_template(renderer_base $output) {                                                                    
        $data = new stdClass();                                                                                                     
        $data->link = $this->link;                                                                
        return $data;                                                                                                               
    }
}