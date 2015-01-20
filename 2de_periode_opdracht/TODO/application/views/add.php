<?php echo validation_errors('<p class="error">', '</p>'); ?>
<div class="body">    
	<h1>Voeg een TODO-item toe</h1>

	<?= anchor('todo','Terug naar TODO-app'); ?>

		<?= form_open('add/toevoegen'); ?>
	
		<ul>
			<li>
	    		<p>
					<?= form_label('wat moet er gedaan worden?','description'); ?>
					<br />
					<?= form_input('description'); ?>
				</p>
			</li>
		</ul>
		<p>
			<?= form_submit('submit', 'toevoegen'); ?>
		</p>
</div>