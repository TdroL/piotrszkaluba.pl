				<?php if ($first_page !== FALSE): ?>
					<a href="<?php echo $page->url($first_page) ?>">Pierwsza</a>
				<?php else: ?>
					<a href="<?php echo $page->url($first_page) ?>" class="on">Pierwsza</a>
				<?php endif ?>
	
					<a href="<?php echo $page->url($previous_page) ?>">Poprzednia</a>
	
	
				<?php for ($i = 1; $i <= $total_pages; $i++): ?>
	
					<?php if ($i == $current_page): ?>
						<a href="<?php echo $page->url($i) ?>" class="on"><?php echo $i ?></a>
					<?php else: ?>
						<a href="<?php echo $page->url($i) ?>"><?php echo $i ?></a>
					<?php endif ?>
	
				<?php endfor ?>
	
					<a href="<?php echo $page->url($next_page) ?>">Następna</a>
	
				<?php if ($last_page !== FALSE): ?>
					<a href="<?php echo $page->url($last_page) ?>">Ostatnia</a>
				<?php else: ?>
					<a href="<?php echo $page->url($last_page) ?>" class="on">Ostatnia</a>
				<?php endif ?>
