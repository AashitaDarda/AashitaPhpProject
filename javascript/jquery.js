$(document).ready(function(){

    var rating_data = 0;

   

    $(document).on('click','.fa-star',function(){
        rating_data = $(this).data('rating');
        // localStorage.setItem('rating_data',rating_data);
        console.log(rating_data)
        $('#rating1').val(rating_data);

        $('.fa-star').on('mouseenter',function(){
            var rating = $(this).data('rating');
            console.log(rating);
            reset_background();
            for(var count = 1; count <=rating; count++){
                $('#submit_star_' +count).addClass('text-warning');
            }
        });
    })

    function reset_background(){
        for(var count = 1; count <= 5; count++ ){
            $('#submit_star_'+count).addClass('star-light');
            $('#submit_star_'+count).removeClass('text-warning');
        }
    }    

   

    // $('#save_review').on('click',function(){
    //     var user_review = $('#user_review').val();
    //     // var rating_data = $('#rating1').val();
    //     var rating_data = localStorage.getItem('rating_data');
    //     // if(user_review !== ''){
    //     //     // $.ajax({
    //     //     //     url:'review.php',
    //     //     //     type:'POST',
    //     //     //     data:{rating_data:rating_data , user_review:user_review},
    //     //     //     success:function(data){
    //     //     //         if(data == false){
    //     //     //             alert('review and rating is not gone properly')
    //     //     //         }
    //     //     //         else{
                         
    //     //     //             alert('review and rating is done successfully');
    //     //     //         }
    //     //     //     }
    //     //     // })
    //     // }
    // });


});

$(document).ready(function(){
    $('#inputConPassword').on('keyup',function(){
        var pass = $('#inputPassword').val();
        var conpass =$('#inputConPassword').val();

        if(pass === conpass){
            $('#invalid_feedback').html('Password Matched').css('color','green').fadeOut(3000);
        }
        else{
            $('#invalid_feedback').html('Password didnot Matched').css('color','red');
        }
    })

    $('#inputName').on('keyup',function(){
        var name = $('#inputName').val();
        var namepattern = /^[a-zA-Z\s_, ]*$/;
        if(namepattern.test(name) && name.length > 2){
            $('#invalid_name').hide();
        }
        else{
            $('#invalid_name').html('!!Should contain only Characters and name length should be start with 3 letters!!')
        }
    })
})


