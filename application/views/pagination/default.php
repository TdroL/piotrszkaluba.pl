<div class="pagination">
	<?php if ($first_page !== FALSE): ?>
		<a href="<?php echo $page->url($first_page) ?>"><?php echo 'Pierwsza' ?></a>
	<?php else: ?>
		<span><?php echo 'Pierwsza' ?></span>
	<?php endif ?>

	<?php if ($previous_page !== FALSE): ?>
		<a href="<?php echo $page->url($previous_page) ?>"><?php echo 'Poprzednia' ?></a>
	<?php else: ?>
		<span><?php echo 'Poprzednia' ?></span>
	<?php endif ?>

	<?php for ($i = 1; $i <= $total_pages; $i++): ?>

		<?php if ($i == $current_page): ?>
			<strong><?php echo $i ?></strong>
		<?php else: ?>
			<a href="<?php echo $page->url($i) ?>"><?php echo $i ?></a>
		<?php endif ?>

	<?php endfor ?>

	<?php if ($next_page !== FALSE): ?>
		<a href="<?php echo $page->url($next_page) ?>"><?php echo 'Następna' ?></a>
	<?php else: ?>
		<span><?php echo 'Następna' ?></span>
	<?php endif ?>

	<?php if ($last_page !== FALSE): ?>
		<a href="<?php echo $page->url($last_page) ?>"><?php echo 'Ostatnia' ?></a>
	<?php else: ?>
		<span><?php echo 'Ostatnia' ?></span>
	<?php endif ?>
</div>