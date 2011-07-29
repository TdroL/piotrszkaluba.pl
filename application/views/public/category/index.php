<?php defined('SYSPATH') or die('No direct script access.'); ?>

	<aside>
		<h2 class="hidden">Dostępne prace</h2>

		<span class="nav-up inactive"></span>
		<div id="side-nav">
			<ol>
			<?php foreach($category->projects as $project): ?>
				<li><a href="<?php echo Route::url('project', array('link' => $project->link)) ?>" title="Zobacz: <?php echo $project->name ?>"><?php echo $project->name ?></a></li>
			<?php endforeach ?>
			</ol>
		</div>
		<span class="nav-down inactive"></span>
	</aside>

	<article>
		<h1><?php echo $category->title ?></h1>
	</article>
