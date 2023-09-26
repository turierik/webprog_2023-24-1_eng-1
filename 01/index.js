console.log("hello world")

let array = [3, 7, 6, -1, 0]

console.log(array)

for (let i = 0; i < array.length; i++) // AVOID using this!
    console.log(array[i])

for (let el of array) // loop over the elements of the array
    console.log(el)

for (let key in array) // loop over the keys/indexes of the array
    console.log(key)

// let filtered = []
//for (let el of array){
//    if (el % 2 === 1)
//        filtered.push(el)
// }
// console.log(filtered)

function isOdd(n){
    return n % 2 === 1
}

const isOddAnother = (n) => n % 2 === 1

console.log(array.filter(isOdd))
console.log(array.filter(n => n % 2 === 1))

let o = {
    age: 40,
    childen: 2,
    name: "Joe",
    married: true
}

console.log(o.name)
console.log(o['name'])

// Task

let t = [3, 7, 6, 2, -1, 0]

// 1. cube an array of numbers

// let cubed = []
// for (let el of t){
//    cubed.push(el ** 3)
// }
// console.log(cubed)

console.log(t.map(x => x ** 3))

// 2. sum of even numbers
console.log(t.filter(x => x % 2 === 0).reduce( (s, x) => s + x, 0))
console.log(t.reduce( (s, x) => s + (x % 2 === 0 ? x : 0 ), 0 ))

// 3. largest element in an array
  // a. Math.max
  // b. not using Math.max

console.log(Math.max(...t))
console.log(t.reduce( (s, x) => s > x ? s : x, -Infinity ))

// 4. increase the elements by their index
// [1, 2, 3, 4] --> [1, 3, 5, 7]
console.log(t.map((x, i) => x + i ))

// 5. find the index of the first even number
console.log(t.findIndex(x => x % 2 === 0))

// 10:20-11:50