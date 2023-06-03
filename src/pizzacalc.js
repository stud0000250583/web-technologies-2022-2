class Pizza {
    constructor(type, size) {
        this.type = type;
        this.size = size;
    }

    _toppings = [];

    addTopping(topping) {
        this._toppings.push(topping)
        console.log("Добавлен топпинг: ", topping);
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

    setType(type) {
        this.type = type;
        console.log("Установлен тип пиццы: ", type);
    }

    setSize(size) {
        this.size = size;
        console.log("Установлен размер пиццы: ", size);
    }
}

class Topping {
    static creamyMozzarella = new Topping("Сливочная моцарелла", 50, 20);
    static cheeseStuffedCrust = new Topping("Сырный борт", 150, 50);
    static cheddarAndParmesan = new Topping("Чеддер и пармезан", 150, 50);

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
