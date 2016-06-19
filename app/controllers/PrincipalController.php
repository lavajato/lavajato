<?php
 
namespace senac\lavajato\controllers;

use senac\framework\controllers\Controller;

class PrincipalController extends Controller {
    public function __construct() {

    }

    public function index() {
        return parent::view();
    }
}

?>