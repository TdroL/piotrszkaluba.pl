				<?php for ($i = 1; $i <= $total_pages; $i++): ?>

					<?php if ($i == $current_page): ?>
						<a href="<?php echo $page->url($i) ?>" class="on"><?php echo $i ?></a>
					<?php else: ?>
						<a href="<?php echo $page->url($i) ?>"><?php echo $i ?></a>
					<?php endif ?>

				<?php endfor ?>

