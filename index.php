<?php
require_once 'bootstrap.php';
try {
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf8">
        <title>Hardening PHP Applications Sample App</title>
    </head>

    <body>
        <?php $Application->displayPage( $_GET['p'] ); ?>
    </body>
</html>
<?php
} catch ( Exception $e ) {
    die( $e->getMessage() );
}
