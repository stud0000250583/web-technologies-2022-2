class Pizza {
    constructor(type, size) {
        this.type = type;
        this.size = size;
    }

    _toppings = [];

    addTopping(topping) {
        topping.name != "Сырный борт"
            ? this._toppings.push(topping)
            : this._toppings.includes(topping)
            ? console.log("Сырный бортик уже добавлен")
            : this._toppings.push(topping);
    }

    removeTopping(topping) {
        let index = this._toppings.indexOf(topping);
        index != -1
            ? console.log("Удален топпинг: ", this._toppings.splice(index, 1)[0])
            : console.log("Такого топпинга нет: ", topping);
    }

    getToppings() {
        return this._toppings;
    }

    getSize() {
        return this.size;
    }

    getStuffing() {
        return this.type;
    }

    calculatePrice() {
        let toppingsPrice = this._toppings.length == 0
            ? 0
            : this.size.priceMultiple * this._toppings.map(topping => topping.price).reduce((accum, price) => accum + price);
        return this.type.price + this.size.basePrice + toppingsPrice;
    }

    calculateCalories() {
        let toppingsCalories = this._toppings.length == 0
            ? 0
            : this._toppings.map(topping => topping.ccal).reduce((accum, ccal) => accum + ccal);
        return this.type.ccal + this.size.ccal + toppingsCalories;
    }
}

class Topping {
    static creamyMozzarella = new Topping ("Сливочная моцарелла", 50, 20);
    static cheeseStuffedCrust = new Topping ("Сырный борт", 150, 50);
    static cheddar = new Topping ("Чеддер", 150, 50);
    static parmesan = new Topping ("Пармезан", 150, 50);

    constructor(name, price, ccal) {
        this.name = name;
        this.price = price;
        this.ccal = ccal;
    }
}

class Size {
    static small = new Size("Маленькая", 100, 1, 100);
    static big = new Size("Большая", 200, 2, 200);

    constructor(name, basePrice, priceMultiple, ccal) {
        this.name = name;
        this.basePrice = basePrice;
        this.priceMultiple = priceMultiple;
        this.ccal = ccal;
    }
}

class Type {
    static margherita = new Type("Маргарита", 500, 300);
    static pepperoni = new Type("Пепперони", 800, 400);
    static bavarian = new Type("Баварская", 700, 450);

    constructor(name, price, ccal) {
        this.name = name;
        this.price = price;
        this.ccal = ccal;
    }
}

console.log("1: Большая Баварская с сырным бортом");
const bigBavarian = new Pizza(Type.bavarian, Size.big);
bigBavarian.addTopping(Topping.cheeseStuffedCrust);
bigBavarian.addTopping(Topping.cheeseStuffedCrust);
console.log("Наименование: ", bigBavarian.getStuffing().name);
console.log("Размер: ", bigBavarian.getSize().name);
console.log("Цена: ", bigBavarian.calculatePrice());
console.log("кКал: ", bigBavarian.calculateCalories());
console.log("Объект:", bigBavarian);

console.log("2: Маленькая Пепперони со всеми топпингами");
const smallPepperoni = new Pizza(Type.pepperoni, Size.small);
smallPepperoni.addTopping(Topping.cheeseStuffedCrust);
// Тест удаления
smallPepperoni.removeTopping(Topping.cheeseStuffedCrust);
smallPepperoni.removeTopping(Topping.cheeseStuffedCrust);
Object.values(Topping).forEach(topping => smallPepperoni.addTopping(topping));
console.log("Наименование: ", smallPepperoni.getStuffing().name);
console.log("Размер: ", smallPepperoni.getSize().name);
console.log("Цена: ", smallPepperoni.calculatePrice());
console.log("кКал: ", smallPepperoni.calculateCalories());
console.log("Объект:", smallPepperoni);
