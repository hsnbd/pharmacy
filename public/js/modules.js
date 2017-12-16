// Js baseUrl______________________________________________________________
var base_url = base_url();
function base_url() {
    var pathparts = location.pathname.split('/');
    if (location.host == 'localhost') {
        var url = location.origin + '/' + pathparts[1].trim('/') + '/' + pathparts[2].trim('/') + '/';
    } else {
        var url = location.origin;
    }
    return url;
}


//add to cart____________________________________________________________
var Cart = [];
function addItem(id, name, price, qty, description) {
    for (var i in Cart) {
        if (Cart[i].id === id) {
            Cart[i].qty = qty;
            saveCart();
            return "Cart Updated Successfully";
        }
    }
    Cart.push({id, name, price, qty, description});
    saveCart();
    return "Cart Added Successfully";
}

function updateItem(id, qty) {
    for (var i in Cart) {
        if (Cart[i].id === id) {
            Cart[i].qty = qty;
            saveCart();
            return "Cart Updated Successfully";
        }
    }
}

function minusItem(id, qty){
    for (var i in Cart) {
        if (Cart[i].id === id) {
            Cart[i].qty -= qty;
            if (Cart[i].qty === 0) { Cart.splice(i, 1); }
            saveCart();
            return;
        }
    }
}
function removeItem(id){
    for (var i in Cart) {
        if (Cart[i].id == id) {
            delete Cart[i];
            Cart.splice(i, 1);
            saveCart();
            return;
        }
    }
}
function clearCart(){
    Cart = [];
    saveCart();
}
function priceItem(id) {
    var priceItem = 0;
    for(var i in Cart){
        if (Cart[i].id === id) {
            return priceItem = (Cart[i].price * Cart[i].qty).toFixed(2);
        }
    }
}
function priceCart() {
    var totalCost = 0;
    for(var i in Cart){
        totalCost += Cart[i].price * Cart[i].qty;
    }
    return totalCost.toFixed(2);
}
function qtyItem(id) {
    for(var i in Cart){
        if(Cart[i].id == id){
            return Cart[i].qty;
        }
    }
    return 0;
}
function countCart(){
    var totalCount = 0;
    for(var i in cart){
        totalCount += cart[i].qty;
    }
    return totalCount;
}

function display() {
    if(Cart.length > 0){
        var item = "<table class='shopping-hover dropdown-menu multi-column columns-2 dropdown-menu-right'>";
        for(i in Cart){
                item += "<tr>"
                +"<td>"
                    +"<img  src='"+ base_url+"/images/product/med-"+ Cart[i].id+".jpg' width='100px' onError=\"this.src ='"+base_url+"/images/product/demo.jpg'\"/>"
                +"</td>"

                +"<td>"
                    +"<a href='"+base_url+"/medicine/view/" +Cart[i].id + "/" + Cart[i].name+"'>"
                        + Cart[i].name
                        +"<br />"
                        +Cart[i].qty
                        +"X "+ Cart[i].price
                        +"<b> = "+ priceItem(Cart[i].id) +"/-"
                    +"</b></a>"
                +"</td>"

                +"<td>"
                    +"<span class='removeItem' data-id='"+Cart[i].id
                    +"'><i class='fa fa-trash-o'></i></span>"
                +"</td>"

                +"</tr>";
        }
        item += "<tr><td>"
        +"</td><td>"
            +"<span class='price'>Total Price: </span>"
        +"</td>"
        +"</td><td>"
            +"Tk. <span class='grand-total'></span>"
        +"</td>"
        +"</tr>"
        +"<tr><td>"
        +"</td><td>"
            +"<a href='"+base_url+"/cart' class='btn btn-sm btn-info'>View Cart</a>"
        +"</td>"
        +"</td><td>"
            +"<a href='"+base_url+"/checkout' class='btn btn-sm btn-danger'>Checkout</a>"
        +"</td>"
        +"</tr>";

        item += "</table>";
    }else {
        var item = "";
    }
    $("#item-display").html(item);
    // console.log();
    $("#total-cart").html(Cart.length);
    $(".grand-total").html(priceCart());
}

function displayInCartPage() {
    if(Cart.length > 0){
        var item = "";
        for(i in Cart){
                item += "<tr>"
                +"<td><img src='"+ base_url+"/images/product/med-"+ Cart[i].id+".jpg' width='100px' onError=\"this.src ='"+base_url+"/images/product/demo.jpg'\"/>"
                +"</td><td><a href='"+base_url+"/medicine/view/" +Cart[i].id + "/" + Cart[i].name+"'><b>" + Cart[i].name
                +"</b></a><br />" + Cart[i].description
                +"</td><td><input type='number' data-id='"+Cart[i].id+"' name='qty' value='"+ Cart[i].qty+"' class='form-control text-center' style='width:120px'/>"
                +"</td><td>" + priceItem(Cart[i].id)
                +"</td><td>" +"<span class='removeItem' data-id='"+Cart[i].id
                +"'><i class='fa fa-trash-o'></i></span>"
                +"</td></tr>";
        }
    }else {
        var item = "";
    }
    $("#cart-item-display").html(item);
}
function saveCart(){
    localStorage.setItem("shoppingCart", JSON.stringify(Cart));
}
function loadCart(){
    Cart = JSON.parse(localStorage.getItem("shoppingCart"));
    if (Cart == null) {
        Cart = [];
    }
}
//ajax get with row js --------------------------------------------------------
function getAjax(url, success) {
    var xhr = window.XMLHttpRequest ? new XMLHttpRequest() : new ActiveXObject('Microsoft.XMLHTTP');
    xhr.open('GET', url);
    xhr.onreadystatechange = function() {
        if (xhr.readyState>3 && xhr.status==200) success(xhr.responseText);
    };
    xhr.setRequestHeader('X-Requested-With', 'XMLHttpRequest');
    xhr.send();
    return xhr;
}
// example request
// getAjax('http://foo.bar/?p1=1&p2=Hello+World', function(data){ console.log(data); });

//ajax post with row js --------------------------------------------------------
function postAjax(url, data, success, error) {
    var params = typeof data == 'string' ? data : Object.keys(data).map(
            function(k){ return encodeURIComponent(k) + '=' + encodeURIComponent(data[k]) }
        ).join('&');
    var xhr = window.XMLHttpRequest ? new XMLHttpRequest() : new ActiveXObject("Microsoft.XMLHTTP");
    xhr.open('POST', url);
    xhr.onreadystatechange = function() {
        if (xhr.readyState>3 && xhr.status==200) { success(xhr.responseText); }else {
            error(xhr.responseText);
        }
    };
    xhr.setRequestHeader('X-Requested-With', 'XMLHttpRequest');
    xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
    xhr.send(params);
    return xhr;
}
// example request
// postAjax('http://foo.bar/', 'p1=1&p2=Hello+World', function(data){ console.log(data); });
// example request with data object
// postAjax('http://foo.bar/', { p1: 1, p2: 'Hello World' }, function(data){ console.log(data); });
