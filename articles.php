<?php
	try {
		$bdd = new PDO('mysql:host=localhost;dbname=rj', 'root', '');
	} catch (Exception $e) {
		try {
			$bdd = new PDO('mysql:host=localhost;dbname=rprevost', 'rprevost', '05?ZbXQq03');
		} catch (Exception $e) {
			die('Erreur : ' . $e->getMessage());
		}
	}

	$nb_articles = $bdd->query('SELECT COUNT(*) AS count FROM articles')->fetch()['count'];
	
	$chemin = 'img/pictures/article-size/';
	
	if (isset($_GET['input'])) {
		$_GET['input'] = (int) $_GET['input'];
		if ($_GET['input'] >= 1 && $_GET['input'] <= $nb_articles) {
		
			$art_wanted = $nb_articles - $_GET['input'] + 1;
			
			if ($art_wanted != 1) {
			
				$articles = $bdd->prepare('SELECT id, DAY(date) AS day, MONTH(date) AS month, YEAR(date) AS year, titre_lieux, adresse_lieux, titre, texte FROM articles WHERE id = ?');
				$articles->execute(array($art_wanted));

				$article = $articles->fetch();
							
				$photos = $bdd->prepare('SELECT * FROM photos WHERE id_linked=? AND main = 1');
				$photos->execute(array($art_wanted));
				$photo = $photos->fetch();
		?>
	<div id="pacote_articles">
		<article id=<?php echo '"art'.$art_wanted.'"' ?>>
			<h2><?php echo utf8_encode($article['titre']) ?></h2>
			<div class="info_plus">
			<span class="zone_calendrier">
				<p><img src="img/system/calendrier.png" alt="calendrier" class="calendrier" /></p>
				<p><?php echo $article['day'].'/'.$article['month'].'/'.$article['year']; ?></p>
			</span>
			<span class="zone_place">
				<p><img src="img/system/place.jpg" alt="place" class="place" /></p>
				<li><a href=<?php echo '"'.$article['adresse_lieux'].'"' ?> target="blank"><?php echo utf8_encode($article['titre_lieux']) ?></a></li>
			</span>
			</div>
				<p><img src=<?php echo '"'.$chemin.$photo['chemin'].'"'?> alt=<?php echo '"'.$photo['chemin'].'"' ?>/></p>
				<p class = "texte2"><?php echo utf8_encode($article['texte']) ?></p>
				<a href=<?php echo '"rj-carnet-de-voyage_galerie.php?input='.$photo['id_linked'].'"'?>>Voir toutes les photos prises ce jour là !</a>
		</article>
	</div>
					
		<?php
				$photos->closeCursor();
				$articles->closeCursor();
			}
			else {
		?>
		
		<article id = "fin_article">
			<h2>Site web crée le :</h2>
			<div class="info_plus">
				<span class="zone_calendrier">
					<p><img src="img/system/calendrier.png" alt="calendrier" class="calendrier" /></p>
					<p>17/9/2014</p>
				</span>
				<span class="zone_place">
					<p><img src="img/system/place.jpg" alt="place" class="place" /></p>
					<li><a href="https://www.google.fr/maps/place/R.+Aires+de+Saldanha+-+Copacabana,+Rio+de+Janeiro+-+RJ,+22060-030,+Br%C3%A9sil/@-22.9744172,-43.18845,15z/data=!4m2!3m1!1s0x9bd540b112b89d:0x4e3ad7dac072bb21" target="blank">à mon appart sur Copa</a></li>
				</span>
			</div>
		</article>
				
		<?php
			}
		}
	}
		?>
