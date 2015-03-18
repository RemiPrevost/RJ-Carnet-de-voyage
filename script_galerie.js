/****** FUNCTIONS ******/

function getElementsByClassName(className, tag, elm){
	var testClass = new RegExp("(^|s)" + className + "(s|$)");
	var tag = tag || "*";
	var elm = elm || document;
	var elements = (tag == "*" && elm.all)? elm.all : elm.getElementsByTagName(tag);
	var returnElements = [];
	var current;
	var length = elements.length;
	for(var i=0; i<length; i++){
		current = elements[i ];
		if(testClass.test(current.className)){
			returnElements.push(current);
		}
	}
	return returnElements;
}

function redimImg(img) {
	var taille_max = document.body.offsetWidth - 100;
	var ratio = parseFloat(img.width)/parseFloat(img.height);
	
	img.width = taille_max;
	img.height = parseInt(img.width/ratio);
		
	if (img.height + 100 >  document.documentElement.clientHeight)
	{
		img.height = document.documentElement.clientHeight - 100;
		img.width = parseInt(img.height*ratio);
	}
	
}

var element;

function fonduUp() {
	if (parseFloat(element.style.opacity) != 1.0) {
		element.style.opacity = ""+(parseFloat(element.style.opacity) + 0.1);
		setTimeout(fonduUp, 50);
	}
}

function fonduDown() {
	if (parseFloat(element.style.opacity) != 0.0) {
		element.style.opacity = ""+(parseFloat(element.style.opacity) - 0.1);
		setTimeout(fonduDown, 50);
	}
	else {
		element.parentNode.removeChild(element);
		overlay.style.display = 'none';
	}
}

function lightBox(source) {
	var overlay = document.getElementById('overlay');
	var img = new Image();
	
	img.onload = function() {
		redimImg(img);
		overlay.innerHTML = '';
		overlay.appendChild(img);
		element = img;
		fonduUp();
	}
	
	img.src = 'img/pictures/full-size/' + source;
	img.id = 'img_lightbox';
	img.style.opacity = '0';
	
	overlay.style.display = 'block';
	overlay.innerHTML = '<p id="message_loading">Chargement de l\'image en cours ...</p>';
}

function closeLightBox() {
	var element = document.getElementById('img_lightbox');
	if (element)
		fonduDown();
}

/******* BEGINNING ******/

var miniatures = document.getElementsByClassName('miniature');

for (var i = 0; i < miniatures.length; i++) {
	miniatures[i].onclick = function() {
		lightBox(this.alt);
	};
}

document.getElementById('overlay').onclick = closeLightBox;