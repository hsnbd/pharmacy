var token = $('meta[name="csrf-token"]').attr('content');
loadCart();
var base_url = base_url;
//loader bar //_________________________________________________________________
function loader(v) {
    if(v == 'on'){
        $("#log-in").css({ opacity: 0.3 });
        $("#loader").show(50);
    }else {
        $("#log-in").css({ opacity: 1 });
        $("#loader").hide(50);
    }
}
$(document).ready(function() {
    //Global .dropdown menu behaviur change_____________________________________
    $('.dropdown').hover(function() { $(this).find('.dropdown-menu').stop(true, true).fadeIn(); }, function() { $(this).find('.dropdown-menu').stop(true, true).fadeOut(); });
    //Search By Char, Shape , color_____________________________________________
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
    //Search Box //_____________________________________________________________
    $("#search").on("keyup", function() {
		var value = $(this).val();
        var url = $(this).attr("data-ajax-url");
        $.ajax({
            url : url,
            type: "POST",
            data: {
                'search': value,
                '_token': token
            },
            success: function (data) {
                $("#results").show();
        		$("#results").html(data);
            }
        });
	});
    //search results selector //________________________________________________
    $("body").on("click", ".rItem", function () {
        $("#search").val($(this).text());
        $("#results").hide();
    });
    //ads section_______________________________________________________________
    $(".ads-close").click(function () {
        $(this).hide(100);
        $(this).siblings("a").hide(100);
        $(this).siblings(".ads-warning").show(100);
    });
    //login form //_____________________________________________________________
    $("#sign-in").on("click", function(e){
        e.preventDefault();
        loader('on');
        var url = $("#log-in").attr('action');
        var email = $("#log-in").find("input[name=email]").val();
        var password = $("#log-in").find("input[name=password]").val();
        var remember = $("#log-in").find("input[name=remember]").val();
        $.ajax({
            url: url,
            type:'POST',
            data: {
                'email': email,
                'password': password,
                'remember': remember,
                '_token' : token
            },
            success:function(){
                loader('off');
                var s = 'Login Successful!';
                $(".login-form .alert").removeClass("alert-danger").addClass("alert-success").html(s).show();
                setTimeout(function() {
                    $('.login-form').modal('hide');
                    location.reload();
                }, 1000);
            },
            error: function (data) {
                loader('off');
                var errors = data.responseJSON.errors;
                var s = '';
                for(i in errors){ s += errors[i]; }
                $(".login-form .alert").addClass("alert-danger").html(s).show();
            }
        });
    });
    //sign up //________________________________________________________________
    $("#register").on("click", function(e){
        e.preventDefault();
        loader('on');
        var url = $("#sign-up").attr('action');
        var name = $("#sign-up").find("input[name=name]").val();
        var email = $("#sign-up").find("input[name=email]").val();
        var password = $("#sign-up").find("input[name=password]").val();
        var password_confirmation = $("#sign-up").find("input[name=password_confirmation]").val();
        $.ajax({
            url: url,
            type:'POST',
            data: {
                'name': name,
                'email': email,
                'password': password,
                'password_confirmation': password_confirmation,
                '_token' : token
            },
            success:function(){
                loader('off');
                var s = 'Registration Successful!';
                $(".sign-up-form .alert").addClass("alert-success").html(s).show();
                setTimeout(function() {
                    $('.sign-up-form').modal('hide');
                    location.reload();
                }, 1000);
            },
            error: function (data) {
                loader('off');
                var errors = data.responseJSON.errors;
                var s = "";
                for(i in errors){ s += "<li>" + errors[i] + "</li>"; }
                $(".sign-up-form .alert").addClass("alert-danger").html(s).show();
            }
        });
    });
    //address retrive//_________________________________________________________
    $("#address input[name=address]").on("change", function(e){
        e.preventDefault();
        var val = $(this).val();
        var url = base_url + '/get-address';
        if (val == "new") {$("#address .prev-address").find("li").remove(); $("#address .new-address").show(100); return; }
        $("#address .new-address").hide();
        $.ajax({
            url: url, type: 'POST', data: { '_token' : token },
            success: function (data) { $("#address .prev-address").html(data); },
            error: function (data) { $("#address .prev-address").addClass("alert-danger").html("").show(); }
        })
    });
    //submit with prev-address//________________________________________________
    $("#address .prev-address").on("click", "li", function () {
        $('#address .prev-address li.active').removeClass('active');
        $(this).addClass("active");
    });
    //submit with address add//_________________________________________________
    $("#address input[name=submit]").click(function (e) {
        e.preventDefault();
        var aid = $("#address .prev-address li.active").attr("data-id") || 0,
            name = $("#address input[name=name]").val(),
            address = $("#address textarea[name=address]").val(),
            contact = Number($("#address input[name=contact]").val()),
            ids = [],
            qtys = [],
            msg = "";

        for(i in Cart){ ids.push(Cart[i].id) ; qtys.push(Cart[i].qty) ; }

        if (aid < 1) {
            if (name.length < 3) { msg += "Name is Too Short"; }
            if (address.length < 5) { msg += "\nAddress is Too Short"; }
            if (contact.toString().length < 10) { msg += "\nPlease Give valid contact no"; }
            if (msg.length > 0) { alert(msg); return;}
        }
        $.ajax({
            url: base_url+'/add-full-cart',
            type: 'POST',
            data: {
                '_token' : token,
                'name': name,
                'address': address,
                'contact': contact,
                'aid': aid,
                'ids': ids,
                'qtys': qtys
            },
            success: function (data) {
                if (data = "true") {
                    Cart = [];
                    saveCart();
                    document.location.href = base_url +'/congratulation';
                }
            },
            error: function (data) {
                var errors = data.responseJSON.errors;
                var s = "";
                for(i in errors){ s += "<li>" + errors[i] + "</li>"; }
                $("#address .alert").addClass("alert-danger").html(s).show();
                console.log(data);
            }
        })
    });
    //__________________________________________________________________________
    $(".minus").click(function () {
        var old = Number($("#item-data input[name=qty]").val());
        if(old === 1){ return alert("Minimun Cart Qunatity Is 1"); }
        $("#item-data input[name=qty]").val(--old);
    });
    //__________________________________________________________________________
    $(".plus").click(function () {
        var old = Number($("#item-data input[name=qty]").val());
        var stock = Number($("#item-data button[name=submit]").attr("data-stock"));

        if(old == stock){
             return alert("Available Stock Is "+ stock +"");
        }else {
            $("#item-data input[name=qty]").val(++old);
        }
    });


//______________________________________________________________________________
    loadCart();
    display();
    displayInCartPage();
    $("#sub-total").html(priceCart());
    $("#grand-total").html(priceCart());
    //Add Cart In Single Page__________________________________________________________________
    $("body").on("click", "#item-data .add-cart", function () {
        var id = Number($(this).attr("data-id"));
        var name = $(this).attr("data-name");
        var description = $(this).attr("data-description");
        var price = Number($(this).attr("data-price"));
        var qty = Number($("#item-data input[name=qty]").val());
        if (qty < 1) return alert("Please Fill Quantity Properly");

        var stock = Number($(this).attr("data-stock"));
        if (stock < qty) return alert(qty + " Item Not Available Now!!! Pleasy Try Next Time Or Buy Available Stock ("+stock+")");

        alert(addItem(id, name, price, qty, description));
        display();
        displayInCartPage();
        $("#sub-total").html(priceCart());
        $("#grand-total").html(priceCart());
        $(".add-cart").text(qtyItem( id ) > 0 ? "Update Cart" : "Add To Cart");
    });

    //Update Cart on Cart Page
    $("body").on("change", "#cart-item-display input[name=qty]", function(){

        var id = Number($(this).attr("data-id"));
        var qty = Number($(this).val());

        if (qty < 1) return alert("Please Fill Quantity Properly");

        alert(updateItem(id, qty));

        display();
        displayInCartPage();
        $("#sub-total").html(priceCart());
        $("#grand-total").html(priceCart());
    });

    //Add Cart In Search Page__________________________________________________________________
    $("body").on("click", ".med-item .add-cart", function () {
        var id = Number($(this).attr("data-id"));
        var name = $(this).attr("data-name");
        var description = $(this).attr("data-description");
        var price = Number($(this).attr("data-price"));
        var qty = 1;

        var stock = Number($(this).attr("data-stock"));
        if (stock < qty) return alert(qty + " Item Not Available Now!!! Pleasy Try Next Time Or Buy Available Stock ("+stock+")");

        alert(addItem(id, name, price, qty, description));
        display();
        displayInCartPage();
        $("#sub-total").html(priceCart());
        $("#grand-total").html(priceCart());
        // $(this).text(qtyItem( id ) > 0 ? "Update Cart" : "Add To Cart");
    });

    //Remove Cart Item__________________________________________________________
    $("body").on("click", ".removeItem", function () {
        var id = $(this).attr("data-id");
        removeItem(id);
        $(this).parent().parent().remove();
        $("#total-cart").html(Cart.length);
        $("#item-data input[name=qty]").val("0");
        $(".add-cart").text("Add To Cart");
        if(Cart.length <1){ display(); }
        displayInCartPage();
        $(".grand-total").html(priceCart());
        $("#sub-total").html(priceCart());
        $("#grand-total").html(priceCart());
    });

    //Auto Rendaring Code__________________________________________________________________________
    $("#item-data input[name=qty]")
        .val(qtyItem(Number($("#item-data button[name=submit]")
        .attr("data-id"))) || 0);

    $("#item-data .add-cart")
        .text(qtyItem(Number($("#item-data button[name=submit]")
        .attr("data-id"))) > 0 ? "Update Cart" : "Add To Cart");

});//Ready Function is over
