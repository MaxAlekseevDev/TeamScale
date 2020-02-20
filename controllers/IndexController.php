<?php

class IndexController {

    
    public function renderPage($page) {

        require_once "views/{$page}.php";
    }


}



?>