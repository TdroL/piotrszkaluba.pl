<?php if(empty($dir)): ?>
	<?php echo __('Log is empty') ?>
<?php else: ?>
		<ul>
<?php foreach($dir as $y => $ms): ?>
			<li>
				<?php echo $y ?>
				<ul>
<?php 	foreach($ms as $m => $ds): ?>
					<li>
						<?php echo __(Controller_Protected_Logs::get_month($m)) ?>
						<ul>
<?php 		foreach($ds as $d => $fn): ?>
							<li<?php echo ($active == $fn) ? ' class="active"' : NULL ?>><a href="<?php echo url::site('admin/logs/'.$fn) ?>"><?php echo $d ?></a></li>
<?php 		endforeach ?>
						</ul>
					</li>
<?php 	endforeach ?>
				</ul>
			</li>
<?php endforeach ?>
		</ul>
<?php endif ?>