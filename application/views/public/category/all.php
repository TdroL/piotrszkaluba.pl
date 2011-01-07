<?php defined('SYSPATH') or die('No direct script access.'); ?>
	
	<h2>Moje prace</h2>
	<section class="gallery">
		<?php foreach($projects->paginate()->execute() as $project): ?>
		<article class="box">
			<a href="<?php echo Route::url('project', array('link' => $project->link)) ?>" title="Zobacz: <?php echo $project->category->title.' - '.$project->name ?>"><img src="<?php echo Url::site('media/files/'.$project->file) ?>" alt="<?php echo $project->name ?>" /></a>
			<div class="desc" title="<?php echo Html::chars(strip_tags($project->description)) ?>">
				<b><?php echo $project->name ?></b>
				<p><?php echo Text::limit_words(strip_tags($project->description), 5) ?></p>
			</div>
		</article>
		<?php endforeach ?>
	</section>
	<?php echo $projects->pagination() ?>