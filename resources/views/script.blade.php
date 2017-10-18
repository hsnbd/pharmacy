@extends('master')
@section('content')

    <ul >
        <li><a class="add-cart" href="#" data-name="Apple" data-price="2.2">Apple</a> <a class="remove" href="#" data-name="Apple">X</a></li>
        <li><a class="add-cart" href="#" data-name="Banana" data-price="2.2">Banana</a> <a class="remove" href="#" data-name="Banana">X</a></li>
        <li><a class="add-cart" href="#" data-name="Pear" data-price="2.2">Pear</a> <a class="remove" href="#" data-name="Pear">X</a></li>
    </ul>
    <ul id="result">

    </ul>

    <button type="button" name="button" class="btn btn-sm btn-danger" id="clear" onclick="clearCart()">Clear Cart</button>

    <script type="text/javascript">

    $("body").on("click", ".add-cart", function (event) {
        event.preventDefault();
        var name = $(this).attr("data-name");
        var price = Number($(this).attr("data-price"));

        addItemToCart(name, price, 1);
        saveCart();
        displayCart();
    })
    $("body").on("click",".remove", function (event) {
        event.preventDefault();
        var name = $(this).attr("data-name");

        removeItemFromCartAll(name);
        saveCart();
        displayCart();
    })

    function displayCart() {
        var cartArray = listCart();
        var total = totalCart()
        var output = "";
        for(var i in cartArray){
            output += "<li>"+cartArray[i].name + " " +cartArray[i].count + " = "+ thisTotal(cartArray[i].name)+"</li>";
        }
        output +=  "<li> Total: " + total + "</li>";
        $("#result").html(output);
    }


    //*******************************************************
        var cart = [];
        var Item = function(name, price, count){
            this.name = name;
            this.price = price;
            this.count = count;
        }
        function addItemToCart(name, price, count){
            for (var i in cart) {
                if (cart[i].name === name) {
                    cart[i].count += count;
                    saveCart();
                    return;
                }
            }
            var item = new Item(name, price, count);
            cart.push(item);
            saveCart();
        }

        function removeItemFromCart(name){ // Remove One Item
            for (var i in cart) {
                if (cart[i].name === name) {
                    cart[i].count--;
                    if (cart[i].count === 0) {
                        cart.splice(i, 1);
                    }
                    return;
                }
            }
            saveCart();
        }
        function removeItemFromCartAll(name){ // Remove All Item Name
            for (var i in cart) {
                if (cart[i].name === name) {
                    cart.splice(i, 1);
                }
                return;
            }
            saveCart();
        }
        function clearCart(){
            cart = {};
            saveCart();
            displayCart();
        }
        function countCart(){ // return total count
            var totalCount = 0;
            for(var i in cart){
                totalCount += cart[i].count;
            }
            return totalCount;
        }
        function thisTotal(name) { // return total cost
            var thisTotal = 0;
            for(var i in cart){
                if (cart[i].name === name) {
                    return thisTotal = (cart[i].price * cart[i].count).toFixed(2);
                }
            }
        }
        function totalCart() { // return total cost
            var totalCost = 0;
            for(var i in cart){
                totalCost += cart[i].price * cart[i].count;
            }
            return totalCost.toFixed(2);
        }
        // addItemToCart("Apple", 2.0, 1);
        function listCart(){ // array of Item
            var cartCopy = [];
            for(var i in cart){
                var item = cart[i];
                var itemCopy = {};
                for (var p in item){
                    itemCopy[p] = item[p];
                }
                cartCopy.push(itemCopy);
            }
            return cartCopy;
        }
        function saveCart(){
            localStorage.setItem("shoppingCart", JSON.stringify(cart));
        }
        function loadCart(){
            cart = JSON.parse(localStorage.getItem("shoppingCart"));
        }

        loadCart();
        console.log(loadCart());



        //*******************
        // var array = listCart();
        // array[0].name = "Mistake";
        // console.log(array);

        console.log(cart);
        console.log(countCart());
        console.log(totalCart());

        displayCart();
    </script>

@endsection

@push('scripts')
    {{-- <script type="text/javascript" src="/js/script.js"></script> --}}
@endpush
