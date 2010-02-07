<div class="columns_1">
	<div class="column">
		<?php echo html::anchor('admin/categories/create', __('Create category'), array('class' => 'add')); ?>
		<br />
		<br />
		<div>
			<table class="table_1">
				<thead>
					<tr>
						<td class="imp_yel">
							<?php echo __('Category') ?>
						</td>
						<td>
							<?php echo __('Link') ?>
						</td>
						<td style="width: 6em" class="center">
							<?php echo __('No. of images') ?>
						</td>
						<td class="imp_blue options"><?php echo __('Options') ?></td>
					</tr>
				</thead>
				<tbody>
<?php if($categories->count()) foreach($categories as $v): ?>
					<tr class="<?php echo text::alternate ('even', 'odd') ?>">
						<td class="imp_yel"><?php echo $v->title ?></td>
						<td>
							<a href="<?php echo url::site('view/'. $v->link) ?>"><?php echo $v->link ?></a>
						</td>
						<td class="center">
							<a href="<?php echo url::site('admin/categories/index/only/'. $v->link) ?>" title="<?php echo __('Show images from category: :title', array(':title' => $v->title)) ?>"><?php echo $v->images->count_all() ?></a>
						</td>
						<td class="imp_blue">
							<a href="<?php echo url::site('admin/categories/update.'.$v->id) ?>"><?php echo html::image('media/admin/img/edit.png', array('title' => __('Update'))) ?></a>
							<a href="<?php echo url::site('admin/categories/delete.'.$v->id) ?>"><?php echo html::image('media/admin/img/erese.png', array('title' => __('Delete'))) ?></a>
					</tr>
<?php endforeach ?>
				</tbody>
			</table>
		</div>
	</div>
</div>