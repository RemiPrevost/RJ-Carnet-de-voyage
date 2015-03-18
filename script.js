/******* GLOBAL ********/

var continuer = true;

/******* FUNCTIONS ********/

function addTempo() {
	var article = document.createElement('article');
	article.id = 'tempo';
	
	var p = document.createElement('p');
	
	var img = document.createElement('img');
	img.src = 'img/system/loading.gif';
	img.alt = 'loading';
	img.id = 'loading';
	
	p.appendChild(img);
	article.appendChild(p);
	document.getElementById('section_articles').appendChild(article);
}

function removeTempo() {
	var tempo = document.getElementById('tempo');
	if (tempo)
		tempo.parentNode.removeChild(tempo);
}

function add_article(num) {
	var value = encodeURIComponent(num);
	
	var xhr = new XMLHttpRequest();
	
	xhr.open('GET','articles.php?input='+value);
	
	xhr.onreadystatechange = function() {
		
		if (xhr.readyState == xhr.DONE && xhr.status == 200) {
			removeTempo();

			document.getElementById('section_articles').innerHTML += xhr.responseText;
		
			body.scrollTop += 300;
			semaphore = true;
			
			if (xhr.responseText.indexOf('id = "fin_article"') != -1) {
				continuer = false;
			}
		}
	}
	
	xhr.send(null);
}

/******** BEGINNING *********/

var body = document.getElementById('body');
var debugg = document.getElementById('debugg');

var num_article = 4;
var semaphore = true;

window.onscroll = function() {
	if (window.pageYOffset > document.documentElement.scrollHeight - document.documentElement.clientHeight - 10 && semaphore && continuer) {
		semaphore = false;
		addTempo();
		body.scrollTop += 300;
		
		add_article(num_article);
		num_article++;
	}
}