$(document).ready(function() {


    $('.right-menu > ul > li > a').click(function(){

            if ($(this).attr('class') != 'active'){

			$('.right-menu  > ul > li > ul').slideUp(400);
            $(this).next().slideToggle(400);

                    $('.right-menu > ul > li > a').removeClass('active');
					$(this).addClass('active');
                    $.cookie('select_cat', $(this).attr('id'));

				}else
                {

                    $('.right-menu > ul > li > a').removeClass('active');
                    $('.right-menu > ul > li > ul').slideUp(400);
                    $.cookie('select_cat', '');
                }
});

if ($.cookie('select_cat') != '') {
    $('.right-menu > ul > li > #' + $.cookie('select_cat')).addClass('active').next().show();

}


});

/*
$("#price").click(function(){
$("#price-sort").slideToggle(400);
});

//$(".passfor").click(function(){
//$("#wrapper-for-remind").fadeIn(400);
//});


/*$('.hello-admin').toggle(
    function(){
    $("#profile-block").fadeIn(200);    
    },
    function(){
    $("#profile-block").fadeOut(200);
    }
);

$('#logout').click(function(){
   $.ajax({
    type:"POST",
    url:"/include/logout.php",
    dataType:"html",
    cache:false,
    success:function(data){
        
        if(data == 'logout')
        {
            location.reload();
        }
    }
   });
});
*/







