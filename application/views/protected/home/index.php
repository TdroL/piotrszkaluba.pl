
<section>
	<h1>Ostatnie kontakty</h1>
<?php if($contacts->count()): ?>
<?php foreach($contacts->limit(10)->execute() as $contact): ?>
	<article>
		<header>
			<div>
				<span>Email:</span> 
				<span><?php echo $contact->from ?></span>
			</div>
			<div>
				<span>Data:</span> 
				<span><time datetime="<?php echo date('Y-m-d\TH:i:s', $contact->date) ?>"><?php echo date('Y.m.d H:i', $contact->date) ?><time></span>
			</div>
		</header>
		
		<div>
			<span>Treść:</span>
			<span><?php echo $contact->content ?></span>
		</div>
	</article>
<?php endforeach ?>
<?php else: ?>
	<article>
		<h2>Brak wiadomości</h2>
	</article>
<?php endif ?>
	
</section>