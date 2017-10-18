$(document).ready(function() {
    //call token globally
    var token = $('meta[name="csrf-token"]').attr('content');
    //Global .dropdown menu behaviur change
    $('.dropdown').hover(function() {
        $(this).find('.dropdown-menu').stop(true, true).fadeIn();
    }, function() {
        $(this).find('.dropdown-menu').stop(true, true).fadeOut();
    });

    //Search By Char, Shape , color
    $('#filterType').on('change', function() {
        var q = $(this).val();
        if(q == 'alphabet'){
            $("#shape").hide(100);
            $("#char").show(100);
        }else if (q == 'shape') {
            $("#shape").show(100);
            $("#char").hide(100);
        }else {
            $("#shape").hide(100);
            $("#char").hide(100);
        }
    });

    //Search Box
    $("#search").on("keyup", function() {
		var value = $(this).val();
		$.ajax({
            type: "POST",
            url:"/livesearch",
            data:{
                'search': value,
                '_token': token
            },
            success: function(data) {
				$("#results").show();
				$("#results").html(data);
            }
        });
	});
    $("body").on("click", ".rItem", function () {
        $("#search").val($(this).text());
        $("#results").hide();
    });

    //ads section
    $(".ads-close").click(function () {
        $(this).hide(100);
        $(this).siblings("a").hide(100);
        $(this).siblings(".ads-warning").show(100);
    });

    var loginForm = $(".login-form");
    loginForm.submit(function(e){
        e.preventDefault();
        // var formData = loginForm.serialize();
        var username = $(this).find("input[name=email]").val();
        var password = $(this).find("input[name=password]").val();
        var formData = {username, password};
        console.log(formData);
        // $.ajax({
        //     url:'/login',
        //     type:'POST',
        //     data: username,
        //     success:function(data){
        //         console.log(data);
        //         alert('Successfully Loaded');
        //     },
        //     error: function (data) {
        //         console.log(data);
        //     }
        // });
    });

    $(".minus").click(function () {
        var old = Number($("#item-data input[name=qty]").val());
        if(old === 1){ return alert("Minimun Cart Qunatity Is 1"); }
        $("#item-data input[name=qty]").val(--old);
    });
    $(".plus").click(function () {
        var old = Number($("#item-data input[name=qty]").val());
        $("#item-data input[name=qty]").val(++old);
    });


    //add to cart ----------------------------------------------------------
    var Cart = [];
    function addItem(id, name, price, qty) {
        for (var i in Cart) {
            if (Cart[i].name === name) {
                Cart[i].qty = qty;
                saveCart();
                return "Cart Updated Successfully";
            }
        }
        Cart.push({id, name, price, qty});
        saveCart();
        return "Cart Added Successfully";
    }
    // function minusItem(id, qty){
    //     for (var i in Cart) {
    //         if (Cart[i].id === id) {
    //             Cart[i].qty -= qty;
    //             if (Cart[i].qty === 0) { Cart.splice(i, 1); }
    //             saveCart();
    //             return;
    //         }
    //     }
    // }
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
            if(Cart[i].id == id){ return Cart[i].qty;}
        }
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
                    +"'>X</span> <a href='/medicine/view/" +Cart[i].id + "/" + Cart[i].name
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
        $("#total-cart").html(Cart.length);
    }
    function displayInCartPage() {
        if(Cart.length > 0){
            var item = "<ul class='dropdown-menu dropdown-menu-right'>";
            for(i in Cart){
                    item += "<li>"
                    +"<span class='removeItem' data-id='"+Cart[i].id
                    +"'>X</span> <a href='/medicine/view/" +Cart[i].id + "/" + Cart[i].name
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
        $("#total-cart").html(Cart.length);
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
    loadCart();
    display();
    //++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
    $("body").on("click", ".add-cart", function () {
        var id = Number($("#item-data input[name=id]").val());
        var name = $("#item-data input[name=name]").val();
        var price = Number($("#item-data input[name=price]").val());
        var qty = Number($("#item-data input[name=qty]").val());

        alert(addItem(id, name, price, qty));
        display();
        $(".add-cart").text(qtyItem(Number($("#item-data input[name=id]").val())) > 0 ? "Update Cart" : "Add To Cart");
    });

    $("body").on("click", ".removeItem", function () {
        var id = $(this).attr("data-id");
        removeItem(id);
        $(this).parent().remove();
        $("#total-cart").html(Cart.length);
        $(".add-cart").text(qtyItem(Number($("#item-data input[name=id]").val())) > 0 ? "Update Cart" : "Add To Cart");
        if(Cart.length <1){ display(); }
    });

    $("#item-data input[name=qty]").val(qtyItem(Number($("#item-data input[name=id]").val())) || 0);
    $(".add-cart").text(qtyItem(Number($("#item-data input[name=id]").val())) > 0 ? "Update Cart" : "Add To Cart");
})
