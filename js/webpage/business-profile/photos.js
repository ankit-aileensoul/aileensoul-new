function checkvalue(){var e=$.trim(document.getElementById("tags").value),t=$.trim(document.getElementById("searchplace").value);return""==e&&""==t?!1:void 0}function check(){var e=$.trim(document.getElementById("tags1").value),t=$.trim(document.getElementById("searchplace1").value);return""==e&&""==t?!1:void 0}function updateprofilepopup(e){$("#bidmodal-2").modal("show")}function myFunction(){document.getElementById("upload-demo").style.visibility="hidden",document.getElementById("upload-demo-i").style.visibility="hidden",document.getElementById("message1").style.display="block"}function showDiv(){document.getElementById("row1").style.display="block",document.getElementById("row2").style.display="none"}function followuser_two(e){$.ajax({type:"POST",url:base_url+"business_profile/follow_two",data:"follow_to="+e,success:function(t){$(".fr"+e).html(t)}})}function unfollowuser_two(e){$.ajax({type:"POST",url:base_url+"business_profile/unfollow_two",data:"follow_to="+e,success:function(t){$(".fr"+e).html(t)}})}function readURL(e){if(e.files&&e.files[0]){var t=new FileReader;t.onload=function(e){document.getElementById("preview").style.display="block",$("#preview").attr("src",e.target.result)},t.readAsDataURL(e.files[0])}}function picpopup(){$(".biderror .mes").html("<div class='pop_content'>This is not valid file. Please Uplode valid Image File."),$("#bidmodal").modal("show")}function contact_person_query(e,t){$.ajax({type:"POST",url:base_url+"business_profile/contact_person_query",data:"toid="+e+"&status="+t,success:function(a){contact_person_model(e,t,a)}})}function contact_person_model(e,t,a){1==a?"pending"==t?($(".biderror .mes").html("<div class='pop_content'> Do you want to cancel  contact request?<div class='model_ok_cancel'><a class='okbtn' id="+e+" onClick='contact_person("+e+")' href='javascript:void(0);' data-dismiss='modal'>Yes</a><a class='cnclbtn' href='javascript:void(0);' data-dismiss='modal'>No</a></div></div>"),$("#bidmodal").modal("show")):"confirm"==t?($(".biderror .mes").html("<div class='pop_content'> Do you want to remove this user from your contact list?<div class='model_ok_cancel'><a class='okbtn' id="+e+" onClick='contact_person("+e+")' href='javascript:void(0);' data-dismiss='modal'>Yes</a><a class='cnclbtn' href='javascript:void(0);' data-dismiss='modal'>No</a></div></div>"),$("#bidmodal").modal("show")):contact_person(e):($("#query .mes").html("<div class='pop_content'>Sorry, we can't process this request at this time."),$("#query").modal("show"))}function contact_person(e){$.ajax({type:"POST",url:base_url+"business_profile/contact_person",data:"toid="+e,success:function(e){$("#contact_per").html(e)}})}function openModal(){document.getElementById("myModal1").style.display="block"}function closeModal(){document.getElementById("myModal1").style.display="none"}function plusSlides(e){showSlides(slideIndex+=e)}function currentSlide(e){showSlides(slideIndex=e)}function showSlides(e){var t,a=document.getElementsByClassName("mySlides"),o=document.getElementsByClassName("demo"),n=document.getElementById("caption");for(e>a.length&&(slideIndex=1),1>e&&(slideIndex=a.length),t=0;t<a.length;t++)a[t].style.display="none";for(t=0;t<o.length;t++)o[t].className=o[t].className.replace(" active","");a[slideIndex-1].style.display="block",o[slideIndex-1].className+=" active",n.innerHTML=o[slideIndex-1].alt}function h(e){$(e).css({height:"29px","overflow-y":"hidden"}).height(e.scrollHeight)}function OnPaste_StripFormatting(e,t){if(t.originalEvent&&t.originalEvent.clipboardData&&t.originalEvent.clipboardData.getData){t.preventDefault();var a=t.originalEvent.clipboardData.getData("text/plain");window.document.execCommand("insertText",!1,a)}else if(t.clipboardData&&t.clipboardData.getData){t.preventDefault();var a=t.clipboardData.getData("text/plain");window.document.execCommand("insertText",!1,a)}else window.clipboardData&&window.clipboardData.getData&&(_onPaste_StripFormatting_IEPaste||(_onPaste_StripFormatting_IEPaste=!0,t.preventDefault(),window.document.execCommand("ms-pasteTextOnly",!1)),_onPaste_StripFormatting_IEPaste=!1)}$(function(){$("#tags").autocomplete({source:function(e,t){var a=new RegExp("^"+$.ui.autocomplete.escapeRegex(e.term),"i");t($.grep(data,function(e){return a.test(e.label)}))},minLength:1,select:function(e,t){e.preventDefault(),$("#tags").val(t.item.label),$("#selected-tag").val(t.item.label)},focus:function(e,t){e.preventDefault(),$("#tags").val(t.item.label)}})}),$(function(){$("#searchplace").autocomplete({source:function(e,t){var a=new RegExp("^"+$.ui.autocomplete.escapeRegex(e.term),"i");t($.grep(data1,function(e){return a.test(e.label)}))},minLength:1,select:function(e,t){e.preventDefault(),$("#searchplace").val(t.item.label),$("#selected-tag").val(t.item.label)},focus:function(e,t){e.preventDefault(),$("#searchplace").val(t.item.label)}})}),$(function(){$("#tags1").autocomplete({source:function(e,t){var a=new RegExp("^"+$.ui.autocomplete.escapeRegex(e.term),"i");t($.grep(data,function(e){return a.test(e.label)}))},minLength:1,select:function(e,t){e.preventDefault(),$("#tag1").val(t.item.label),$("#selected-tag").val(t.item.label)},focus:function(e,t){e.preventDefault(),$("#tags1").val(t.item.label)}})}),$(function(){$("#searchplace1").autocomplete({source:function(e,t){var a=new RegExp("^"+$.ui.autocomplete.escapeRegex(e.term),"i");t($.grep(data1,function(e){return a.test(e.label)}))},minLength:1,select:function(e,t){e.preventDefault(),$("#searchplace1").val(t.item.label),$("#selected-tag").val(t.item.label)},focus:function(e,t){e.preventDefault(),$("#searchplace1").val(t.item.label)}})}),$uploadCrop=$("#upload-demo").croppie({enableExif:!0,viewport:{width:1250,height:350,type:"square"},boundary:{width:1250,height:350}}),$(".upload-result").on("click",function(e){$uploadCrop.croppie("result",{type:"canvas",size:"viewport"}).then(function(e){$.ajax({url:base_url+"business_profile/ajaxpro",type:"POST",data:{image:e},success:function(t){html='<img src="'+e+'" />',html&&window.location.reload()}})})}),$(".cancel-result").on("click",function(e){document.getElementById("row2").style.display="block",document.getElementById("row1").style.display="none",document.getElementById("message1").style.display="none"}),$("#upload").on("change",function(){var e=new FileReader;e.onload=function(e){$uploadCrop.croppie("bind",{url:e.target.result}).then(function(){console.log("jQuery bind complete")})},e.readAsDataURL(this.files[0])}),$("#upload").on("change",function(){var e=new FormData;return e.append("image",$("#upload")[0].files[0]),files=this.files,size=files[0].size,files[0].name.match(/.(jpg|jpeg|png|gif)$/i)?size>4194304?(alert("Allowed file size exceeded. (Max. 4 MB)"),document.getElementById("row1").style.display="none",document.getElementById("row2").style.display="block",!1):void $.ajax({url:base_url+"business_profile/imagedata",type:"POST",data:e,processData:!1,contentType:!1,success:function(e){}}):(picpopup(),document.getElementById("row1").style.display="none",document.getElementById("row2").style.display="block",$("#upload").val(""),!1)}),$("#profilepic").change(function(){return profile=this.files,profile[0].name.match(/.(jpg|jpeg|png|gif)$/i)?void readURL(this):($("#profilepic").val(""),picpopup(),!1)}),$(document).ready(function(){$("#userimage").validate({rules:{profilepic:{required:!0}},messages:{profilepic:{required:"Photo Required"}}})}),$(document).on("keydown",function(e){27===e.keyCode&&$("#bidmodal-2").modal("hide")}),$(document).on("keydown",function(e){27===e.keyCode&&$("#query").modal("hide")}),$(document).ready(function(){$(".blocks").jMosaic({items_type:"li",margin:0}),$(".pictures").jMosaic({min_row_height:150,margin:3,is_first_big:!0})});var slideIndex=1;showSlides(slideIndex),$(".textarea").each(function(){h(this)}).on("input",function(){h(this)}),$(document).keydown(function(e){e||(e=window.event),(27==e.keyCode||27==e.charCode)&&closeModal()}),j$("#myModal").modal({backdrop:"true"});var _onPaste_StripFormatting_IEPaste=!1;