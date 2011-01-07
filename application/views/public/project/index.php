<?php defined('SYSPATH') or die('No direct script access.'); ?>

		<article class="project">
			<header>
				<h1><?php echo $project->name ?></h1>
				
				<p><?php echo $project->description ?></p>
			</header>
			
			<?php if($project->images->count()) foreach($project->images as $image): ?>
			<figure class="image">
				<?php echo Html::image('media/files/'.$image->file, EParser::parse($image->attributes)) ?>
			</figure>
			<?php endforeach ?>
		</article>
