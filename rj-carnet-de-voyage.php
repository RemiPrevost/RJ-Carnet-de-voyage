<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
		<!--[if lt IE 9]> <script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script> <![endif]--> 
		<link rel="stylesheet" href="style.css" />
        <title>Carnet de Voyage</title>
		<link rel="icon" type="image/png" href="img/system/icon.png" />
		
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
		
		$chemin = 'img/pictures/article-size/';
		
		?>
	
	<p id="ancre_top"></p>
	
    </head>
	
	<body id ="body">
		<div id="main_wrapper">
		<?php include("header.php");?>
			
			<a href = #ancre_top><p id="retour_top">Ramènes-moi en haut !</p></a>
			
			<section id="section_articles">
				<article>
					<h3>Fil d'actualité</h3>
				</article>
			
		<?php
			$articles = $bdd->query('SELECT DAY(date) AS day, MONTH(date) AS month, YEAR(date) AS year, titre_lieux, adresse_lieux, titre, texte FROM articles WHERE id = 1');
			$article = $articles->fetch();
					
			$photos = $bdd->query('SELECT chemin FROM photos WHERE id_linked=1 AND main = 1');
			$photo = $photos->fetch();
		?>
				
				<article id="sejam_bv">
					<div id="top_sejam_bv">
						<h2><?php echo $article['titre']; ?></h2>
					</div>
					<div class="info_plus">
						<span class="zone_calendrier">
							<p><img src="img/system/calendrier.png" alt="calendrier" class="calendrier" /></p>
							<p><?php echo $article['day'].'/'.$article['month'].'/'.$article['year']; ?></p>
						</span>
						<span class="zone_place">
							<p><img src="img/system/place.jpg" alt="place" class="place" /></p>
							<li><a href=<?php echo '"'.$article['adresse_lieux'].'"' ?> target="blank"><?php echo $article['titre_lieux'] ?></a></li>
						</span>
					</div>
					<p><img src=<?php echo '"'.$chemin.$photo['chemin'].'"' ?> alt=<?php echo '"'.$photo['chemin'].'"' ?> id="corco"/></p>
					<p class="texte"><?php echo utf8_encode($article['texte']) ?></p>
				</article>
				
		<?php
			$articles->closeCursor();
			
			$max = $bdd->query('SELECT COUNT(*) AS count FROM articles')->fetch()['count'] - 3;
			$compteur = 1;
			for ($i = $max + 3; $i > $max; $i--)
			{
				$articles = $bdd->prepare('SELECT id, DAY(date) AS day, MONTH(date) AS month, YEAR(date) AS year, titre_lieux, adresse_lieux, titre, texte FROM articles WHERE id = ?');
				$articles->execute(array($i));

				$article = $articles->fetch();
							
				$photos = $bdd->prepare('SELECT * FROM photos WHERE id_linked=? AND main = 1');
				$photos->execute(array($i));
				$photo = $photos->fetch();
		?>
		
				<article id=<?php echo '"art'.$compteur.'"' ?>>
					<h2><?php echo utf8_encode($article['titre']) ?></h2>
					<div class="info_plus">
						<span class="zone_calendrier">
							<p><img src="img/system/calendrier.png" alt="calendrier" class="calendrier" /></p>
							<p><?php echo $article['day'].'/'.$article['month'].'/'.$article['year']; ?></p>
						</span>
						<span class="zone_place">
							<p><img src="img/system/place.jpg" alt="place" class="place" /></p>
							<li><a href=<?php echo '"'.$article['adresse_lieux'].'"' ?> target="blank"><?php echo $article['titre_lieux'] ?></a></li>
						</span>
					</div>
					<p><img src=<?php echo '"'.$chemin.$photo['chemin'].'"' ?> alt=<?php echo '"'.$photo['chemin'].'"' ?>/></p>
					<p><?php echo utf8_encode($article['texte']) ?></p>
					<a href=<?php echo '"rj-carnet-de-voyage_galerie.php?input='.$photo['id_linked'].'"'?>>Voir toutes les photos prises ce jour là !</a>
				</article>
				
		<?php
				$compteur++;
				$photos->closeCursor();
				$articles->closeCursor();
			}
		?>
				
			</section>

		</div>
		
		<p id="debugg"></p>
		
		<?php include("footer.php");?>
		
		<script src="script.js"></script>
		<script src="script_footer.js"></script>
	</body>
</html>