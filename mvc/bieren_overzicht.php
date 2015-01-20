<table>
	<?php //var_dump($data) ?>
	<?php foreach ($bieren as $bier):  ?>
		<tr>
			<td><?= $bier['naam'] ?></td>
		</tr>
	<?php endforeach ?>
</table>