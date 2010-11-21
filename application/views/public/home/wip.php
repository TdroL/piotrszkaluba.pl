<?php defined('SYSPATH') or die('No direct script access.'); ?>

		<h1><?php echo $category->title ?></h1>

		<?php foreach($projects->paginate()->execute() as $project): ?>
		<article class="project">
			<section>
				<h2><?php echo $project->name ?></h2>
				<p><?php echo $project->description ?></p>
				<p><a href="<?php echo Route::url('project', array('link' => $project->link)) ?>" title="Zobacz: <?php echo $project->name ?>">(Więcej)</a></p>
			</section>
			<a href="<?php echo Route::url('project', array('link' => $project->link)) ?>" title="Zobacz: <?php echo $project->name ?>"><img src="<?php echo Url::site('media/files/'.$project->file) ?>" alt="komraf" /></a>
		</article>
		<?php endforeach ?>

		<?php echo $projects->pagination() ?>
