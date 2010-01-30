<?php defined('SYSPATH') or die('No direct script access.'); ?>
<div class="portfolio">
	<div class="cv">
		<h2>Kontakt</h2>
		<div>
			<table class="kontakt">
			<tr>
				<td>						
					<b>Gg:</b> 3975885<br />
					<b>Email:</b> <?php echo html::mailto('urumbumburu@gmail.com') ?><br />
				</td>
				<td>
				<h3>Formularz kontaktowy</h3>
<?php if(!empty($errors)): ?>
				<ul class="error">
<?php foreach($errors as $v): ?>
					<li><?php echo rtrim($v, '.') ?>.</li>
<?php endforeach ?>
				</ul>
<?php endif ?>

<?php if(!empty($success)): ?>
				<div class="success">
					Wiadomość została wysłana.
				</div>
<?php endif ?>
				<?php echo form::open('contact') ?>
					<label for="iemail">Twój Email:</label><br/>
					<?php echo form::input('email', $post->email, array('id' => 'iemail')) ?>
					<br />
					<label for="icontent">Treść:</label><br/>
					<?php echo form::textarea('content', $post->content, array('rows' => 20, 'cols' => 60, 'id' => 'icontent')) ?>
					<br /><br />
					<?php echo form::submit('send', 'Wyślij') ?>
					<?php echo form::hidden('sand', $post->sand) ?>
				<?php echo form::close() ?>
				</td>
			</tr>
			</table>
		</div>
	</div>
</div>
<div class="cb"></div>