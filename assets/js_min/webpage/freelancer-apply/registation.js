function remove_validation(){$("#other_field").removeClass("keyskill_border_active"),$("#field_error").remove()}function check_yearmonth(){var e=$(".experience_year").val(),r=$(".experience_month").val();return null!=e||null!=r?($("#experience_error").remove(),$(".experience_month").removeClass("error"),$(".experience_year").removeClass("error"),!0):void 0}function login_profile(){$("#register").modal("hide"),$("#login").modal("show")}function forgot_profile(){$("#login").modal("hide"),$("#forgotPassword").modal("show")}function create_profile(){$("#login").modal("hide"),$("#register").modal("show")}function submitForm(){var e=$("#email_login").val(),r=$("#password_login").val(),a={email_login:e,password_login:r};return $.ajax({type:"POST",url:base_url+"registration/check_login",data:a,dataType:"json",beforeSend:function(){$("#error").fadeOut(),$("#btn1").html("Login ...")},success:function(e){"ok"==e.data?($("#btn1").html('<img src="'+base_url+'images/btn-ajax-loader.gif" /> &nbsp; Login ...'),window.location=base_url+"freelance-Work/home"):"password"==e.data?($("#errorpass").html('<label for="email_login" class="error">Please enter a valid password.</label>'),document.getElementById("password_login").classList.add("error"),document.getElementById("password_login").classList.add("error"),$("#btn1").html("Login")):($("#errorlogin").html('<label for="email_login" class="error">Please enter a valid email.</label>'),document.getElementById("email_login").classList.add("error"),document.getElementById("email_login").classList.add("error"),$("#btn1").html("Login"))}}),!1}function submitforgotForm(){var e=$("#forgot_email").val(),r={forgot_email:e};return $.ajax({type:"POST",url:base_url+"profile/forgot_live",data:r,dataType:"json",beforeSend:function(){$("#error").fadeOut(),$("#forgotbuton").html("Your credential has been send in your register email id")},success:function(e){"success"==e.data?$("#forgotbuton").html(e.data):$("#forgotbuton").html(e.message)}}),!1}$(".alert").delay(3200).fadeOut(300),$(document).ready(function(){function e(){var e=$("#first_name").val(),r=$("#last_name").val(),a=$("#email_reg").val(),t=$("#password_reg").val(),i=$("#selday").val(),l=$("#selmonth").val(),s=$("#selyear").val(),o=$("#selgen").val(),n={first_name:e,last_name:r,email_reg:a,password_reg:t,selday:i,selmonth:l,selyear:s,selgen:o},d=new Date,u=d.getDate(),m=d.getMonth()+1,c=d.getFullYear();10>u&&(u="0"+u),10>m&&(m="0"+m);var d=c+"/"+m+"/"+u,f=s+"/"+l+"/"+i,_=Date.parse(d),h=Date.parse(f);if(h>_)return $(".dateerror").html("Date of birth always less than to today's date."),!1;if(0==s%4&&0!=s%100||0==s%400){if(4==l||6==l||9==l||11==l){if(31==i)return $(".dateerror").html("This month has only 30 days."),!1}else if(2==l&&(31==i||30==i))return $(".dateerror").html("This month has only 29 days."),!1}else if(4==l||6==l||9==l||11==l){if(31==i)return $(".dateerror").html("This month has only 30 days."),!1}else if(2==l&&(31==i||30==i||29==i))return $(".dateerror").html("This month has only 28 days."),!1;return $.ajax({type:"POST",url:base_url+"registration/reg_insert",dataType:"json",data:n,beforeSend:function(){$("#register_error").fadeOut(),$("#btn1").html("Create an account ...")},success:function(e){e.userid;"ok"==e.okmsg?window.location=base_url+"freelance-work/registration":$("#register_error").fadeIn(1e3,function(){$("#register_error").html('<div class="alert alert-danger main"> <i class="fa fa-info-circle" aria-hidden="true"></i> &nbsp; '+e+" !</div>"),$("#btn1").html("Create an account")})}}),!1}user_session||$("#register").modal("show"),$.validator.addMethod("lowercase",function(e,r,a){return a.test(e)},"Email should be in small character"),$("#register_form").validate({rules:{first_name:{required:!0},last_name:{required:!0},email_reg:{required:!0,email:!0,lowercase:/^[0-9a-z\s\r\n@!#\$\^%&*()+=_\-\[\]\\\';,\.\/\{\}\|\":<>\?]+$/,remote:{url:base_url+"registration/check_email",type:"post",data:{email_reg:function(){return $("#email_reg").val()}}}},password_reg:{required:!0},selday:{required:!0},selmonth:{required:!0},selyear:{required:!0},selgen:{required:!0}},groups:{selyear:"selyear selmonth selday"},messages:{first_name:{required:"Please enter first name"},last_name:{required:"Please enter last name"},email_reg:{required:"Please enter email address",remote:"Email address already exists"},password_reg:{required:"Please enter password"},selday:{required:"Please enter your birthdate"},selmonth:{required:"Please enter your birthdate"},selyear:{required:"Please enter your birthdate"},selgen:{required:"Please enter your gender"}},submitHandler:e}),$("#country").on("change",function(){var e=$(this).val();e?$.ajax({type:"POST",url:base_url+"freelancer/ajax_data",data:"country_id="+e,success:function(e){$("#state").html(e),$("#city").html('<option value="">Select state first</option>')}}):($("#state").html('<option value="">Select country first</option>'),$("#city").html('<option value="">Select state first</option>'))}),$("#state").on("change",function(){var e=$(this).val();e?$.ajax({type:"POST",url:base_url+"freelancer/ajax_data",data:"state_id="+e,success:function(e){$("#city").html(e)}}):$("#city").html('<option value="">Select state first</option>')})}),$(function(){function e(e){return e.split(/,\s*/)}function r(r){return e(r).pop()}$("#skills1").bind("keydown",function(e){e.keyCode===$.ui.keyCode.TAB&&$(this).autocomplete("instance").menu.active&&e.preventDefault()}).autocomplete({minLength:2,source:function(e,a){$.getJSON(base_url+"general/get_skill",{term:r(e.term)},a)},focus:function(){return!1},select:function(r,a){var t=this.value,i=e(this.value);t=null==t||void 0==t?"":t;var l=t.indexOf(a.item.value+", ")>-1?"checked":"";if("checked"!=l){if(i.length<=15)return i.pop(),i.push(a.item.value),i.push(""),this.value=i.join(", "),!1;var s=i.pop();return $(this).val(this.value.substr(0,this.value.length-s.length-2)),$(this).effect("highlight",{},1e3),$(this).attr("style","border: solid 1px red;"),!1}i.push(a.item.value),this.value=i.split(", ")}})}),$.validator.addMethod("regx",function(e,r,a){return a.test(e)},"Only space, only number and only special characters are not allow"),$(document).ready(function(){$("#freelancer_regform").validate({rules:{firstname:{required:!0},lastname:{required:!0,regx:/^["-@.\/#&+,\w\s]*[a-zA-Z][a-zA-Z0-9]*/},email:{required:!0,email:!0,remote:{url:site+"freelancer/check_email",type:"post",data:{email:function(){return $("#email").val()},"<?php echo $this->security->get_csrf_token_name(); ?>":"<?php echo $this->security->get_csrf_hash(); ?>"}}},country:{required:!0},state:{required:!0},city:{required:!0},field:{required:!0},skills:{required:!0,regx:/^["-@.\/#&+,\w\s]*[a-zA-Z][a-zA-Z0-9]*/}},messages:{firstname:{required:"First name is required."},lastname:{required:"Last name is required."},email:{required:"Email id is required.",email:"Please enter valid email id.",remote:"Email already exists."},country:{required:"Country is required."},state:{required:"State is required."},city:{required:"City is required."},field:{required:"Field is required"},skills:{required:"Skill is required"}}})}),$("#freelancer_regform").submit(function(){$("#experience_error").remove(),$(".experience_month").removeClass("error"),$(".experience_year").removeClass("error");var e=$(".experience_year").val(),r=$(".experience_month").val();return null==e&&null==r?($(".experience_year").addClass("error"),$(".experience_month").addClass("error"),$('<span class="error" id="experience_error" style="float: right;color: red; font-size: 11px;">Experiance is required</span>').insertAfter("#experience_month"),!1):(consol.log(),!0)}),$(document).on("change",".field_other",function(e){$("#other_field").removeClass("keyskill_border_active"),$("#field_error").remove();var r=$(this),a=r.val();15==a&&(r.val(""),$("#bidmodal2").modal("show"),$(".message #field").off("click").on("click",function(){$("#other_field").removeClass("keyskill_border_active"),$("#field_error").remove();var e=$.trim(document.getElementById("other_field").value);if(""==e)return $("#other_field").addClass("keyskill_border_active"),$('<span class="error" id="field_error" style="float: right;color: red; font-size: 11px;">Empty Field  is not valid</span>').insertAfter("#other_field"),!1;var r=$(".message").find('input[type="text"]'),a=r.val();$.ajax({type:"POST",url:base_url+"freelancer/freelancer_other_field",dataType:"json",data:"other_field="+a,success:function(e){if($("#other_field").removeClass("keyskill_border_active"),$("#field_error").remove(),0==e.select)$("#other_field").addClass("keyskill_border_active"),$('<span class="error" id="field_error" style="float: right;color: red; font-size: 11px;">Written field already available in Field Selection</span>').insertAfter("#other_field");else if(1==e.select)$("#other_field").addClass("keyskill_border_active"),$('<span class="error" id="field_error" style="float: right;color: red; font-size: 11px;">Empty Field  is not valid</span>').insertAfter("#other_field");else{$("#bidmodal2").modal("hide"),$("#other_field").val(""),$("#other_field").removeClass("keyskill_border_active"),$("#field_error").removeClass("error");var r,a=document.querySelectorAll("label[for]");for(r=0;r<a.length;r++){var t=a[r].getAttribute("for");"fields_req"==t&&a[r].remove()}$("#fields_req").removeClass("error"),$(".field_other").html(e.select)}}})}))}),$(document).on("keydown",function(e){27===e.keyCode&&$("#bidmodal2").modal("hide")}),$("#submit").on("click",function(){return $("#freelancer_regform").valid()?($("#submit").addClass("register_disable"),!0):void 0}),$("#login_form").validate({rules:{email_login:{required:!0},password_login:{required:!0}},messages:{email_login:{required:"Please enter email address"},password_login:{required:"Please enter password"}},submitHandler:submitForm}),$("#forgot_password").validate({rules:{forgot_email:{required:!0,email:!0}},messages:{forgot_email:{required:"Email address is required."}},submitHandler:submitforgotForm});