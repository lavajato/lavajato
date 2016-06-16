<?php 

namespace senac\lavajato\actionResults;

use \senac\lavajato\AppConfig;

class View implements IActionResult {
    public function __construct($viewModel, $view) {
        
        $model = $viewModel;
        
        require_once AppConfig::$caminhoDasViews . "\\" . $view;
    }
}

?>