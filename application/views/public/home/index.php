<?php defined('SYSPATH') or die('No direct script access.'); ?>

	<div class="work">
		<a href="<?php echo Route::url('view-all') ?>" title="Obejrzyj moje portfolio"><img src="<?php echo Url::site('media/images/headers/btn_work.gif') ?>" alt="Portfolio" /></a>
		<ul>
		<?php foreach($categories->execute() as $category): ?>
			<?php // if($category->link == 'wip') continue ?>
			<li><a href="<?php echo Route::url('category', array('link' => $category->link)) ?>" title="<?php echo $category->title ?>"><?php echo Utf8::strtolower($category->name) ?></a></li>
		<?php endforeach ?>
		</ul>
	</div>
	<article class="about">
		<h2><img src="<?php echo Url::site('media/images/headers/about.gif') ?>" alt="O mnie" /></h2>
		Moje rodzinne miasto to <strong>Lublin</strong>. <br />
		Studiuję w Warszawie w Polsko Japońskiej Wyższej Szkole Technik Komputerowych na kierunku Sztuka Nowych Mediów oraz	pracuję jako <strong>grafik</strong> freelancer. 
		Projektuję <strong>strony internetowe</strong> w Html i CSS zgodnie ze standardami W3C.
		<strong>Webdesign</strong> to moja pasja od kilku lat. 
		Zajmuję się tworzeniem logotypów dla firm i banerów oraz kampaniami reklamowymi.
		Projektuję wizytówki, plakaty i ulotki. Zajmuję się także <strong>animacją Flash</strong> i grami w tej technologii. 
		Wciąż pogłębiam swoją wiedzę w tej dziedzinie oraz poznaje nowe trendy. 
		Hobbystycznie rysuję, maluję farbami akrylowymi oraz eksperymentuje z grafiką warsztatową. 
		Od niedawna pasjonuję się fotografią amatorską. 
		Moim marzeniem jest wyjazd do Japonii, kraju który łączy w sobie szacunek dla tradycji i umiłowanie postępu.<br />
	</article>
