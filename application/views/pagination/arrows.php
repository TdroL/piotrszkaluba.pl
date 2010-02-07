			<div class="arrow_left">
<?php if($previous_page): ?>
				<a href="<?php echo $page->url($previous_page) ?>"><span><?php echo __('Previous') ?></span></a>
<?php endif ?>
			</div>
			<div class="arrow_right">
<?php if($next_page): ?>
				<a href="<?php echo $page->url($next_page) ?>"><span><?php echo __('Next') ?></span></a>
<?php endif ?>
			</div>
			
			<div id="loader"><span><?php echo __('Loading') ?></span></div>