
		<div class="title">
			Ostatnio zalogowani
		</div>
		<div class="box_1">
			<div class="top">
				<div class="left">
				</div>
				<div class="right">
				</div>
			</div>
			<div class="cb"></div>
			<div class="content">
				<ul class="last_login">
<?php foreach($users as $v): ?>
					<li><span><?php echo $v->nick ?></span> <small><?php echo date('d.m.Y H:i', $v->last_login) ?></small></li>
<?php endforeach ?>
				</ul>
			</div>
			<div class="bottom">
				<div class="left">
				</div>
				<div class="right">
				</div>
			</div>
			<div class="cb"></div>
		</div>