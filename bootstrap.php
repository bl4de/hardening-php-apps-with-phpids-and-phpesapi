<?php
// DB connection
// ini_set( 'display_errors', 1 );
// error_reporting( E_ALL );

// main application class
class Application {
    private $db_username = 'root';
    private $db_password = 'root';
    private $db;

    public function __construct() {
        $this->db = @mysql_connect( 'localhost', $this->db_username, $this->db_password );
        if ( is_resource( $this->db ) ) {
            mysql_select_db( 'sampleapp' );
        } else {
            throw new Exception( "Database connection error, could not connect to database :/" );
        }
    }

    public function displayPage( $pageName ) {

        if ( file_exists( $pageName . ".inc.php" ) ) {
            include_once $pageName . ".inc.php";
        } else {
            include_once "home.inc.php";
            // throw new Exception("File not found", 1);
        }
    }

    public function execute( $statement ) {
        return mysql_query( $statement, $this->db );
    }
}

$Application = new Application();
$Application->execute( "SELECT * FROM entry" );
