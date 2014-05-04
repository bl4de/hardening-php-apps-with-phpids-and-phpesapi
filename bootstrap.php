<?php

// main application class
class Application {

    public function __construct() {}

    public function displayPage( $pageName ) {
        if ( file_exists( $pageName . ".inc.php" ) ) {
            include_once $pageName . ".inc.php";
        } else {
            throw new Exception("File not found", 1);
            
        }
    }
}

$Application = new Application();
