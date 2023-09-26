// querySelector and querySelectorAll

const h1 = document.querySelector('h1')
h1.innerText = "Another"
h1.innerHTML = "Some <i>italic</i> text"
h1.style.backgroundColor = 'yellow'
h1.style.color = 'blue'

const ps = document.querySelectorAll('p')
for (const p of ps)
    p.style.color = "green"

// Generating new DOM elements

// - simple case
const button = document.createElement('button')
document.body.appendChild(button)
button.innerHTML = "Button Text"

// - list from array
const fruits = ["apple", "banana", "coconut", "dragonfruit"]
const ul = document.querySelector('ul')
for (const fruit of fruits){
    const li = document.createElement('li')
    ul.appendChild(li)
    li.innerText = fruit
}
// - list from array - short version :)
ul.innerHTML = fruits.map(fruit => `<li>${fruit}</li>`).join('')

// - table from matrix
const matrix = [[1, 2, 3, 4], [5, 6, 7, 8], [9, 10, 11, 12], [13, 14, 15, 16]]
const table = document.querySelector('table')
for (const row of matrix) {
    const tr = document.createElement('tr')
    table.appendChild(tr)
    for (const cell of row) {
        const td = document.createElement('td')
        tr.appendChild(td)
        td.innerText = cell
    }
}
// - table from matrix - short version :)
table.innerHTML = matrix.map(row =>
    `<tr>${row.map(cell => `<td>${cell}</td>`).join('')}</tr>`
).join('')

// Event Handling - the 3 steps
// 1. select every element that's involved in any way
const helloButton = document.querySelector('#hello')
const outputP = document.querySelector('#output')
let counter = 0
// 2. write a handler function
function handleHelloButton(){
    counter++
    outputP.innerText = `Hello ${counter} times!`
}
// 3. add the event listener
helloButton.addEventListener('click', handleHelloButton)

// Task: Generate a random integer from 1 to 100. The users needs to guess the generated number (text field and button). Respond with: lower, higher, correct.

const guessInput = document.querySelector('#guessinput')
const guessButton = document.querySelector('#guessbutton')
const guessResult = document.querySelector('#guessresult')

const target = Math.ceil(Math.random() * 100)

function handleGuessButton(){
    const guess = +guessInput.value
    if (guess < target)
        guessResult.innerText = "GO HIGHER!"
    else if (guess > target)
        guessResult.innerText = "GO LOWER!"
    else
        guessResult.innerText = "CORRECT!"
}

guessButton.addEventListener('click', handleGuessButton)

// Task: Set a text field's background to red if there are more than 8 chars in it.

const redInput = document.querySelector('#red')

function handleRedInput(){
    redInput.style.backgroundColor = redInput.value.length > 8 ? 'hotpink' : 'lightgreen'
}

redInput.addEventListener('input', handleRedInput)