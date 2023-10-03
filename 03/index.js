const timeOutput = document.querySelector('#timeoutput')
let time = null
window.addEventListener('click', function(e){
    // console.log(e)
    if (time === null)
        time = e.timeStamp
    else {
        timeOutput.innerText = e.timeStamp - time
        time = e.timeStamp
    }
})

// Delegation
const ul = document.querySelector('ul')
ul.addEventListener('click', function(e){
    if (e.target.matches('li')){
        console.log(e.target)
        e.target.style.color = 'green'
    }
})

const table = document.querySelector('table')

function delegate(parent, type, selector, handler) {
    parent.addEventListener(type, function (event) {
        const targetElement = event.target.closest(selector)
        if (this.contains(targetElement)) handler.call(targetElement, event)
    })
}

delegate(table, 'click', 'tr', function(e){
    this.style.backgroundColor = 'yellow'
})

// Task 1: Place 2 text/number fields on a page: N, M and a button. When the button is clicked, generate a table with dimensions NxM. When a cell is clicked change its colour to the colour that is selected in a colour picker. (Cell size: 20x20 px)
// Task 1++. Change the colour of the cells when the mouse is moved with the mouse button pressed. (Event type: mousemove + button properties)

const paintTable = document.querySelector('table#paint')
const widthInput = document.querySelector('#n')
const heightInput = document.querySelector('#m')
const startButton = document.querySelector('button')
const colorInput = document.querySelector('input[type=color]')

startButton.addEventListener('click', function(){
    let n = parseInt(widthInput.value)
    let m = parseInt(heightInput.value)
    for (let i = 0; i < m; i++){
        let tr = document.createElement('tr')
        paintTable.appendChild(tr)
        for (let j = 0; j < n; j++){
            let td = document.createElement('td')
            tr.appendChild(td)
        }
    }
})

delegate(paintTable, 'mousemove', 'td', function(e){
    // console.log(e)
    if (e.buttons === 1)
        this.style.backgroundColor = colorInput.value
})
