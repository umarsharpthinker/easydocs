route = $('route').val
$(function () {
    $.ajax({
        type : "get",
        url : route+starRating.index,
        data : {
            "doctorId" : $('#Doctro_id').val()
        },
        dataType : "json",
        success : function(response){
            if(response.toString() == "noRecord"){

                $("#rateYo").rateYo({
                    rating: 0,
                    fullStar:true
                    //readOnly: true
                })
                console.log('in no record')
            }else {
                $("#rateYo").rateYo({
                    rating: response[0].rating,
                    fullStar:true,
                    readOnly: true
                })
                console.log(response)
                console.log('in found record '+response[0].rating)
                $('#drRate').html(response[0].rating+'<i class="fa fa-star fa-2x" style="color: goldenrod;margin-top: 4px" aria-hidden="true"></i>')
            }
        },
        error : function(response){
            console.log('fail')
        }
    });
});

$(function () {

    $("#rateYo")
        .on("rateyo.set", function (e, data) {
            $.ajax({
                type : "post",
                url : "{{route('starRating.store')}}",
                data : {
                    "rating" : data.rating,
                    "userId" : $('#auth_user').val(),
                    "doctorId" : $('#Doctro_id').val()
                },
                dataType : "json",
                success : function(response){
                    if(response.toString() == "sucess"){

                        console.log('sucess')
                    }
                },
                error : function(response){
                    console.log('fail')
                }
            });
            alert("The rating is set to " + data.rating + "!");
        });

});





//            getComments();
function getComments() {

    $.ajax({
        type: 'get',
        url: '\{\{route(\'showComment\')\}\}',
        dataType: 'json',
        data: {

            'id': $('#Doctro_id').val()

        },
        success: function (data) {

            if ((data.errors)) {
                console.log(JSON.stringify(data));
            } else {
                console.log(JSON.stringify(data));
                $.each( data, function( key, val ) {
                    var txt2 = $(" <li>  " +
                        "<div  class='commentText'><p> " + val.comments+"</p>"+"<span>"+ val.created_at+"</span>" +
                        "</div>" +
                        "</li>");  // Create text with jQuery

                    $("#commentList").append(txt2);     // Append new elements

//                            $("#commentList").appendChild(txt2);
                    //alert(val.comments);
                });


            }
        }
    });


}

getComments();

//        getComments();

$("#ajax").click(function(event) {
    event.preventDefault();

    $.ajax({
        type: "get",
        url: "{{ url('comment') }}",
        dataType: "json",
        data: {
            //'_token': $('input[name=_token]').val(),
            'id': $('#Doctro_id').val(),
            'comment': $('#comment').val()

        },

//                data: $('#ajax').serialize(),
        success: function(data){
            alert(sucess);


        },

        error: function(data){


            commentsreload();
            getComments();
            $('#comment').val('')


        }
    });

});



function commentsreload() {

    $.ajax({
        type: 'get',
        url: '\{\{route(\'showComment\')\}\}',
        dataType: 'json',
        data: {

            'id': $('#Doctro_id').val()

        },
        success: function (data) {

            if ((data.errors)) {
                console.log(JSON.stringify(data));
            } else {
                console.log(JSON.stringify(data));
                $.each( data, function( key, val ) {
                    var txt2 = $(" <li>  " +
                        "<div  class='commentText'><p> " + val.comments+"</p>"+"<span>"+ val.created_at+"</span>" +
                        "</div>" +
                        "</li>");  // Create text with jQuery

                    // Append new elements
                    $("#commentList").empty();
//                            $("#commentList").append( txt2)

//                            $("#commentList").appendChild(txt2);
                    //alert(val.comments);
                });


            }
        }
    });


}

