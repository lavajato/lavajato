<?php
 
 namespace senac\lavajato\controllers;

class PrincipalController extends Controller {
    public function __construct() {

    }

    public function index() {
        return parent::view();
    }
}

?>