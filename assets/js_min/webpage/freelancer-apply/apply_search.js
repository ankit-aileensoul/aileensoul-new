function login(){document.getElementById("error1").style.display="none"}function login_profile(){$("#login").modal("show")}function register_profile(){$("#login").modal("hide"),$("#register").modal("show")}function forgot_profile(){$("#forgotPassword").modal("show")}function sendmail(e){var a={userid:e};return $.ajax({type:"POST",url:base_url+"registration/sendmail",data:a,success:function(e){}}),!1}function create_profile_apply(e){$(".post_id_login").val(e),$(".pt15").html(" Don't have an account? <a class='db-479' href='javascript:void(0);' data-toggle='modal' onclick='register_profile("+e+");'>Create an account</a>"),$("#register").modal("show"),$("#postid").attr("class",e)}function login_profile_apply(e){var e=document.getElementById("postid").getAttribute("class");$("#register").modal("hide"),$(".password_login").val(""),$(".email_login").val(""),$(".post_id_login").val(e),$(".pt15").html(" Don't have an account? <a class='db-479' href='javascript:void(0);' data-toggle='modal' onclick='register_profile("+e+");'>Create an account</a>"),$("#login_apply").modal("show")}$(document).ready(function(){function e(){var e=$("#email_login").val(),a=$("#password_login").val(),r={email_login:e,password_login:a,csrf_token_name:csrf_hash};return $.ajax({type:"POST",url:base_url+"login/freelancer_apply_login",data:r,dataType:"json",beforeSend:function(){$("#error").fadeOut(),$("#btn1").html("Login ...")},success:function(e){"ok"==e.data?0==e.freelancerapply?window.location=base_url+"freelance-work/registration":($("#btn1").html('<img src="'+base_url+'images/btn-ajax-loader.gif" /> &nbsp; Login ...'),window.location=base_url+"freelance-work/home"):"password"==e.data?($("#errorpass").html('<label for="email_login" class="error">Please enter a valid password.</label>'),document.getElementById("password_login").classList.add("error"),document.getElementById("password_login").classList.add("error"),$("#btn1").html("Login")):($("#errorlogin").html('<label for="email_login" class="error">Please enter a valid email.</label>'),document.getElementById("email_login").classList.add("error"),document.getElementById("email_login").classList.add("error"),$("#btn1").html("Login"))}}),!1}$("#login_form").validate({rules:{email_login:{required:!0},password_login:{required:!0}},messages:{email_login:{required:"Please enter email address"},password_login:{required:"Please enter password"}},submitHandler:e})}),$(document).ready(function(){function e(){var e="",a=$("#first_name").val(),r=$("#last_name").val(),l=$("#email_reg").val(),s=$("#password_reg").val(),t=$("#selday").val(),o=$("#selmonth").val(),n=$("#selyear").val(),i=$("#selgen").val(),e=$(".post_id_login").val(),d={first_name:a,last_name:r,email_reg:l,password_reg:s,selday:t,selmonth:o,selyear:n,selgen:i,csrf_token_name:csrf_hash},m=new Date,u=m.getDate(),c=m.getMonth()+1,g=m.getFullYear();10>u&&(u="0"+u),10>c&&(c="0"+c);var m=g+"/"+c+"/"+u,_=n+"/"+o+"/"+t,p=Date.parse(m),f=Date.parse(_);if(f>p)return $(".dateerror").html("Date of birth always less than to today's date."),!1;if(0==n%4&&0!=n%100||0==n%400){if(4==o||6==o||9==o||11==o){if(31==t)return $(".dateerror").html("This month has only 30 days."),!1}else if(2==o&&(31==t||30==t))return $(".dateerror").html("This month has only 29 days."),!1}else if(4==o||6==o||9==o||11==o){if(31==t)return $(".dateerror").html("This month has only 30 days."),!1}else if(2==o&&(31==t||30==t||29==t))return $(".dateerror").html("This month has only 28 days."),!1;return $.ajax({type:"POST",url:base_url+"registration/reg_insert",dataType:"json",data:d,beforeSend:function(){$("#register_error").fadeOut(),$("#btn1").html("Create an account ...")},success:function(a){var r=a.userid;"ok"==a.okmsg?""==e?($("#btn-register").html("<img src="+base_url+'"images/btn-ajax-loader.gif"/> &nbsp; Sign Up ...'),window.location=base_url+"freelance-work/profile/live-post",sendmail(r)):($("#btn-register").html("<img src="+base_url+'"images/btn-ajax-loader.gif"/> &nbsp; Sign Up ...'),window.location=base_url+"freelance-work/profile/live-post/"+e,sendmail(r)):$("#register_error").fadeIn(1e3,function(){$("#register_error").html('<div class="alert alert-danger main"> <i class="fa fa-info-circle" aria-hidden="true"></i> &nbsp; '+a+" !</div>"),$("#btn1").html("Create an account")})}}),!1}$.validator.addMethod("lowercase",function(e,a,r){return r.test(e)},"Email should be in small character"),$("#register_form").validate({rules:{first_name:{required:!0},last_name:{required:!0},email_reg:{required:!0,email:!0,lowercase:/^[0-9a-z\s\r\n@!#\$\^%&*()+=_\-\[\]\\\';,\.\/\{\}\|\":<>\?]+$/,remote:{url:base_url+"registration/check_email",type:"post",data:{email_reg:function(){return $("#email_reg").val()},csrf_token_name:csrf_hash}}},password_reg:{required:!0},selday:{required:!0},selmonth:{required:!0},selyear:{required:!0},selgen:{required:!0}},groups:{selyear:"selyear selmonth selday"},messages:{first_name:{required:"Please enter first name"},last_name:{required:"Please enter last name"},email_reg:{required:"Please enter email address",remote:"Email address already exists"},password_reg:{required:"Please enter password"},selday:{required:"Please enter your birthdate"},selmonth:{required:"Please enter your birthdate"},selyear:{required:"Please enter your birthdate"},selgen:{required:"Please enter your gender"}},submitHandler:e})}),$(document).ready(function(){function e(){var e=$("#forgot_email").val(),a={forgot_email:e,csrf_token_name:csrf_hash};return $.ajax({type:"POST",url:base_url+"profile/forgot_live",data:a,dataType:"json",beforeSend:function(){$("#error").fadeOut(),$("#forgotbuton").html("Your credential has been send in your register email id")},success:function(e){"success"==e.data?$("#forgotbuton").html(e.data):$("#forgotbuton").html(e.message)}}),!1}$("#forgot_password").validate({rules:{forgot_email:{required:!0,email:!0}},messages:{forgot_email:{required:"Email address is required."}},submitHandler:e})}),$(document).on("click","[data-toggle*=modal]",function(){$("[role*=dialog]").each(function(){switch($(this).css("display")){case"block":$("#"+$(this).attr("id")).modal("hide")}})}),$(document).ready(function(){function e(){var e=$("#email_login_apply").val(),a=$("#password_login_apply").val(),r=$("#password_login_postid").val(),l={email_login:e,password_login:a,csrf_token_name:csrf_hash};return $.ajax({type:"POST",url:base_url+"login/freelancer_apply_login",data:l,dataType:"json",beforeSend:function(){$("#error").fadeOut(),$("#btn1").html("Login ...")},success:function(e){if("ok"==e.data)if($("#btn1").html('<img src="'+base_url+'images/btn-ajax-loader.gif" /> &nbsp; Login ...'),1==e.freelancerapply){var a="all",l=e.id;$.ajax({type:"POST",url:base_url+"freelancer/apply_insert",data:"post_id="+r+"&allpost="+a+"&userid="+l,dataType:"json",success:function(e){window.location=base_url+"freelance-work/home/live-post"}})}else window.location=base_url+"freelance-work/";else"password"==e.data?($("#errorpass_apply").html('<label for="email_login_apply" class="error">Please enter a valid password.</label>'),document.getElementById("password_login_apply").classList.add("error"),document.getElementById("password_login_apply").classList.add("error"),$("#btn1").html("Login")):($("#errorlogin_apply").html('<label for="email_login_apply" class="error">Please enter a valid email.</label>'),document.getElementById("email_login_apply").classList.add("error"),document.getElementById("email_login_apply").classList.add("error"),$("#btn1").html("Login"))}}),!1}$("#login_form_apply").validate({rules:{email_login_apply:{required:!0},password_login_apply:{required:!0}},messages:{email_login_apply:{required:"Please enter email address"},password_login_apply:{required:"Please enter password"}},submitHandler:e})});