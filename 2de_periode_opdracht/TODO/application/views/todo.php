<div class='body'>
<h1>De TODO-app</h1>

			<?php if(empty($todos) && empty($dones)): ?>
				Nog geen todo-items.
			<?php else: ?>
				<h2>Wat moet er allemaal gebeuren?</h2>
			<?php endif; ?>

			<p><?= anchor('add','Voeg item toe'); ?></p>

		<?php if(!empty($todos) OR !empty($dones)): ?>

			<h3>Todo</h3>

				<?php if($todos): ?>
					<ul class="list">
						<?php foreach($todos as $todo): ?>
							<li class="todo">
								<span class="activate" title="Vink maar af"><?= anchor('todo/activate/'.$todo->ID,' ','class="icon fontawesome-ok-sign"'); ?></span>
					        	<span class="text"><?= $todo->omschrijving; ?></span>
					        	<span class="delete" title="Verwijder dit maar"><?= anchor('todo/delete/'.$todo->ID,' ','class="icon fontawesome-remove"'); ?></span>
							</li>
						<?php endforeach; ?>
					</ul>
				<?php else: ?>
					<p>Allright, all done!</p>
				<?php endif; ?>
				    

			<h3>Done</h3>

				<?php if($dones): ?>
					<ul class="list">
						<?php foreach($dones as $done): ?>
							<li class="done">
								<span class="activate" title="Oeps, dit moet nog gedaan worden"><?= anchor('todo/activate/'.$done->ID,' ','class="icon fontawesome-ok-sign"'); ?></span>
					        	<span class="text"><?= $done->omschrijving; ?></span>
					        	<span class="delete" title="Verwijder dit maar"><?= anchor('todo/delete/'.$done->ID,' ','class="icon fontawesome-remove"'); ?></span>
							</li>
						<?php endforeach; ?>
					</ul>
				<?php else: ?>
					<p>Damn, werk aan de winkel...</p>
				<?php endif; ?>
		<?php endif; ?>
</div>