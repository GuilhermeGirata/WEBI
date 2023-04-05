/*Crie uma função que conta a quantidade de aparições de uma dada letra em uma string.
Por exemplo:*/

var frase = "Aula de web1";
var letra = "e";
var quantidade = 0

for (var i = 0; i < frase.length; i++) {
  if (frase[i] == letra) {
    quantidade++
  }
}

console.log(quantidade)