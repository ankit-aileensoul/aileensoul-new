function business_following(e,t){isProcessing||(isProcessing=!0,$.ajax({type:"POST",url:base_url+"business_profile/ajax_following/"+e+"?page="+t,data:{total_record:$("#total_record").val()},dataType:"html",beforeSend:function(){"undefined"==t?$(".contact-frnd-post").prepend('<p style="text-align:center;"><img class="loader" src="'+base_url+'images/loading.gif"/></p>'):$("#loader").show()},complete:function(){$("#loader").hide()},success:function(e){$(".loader").remove(),$(".contact-frnd-post").append(e);var t=$(".post-design-box").length;0==t?$("#dropdownclass").addClass("no-post-h2"):$("#dropdownclass").removeClass("no-post-h2"),isProcessing=!1}}))}function checkvalue(){var e=$.trim(document.getElementById("tags").value),t=$.trim(document.getElementById("searchplace").value);return""==e&&""==t?!1:void 0}function check(){var e=$.trim(document.getElementById("tags1").value),t=$.trim(document.getElementById("searchplace1").value);return""==e&&""==t?!1:void 0}function myFunction(){document.getElementById("upload-demo").style.visibility="hidden",document.getElementById("upload-demo-i").style.visibility="hidden",document.getElementById("message1").style.display="block"}function showDiv(){document.getElementById("row1").style.display="block",document.getElementById("row2").style.display="none"}function followuser(e){$.ajax({type:"POST",url:base_url+"business_profile/follow",data:"follow_to="+e,success:function(t){$(".fr"+e).html(t)}})}function unfollowuser(e){$.ajax({type:"POST",url:base_url+"business_profile/unfollow",data:"follow_to="+e,success:function(t){$(".fr"+e).html(t)}})}function followuser_two(e){$.ajax({type:"POST",url:base_url+"business_profile/follow_two",data:"follow_to="+e,success:function(t){$(".follow_btn_"+e).html(t),$(".follow_btn_"+e).removeClass("user_btn"),$(".follow_btn_"+e).addClass("user_btn_h"),$("#unfollow"+e).html(""),$(".fr"+e).html(t)}})}function unfollowuser_two(e){$.ajax({type:"POST",url:base_url+"business_profile/unfollow_two",data:"follow_to="+e,success:function(t){$(".follow_btn_"+e).html(t),$(".follow_btn_"+e).removeClass("user_btn_h"),$(".follow_btn_"+e).removeClass("user_btn_f"),$(".follow_btn_"+e).addClass("user_btn_i"),$(".fr"+e).html(t)}})}function unfollowuser_list(e){$.ajax({type:"POST",url:base_url+"business_profile/unfollow_following",dataType:"json",data:"follow_to="+e,success:function(t){$(".frusercount").html(t.unfollow),$("#countfollow").html("("+t.notcount+")"),0==t.notcount?$(".contact-frnd-post").html(t.notfound):$("#removefollow"+e).fadeOut(4e3)}})}function updateprofilepopup(e){$("#bidmodal-2").modal("show")}function readURL(e){if(e.files&&e.files[0]){var t=new FileReader;t.onload=function(e){document.getElementById("preview").style.display="block",$("#preview").attr("src",e.target.result)},t.readAsDataURL(e.files[0])}}function picpopup(){$(".biderror .mes").html("<div class='pop_content'>This is not valid file. Please Uplode valid Image File."),$("#bidmodal").modal("show")}function contact_person_query(e,t){$.ajax({type:"POST",url:base_url+"business_profile/contact_person_query",data:"toid="+e+"&status="+t,success:function(o){contact_person_model(e,t,o)}})}function contact_person_model(e,t,o){1==o?"pending"==t?($(".biderror .mes").html("<div class='pop_content'> Do you want to cancel  contact request?<div class='model_ok_cancel'><a class='okbtn' id="+e+" onClick='contact_person("+e+")' href='javascript:void(0);' data-dismiss='modal'>Yes</a><a class='cnclbtn' href='javascript:void(0);' data-dismiss='modal'>No</a></div></div>"),$("#bidmodal").modal("show")):"confirm"==t?($(".biderror .mes").html("<div class='pop_content'> Do you want to remove this user from your contact list?<div class='model_ok_cancel'><a class='okbtn' id="+e+" onClick='contact_person("+e+")' href='javascript:void(0);' data-dismiss='modal'>Yes</a><a class='cnclbtn' href='javascript:void(0);' data-dismiss='modal'>No</a></div></div>"),$("#bidmodal").modal("show")):contact_person(e):($("#query .mes").html("<div class='pop_content'>Sorry, we can't process this request at this time."),$("#query").modal("show"))}function contact_person(e){$.ajax({type:"POST",url:base_url+"business_profile/contact_person",data:"toid="+e,success:function(e){$("#contact_per").html(e)}})}$(document).ready(function(){business_following(slug_id),$(window).scroll(function(){if($(window).scrollTop()+$(window).height()>=$(document).height()){var e=$(".page_number:last").val(),t=$(".total_record").val(),o=$(".perpage_record").val();if(parseInt(o)<=parseInt(t)){var l=t/o;l=parseInt(l,10);var n=t%o;if(n>0&&(l+=1),parseInt(e)<=parseInt(l)){var a=parseInt($(".page_number:last").val())+1;business_following(slug_id,a)}}}})});var isProcessing=!1;$(function(){$("#tags").autocomplete({source:function(e,t){var o=new RegExp("^"+$.ui.autocomplete.escapeRegex(e.term),"i");t($.grep(data,function(e){return o.test(e.label)}))},minLength:1,select:function(e,t){e.preventDefault(),$("#tags").val(t.item.label),$("#selected-tag").val(t.item.label)},focus:function(e,t){e.preventDefault(),$("#tags").val(t.item.label)}})}),$(function(){$("#searchplace").autocomplete({source:function(e,t){var o=new RegExp("^"+$.ui.autocomplete.escapeRegex(e.term),"i");t($.grep(data1,function(e){return o.test(e.label)}))},minLength:1,select:function(e,t){e.preventDefault(),$("#searchplace").val(t.item.label),$("#selected-tag").val(t.item.label)},focus:function(e,t){e.preventDefault(),$("#searchplace").val(t.item.label)}})}),$(function(){$("#tags1").autocomplete({source:function(e,t){var o=new RegExp("^"+$.ui.autocomplete.escapeRegex(e.term),"i");t($.grep(data,function(e){return o.test(e.label)}))},minLength:1,select:function(e,t){e.preventDefault(),$("#tag1").val(t.item.label),$("#selected-tag").val(t.item.label)},focus:function(e,t){e.preventDefault(),$("#tags1").val(t.item.label)}})}),$(function(){$("#searchplace1").autocomplete({source:function(e,t){var o=new RegExp("^"+$.ui.autocomplete.escapeRegex(e.term),"i");t($.grep(data1,function(e){return o.test(e.label)}))},minLength:1,select:function(e,t){e.preventDefault(),$("#searchplace1").val(t.item.label),$("#selected-tag").val(t.item.label)},focus:function(e,t){e.preventDefault(),$("#searchplace1").val(t.item.label)}})}),$uploadCrop=$("#upload-demo").croppie({enableExif:!0,viewport:{width:1250,height:350,type:"square"},boundary:{width:1250,height:350}}),$(".upload-result").on("click",function(e){$uploadCrop.croppie("result",{type:"canvas",size:"viewport"}).then(function(e){$.ajax({url:base_url+"business_profile/ajaxpro",type:"POST",data:{image:e},success:function(t){html='<img src="'+e+'" />',html&&window.location.reload()}})})}),$(".cancel-result").on("click",function(e){document.getElementById("row2").style.display="block",document.getElementById("row1").style.display="none",document.getElementById("message1").style.display="none"}),$("#upload").on("change",function(){var e=new FileReader;e.onload=function(e){$uploadCrop.croppie("bind",{url:e.target.result}).then(function(){console.log("jQuery bind complete")})},e.readAsDataURL(this.files[0])}),$("#upload").on("change",function(){var e=new FormData;return e.append("image",$("#upload")[0].files[0]),files=this.files,size=files[0].size,files[0].name.match(/.(jpg|jpeg|png|gif)$/i)?size>4194304?(alert("Allowed file size exceeded. (Max. 4 MB)"),document.getElementById("row1").style.display="none",document.getElementById("row2").style.display="block",!1):void $.ajax({url:base_url+"business_profile/imagedata",type:"POST",data:e,processData:!1,contentType:!1,success:function(e){}}):(picpopup(),document.getElementById("row1").style.display="none",document.getElementById("row2").style.display="block",$("#upload").val(""),!1)}),$("#profilepic").change(function(){return profile=this.files,profile[0].name.match(/.(jpg|jpeg|png|gif)$/i)?void readURL(this):($("#profilepic").val(""),picpopup(),!1)}),$(document).ready(function(){$("#userimage").validate({rules:{profilepic:{required:!0}},messages:{profilepic:{required:"Photo Required"}}})}),$(document).on("keydown",function(e){27===e.keyCode&&$("#bidmodal-2").modal("hide")}),$(document).ready(function(){$("html,body").animate({scrollTop:330},500)}),$(document).on("keydown",function(e){27===e.keyCode&&$("#query").modal("hide")});