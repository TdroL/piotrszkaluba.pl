<div class="columns_1">
	<div class="column">
		<?php echo html::anchor('admin/pages/add', 'Dodaj nową stronę', array('class' => 'add')); ?>
		<br />
		<br />
		<div>
			<table class="table_1">
				<thead>
					<tr>
						<td<?php if($field == 'title') echo ' class="imp_yel"' ?>>
							Tytuł
							<a href="<?php echo url::site('admin/pages/sort/title/asc') ?>"><?php echo html::image('media/admin/img/arrow_up.png') ?></a>
							<a href="<?php echo url::site('admin/pages/sort/title') ?>"><?php echo html::image('media/admin/img/arrow_down.png') ?></a>
						</td>
						<td<?php if($field == 'link') echo ' class="imp_yel"' ?>>
							Link
							<a href="<?php echo url::site('admin/pages/sort/link/asc') ?>"><?php echo html::image('media/admin/img/arrow_up.png') ?></a>
							<a href="<?php echo url::site('admin/pages/sort/link') ?>"><?php echo html::image('media/admin/img/arrow_down.png') ?></a>
						</td>
						<td class="imp_blue options">Opcje</td>
					</tr>
				</thead>
				<tbody>
<?php if(count($pages)) foreach($pages as $v): ?>
					<tr class="<?php echo text::alternate ('even', 'odd') ?>">
						<td<?php if($field == 'title') echo ' class="imp_yel"' ?>><?php echo $v->title ?></td>
						<td<?php if($field == 'link') echo ' class="imp_yel"' ?>><?php echo html::anchor($v->link, $v->link) ?></td>
						<td class="imp_blue">
							<a href="<?php echo url::site('admin/pages/edit/'.$v->id) ?>"><?php echo html::image('media/admin/img/edit.png', array('alt' => 'Edytuj', 'title' => 'Edytuj')) ?></a>
							<a href="<?php echo url::site('admin/pages/del/'.$v->id) ?>"><?php echo html::image('media/admin/img/erese.png', array('alt' => 'Usuń', 'title' => 'Usuń')) ?></a>
						</td>
					</tr>
<?php endforeach ?>
				</tbody>
			</table>
		</div>
	</div>
</div>