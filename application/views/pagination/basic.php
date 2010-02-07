				<?php if ($first_page !== FALSE): ?>
					<a href="<?php echo $page->url($first_page) ?>"><?php echo __('First') ?></a>
				<?php else: ?>
					<a href="<?php echo $page->url($first_page) ?>" class="on"><?php echo __('First') ?></a>
				<?php endif ?>
	
					<a href="<?php echo $page->url($previous_page) ?>"><?php echo __('Previous') ?></a>
	
	
				<?php for ($i = 1; $i <= $total_pages; $i++): ?>
	
					<?php if ($i == $current_page): ?>
						<a href="<?php echo $page->url($i) ?>" class="on"><?php echo $i ?></a>
					<?php else: ?>
						<a href="<?php echo $page->url($i) ?>"><?php echo $i ?></a>
					<?php endif ?>
	
				<?php endfor ?>
	
					<a href="<?php echo $page->url($next_page) ?>"><?php echo __('Next') ?></a>
	
				<?php if ($last_page !== FALSE): ?>
					<a href="<?php echo $page->url($last_page) ?>"><?php echo __('Last') ?></a>
				<?php else: ?>
					<a href="<?php echo $page->url($last_page) ?>" class="on"><?php echo __('Last') ?></a>
				<?php endif ?>
