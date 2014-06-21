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
		</tr>
		</thead>
		<tbody>
		<?php foreach ($list as $key => $item) { ?>
			<tr>
				<td><?= $item->id; ?></td>
				<td><?= $item->name; ?></td>
				<td><?= $item->value; ?></td>
			</tr>
		<?php } ?>
		</tbody>
	</table>
</div>