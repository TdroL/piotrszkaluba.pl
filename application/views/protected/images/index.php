<div class="columns_1">
	<div class="column">
		<?php echo html::anchor('admin/images/create', __('Create image'), array('class' => 'add')); ?>
		<br />
<?php if($categories->count()): ?>
		<br />
		<b><?php echo __('Categories:') ?></b>
		<ul class="categories_list">
			<li><a href="<?php echo url::uri(array('category' => NULL, 'field' => NULL, 'sort' => NULL)) ?>" class="all"><?php echo __('Show all images') ?></a></li>
<?php foreach($categories as $v): ?>
			<li><a href="<?php echo url::uri(array('category' => $v->link, 'field' => NULL, 'sort' => NULL)) ?>"><?php echo ($category == $v->link ? '<b>'.$v->title.'</b>' : $v->title) ?></a></li>
<?php endforeach ?>
		</ul>
<?php endif ?>
		<br />
		<div>
			<table class="table_1">
				<thead>
					<tr>
						<td<?php if($field == 'title') echo ' class="imp_yel"' ?>>
							<?php echo __('Title') ?>
							<a href="<?php echo url::uri(array('field' => 'title', 'sort' => 'asc')) ?>"><?php echo html::image('media/admin/img/arrow_up.png') ?></a>
							<a href="<?php echo url::uri(array('field' => 'title', 'sort' => NULL)) ?>"><?php echo html::image('media/admin/img/arrow_down.png') ?></a>
						</td>
						<td<?php if($field == 'date') echo ' class="imp_yel"' ?>>
							<?php echo __('Date') ?>
							<a href="<?php echo url::uri(array('field' => 'date', 'sort' => NULL)) ?>"><?php echo html::image('media/admin/img/arrow_up.png') ?></a>
							<a href="<?php echo url::uri(array('field' => 'date', 'sort' => NULL)) ?>"><?php echo html::image('media/admin/img/arrow_down.png') ?></a>
						</td>
						<td<?php if($field == 'category') echo ' class="imp_yel"' ?>>
							<?php echo __('Category') ?>
							<a href="<?php echo url::uri(array('field' => 'category', 'sort' => 'asc')) ?>"><?php echo html::image('media/admin/img/arrow_up.png') ?></a>
							<a href="<?php echo url::uri(array('field' => 'category', 'sort' => NULL)) ?>"><?php echo html::image('media/admin/img/arrow_down.png') ?></a>
						</td>
						<td class="imp_blue options"><?php echo __('Options') ?></td>
					</tr>
				</thead>
				<tbody>
<?php if(!empty($images)) foreach($images as $v): ?>
					<tr class="<?php echo text::alternate ('even', 'odd') ?>">
						<td<?php if($field == 'title') echo ' class="imp_yel"' ?>><?php echo $v->title ?></td>
						<td<?php if($field == 'date') echo ' class="imp_yel"' ?>><?php echo date('d.m.Y H:i', $v->date) ?></td>
						<td<?php if($field == 'category') echo ' class="imp_yel"' ?>><?php echo (empty($v->category) ? 'Brak' : html::anchor('admin/images/index/only/'.$v->category->link, $v->category->title)) ?></td>
						<td class="imp_blue">
							<a href="<?php echo url::site('admin/images/update.'.$v->id) ?>"><?php echo html::image('media/admin/img/edit.png', array('alt' => 'Edytuj', 'title' => __('Update'))) ?></a>
							<a href="<?php echo url::site('admin/images/delete.'.$v->id) ?>"><?php echo html::image('media/admin/img/erese.png', array('alt' => 'Usuń', 'title' => __('Delete'))) ?></a>
					</tr>
<?php endforeach ?>
				</tbody>
			</table>
			<div class="center">
				<?php echo $pagination; ?>
			</div>
		</div>
	</div>
</div>