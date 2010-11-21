
<section>
	<h1>Projekty</h1>

	<ul class="horizontal">
		<li<?php if(!$request->param('id')) echo ' class="active"' ?>>
			<a href="<?php echo Route::url('protected', array('controller' => 'project', 'action' => 'index')) ?>">Wszystkie</a>
			(<?php echo $projects->count() ?>)
		</li>
		<?php foreach($categories->execute() as $category): ?>
		<li<?php if($request->param('id') == $category->link) echo ' class="active"' ?>>
			<a href="<?php echo Route::url('protected', array('controller' => 'project', 'action' => 'index', 'id' => $category->link)) ?>"><?php echo $category->name ?></a>
			(<?php echo $category->projects->count() ?>)
		</li>
		<?php endforeach ?>
	</ul>

	<hr class="clear" />

	<div class="option-create">
		<a href="<?php echo Route::url('protected', array('controller' => 'project', 'action' => 'create')) ?>">Utwórz nowy projekt</a>
	</div>

	<?php if($projects->count()): ?>
	<?php foreach($projects->execute() as $project): ?>
	<article>
		<header>
			<div>
				<span>Nazwa:</span>
				<span><?php echo Html::chars($project->name) ?></span>
			</div>
			<div>
				<span>Plik:</span>
				<span><a href="<?php echo Url::site('media/files/'.$project->file) ?>" title="<?php echo $project->file ?>"><?php echo Text::limit_chars($project->file, 25) ?></a></span>
			</div>
			<div>
				<span>Kategoria:</span>
				<span><a href="<?php echo Route::url('protected', array('controller' => 'project', 'action' => 'index', 'id' => $project->category->link)) ?>" title="<?php echo $project->category->name ?>"><?php echo $project->category->name ?></a></span>
			</div>
			<div class="options">
				<ul>
					<li><a href="<?php echo Route::url('protected', array('controller' => 'project', 'action' => 'update', 'id' => $project->link)) ?>">Edytuj</a></li>
					<li><a href="<?php echo Route::url('protected', array('controller' => 'project', 'action' => 'delete', 'id' => $project->link)) ?>" class="red">Usuń</a></li>
				</ul>
			</div>
			<div class="new-line">
				<span>Obrazków:</span>
				<?php if($count = $project->images->count()): ?>
					<span><a href="<?php echo Route::url('protected', array('controller' => 'image', 'action' => 'index', 'id' => $project->link)) ?>"><?php echo $count ?></a></span>
				<?php else: ?>
					<span>0</span>
				<?php endif ?>
			</div>
			<div class="options longer">
				<ul>
					<?php if($count): ?>
					<li><a href="<?php echo Route::url('protected', array('controller' => 'image', 'action' => 'index', 'id' => $project->link)) ?>">Zarządzaj obrazkami</a></li>
					<?php endif ?>
					<li><a href="<?php echo Route::url('protected', array('controller' => 'image', 'action' => 'create', 'id' => $project->link)) ?>">Dodaj obrazek</a></li>
				</ul>
			</div>
		</header>
		
		<div>
			<span>Opis:</span>
			<span><?php echo Text::limit_words(Html::chars(strip_tags($project->description)), 15) ?></span>
		</div>
	</article>
	<?php endforeach ?>
	<?php else: ?>
	<article>
		<p>Brak projektów w tej kategorii</p>
	</article>
	<?php endif ?>
	
</section>
