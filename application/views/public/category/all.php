<?php defined('SYSPATH') or die('No direct script access.'); ?>

	<aside>
		<h2 class="hidden">Dostępne prace</h2>

		<span class="nav-up inactive"></span>
		<div id="side-nav">
			<ol class="clearfix">
			<?php $first = NULL; ?>
			<?php foreach($projects->execute() as $project): ?>
				<li<?php if ( ! isset($first)) { $first = $project; echo ' class="active"'; } ?>><a href="<?php echo Route::url('project', array('link' => $project->link)) ?>" title="Zobacz: <?php echo $project->name ?>"><?php echo $project->name ?></a></li>
			<?php endforeach ?>
			</ol>
		</div>
		<span class="nav-down inactive"></span>
	</aside>

	<?php if (isset($first)): ?>
	<article>
		<h1>Wszystkie prace - <?php echo $first->name ?></h1>
		<p><?php echo $first->description ?></p>

		<div class="underlay">
			<?php if ( ! empty($first->file)): ?>
			<p class="image">
				<?php echo Html::image('media/files/'.$first->file) ?>
			</p>
			<?php endif ?>

			<?php if($first->images->count()) foreach($first->images as $image): ?>
			<p class="image">
				<?php echo Html::image('media/files/'.$image->file, EParser::parse($image->attributes)) ?>
			</p>
			<?php endforeach ?>
		</div>
	</article>
	<?php else: ?>
	<article>
		<h1>Wszystkie prace</h1>

		<div class="underlay">
			<p>
				Brak materiałów.
			</p>
		</div>
	</article>
	<?php endif ?>
	<?php /*
	<article>
		<h1>Wszystkie prace</h1>

		<p>Wybierz pracę.</p>
	</article>
	}}
	*/
