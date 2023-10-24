const canvas = document.querySelector('canvas')
const ctx = canvas.getContext('2d')

// Option 1: Drawing using shapes - directly to the canvas

ctx.fillStyle = 'orange'
ctx.fillRect(50, 100, 150, 150)

ctx.strokeStyle = 'blue'
ctx.lineWidth = 4
ctx.strokeRect(50, 100, 150, 150)

// also: fillText, strokeText, ctx.font

// Option 2: Drawing using paths - not drawn directly

ctx.beginPath()
// e.g triangle
ctx.fillStyle = 'red'
ctx.moveTo(100, 100) // starting point
ctx.lineTo(100, 200) // side 1
ctx.lineTo(200, 200) // side 2
ctx.lineTo(100, 100) // side 3
ctx.fill() // or ctx.stroke()

const circles = [{
    x: 200,
    y: 0,
    vy: 0,
    r: 20,
    c: 'red'
},
{
    x: 100,
    y: 100,
    vy: 0,
    r: 15,
    c: 'blue'
},
]
let last = performance.now()
function gameloop(){
    let dt = performance.now() - last
    last = performance.now()
    draw()
    update(dt)
    requestAnimationFrame(gameloop)
}

gameloop()

function draw(){
    ctx.clearRect(0, 0, canvas.width, canvas.height)
    for (const circle of circles){
        ctx.beginPath()
        ctx.arc(circle.x, circle.y, circle.r, 0, 2*Math.PI)
        ctx.fillStyle = circle.c
        ctx.fill()
    }   
}

function update(dt){
    for (const circle of circles){
        circle.vy += 0.0001 * dt
        circle.y += circle.vy * dt
        if (circle.y >= canvas.height - circle.r / 2) 
            circle.vy *= -1
    }
}

canvas.addEventListener('click', function(e){
    circles.push({
        x: e.offsetX,
        y: e.offsetY,
        vy: 0,
        r: 10 + Math.random() * 10,
        c: `rgb(${Math.random() * 255}, ${Math.random() * 255}, ${Math.random() * 255})`
    })
})

// Task:
// - multiple balls
// - add a new falling ball when you click on the canvas
// - bounce the ball on the lower edge
// - random colour