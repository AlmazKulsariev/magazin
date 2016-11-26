<?php 
    require_once('include/db_connect.php');
    require_once('function/functions.php');
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
    <meta charset="UTF-8"/>
    <title>auto</title>
    <link rel="stylesheet" href="css/style.css"/>
    <link rel="stylesheet" href="css/reset.css"/>
    <link href="trackbar/trackbar.css" rel="stylesheet" type="text/css" />

    <script type="text/javascript" src="/js/jquery-1.8.2.min.js"></script>
    <script type="text/javascript" src="/js/jquery.cookie.min.js"></script>
    <script type="text/javascript" src="/js/jquery.validate.js"></script>
    <script type="text/javascript" src="/js/jquery.form.js"></script>
    <script type="text/javascript" src="/js/script.js"></script> 
    


</head>
<body>
<div id="wrapper">
<header>
    <div class="main-top-block">
    <div id="top-block">
        <a href="https://www.google.kz/" id="mail"><p>Almazfrom@gmail.com</p></a>
        
       
        
        
        
        <ul id="list-auth">
            
            <li><a href="">Зарегистрироваться</a></li>
             <li><a href="">Войти</a><span>|</span></li>
             <li><img src="images/icon-auth.png"/></li>
        </ul>
    </div>
    </div>
    
    <div class="top-middle-block">  
        <div id="top-middle-blockin">
                    
            <a href="index.php"><img src="images/logo.png" alt="logo" id="logo"/></a>
           <!-- <p>Футбольная экипировка по самым низким ценам!</p>-->
           <div id="block-for-join"> 
           <div id="search-block">
               <form action="" name="search">
                <input type="text" name="search" placeholder="Поиск по сайту"/>
                <button type="submit" name="search_button" value=" " id="search-button" ></button>
               </form>
            </div>
            
            <div id="cart">
               <ul>
                <li><a href="">Корзина</a><span>5</span></li>
                <li><p>4500c</p></li>
               </ul>
            </div>
            </div>
       </div> 
    </div>
<?php
require_once('include/menu.php');	
?>            
</header>
<div class="clear"></div>
<div id="wrapper-for-reg">
<form action="/reg/handler_reg.php" method="post" id="form_reg">
<p id="reg_message"></p>
<div id="block-for-reg">
<h2 class="reg-tittle">Регстрация</h2>
<ul id="list-reg">
    <li>
    <label>Логин</label>
    <span class="dot">*</span>
    <input type="text" name="reg_login" id="reg_login" placeholder="login"/>
    </li>

    <li>
    <label>Пароль</label>
    <span class="dot">*</span>
    <input type="text" name="reg_password" id="reg_password" placeholder="password"/>
    <span id="genpassword">Сгенерировать</span>
    </li>
    
    <li>
    <label>Фамилия</label>
    <span class="dot">*</span>
    <input type="text" name="reg_surname" id="reg_surname"  placeholder="Ibrahimovic"/>
    </li>
    
    <li>
    <label>Имя</label>
    <span class="dot">*</span>
    <input type="text" name="reg_name" id="reg_name"  placeholder="Zlatan"/>
    </li>   
    
    <li>
    <label>E-mail</label>
    <span class="dot">*</span>
    <input type="text" name="reg_email" id="reg_email" placeholder="Ibra@gmail.com"/>
    </li> 
    
    <li>
    <label>Номер Телефона</label>
    <span class="dot">*</span>
    <input type="text" name="reg_phone" id="reg_phone" placeholder="phone number"/>
    </li>     

    <li>
    <label>Адресс доставки</label>
    <span class="dot">*</span>
    <input type="text" name="reg_adress" id="reg_adress" placeholder="adress/24"/>
    </li> 
    
    <li>
    <div id="block-captcha">
    <img src="/reg/reg_captcha.php"/>
    <input type="text" name="reg_captcha" id="reg_captcha"/>
    <p id="reload-captcha">Обновить</p>
    </div>
    </li>     
</ul>

</div>
<p align="center"><input type="submit" name="reg_submit" id="form_submit" value="Регистрация"/></p>

</form>

</div>

</div>

<script>
$(document).ready(function() {	
    $('#form_reg').validate({	
        // правила для проверки
        rules:{
        	"reg_login":{
        		required:true,
        		minlength:4,
                maxlength:15,
                remote: {
                    type: "post",    
                    url: "/reg/check_login.php"
                }
        	},
        	"reg_password":{
        		required:true,
        		minlength:6,
                maxlength:15
        	},
        	"reg_surname":{
        		required:true,
                minlength:3,
                maxlength:15
        	},
        	"reg_name":{
        		required:true,
                minlength:2,
                maxlength:15
        	},
        	"reg_email":{
        	    required:true,
        		email:true
        	},
        	"reg_phone":{
        		required:true
        	},
        	"reg_adress":{
        		required:true
        	},
        	"reg_captcha":{
        		required:true,
                remote: {
                    type: "post",    
                    url: "/reg/check_captcha.php"
                }                
        	}
        },        
        // выводимые сообщения при нарушении соответствующих правил
        messages:{
        	"reg_login":{
        		required:"Укажите Логин!",
                minlength:"От 4 до 15 символов!",
                maxlength:"От 4 до 15 символов!",
                remote: "Логин занят!"
        	},
        	"reg_password":{
        		required:"Укажите Пароль!",
                minlength:"От 6 до 15 символов!",
                maxlength:"От 6 до 15 символов!"
        	},
        	"reg_surname":{
        		required:"Укажите вашу Фамилию!",
                minlength:"От 3 до 20 символов!",
                maxlength:"От 3 до 20 символов!"                            
        	},
        	"reg_name":{
        		required:"Укажите ваше Имя!",
                minlength:"От 2 до 15 символов!",
                maxlength:"От 2 до 15 символов!"                               
        	},
        	"reg_email":{
        	    required:"Укажите свой E-mail",
        		email:"Не корректный E-mail"
        	},
        	"reg_phone":{
        		required:"Укажите номер телефона!"
        	},
        	"reg_adress":{
        		required:"Необходимо указать адрес доставки!"
        	},
        	"reg_captcha":{
        		required:"Введите код с картинки!",
                remote: "Не верный код проверки!"
        	}
        },        
        submitHandler: function(form){
            $(form).ajaxSubmit({
                success: function(data) {            							 
                    if (data == 'true') {
                       $("#block-for-reg").fadeOut(300,function() {                
                           $("#reg_message").addClass("reg_message_good").fadeIn(400).html("Вы успешно зарегистрированы!");
                           $("#form_submit").hide();                
                       });                 
                    } else {
                       $("#reg_message").addClass("reg_message_error").fadeIn(400).html(data); 
                    }
            	} 
            }); 
        }
    });
});
    
         
</script>







<footer>
    <footer class="infooter">
        <img src="images/logo.png"/>
        
        <p>&copy;<?php echo date(' Y')?> Footstore | Все права защищены</p>    
    </footer>
</footer>
</body>
</html>