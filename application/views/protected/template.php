<<?php ?>?xml version="1.0" encoding="utf-8"?<?php ?>>
<!DOCTYPE html 
	 PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
	"http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xml:lang="pl" xmlns="http://www.w3.org/1999/xhtml" lang="pl">
<head>
	<title>Panel administracyjny</title>
	<meta http-equiv="Content-type" content="text/html; charset=utf-8" />
	<meta http-equiv="content-language" content="pl" />
	<?php echo html::style('media/admin/style.css') ?>
	<?php echo html::script('media/js/jquery-1.4.min.js') ?>
</head>
<body>
	<div id="all">
		<div id="top">
			<a href="<?php echo url::site('') ?>" class="logotype">
				<?php echo html::image('media/admin/img/logotype.png') ?>
			</a>
			<div class="logout">
				<a href="<?php echo url::site('admin/main') ?>" class="home">
					<?php echo html::image('media/admin/img/panel_title.png') ?>
				</a><br />
				Jesteś zalogowany jako: <?php echo $user->nick ?>
				<a href="<?php echo url::site('admin/logout') ?>">WYLOGUJ</a>
			</div>
			<div class="cb"></div>
			<div class="menu_left">
				<div class="menu_right">
					<div class="menu_center">
						<div>
						<a href="<?php echo url::site('admin/main') ?>">Home</a> | 
<?php
					$links = array(
						'admin/images'		=> 'Obrazki',
						'admin/categories'	=> 'Kategorie',
						'admin/pages'		=> 'Strony',
						'admin/users'		=> 'Konta',
						'admin/logs'		=> 'Logi',
					);
					
					foreach($links as $k => $v)
					{
						$role = explode('/', $k);
						if($user->has($role[1]))
						{
							$links[$k] = '<a href="'.url::site($k).'">'.$v.'</a>';
						}
						else
						{
							unset($links[$k]);
						}
					}
					
					echo join(" | ", $links);
?>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div id="content">
			<?php echo $content ?>
		</div>
		<div id="footer" class="cb">
			<a href="#" style="display: block; float: right;margin-top: -8px;"><?php echo html::image('media/admin/img/ps.png') ?></a>
				<small class="cb">
					Rendered in <?php echo number_format(microtime(TRUE) - KOHANA_START_TIME, 5).' seconds' ?> seconds using <?php echo number_format((memory_get_peak_usage() - KOHANA_START_MEMORY) / 1024, 2).'KB' ?> of memory.<br />
				</small>
		</div>
	</div>
</body>
</html>



