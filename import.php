<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
		<!--[if lt IE 9]> <script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script> <![endif]--> 
	</head>
	
	<body>
		<p>
<?php
	if (isset($_POST['table']) && isset($_POST['csv'])) {
		try {
			$bdd = new PDO('mysql:host=localhost;dbname=rj', 'root', '');
		} catch (Exception $e) {
			try {
				$bdd = new PDO('mysql:host=localhost;dbname=rprevost', 'rprevost', '05?ZbXQq03');
				} catch (Exception $e) {
					die('Erreur : ' . $e->getMessage());
				}
		}
		if ($_POST['table'] == 'articles') {
			$array = str_getcsv($_POST['csv']);
			$size = sizeof($array);
			
			echo ('Adding these elements in date base :');
			
			for ($height = 0; $height < $size; $height+=5) {
				$date = $array[$height];
				$titre_lieux = $array[$height+1];
				$adresse_lieux = $array[$height+2];
				$titre = $array[$height+3];
				$texte = $array[$height+4];
				
				echo ($date.'   '.$titre_lieux.'   '.$adresse_lieux.'   '.$adresse_lieux.'   '.$texte);
				
				$req = $bdd->prepare('INSERT INTO articles(date, titre_lieux, adresse_lieux, titre, texte) VALUES(:date, CONVERT(CONVERT(:titre_lieux USING BINARY) USING utf8), :adresse_lieux, CONVERT(CONVERT(:titre USING BINARY) USING utf8), CONVERT(CONVERT(:texte USING BINARY) USING utf8))');
				$req->execute(array('date' => $date,'titre_lieux' => $titre_lieux,'adresse_lieux' => $adresse_lieux,'titre' => $titre,'texte' => $texte));
			}
		}
		
		else if ($_POST['table'] == 'photos') {
			$array = str_getcsv($_POST['csv']);
			$size = sizeof($array);
			
			echo ('Adding these elements in date base :');
			
			for ($height = 0; $height < $size; $height+=3) {
				$chemin = $array[$height];
				$id_linked = $array[$height+1];
				$main = $array[$height+2];
				
				echo ($chemin.'   '.$id_linked.'   '.$main.'<br />');
				
				$req = $bdd->prepare('INSERT INTO photos(chemin, id_linked, main) VALUES(:chemin, :id_linked, :main)');
				$req->execute(array('chemin' => $chemin,'id_linked' => $id_linked,'main' => $main));
			}
		}
		else
			die('Erreur');	
	}
	else
		die('Erreur');
?>
		</p>
	</body>
</html>