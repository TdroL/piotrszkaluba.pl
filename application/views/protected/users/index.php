<div class="columns_1">
	<div class="column">
		<?php echo html::anchor('admin/users/create', 'Dodaj konto', array('class' => 'add')); ?>
		<br />
		<br />
		<div>
			<table class="table_1">
				<thead>
					<tr>
						<td<?php if($field == 'nick') echo ' class="imp_yel"' ?>>
							Nick
							<a href="<?php echo url::site('admin/users/sort/nick/asc') ?>"><?php echo html::image('media/admin/img/arrow_up.png') ?></a>
							<a href="<?php echo url::site('admin/users/sort/nick') ?>"><?php echo html::image('media/admin/img/arrow_down.png') ?></a>
						</td>
						<td<?php if($field == 'username') echo ' class="imp_yel"' ?>>
							Login
							<a href="<?php echo url::site('admin/users/sort/username/asc') ?>"><?php echo html::image('media/admin/img/arrow_up.png') ?></a>
							<a href="<?php echo url::site('admin/users/sort/username') ?>"><?php echo html::image('media/admin/img/arrow_down.png') ?></a>
						</td>
						<td class="imp_blue">Opcje</td>
					</tr>
				</thead>
				<tbody>
<?php foreach($users as $v): ?>
					<tr class="<?php echo text::alternate ('even', 'odd') ?>">
						<td<?php if($field == 'nick') echo ' class="imp_yel"' ?>>
<?php 	if(!$v->has('roles', $login)): ?>
							<em style="color: red"><?php echo $v->nick ?></em>
<?php 	elseif($v->has('roles', $admin)): ?>
							<b><?php echo $v->nick ?></b>
<?php 	else: ?>
							<?php echo $v->nick ?>
<?php 	endif ?>
						</td>
						<td<?php if($field == 'username') echo ' class="imp_yel"' ?>><?php echo $v->username ?></td>
						<td class="imp_blue">
							<a href="<?php echo url::site('admin/users/update.'.$v->id) ?>"><?php echo html::image('media/admin/img/edit.png', array('alt' => 'Edytuj', 'title' => 'Edytuj')) ?></a>
<?php if($v->id != $auth->id): ?>
							<a href="<?php echo url::site('admin/users/delete.'.$v->id) ?>"><?php echo html::image('media/admin/img/erese.png', array('alt' => 'Usuń', 'title' => 'Usuń')) ?></a>
<?php else: ?>
							<?php echo html::image('media/admin/img/erese.png', array('alt' => 'Usuń', 'title' => 'Usuń')) ?>

<?php endif ?>
							<?php echo html::anchor('admin/users/password.'.$v->id, 'Zmień hasło') ?>
<?php if($v->has('roles', $login)): ?>
							<?php echo html::anchor('admin/users/deactivate.'.$v->id, 'Deaktywuj') ?>
<?php else: ?>
							<?php echo html::anchor('admin/users/activate.'.$v->id, 'Aktywuj') ?>
<?php endif ?>
						</td>
					</tr>
<?php endforeach ?>
				</tbody>
			</table>
		</div>
	</div>
</div>