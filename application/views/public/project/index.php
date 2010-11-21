<?php defined('SYSPATH') or die('No direct script access.'); ?>

		<h1><?php echo $project->category->title ?></h1>
		<article class="project">
			<section>
				<h2><?php echo $project->name ?></h2>
				
				<p><?php echo $project->description ?></p>
			</section>
			
			<?php echo Html::image('media/files/'.$project->file, array('alt' => $project->name, 'title' => $project->name)) ?>
			
			<?php if($project->images->count()) foreach($project->images as $image): ?>
			<article class="image">
				<?php if(!empty($image->description)): ?>
				<p><b>(<?php echo date($date_long, $image->date) ?>)</b> <?php echo $image->description ?></p>
				<?php endif ?>
				<?php echo Html::image('media/files/'.$image->file, EParser::parse($image->attributes)) ?>
			</article>
			<?php endforeach ?>
		</article>
