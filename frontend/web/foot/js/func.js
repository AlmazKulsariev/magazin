$(document).ready(function(){

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

if ($.cookie('select_cat') != '')
{
$('.right-menu > ul > li > #'+$.cookie('select_cat')).addClass('active').next().show();
}

});