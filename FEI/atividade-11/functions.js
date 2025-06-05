function square(number) {
    return number * number
}

function isEven(number) {
    return number % 2 === 0
}

function reverseString(text) {
    return text.split('').reverse().join('')
}

function greatestNumber(...numbers) {
    return numbers.length ? Math.max(...numbers) : null
}

function countChars(text) {
    let charCount = 0

    for (const char of text) {
        if (char === ' ') continue
        charCount++
    }

    return charCount
}

function calcAverage(arr) {
    if (arr.length === 0) return 0
    const sum = arr.reduce((acc, num) => acc + num, 0)
    return sum / arr.length
}

function isPalindrome(str) {
    return str === reverseString(str)
}

function sumUpToN(n) {
    return n < 0 ? 0 : (n * (n + 1)) / 2
}

function countVowels(text) {
    const vowels = 'aeiouAEIOU'
    let count = 0

    for (const char of text) {
        if (vowels.includes(char))  count++
    }

    return count
}

function inInterval(value, min, max) {
    return value >= min && value <= max
}

function perform(type) {
    var value = document.querySelector(`input[name=${type}]`).value

    if (!value) {
        alert(`Por favor, insira um valor válido.`)
        return
    }

    console.log('here', type, value);

    switch (type) {
        case "square":
            const squareResult = square(parseInt(value))
            alert(`O quadrado de ${value} é ${squareResult}.`)
        break
        
        case "isEven":
            const isEvenResult = isEven(parseInt(value))
            alert(`${value} é ${isEvenResult ? 'par' : 'ímpar '}.`)
        break

        case "reverseString":
            const reversed = reverseString(value)
            alert(`A string "${value}" invertida é "${reversed}".`)
        break

        case "greatestNumber":
            const numbers = value.split(',').map(num => parseInt(num.trim()))
            const greatest = greatestNumber(...numbers)
            alert(`O maior número entre [${value}] é: ${greatest}.`)
        break

        case "countChars":
            const charCount = countChars(value)
            alert(`O número de caracteres (sem espaços) na frase "${value}" é: ${charCount}.`)
        break

        case "calcAverage":
            const arr = value.split(',').map(num => parseInt(num.trim()))
            const average = calcAverage(arr)
            alert(`A média dos números [${value}] é: ${average}.`)
        break

        case "isPalindrome":
            const isPalin = isPalindrome(value)
            alert(`${value} ${isPalin ? 'é' : 'não é'} um palíndromo.`)
        break

        case "sumUpToN":
            const n = parseInt(value)
            const sumResult = sumUpToN(n)
            alert(`A soma dos números de 1 a ${n} é: ${sumResult}.`)
        break2

        case "countVowels":
            const vowelCount = countVowels(value)
            alert(`O número de vogais na frase "${value}" é: ${vowelCount}.`)
        break

        case "inInterval":
            const [param, min, max] = value.split(',').map(num => parseInt(num.trim()))
            alert(`${param} ${inInterval(param, min, max) ? 'está' : 'não está'} no intervalo [${min}, ${max}].`)
        break       
            
        default:
            break
    }
}