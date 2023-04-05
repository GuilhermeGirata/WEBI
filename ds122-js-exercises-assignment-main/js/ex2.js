/*Escreva um programa que cria uma string que representa um quadro 8x8, utilizando
o caractere de nova linha "\n" para separar cada uma das linhas. Por exemplo:
"linha1..\nlinha2..". Cada posição do quadro deve ser representada por um espaço
em branco (" ") ou um "#". Os caracteres devem produzir a forma de um tabuleiro
de xadrez.
Ao passar a string produzida ao comando console.log, o programa deve exibir
algo parecido com o seguinte:*/

var n = 10;
var i = 0;
var str = "";

var nn = n*n;
var c = " ";
for(i=0;i<nn;i++){
    str +=c;
    if(i % n === 0){
        str += "/n";
    }
    else{
        if(c === " "){
            c = "#";
        }
        else{
            c = " ";
        }
    }
}

console.log(c+n);