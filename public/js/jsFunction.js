//Js baseUrl______________________________________________________________
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
function addItem(id, name, price, qty) {
    for (var i in Cart) {
        if (Cart[i].id === id) {
            Cart[i].qty = qty;
            saveCart();
            return "Cart Updated Successfully";
        }
    }
    Cart.push({id, name, price, qty});
    saveCart();
    return "Cart Added Successfully";
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
        var item = "<ul class='dropdown-menu dropdown-menu-right'>";
        for(i in Cart){
                item += "<li>"
                +"<span class='removeItem' data-id='"+Cart[i].id
                +"'>X</span> <a href='"+base_url+"/medicine/view/" +Cart[i].id + "/" + Cart[i].name
                +"'><b>" + Cart[i].name
                +" </b><br />&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; "+ Cart[i].qty
                + " X "+ Cart[i].price
                +" <b> = $"+ priceItem(Cart[i].id)
                +"</b></a></li>";
        }
        item += "</ul>";
    }else {
        var item = "";
    }
    $("#item-display").html(item);
    console.log();
    $("#total-cart").html(Cart.length);
}
function displayInCartPage() {
    if(Cart.length > 0){
        var description = "This is a demo description for testing puspose";
        var item = "";
        for(i in Cart){
                item += "<tr>"
                +"<td><img src='"+base_url+"/images/200x200.jpg' alt='' width='50px' />"
                +"</td><td><b>" + Cart[i].name
                +"</b><br />" + description
                +"</td><td>" + Cart[i].qty
                +"</td><td>" + priceItem(Cart[i].id)
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
