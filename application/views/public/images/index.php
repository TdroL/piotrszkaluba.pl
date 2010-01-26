<?php defined('SYSPATH') OR die('No direct access allowed.') ?>
<?php if(!empty($images)): ?>

			<?php echo $pagination ?>
			
			<div class="portfolio">
<?php foreach($images as $v): ?>
				<div class="box">
					<a href="<?php echo url::site('media/images/'.$v->image) ?>" title="<?php echo $v->title ?>" class="fancy">
						<?php echo html::image('media/images/'.$v->thumb, array('alt' => $v->title, 'title' => $v->title)) ?>
					</a>
				</div>
<?php endforeach ?>
				<div class="cb"></div>
			</div>
			<div class="cb pagination">
				<?php echo $pagination_bottom ?>
			</div>
<?php else: ?>
			<h1><?php echo __('No images') ?></h1>
<?php endif ?>