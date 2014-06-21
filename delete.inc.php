<?php
/**
 * Created by PhpStorm.
 * User: bl4de
 * Date: 22.06.2014
 * Time: 00:19
 */
$_id = (isset($_GET['id']) && (int)$_GET['id'] > 0) ? $_GET['id'] : null;
$error = "";

if ($_id > 0) {
	$q = 'DELETE FROM entry WHERE id = ' . $_id;
	$res = $this->execute($q);

	if (!$res) {
		$error = "Delete record failed";
	} else {
		header('Location: ?p=list');
	}
}
?>
<div>
	<p><?= $error; ?></p>
</div>