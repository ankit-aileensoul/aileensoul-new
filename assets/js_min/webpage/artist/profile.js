function login_data(){$("#login").modal("show"),$("#register").modal("hide")}function forgot_profile(){$("#forgotPassword").modal("show")}function register_profile(){$("#login").modal("hide"),$("#register").modal("show")}function validate(){var e=$("#skills").val();""==e&&$("#multidropdown").addClass("error"),""==user_id&&(event.preventDefault(),$("#register").modal("show"))}function removevalidation(){$("#othercategory").removeClass("othercategory_require"),$("#othercategory_error").remove()}function validation_other(e){$("#othercategory_error").remove(),e.preventDefault();var r=$("#skills").val(),t="'"+r+"'",a=t.split(","),s=t.includes(26),o=document.getElementById("othercategory").value,i=o.trim();if(""==r)return!1;if(!(a.length<=10))return $("#skills").addClass("othercategory_require"),$('<span class="error" id="othercategory_error" style="float: right;color: red; font-size: 13px;">You can select at max 10 Art category. </span>').insertAfter("#skills"),!1;if(1==s){if(""==i)return $("#othercategory").addClass("othercategory_require"),$('<span class="error" id="othercategory_error" style="float: right;color: red; font-size: 13px;">Other art category required. </span>').insertAfter("#othercategory"),$("#othercategory").addClass("error"),!1;i&&$.ajax({type:"GET",url:base_url+"artist/check_category",data:"category="+i,success:function(e){"true"==e?($("#othercategory").addClass("othercategory_require"),$('<span class="error" id="othercategory_error" style="float: right;color: red; font-size: 13px;">This category already exists in art category field. </span>').insertAfter("#othercategory"),$("#othercategory").addClass("error")):$("#artinfo")[0].submit()}})}else(0==s&&""!=i||0==s&&""==i)&&$("#artinfo")[0].submit()}function submit_forgot(){var e=document.getElementById("forgot_email").value;""!=e&&($("#forgotPassword").modal("hide"),event.preventDefault())}function login(){document.getElementById("error1").style.display="none"}$(document).ready(function(){"live"==profile_login&&$("#register").modal("show"),$("#country").on("change",function(){var e=$(this).val();e?$.ajax({type:"POST",url:base_url+"artist/ajax_data",data:"country_id="+e,success:function(e){$("#state").html(e),$("#city").html('<option value="">Select state first</option>')}}):($("#state").html('<option value="">Select country first</option>'),$("#city").html('<option value="">Select state first</option>'))}),$("#state").on("change",function(){var e=$(this).val();e?$.ajax({type:"POST",url:base_url+"artist/ajax_data",data:"state_id="+e,success:function(e){$("#city").html(e)}}):$("#city").html('<option value="">Select state first</option>')})}),$(function(){$("#skills").multiSelect()}),$(document).ready(function(){var e=$("#skills").val();""!=e&&$("span").removeClass("custom-mini-select")}),$("#skills").change(function(){$("#multidropdown").removeClass("error"),$("#othercategory").removeClass("error");var e=$("#skills").val(),r="'"+e+"'",t=r.includes(26);if(1==t){$("span").removeClass("custom-mini-select");var a=document.querySelector(".multi-select-container");a.classList.remove("multi-select-container--open"),document.getElementById("other_category").style.display="block"}else""==e?$("span").addClass("custom-mini-select"):($("span").removeClass("custom-mini-select"),document.getElementById("other_category").style.display="none")}),jQuery.validator.addMethod("noSpace",function(e,r){return""==e||0!=e.trim().length},"No space please and don't leave it empty"),$.validator.addMethod("regx",function(e,r,t){return t.test(e)},"Only space and only number are not allow."),$(document).ready(function(){$("#artinfo").validate({ignore:"*:not([name])",rules:{firstname:{required:!0,regx:/^[a-zA-Z\s]*[a-zA-Z]/,noSpace:!0},lastname:{required:!0,regx:/^[a-zA-Z\s]*[a-zA-Z]/,noSpace:!0},email:{required:!0,email:!0},phoneno:{number:!0,minlength:8,maxlength:15},country:{required:!0},state:{required:!0},city:{required:!0},"skills[]":{required:!0}},messages:{firstname:{required:"First name is required."},lastname:{required:"Last name is required."},email:{required:"Email id is required",email:"Please enter valid email id",remote:"Email already exists"},country:{required:"Country is required."},state:{required:"State is required."},city:{required:"City is required."},"skills[]":{required:"Skill is required."}}})}),$(document).ready(function(){function e(){var e=$("#first_name").val(),r=$("#last_name").val(),t=$("#email_reg").val(),a=$("#password_reg").val(),s=$("#selday").val(),o=$("#selmonth").val(),i=$("#selyear").val(),l=$("#selgen").val(),n={first_name:e,last_name:r,email_reg:t,password_reg:a,selday:s,selmonth:o,selyear:i,selgen:l,"<?php echo $this->security->get_csrf_token_name(); ?>":"<?php echo $this->security->get_csrf_hash(); ?>"},d=new Date,u=d.getDate(),c=d.getMonth()+1,m=d.getFullYear();10>u&&(u="0"+u),10>c&&(c="0"+c);var d=m+"/"+c+"/"+u,g=i+"/"+o+"/"+s,h=Date.parse(d),y=Date.parse(g);if(y>h)return $(".dateerror").html("Date of birth always less than to today's date."),!1;if(0==i%4&&0!=i%100||0==i%400){if(4==o||6==o||9==o||11==o){if(31==s)return $(".dateerror").html("This month has only 30 days."),!1}else if(2==o&&(31==s||30==s))return $(".dateerror").html("This month has only 29 days."),!1}else if(4==o||6==o||9==o||11==o){if(31==s)return $(".dateerror").html("This month has only 30 days."),!1}else if(2==o&&(31==s||30==s||29==s))return $(".dateerror").html("This month has only 28 days."),!1;return $.ajax({type:"POST",url:base_url+"registration/reg_insert",dataType:"json",data:n,beforeSend:function(){$("#register_error").fadeOut(),$("#btn1").html("Create an account ...")},success:function(e){"ok"==e.okmsg?window.location=base_url+"artist/profile":$("#register_error").fadeIn(1e3,function(){$("#register_error").html('<div class="alert alert-danger main"> <i class="fa fa-info-circle" aria-hidden="true"></i> &nbsp; '+e+" !</div>"),$("#btn1").html("Create an account")})}}),!1}$.validator.addMethod("lowercase",function(e,r,t){return t.test(e)},"Email Should be in Small Character"),$("#register_form").validate({rules:{first_name:{required:!0},last_name:{required:!0},email_reg:{required:!0,email:!0,lowercase:/^[0-9a-z\s\r\n@!#\$\^%&*()+=_\-\[\]\\\';,\.\/\{\}\|\":<>\?]+$/,remote:{url:base_url+"registration/check_email",type:"post",data:{email_reg:function(){return $("#email_reg").val()},"<?php echo $this->security->get_csrf_token_name(); ?>":"<?php echo $this->security->get_csrf_hash(); ?>"}}},password_reg:{required:!0},selday:{required:!0},selmonth:{required:!0},selyear:{required:!0},selgen:{required:!0}},groups:{selyear:"selyear selmonth selday"},messages:{first_name:{required:"Please enter first name"},last_name:{required:"Please enter last name"},email_reg:{required:"Please enter email address",remote:"Email address already exists"},password_reg:{required:"Please enter password"},selday:{required:"Please enter your birthdate"},selmonth:{required:"Please enter your birthdate"},selyear:{required:"Please enter your birthdate"},selgen:{required:"Please enter your gender"}},submitHandler:e})}),$(document).ready(function(){$("#forgot_password").validate({rules:{forgot_email:{required:!0,email:!0}},messages:{forgot_email:{required:"Email Address Is Required."}}})}),$(document).ready(function(){function e(){var e=$("#email_login").val(),r=$("#password_login").val(),t={email_login:e,password_login:r,"<?php echo $this->security->get_csrf_token_name(); ?>":"<?php echo $this->security->get_csrf_hash(); ?>"};return $.ajax({type:"POST",url:base_url+"registration/user_check_login",data:t,dataType:"json",beforeSend:function(){$("#error").fadeOut(),$("#btn1").html("Login")},success:function(e){"ok"==e.data?window.location=base_url+"artist/profile":1==e.is_artistic?window.location=base_url+"artist/profile":"password"==e.data?($("#errorpass").html('<label for="email_login" class="error">Please enter a valid password.</label>'),document.getElementById("password_login").classList.add("error"),document.getElementById("password_login").classList.add("error"),$("#btn1").html("Login")):($("#errorlogin").html('<label for="email_login" class="error">Please enter a valid email.</label>'),document.getElementById("email_login").classList.add("error"),document.getElementById("email_login").classList.add("error"),$("#btn1").html("Login"))}}),!1}$("#login_form").validate({rules:{email_login:{required:!0},password_login:{required:!0}},messages:{email_login:{required:"Please enter email address"},password_login:{required:"Please enter password"}},submitHandler:e})});