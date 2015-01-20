<html>
<head>
	<meta charset="utf-8">
	<meta content="Examenopdracht" name="description">
	<meta content="width=device-width, initial-scale=1" name="viewport">
	<title><?= $title; ?></title>
	<link href="<?= base_url();?>assets/css/style.css" rel="stylesheet" type="text/css" media="all">
</head>
<body>
	<div id="container">
	<header class="group">
		<div>
			<?= anchor('', 'Home') ?>
		</div>
		<nav>
			<ul>
			<?php if ($login!=false): ?>
				<li>
					<?= anchor('dashboard', 'Dashboard') ?>
				</li>
				<li>
					<?= anchor('todo', 'Todo\'s'); ?>
				</li>
				<li>
					<?= anchor('login/logout', 'Logout ('. $login .')'); ?>
				</li>
			<?php else: ?>
					<li>
						<?= anchor('login', 'Login') ?>
					</li>
					<li>
						<?= anchor('login/registreer_pagina', 'Registreer') ?>
					</li>
			<?php endif ?>
			</ul>
		</nav>
	</header>
	<?php if ($this->session->flashdata('errors')): ?>
		<div class="modal error"><?= $this->session->flashdata('errors') ?></div>
	<?php elseif ($this->session->flashdata('success')): ?>
		<div class="modal success"><?= $this->session->flashdata('success') ?></div>
	<?php endif ?>
