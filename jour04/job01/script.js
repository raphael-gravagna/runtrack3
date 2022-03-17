const url = "expression.txt";

button.addEventListener('click', addone);

function addone(){
  fetch(url)
    .then(res => res.json())
    .then(data => document.write(data))
}