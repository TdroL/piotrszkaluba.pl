
<section>
	<h1>Kategorie</h1>

	<div class="option-create">
		<a href="<?php echo Route::url('protected', array('controller' => 'category', 'action' => 'create')) ?>">Utwórz nową kategorię</a>
	</div>

	<?php foreach($categories->execute() as $category): ?>
	<article>
		<header>
			<div>
				<span>Nazwa:</span> 
				<span><?php echo Html::chars($category->name) ?></span>
			</div>
			<div>
				<span>Tytuł:</span> 
				<span><?php echo Text::limit_chars($category->title, 20) ?></span>
			</div>
			<div>
				<span>Projektów:</span> 
				<?php if(($count = $category->projects->count()) > 0): ?>
					<a href="<?php echo Route::url('protected', array('controller' => 'project', 'action' => 'index', 'id' => $category->link)) ?>"><?php echo $count ?></a>
				<?php else: ?>
					<span><?php echo $count ?></span>
				<?php endif ?>
			</div>
			<div class="options">
				<ul>
					<li><a href="<?php echo Route::url('protected', array('controller' => 'category', 'action' => 'update', 'id' => $category->link)) ?>">Edytuj</a></li>
					<li><a href="<?php echo Route::url('protected', array('controller' => 'category', 'action' => 'delete', 'id' => $category->link)) ?>" class="red">Usuń</a></li>
				</ul>
			</div>
		</header>
		<div class="clear"></div>
	</article>
	<?php endforeach ?>
</section>
