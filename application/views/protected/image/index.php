
<section>
	<hgroup>
		<h1>Obrazki</h1>
		<h2>Projekt: <a href="<?php echo Route::url('project', array('link' => $project->link)) ?>"><?php echo $project->name ?></a></h2>
	</hgroup>	

	<div class="option-create">
		<a href="<?php echo Route::url('protected', array('controller' => 'image', 'action' => 'create', 'id' => $project->link)) ?>">Dodaj nowy obrazek</a>
	</div>

	<?php if($images->count()): ?>
	<?php foreach($images->execute() as $image): ?>
	<article>
		<header>
			<div>
				<span>Plik:</span>
				<span><a href="<?php echo Url::site('media/files/'.$image->file) ?>" title="<?php echo $image->file ?>"><?php echo Text::limit_chars($image->file, 25) ?></a></span>
			</div>
			<div>
				<span>Data:</span>
				<span><?php echo date($date_long, $image->date) ?></span>
			</div>
			<div class="options">
				<ul>
					<li><a href="<?php echo Route::url('protected', array('controller' => 'image', 'action' => 'update', 'id' => $image->id)) ?>">Edytuj</a></li>
					<li><a href="<?php echo Route::url('protected', array('controller' => 'image', 'action' => 'delete', 'id' => $image->id)) ?>" class="red">Usuń</a></li>
				</ul>
			</div>
		</header>
		
		<div>
			<span>Atrybuty HTML:</span>
			<span><?php echo nl2br($image->attributes) ?></span>
		</div>
		
		<div>
			<span>Opis:</span>
			<span><?php echo Text::limit_words(Html::chars(strip_tags($image->description)), 15) ?></span>
		</div>
	</article>
	<?php endforeach ?>
	<?php else: ?>
	<article>
		<p>Brak obrazków dla tego projektu</p>
	</article>
	<?php endif ?>
	
</section>
