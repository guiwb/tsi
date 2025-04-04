let soma = 0
let contador = 0

for (let i = 1; i < 50; i++) {
  console.log(i)
  soma += i
  contador++
}

let media = soma / contador

console.log("Soma dos inteiros menores que 50:", soma)
console.log("Média dos inteiros menores que 50:", media)