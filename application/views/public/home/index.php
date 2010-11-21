<?php defined('SYSPATH') or die('No direct script access.'); ?>

		<h1>Najnowszy projekt</h1>
		
		<section class="project latest">
			<a href="<?php echo Route::url('project', array('link' => $project->link)) ?>" title="Zobacz: <?php echo $project->category->title ?> - <?php echo $project->name ?>">
			<?php echo Html::image('media/files/'.$project->file, array('alt' => $project->name)) ?>
			</a>
		</section>

		<article id="about-me">
			<img src="<?php echo Url::site('media/images/logos/lion.jpg') ?>" alt="Piotr Szkałuba" />

			<p>
			Moje rodzinne miasto to <strong>Lublin</strong>. <br />
			Studiuję w Warszawie w Polsko Japońskiej Wyższej Szkole Technik Komputerowych na kierunku Sztuka Nowych Mediów oraz	pracuję jako <strong>grafik</strong> freelancer.
			Projektuję <strong>strony internetowe</strong> w Html i CSS zgodnie ze standardami W3C.
			<strong>Webdesign</strong> to moja pasja od kilku lat.
			Zajmuję się tworzeniem logotypów dla firm i banerów oraz kampaniami reklamowymi.
			Projektuję wizytówki, plakaty i ulotki. Zajmuję się także <strong>animacją Flash</strong> i grami w tej technologii.
			Wciąż pogłębiam swoją wiedzę w tej dziedzinie oraz poznaje nowe trendy.
			Hobbystycznie rysuję, maluję farbami akrylowymi oraz eksperymentuje z grafiką warsztatową.
			Od niedawna pasjonuję się fotografią amatorską.
			Moim marzeniem jest wyjazd do Japonii, kraju który łączy w sobie szacunek dla tradycji i umiłowanie postępu.<br /><br />
			</p>
		</article>

