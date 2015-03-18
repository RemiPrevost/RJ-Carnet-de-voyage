/**** GLOBAL ****/

var footer = document.getElementById('footer');
var semaphore_f = true;

/**** FUNCTIONS ****/

function fonduUpFooter() {
	if (parseFloat(footer.style.opacity) < 0.95) {
		footer.style.opacity = ""+(parseFloat(footer.style.opacity) + 0.05);
		setTimeout(fonduUpFooter, 50);
	}
	else
		semaphore_f = true;
}

function fonduDownFooter() {
	if (parseFloat(footer.style.opacity) > 0.6) {
		footer.style.opacity = ""+(parseFloat(footer.style.opacity) - 0.05);
		setTimeout(fonduDownFooter, 50);
	}
	else
		semaphore_f = true;
}

/**** BEGIN ****/

var p_left = document.getElementById('p_left');
var p_right = document.getElementById('p_right');

footer.style.opacity = '0.6';

body.addEventListener('mouseover',function(e){
	if (semaphore_f) {
		if (e.target.id == footer.id || e.target.id == p_left.id || e.target.id == p_right.id) {
			semaphore_f = false;
			fonduUpFooter();
		}
		else if (footer.style.opacity != '0.6') {
			semaphore_f = false;
			fonduDownFooter();
		}
	}
},true);