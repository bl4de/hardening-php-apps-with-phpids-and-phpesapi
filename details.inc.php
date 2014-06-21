<?php
/**
 * Created by PhpStorm.
 * User: bl4de
 * Date: 22.06.2014
 * Time: 00:15
 */
$_id = (isset($_GET['id']) && (int)$_GET['id'] > 0) ? $_GET['id'] : null;

$d = $this->getRows($this->execute('SELECT * FROM entry WHERE id = ' . $_id));
$details = $d[0];

?>
<div>
	<h4>Details of record ID = <?= $details->id; ?></h4>

	<p>name: <?= $details->name; ?></p>

	<p>value: <?= $details->value; ?></p>
</div>
