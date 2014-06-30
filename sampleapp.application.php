<?php

// main application class
class Application {
    private $db_username = 'root';
    private $db_password = 'root';
    private $db;

    private $ESAPI;
    private $validator;
    private $encoder;

    private $ids;
    private $idsConfig;


    public function __construct() {
        $this->db = @mysql_connect( 'localhost', $this->db_username, $this->db_password );
        if ( is_resource( $this->db ) ) {
            mysql_select_db( 'sampleapp' );
        } else {
            throw new Exception( "Database connection error, could not connect to database :/" );
        }

        // ESAPI
        $this->ESAPI = new ESAPI( 'esapi/ESAPI.xml' );
        ESAPI::setValidator( new SampleappValidator() );
        ESAPI::setEncoder( new DefaultEncoder() );
        $this->validator = ESAPI::getValidator();
        $this->encoder = ESAPI::getEncoder();

        // PHPIDS
        $request = array(
            'GET' => $_GET,
            'POST' => $_POST,
            'COOKIE' => $_COOKIE
        );

        $this->idsConfig = IDS\Init::init( 'IDS/Config/Config.ini.php' );
        $this->ids = new IDS\Monitor( $this->idsConfig );

        $this->runIds( $request );
    }

    private function runIds( $request ) {
        $res = $this->ids->run( $request );

        if ( !$res->isEmpty() ) {
            // echo $res;
            $log = new IDS_Log_Composite();
            $log->addLogger( IDS_Log_File::getInstance( $this->idsConfig ) );
            $log->execute( $res );
        }
    }

    public function displayPage( $pageName ) {

        if ( file_exists( $pageName . ".inc.php" ) ) {
            include_once $pageName . ".inc.php";
        } else {
            include_once "home.inc.php";
        }
    }

    public function execute( $statement ) {
        return mysql_query( $statement, $this->db );
    }


    public function getRows( $result ) {
        if ( $result ) {
            $rows = array();
            while ( $row = @mysql_fetch_object( $result ) ) {
                array_push( $rows, $row );
            }
            return $rows;
        }
        return false;
    }
}
