function divClicked(){var e=$(this).html(),r=$("<textarea />");r.val(e),$(this).replaceWith(r),r.focus(),r.blur(editableTextBlurred)}function capitalize(e){return e[0].toUpperCase()+e.slice(1)}function editableTextBlurred(){var e=$(this).val(),r=$("<a>");(e.match(/^\s*$/)||""==e)&&(e="Current Work"),r.html(capitalize(e)),$(this).replaceWith(r),r.click(divClicked),$.ajax({url:base_url+"freelancer/hire_designation",type:"POST",data:{designation:e},success:function(e){}})}function checkvalue(){var e=$.trim(document.getElementById("tags").value),r=$.trim(document.getElementById("searchplace").value);return""==e&&""==r?!1:void 0}function check(){var e=$.trim(document.getElementById("tags1").value),r=$.trim(document.getElementById("searchplace1").value);return""==e&&""==r?!1:void 0}function picpopup(){$(".biderror .mes").html("<div class='pop_content'>Please select only Image File Type.(jpeg,jpg,png,gif)"),$("#bidmodal").modal("show")}function login_profile(){$("#login").modal("show")}function forgot_profile(){$("#forgotPassword").modal("show")}function submitForm(){var e=$("#email_login").val(),r=$("#password_login").val(),a={email_login:e,password_login:r};return $.ajax({type:"POST",url:base_url+"registration/check_login",data:a,dataType:"json",beforeSend:function(){$("#error").fadeOut(),$("#btn1").html("Login ...")},success:function(e){"ok"==e.data?($("#btn1").html('<img src="'+base_url+'images/btn-ajax-loader.gif" /> &nbsp; Login ...'),window.location=base_url+"freelance-hire/employer-details/"+segment3):"password"==e.data?($("#errorpass").html('<label for="email_login" class="error">Please enter a valid password.</label>'),document.getElementById("password_login").classList.add("error"),document.getElementById("password_login").classList.add("error"),$("#btn1").html("Login")):($("#errorlogin").html('<label for="email_login" class="error">Please enter a valid email.</label>'),document.getElementById("email_login").classList.add("error"),document.getElementById("email_login").classList.add("error"),$("#btn1").html("Login"))}}),!1}function submitforgotForm(){var e=$("#forgot_email").val(),r={forgot_email:e};return $.ajax({type:"POST",url:base_url+"profile/forgot_live",data:r,dataType:"json",beforeSend:function(){$("#error").fadeOut(),$("#forgotbuton").html("Your credential has been send in your register email id")},success:function(e){"success"==e.data?$("#forgotbuton").html(e.data):$("#forgotbuton").html(e.message)}}),!1}$(document).on("keydown",function(e){27===e.keyCode&&$("#bidmodal-2").modal("hide")}),$(document).ready(function(){function e(){var e=$("#first_name").val(),r=$("#last_name").val(),a=$("#email_reg").val(),t=$("#password_reg").val(),l=$("#selday").val(),s=$("#selmonth").val(),i=$("#selyear").val(),o=$("#selgen").val(),n={first_name:e,last_name:r,email_reg:a,password_reg:t,selday:l,selmonth:s,selyear:i,selgen:o},d=new Date,u=d.getDate(),m=d.getMonth()+1,c=d.getFullYear();10>u&&(u="0"+u),10>m&&(m="0"+m);var d=c+"/"+m+"/"+u,g=i+"/"+s+"/"+l,f=Date.parse(d),h=Date.parse(g);if(h>f)return $(".dateerror").html("Date of birth always less than to today's date."),!1;if(0==i%4&&0!=i%100||0==i%400){if(4==s||6==s||9==s||11==s){if(31==l)return $(".dateerror").html("This month has only 30 days."),!1}else if(2==s&&(31==l||30==l))return $(".dateerror").html("This month has only 29 days."),!1}else if(4==s||6==s||9==s||11==s){if(31==l)return $(".dateerror").html("This month has only 30 days."),!1}else if(2==s&&(31==l||30==l||29==l))return $(".dateerror").html("This month has only 28 days."),!1;return $.ajax({type:"POST",url:base_url+"registration/reg_insert",dataType:"json",data:n,beforeSend:function(){$("#register_error").fadeOut(),$("#btn1").html("Create an account ...")},success:function(e){e.userid;"ok"==e.okmsg?window.location=base_url+"freelance-work/registration":$("#register_error").fadeIn(1e3,function(){$("#register_error").html('<div class="alert alert-danger main"> <i class="fa fa-info-circle" aria-hidden="true"></i> &nbsp; '+e+" !</div>"),$("#btn1").html("Create an account")})}}),!1}$("a.designation").click(divClicked),user_session||$("#register").modal("show"),$.validator.addMethod("lowercase",function(e,r,a){return a.test(e)},"Email should be in small character"),$("#register_form").validate({rules:{first_name:{required:!0},last_name:{required:!0},email_reg:{required:!0,email:!0,lowercase:/^[0-9a-z\s\r\n@!#\$\^%&*()+=_\-\[\]\\\';,\.\/\{\}\|\":<>\?]+$/,remote:{url:base_url+"registration/check_email",type:"post",data:{email_reg:function(){return $("#email_reg").val()}}}},password_reg:{required:!0},selday:{required:!0},selmonth:{required:!0},selyear:{required:!0},selgen:{required:!0}},groups:{selyear:"selyear selmonth selday"},messages:{first_name:{required:"Please enter first name"},last_name:{required:"Please enter last name"},email_reg:{required:"Please enter email address",remote:"Email address already exists"},password_reg:{required:"Please enter password"},selday:{required:"Please enter your birthdate"},selmonth:{required:"Please enter your birthdate"},selyear:{required:"Please enter your birthdate"},selgen:{required:"Please enter your gender"}},submitHandler:e})}),$(document).ready(function(){$("html,body").animate({scrollTop:265},100)}),$("#login_form").validate({rules:{email_login:{required:!0},password_login:{required:!0}},messages:{email_login:{required:"Please enter email address"},password_login:{required:"Please enter password"}},submitHandler:submitForm}),$("#forgot_password").validate({rules:{forgot_email:{required:!0,email:!0}},messages:{forgot_email:{required:"Email address is required."}},submitHandler:submitforgotForm});