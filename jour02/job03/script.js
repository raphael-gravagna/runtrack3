var counter = 0;

var element = document.querySelector('p')
element.innerText='le nombre de clic est de :' + counter

var btn = document.querySelector('#btn')

btn.addEventListener('click', addon);

function addon() {
	counter++
	console.log('counter');
	element.innerText='le nombre de clic est de :' + counter

}