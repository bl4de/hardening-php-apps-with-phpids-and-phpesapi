<?php
require_once 'bootstrap.php';
$Application = new Application();
try {
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf8">
        <title>Hardening PHP Applications Sample App</title>
    </head>
    <body>
        <nav>
            <a href="?p=home">Home page</a> |
            <a href="?p=list">List records</a> |
            <a href="?p=add">Add new</a> |
            <a href="?p=about">About</a>
        </nav>
        <div class="content">
            <?php $Application->displayPage( isset($_GET['p']) ? $_GET['p'] : "" ); ?>
        </div>
    </body>
</html>
<?php
} catch ( Exception $e ) {
    die( $e->getMessage() );
}
