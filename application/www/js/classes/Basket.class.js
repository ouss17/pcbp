class Basket {
  constructor() {
    this.items = this.loadBasket();
    console.log(this.items);
    this.displayItemsBasket();
  }

  loadBasket() {

    let items = loadDataFromDomStorage('computerBasket');

    if (items == null) {
      items = [];
    }

    return items;
  }

  displayItemsBasket() {
    if(this.items.length > 0) {
      $('#itemBasket').removeClass('hide');
      $('#itemBasket').text(this.items.length);
    } else {
      $('#itemBasket').addClass('hide');
      $('#itemBasket').text('');
    }
  }

  addToBasket(productId, name, quantity, price) {
    productId = parseInt(productId);
    quantity  = parseInt(quantity);

    let item = {
      productId: productId,
      name: name,
      quantity: quantity,
      price: price
    }

    for(let index = 0; index < this.items.length; index++)
    {
      if(this.items[index].productId === productId)
      {
        this.items[index].quantity += quantity

        this.saveBasket();

        return true;
      }
    }

    this.items.push(item);
    this.saveBasket();
  }


  displayCompleteBasket() {
    let totalPrice= 0;
    if(this.items.length > 0) {
      $('#displayBasket table tbody').empty();
      for (let i = 0; i < this.items.length; i++) {
        totalPrice += parseFloat(this.items[i].quantity)*parseFloat(this.items[i].price);
        let tr = $('<tr>');
        tr.append('<td>'+this.items[i].quantity+'</td><td>'+this.items[i].name+'</td><td>'+this.items[i].price.toFixed(2)+' €</td><td>'+(parseFloat(this.items[i].quantity)*parseFloat(this.items[i].price)).toFixed(2) +' €</td><td><button class="trash draw-outline draw-outline--tandem" data-index="'+i+'"><i class="fas fa-trash-alt"></i></button></td>')
        $('#displayBasket table tbody').append(tr);
      }

    } else {
      $('#displayBasket').html('<p>Votre panier est vide...</p>');
      $('.p-form').css('display', 'none');
    }

    $('#totalPrice').text(totalPrice.toFixed(2));
  }

  removeToBasket(id) {
    this.items.splice(id, 1);
    this.saveBasket();
  }
  removeCompleteBasket() {
    this.items = [];
    this.saveBasket();
  }

  saveBasket() {
    saveDataToDomStorage('computerBasket', this.items);
    this.displayItemsBasket();
    if(window.location.href.indexOf('/basket') != -1) {
      this.displayCompleteBasket();
    }

  }

  loadBasketInInput(elmt){
    $(elmt).val(JSON.stringify(this.items));
  }
}
