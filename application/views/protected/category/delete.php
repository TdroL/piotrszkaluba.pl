<?php defined('SYSPATH') or die('No direct script access.'); ?>

<section class="form">
	<h1>Usuń kategorię</h1>
	<?php echo $form->open() ?>
	
	<?php echo $form->errors() ?>
	
	<p>
		<?php echo $form->name->label() ?>
		<span><a href="<?php echo Route::url('category', array('link' => $form->link)) ?>"><?php echo Html::chars($form->name) ?></a></span>
	</p>

	<p>
		<?php echo $form->title->label() ?>
		<span><?php echo $form->title ?></span>
	</p>
	
	<p>
		<?php echo $form->projects->label() ?>
		<span>
			<?php if($form->projects->value()->count()): ?>
			Uwaga! pliki przypisane do tej kategorii zostaną również usunięte!
			<ul>
				<?php foreach($form->projects->value() as $project): ?>
				<li><a href="<?php echo Route::url('project', array('link' => $project->link)) ?>"><?php echo $project->title ?></a></li>
				<?php endforeach ?>
			</ul>
			<?php else: ?>
			Brak projektów w tej kategorii
			<?php endif ?>
		</span>
	</p>
	
	<p class="submit">
		<?php echo Form::submit('send', 'Usuń') ?>
	</p>
	
	<?php echo $form->close() ?>
</section>
