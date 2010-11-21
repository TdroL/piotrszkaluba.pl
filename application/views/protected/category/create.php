<?php defined('SYSPATH') or die('No direct script access.'); ?>

<section class="form">
	<h1>Utwórz nową kategorię</h1>
	<?php echo $form->open() ?>
	
	<?php echo $form->errors() ?>
	
	<p>
		<?php echo $form->name->label() ?>
		<?php echo $form->name->input() ?>
	</p>

	<p>
		<?php echo $form->title->label() ?>
		<?php echo $form->title->input() ?>
	</p>

	<p>
		<?php echo $form->link->label() ?>
		<?php echo $form->link->input() ?>
		
		<small class="annotation">Pozostaw puste jeśli link ma zostać wygenerowany automatycznie.</small>
	</p>
	
	<p>
		<?php echo $form->keywords->label() ?>
		<?php echo $form->keywords->input() ?>
	</p>
	
	<p class="submit">
		<?php echo Form::submit('send', 'Utwórz') ?>
	</p>
	
	<?php echo $form->close() ?>
</section>
