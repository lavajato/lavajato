<?php 

namespace senac\framework\actionResults;

use \senac\framework\Config;

class View implements IActionResult {
    public function __construct($viewModel, $view) {
        
        $model = $viewModel;
        
        require_once Config::$caminhoDasViews . "\\" . $view;
    }
}

?>