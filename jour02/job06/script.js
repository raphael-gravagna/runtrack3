const pressed = [];
const secretCode = 'konami';
const body = document.querySelector('body');

window.addEventListener('keyup', (e) => {
console.log(e.key);
pressed.push(e.key);
pressed.splice(-secretCode.length -1, pressed.length - secretCode.length);
if(pressed.join('').includes(secretCode)) {
	body.style.backgroundColor = 'blue';

}
console.log(pressed);

})