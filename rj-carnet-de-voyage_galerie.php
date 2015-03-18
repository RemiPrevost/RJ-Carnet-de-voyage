<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
		<!--[if lt IE 9]> <script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script> <![endif]--> 
		<link rel="stylesheet" href="style.css" />
		<link rel="stylesheet" href="style_footer.css" />
		<link rel="stylesheet" href="style_galerie.css" />
        <title>Carnet de Voyage</title>
		<link rel="icon" type="image/png" href="img/system/icon.png" />
	</head>
	
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
		
		$chemin = 'img/pictures/miniatures/';
		
		if (isset($_GET['input'])) {
			$_GET['input'] = (int) $_GET['input'];
			if ($_GET['input'] >= 0 && $_GET['input'] <= $nb_articles && $_GET['input'] != 1) {
				$id = $_GET['input'];
	?>
	
	<body id ="body">
		<div id="main_wrapper">
		
		
		
	<?php include("header.php");?>
			
			<section>
				<article>
					<h3>Galerie</h3>
				</article>
			</section>
			
			<div id="section_miniatures">
	<?php
		if ($id == 0)
			$miniatures = $bdd->query('SELECT * FROM photos');
		else {
			$miniatures = $bdd->prepare('SELECT * FROM photos WHERE id_linked=? ORDER BY main');
			$miniatures->execute(array($id));
		}

		while ($miniature = $miniatures->fetch())
		{
	?>
				<p class="conteneur_miniature"><img src=<?php echo('"'.$chemin.$miniature['chemin'].'"')?> alt=<?php echo('"'.$miniature['chemin'].'"')?> class="miniature" id=<?php echo($miniature['id_linked'])?>/></p>
	<?php
		}
	?>			
			</div>
		</div>
		
		<p id="debugg"></p>
		
		<?php include("footer.php");?>
		
		<div id="overlay"></div>
		
		<script src="script_galerie.js"></script>
		<script src="script_footer.js"></script>
	</body>
	<?php
			}
		}
	?>
	
</html>