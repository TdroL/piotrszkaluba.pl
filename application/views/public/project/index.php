<?php defined('SYSPATH') or die('No direct script access.'); ?>

	<aside>
		<h2 class="hidden">Dostępne prace</h2>

		<span class="nav-up inactive"></span>
		<div id="side-nav">
			<ol>
			<?php foreach($project->category->projects as $project): ?>
			<?php $url = Route::url('project', array('link' => $project->link)) ?>
				<li<?php echo strpos(Request::current()->url(), $url) !== FALSE ? ' class="active"' : NULL ?>><a href="<?php echo $url ?>" title="Zobacz: <?php echo $project->name ?>"><?php echo $project->name ?></a></li>
			<?php endforeach ?>
			</ol>
		</div>
		<span class="nav-down inactive"></span>
	</aside>

	<article>
		<h1><?php echo $project->category->name ?> - <?php echo $project->name ?></h1>
		<p><?php echo $project->description ?></p>

		<div class="underlay">
			<p class="image">
				<?php echo Html::image('media/files/'.$project->file) ?>
			</p>

			<?php if($project->images->count()) foreach($project->images as $image): ?>
			<p class="image">
				<?php echo Html::image('media/files/'.$image->file, EParser::parse($image->attributes)) ?>
			</p>
			<?php endforeach ?>
		</div>
	</article>
