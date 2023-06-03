class Block {
    constructor(id, className, tagName) {
        this.id = id;
        this.className = className;
        this._tagName = tagName;

        this._element = null;
    }

    render() {
        this._element = document.createElement(this._tagName)

        if (this.id) {
            this._element.id = this.id;
        }

        if (this.className) {
            this._element.className = this.className;
        }

        return this._element;
    }
}

class MenuItem extends Block {
    constructor(href, title) {
        super(null, 'menu-utem', 'li');

        this.title = title;
        this.href = href;
    }

    render() {
        super.render();

        const link = document.createElement('a');
        link.href = this.href;
        link.textContent = this.title;

        this._element.appendChild(link);

        return this._element;
    }

}

class Menu extends Block {
    constructor(id, className, items) {
        super(id, className, 'ul');

        this.items = items
    }

    render() {
        super.render();

        this.items.forEach((item) => {
            this._element.appendChild(item.render())
        })

        return this._element
    }
}

// const menuItem1 = new MenuItem('/', 'Главная')
// const menuItem2 = new MenuItem('/about', 'О нас')
// const menuItem3 = new MenuItem('/contacts', 'Контакты')


const menu = new Menu('menu', 'class-menu', [menuItem1, menuItem2, menuItem3])

document.body.appendChild(menu.render())
