<?php
/**
 * Created by PhpStorm.
 * User: bl4de
 * Date: 22.06.2014
 * Time: 00:03
 */

$_id = (isset($_GET['id']) && (int)$_GET['id'] > 0) ? $_GET['id'] : null;

$_edited = $this->getRows($this->execute('SELECT * FROM entry WHERE id = ' . $_id));
$_edited = $_edited[0];
$error = "";

if (!empty($_POST)) {
	$name = (isset($_POST['name']) && $_POST['name'] != "") ? $_POST['name'] : $_edited->name;
	$value = (isset($_POST['value']) && $_POST['value'] != "") ? $_POST['value'] : $_edited->value;
	$q = 'UPDATE entry SET name = "' . $name . '", value = "' . $value . '" WHERE id = ' . $_id;
	$res = $this->execute($q);

	if (@mysql_affected_rows($this->db) > 0) {
		header('Location: ?p=list');
	} else {
		$error = "Save record changes failed.";
	}
}


?>
<div>
	<p><?= $error ?></p>

	<form method="POST">
		<input name="name" value="<?= $_edited->name ?>" type="text"/>
		<input name="value" value="<?= $_edited->value ?>" type="text"/>
		<button class="btn" name="add" type="submit">Save changes</button>
	</form>
</div>