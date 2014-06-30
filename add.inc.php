<?php
/**
 * Created by PhpStorm.
 * User: bl4de
 * Date: 21.06.2014
 * Time: 23:30
 */
$value = (isset($_POST['value']) && $_POST['value'] != "") ? $_POST['value'] : "";
$name = (isset($_POST['name']) && $_POST['name'] != "") ? $_POST['name'] : "";

$error = "";

if (!empty($_POST)) {
	if ($this->validator->isValidIsoCode("ISO code", $_POST['value'], 2, 2) ) {
		$value = strtoupper($_POST['value']);
	} else {
		$value = "??";
	}

	$q = 'INSERT INTO entry (name, value) VALUES ("' . $name . '", "' . $value . '")';
	$res = $this->execute($q);

	if (@mysql_insert_id($this->db) > 0) {
		header('Location: ?p=list');
	} else {
		$error = "Add new record failed.";
	}
}


?>
<div>
	<p><?= $error ?></p>

	<form method="POST">
		<input name="name" value="<?= $name ?>" type="text"/>
		<input name="value" value="<?= $value ?>" type="text"/>
		<button class="btn" name="add" type="submit">Add new record</button>
	</form>
</div>