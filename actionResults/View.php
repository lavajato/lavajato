<?php 

namespace senac\lavajato\actionResults;

class View implements IActionResult {

    public function __construct($caminhoDaView) {
        require VIEWS."\\".$caminhoDaView;
    }
}

?>