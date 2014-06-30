<?php
/**
 * Created by PhpStorm.
 * User: bl4de
 * Date: 22.06.2014
 * Time: 00:15
 */

if (isset($_GET['id']) && $this->validator->isValidNumber("ID", $_GET['id'], 1) ) {
    $_id = $this->encoder->canonicalize($_GET['id']);
    $d = $this->getRows($this->execute('SELECT * FROM entry WHERE id = ' . $_id));
    $details = $d[0];
} else {
    $msg = "id is not a valid integer value!";
}

?>
<div>
    <?php
        if ($msg) {
            echo $msg;
        } else {
    ?>
	<h4>Details of record ID = <?= $details->id; ?></h4>

	<p>name: <?= $details->name; ?></p>

	<p>value: <?= $details->value; ?></p>
    <?php } ?>
</div>
