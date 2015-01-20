<?php echo validation_errors('<p class="error">', '</p>'); ?>
<div class="body">
	<h1><?= $title; ?></h1>
	<?= form_open('login/validate_form'); ?>
	<?= form_hidden('type',$type) ?>
		<p>
			<?= form_label('Email','email'); ?>
			<br />
			<?= form_input('email'); ?>
		</p>
		<p>
			<?= form_label('Paswoord','password'); ?>
			<br />
			<?= form_password('password'); ?>
		</p>
		<p>
			<?= form_submit('login', $type); ?>
		</p>
	</form>
</div>