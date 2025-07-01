// 1) Desestruturação de objeto simples
// Dado o objeto: Crie variáveis nome, idade e curso usando desestruturação.

const aluno = {
    nome: "Carla",
    idade: 20,
    curso: "Desenvolvimento Front-end"
};

const { nome, idade, curso } = aluno;

console.log(`Nome: ${nome}, Idade: ${idade}, Curso: ${curso}`);

// 2) Desestruturação com renomeação
// Usando o mesmo objeto aluno, desestruture o nome e a idade, mas renomeie para nomeAluno e
// idadeAluno.

const { nome: nomeAluno, idade: idadeAluno } = aluno;

console.log(`Nome Aluno: ${nomeAluno}, Idade Aluno: ${idadeAluno}`);

// 3) Desestruturação com valores padrão
// Considere o objeto: Faça a desestruturação extraindo titulo, autor e ano. Para ano, defina o valor padrão como 2024

const livro = {
    titulo: "JS para Iniciantes",
    autor: "Ana Souza"
};

const { titulo, autor, ano = 2024 } = livro;

console.log(`Título: ${titulo}, Autor: ${autor}, Ano: ${ano}`);

// 4) Desestruturação aninhada
// Dado: Extraia cidade e uf a partir da propriedade endereco usando desestruturação aninhada
const usuario = {
    nome: "Rafael",
    endereco: {
        cidade: "Recife",
        uf: "PE"
    }
};

const { endereco: { cidade, uf } } = usuario;

console.log(`Cidade: ${cidade}, UF: ${uf}`);

// 5) Desestruturação de arrays
// Dado o array: Use desestruturação para obter os dois primeiros números em variáveis a e b
const numeros = [10, 20, 30, 40];

const [a, b] = numeros;

console.log(`a: ${a}, b: ${b}`);

// 6) Ignorando elementos no array
// Com o array: Recupere apenas a terceira cor, ignorando as duas primeiras.
const cores = ["vermelho", "verde", "azul", "amarelo"];

const [, , terceiraCor] = cores;

console.log(`Terceira cor: ${terceiraCor}`);

// 7) Utilizando valores padrão em arrays
// Desestruture a primeira fruta e uma segunda chamada frutaExtra, com valor padrão "pitaia".
const frutas = ["banana"];

const [primeiraFruta, frutaExtra = "pitaia"] = frutas;

console.log(`Primeira fruta: ${primeiraFruta}, Fruta extra: ${frutaExtra}`);

// 8) Desestruturação em Funções (Parâmetros)
// Crie uma função mostrarInfo que receba um objeto com nome e idade, desestruture esses valores diretamente nos parâmetros e imprima algo como: "Maria tem 22 anos."

function mostrarInfo({ nome, idade }) {
    console.log(`${nome} tem ${idade} anos.`);
}

mostrarInfo({ nome: "Maria", idade: 22 });

// 9) Desestruturação de arrays em parâmetros
// Crie uma função somarDoisPrimeiros que receba um array e use desestruturação para obter os dois primeiros elementos. Retorne a soma deles.

function somarDoisPrimeiros([primeiro, segundo]) {
    return primeiro + segundo;
}

console.log(somarDoisPrimeiros([5, 10, 15]));

// 10) Mistura: objeto com array
// Extraia nome e o segundo módulo do array modulos.

const curso2 = {
 nome: "Frontend",
 modulos: ["HTML", "CSS", "JavaScript"]
};

const { nome: nomeCurso, modulos: [, segundoModulo] } = curso2;

console.log(`Curso: ${nomeCurso}, Segundo Módulo: ${segundoModulo}`);