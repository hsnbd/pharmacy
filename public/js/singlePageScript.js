$(document).ready(function(){
    $("body").on("click", "#watchList", function(){
        var id = Number($("#item-data .add-cart").attr("data-id"));
        $.ajax({
            url: base_url+'/add-watch-list',
            type: 'POST',
            data: {
                '_token' : token,
                'id': id,
            },
            success: function(res){
                alert(res['msg']);
                if (res['status']) {
                    $("#watchList").removeClass('fa-heart-o');
                    $("#watchList").addClass('fa-heart');
                    $("#watchList").attr('title', 'Aleady added');
                }
            }
        })
    });

    var rating = Number($('.rating').attr('data-rate'));
    var point = $(`.rating span:nth-of-type(${rating})`);
    if(rating>0){
        point.html('&starf;');
        point.prevAll().html('&starf;');
        point.nextAll().html('&star;');
    }

    $('body').on('click', '.rating span', function(){
        var id = Number($("#item-data .add-cart").attr("data-id"));
        var rate = Number($(this).attr('data-value'));
        $(this).html('&starf;');
        $(this).prevAll().html('&starf;');
        $(this).nextAll().html('&star;');
        $.ajax({
            url: base_url+'/add-rating',
            type: 'POST',
            data: {
                'id': id,
                'rating': rate,
                '_token': token,
            },
            success: function(res){
                alert(res['msg']);
            }
        });
    });

    // $('body').on('click', '.addComment',function(e){
    //     e.preventDefault();
    //     var comment = $(this, 'textarea').val();
    //     var id = Number($("#item-data .add-cart").attr("data-id"));
    //
    //     $.ajax({
    //         url: base_url+'/add-comment',
    //         type: 'POST',
    //         data: {
    //             'id': id,
    //             'comment': comment,
    //             '_token': token,
    //         },
    //         success: function(res){
    //             alert(res['msg']);
    //         }
    //     });
    // })
})
