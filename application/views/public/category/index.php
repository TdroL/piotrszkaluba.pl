<?php defined('SYSPATH') or die('No direct script access.'); ?>

		<h1><?php echo $category->title ?></h1>

		<?php foreach($category->get('projects')->paginate()->execute() as $project): ?>
		<article class="project">
			<section>
				<h2><?php echo $project->name ?></h2>
				<p><?php echo $project->description ?></p>
				<?php if($project->medias>count()): ?>
				<p><a href="<?php echo Route::url('project', array('link' => $project->link)) ?>" title="Zobacz: <?php echo $project->category->title.' - '.$project->name ?>">Więcej</a></p>
				<?php endif ?>
			</section>
			<a href="<?php echo Route::url('project', array('link' => $project->link)) ?>" title="Zobacz: <?php echo $project->category->title.' - '.$project->name ?>"><img src="<?php echo Url::site('media/files/'.$project->file) ?>" alt="<?php echo $project->name ?>" /></a>
		</article>
		<?php endforeach ?>

		<?php echo $category->get('projects')->pagination() ?>
