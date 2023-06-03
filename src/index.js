var pizza = new Pizza(Type.pepperoni, Size.small);

var activeSizeClass = 'size-option__active';
var sizeOptions = document.querySelectorAll('.size-option');

var activePizzaClass = 'pizza-option__active';
var pizzaOptions = document.querySelectorAll('.pizza-option');

var activeToppingClass = 'topping-option__active';
var toppingOptions = document.querySelectorAll('.topping-option');

function refreshAddToCartButton() {
    document.querySelector('.price').innerHTML = pizza.calculatePrice();
    document.querySelector('.calories').innerHTML = pizza.calculateCalories();
}

function refreshToppingsPrice() {
    document.querySelectorAll('.topping-option').forEach(topping => {
        topping.querySelector('.topping-option-price').innerHTML = Topping[topping.dataset.topping].price * pizza.getSize().priceMultiple;
    });
}

refreshToppingsPrice();
refreshAddToCartButton();

sizeOptions.forEach(sizeOption => sizeOption.addEventListener('click', (e) => {
    let size = Size[e.currentTarget.dataset.size];
    if (size != pizza.Size) {
        sizeOptions.forEach(sizeOption => sizeOption.classList.toggle(activeSizeClass));
        pizza.setSize(size);
    }
    refreshToppingsPrice();
    refreshAddToCartButton();
}));

pizzaOptions.forEach(pizzaOption => pizzaOption.addEventListener('click', (e) => {
    let activePizza = document.querySelector('.pizza-option__active');
    activePizza.classList.remove(activePizzaClass);
    e.currentTarget.classList.add(activePizzaClass);
    pizza.setType(Type[e.currentTarget.dataset.type]);
    refreshAddToCartButton();
}));

toppingOptions.forEach(toppingOption => toppingOption.addEventListener('click', (e) => {
    let topping = Topping[e.currentTarget.dataset.topping];
    if (!pizza.getToppings().includes(topping)) {
        pizza.addTopping(topping);
        e.currentTarget.classList.add(activeToppingClass);
    } else {
        pizza.removeTopping(topping)
        e.currentTarget.classList.remove(activeToppingClass);
    }
    refreshAddToCartButton();
}));