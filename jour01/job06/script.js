function fizzbuzz()
{
 var nombre = 0
 for (i=1; i< 152; i++) {
    if (i%5 == 0 && i%3 == 0) {console.log("FizzBuzz");}
     else if (i%3 == 0) {console.log("Fizz");}
     else if (i%5 == 0) {console.log("Buzz");}
     else {console.log(i)}
     //if(i%5 != 0 && i%3 != 0) {console.log(i)}

 }
    
}
fizzbuzz();