function taskOne() {
    function pickPropArray(objectArray, objectProperty) {
        let result = []
        for (let i = 0; i < objectArray.length; i++)
            if (objectProperty in objectArray[i])
                result.push(objectArray[i][objectProperty])
        return result
    }

    const students = [
        { name: 'Павел', age: 20 },
        { name: 'Иван', age: 20 },
        { name: 'Эдем', age: 20 },
        { name: 'Денис', age: 20 },
        { name: 'Виктория', age: 20 },
        { age: 40 },
    ]

    console.log('Task 1:\nInitial array', students, '\nResult array', pickPropArray(students, 'name'))
}

function taskTwo() {
    console.log('\nTask 2:\n')
    function createCounter(initialValue) {
        let counterValue = initialValue
        console.log('Initial counter value:', initialValue)
        return function () {
            return counterValue += 1
        }
    }

    let countFromZero = createCounter(0)
    for (let i = 0; i < 10; i++)
        console.log(countFromZero())

    let countFromFive = createCounter(5)
    for (let i = 0; i < 10; i++)
        console.log(countFromFive())
}

function taskThree() {
    console.log('\nTask 3:\n')
    function spinWords(initialString) {
        let words = initialString.split(' ')
        for (let i = 0; i < words.length; i++) {
            if (words[i].length > 4)
                words[i] = words[i].split('').reverse().join('')
        }
        return words.join(' ')
    }

    console.log(spinWords('Привет от Legacy'))
    console.log(spinWords('This is a test'))
}

function taskFour() {
    console.log('\nTask 4:\n')
    function doTheThing(nums, target) {
        for (let i = 0; i < nums.length; i++) {
            for (let j = 0; j < nums.length; j++) {
                if (i != j && nums[i] + nums[j] == target)
                    return [i, j]
            }
        }
    }

    console.log(doTheThing([2, 7, 11, 15], 9))
    console.log(doTheThing([2, 7, 11, 15], 4))
}

function taskFive() {
    console.log('\Task 5:\n')
    function doTheThing(words) {
        let reversedWords = []
        for (let i = 0; i < words.length; i++)
            reversedWords.push(words[i].split('').reverse().join(''))

        reversedWords.sort((x, y) => x.length - y.length)
        for (let i = reversedWords[0].length; i >= 2; i--) {
            let subString = reversedWords[0].substring(0, i)
            if (reversedWords.every(x => x.startsWith(subString)))
                return subString.split('').reverse().join('')
        }
        return ""
    }

    console.log(doTheThing(["цветок", "поток", "хлопок"]))
    console.log(doTheThing(["собака", "гоночная машина", "машина"]))
}

taskOne()
taskTwo()
taskThree()
taskFour()
taskFive()