<?php
// list of records
$list = $this->getRows( $this->execute("SELECT * FROM entry") );

?>
<div>
    <h3>List Of Records</h3>
	<table cellpadding="0" cellspacing="0" >
		<thead>
		<tr>
			<th>ID</th>
			<th>Name</th>
			<th>Value</th>
			<th>Options</th>
		</tr>
		</thead>
		<tbody>
		<?php foreach ($list as $key => $item) { ?>
			<tr>
				<td><?= $item->id; ?></td>
				<td><?= $item->name; ?></td>
				<td><?= $item->value; ?></td>
				<td>
					<a href="?p=details&id=<?= $item->id; ?>">details</a>
					<a href="?p=edit&id=<?= $item->id; ?>">edit</a>
					<a href="?p=delete&id=<?= $item->id; ?>">delete</a>
				</td>
			</tr>
		<?php } ?>
		</tbody>
	</table>
</div>