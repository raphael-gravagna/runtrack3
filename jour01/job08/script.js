function sommenombrespremiers(n) {
	if(n<2) {return false;}
	for(var i=2; i<Math.sqrt(n); i++) {
		if(n%i === 0) {return false;}
	}
	return n>1;
}
	
		
}
sommenombrespremiers(2)
//ne fonctionne pas avec des petits nombre, peut-être que ça vient de la racine carré, incompréhensible
//https://www.youtube.com/watch?v=TSWJSdb01eo element primitif et element objet ?? wtf
//https://www.youtube.com/watch?v=gRUeMHIB8Ug bon va falloir bouffer tout ça là 