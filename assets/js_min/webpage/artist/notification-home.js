function myFunction(e){document.getElementById("myDropdown"+e).classList.toggle("show"),$(document).on("keydown",function(t){27===t.keyCode&&(document.getElementById("myDropdown"+e).classList.toggle("hide"),$(".dropdown-content2").removeClass("show"))})}function followuser(e){$("#fad"+e).fadeOut(6e3),$.ajax({type:"POST",url:base_url+"artist/follow_home",dataType:"json",data:"follow_to="+e,success:function(t){if($(".fr"+e).html(t.follow),$("#countfollow").html(t.count),0!=t.notification.notification_count){var o=t.notification.notification_count,n=t.notification.to_id;show_header_notification(o,n)}}})}function followclose(e){$("#fad"+e).fadeOut(3e3)}function followusercell(e){$("#fadcell"+e).fadeOut(6e3),$.ajax({type:"POST",url:base_url+"artist/follow_home",dataType:"json",data:"follow_to="+e,success:function(t){if($(".fr"+e).html(t.follow),$("#countfollow").html(t.count),0!=t.notification.notification_count){var o=t.notification.notification_count,n=t.notification.to_id;show_header_notification(o,n)}}})}function followclosecell(e){$("#fadcell"+e).fadeOut(3e3)}function art_home_three_user_list(){$.ajax({type:"POST",url:base_url+"artist/art_home_three_user_list",data:"",dataType:"html",beforeSend:function(){$(".profile-boxProfileCard_follow").html('<p style="text-align:center;"><img src = "'+base_url+'assets/images/loading.gif" class = "loader" /></p>')},success:function(e){$(".loader").remove(),$(".profile-boxProfileCard_follow").html(e);var t=$(".follow_box_ul_li").length;t>0&&(document.getElementById("hideuserlist").style.display="block")}})}function art_home_cellphone_user_list(){$.ajax({type:"POST",url:base_url+"artist/art_home_cellphone_user_list",data:"",dataType:"html",beforeSend:function(){$(".profile-boxProfileCard_follow").html('<p style="text-align:center;"><img src = "'+base_url+'assets/images/loading.gif" class = "loader" /></p>')},success:function(e){$(".loader").remove(),$(".profile-boxProfileCard_follow_mobile").html(e)}})}function checkvalue(){var e=$.trim(document.getElementById("tags").value),t=$.trim(document.getElementById("searchplace").value);return""==e&&""==t?!1:void 0}function check(){var e=$.trim(document.getElementById("tags1").value),t=$.trim(document.getElementById("searchplace1").value);return""==e&&""==t?!1:void 0}function post_like(e){$.ajax({type:"POST",url:base_url+"artist/like_post",dataType:"json",data:"post_id="+e,success:function(t){$(".likepost"+e).html(t.like),$(".likeusername"+e).html(t.likeuser),$(".comnt_count_ext"+e).html(t.like_user_count),$(".likeduserlist"+e).hide(),"0"==t.likecount?document.getElementById("likeusername"+e).style.display="none":document.getElementById("likeusername"+e).style.display="block",$("#likeusername"+e).addClass("likeduserlist1")}})}function comment_like(e){$.ajax({type:"POST",url:base_url+"artist/like_comment",data:"post_id="+e,success:function(t){$("#likecomment"+e).html(t)}})}function comment_like1(e){$.ajax({type:"POST",url:base_url+"artist/like_comment1",data:"post_id="+e,success:function(t){$("#likecomment1"+e).html(t)}})}function comment_delete(e){$(".biderror .mes").html("<div class='pop_content'>Do you want to delete this comment?<div class='model_ok_cancel'><a class='okbtn' id="+e+" onClick='comment_deleted("+e+")' href='javascript:void(0);' data-dismiss='modal'>Yes</a><a class='cnclbtn' href='javascript:void(0);' data-dismiss='modal'>No</a></div></div>"),$("#bidmodal").modal("show")}function comment_deleted(e){var t=document.getElementById("post_delete"+e);$.ajax({type:"POST",url:base_url+"artist/delete_comment",data:"post_id="+e+"&post_delete="+t.value,dataType:"json",success:function(e){$(".insertcomment"+t.value).html(e.comment),$(".like_count_ext"+t.value).html(e.commentcount),$(".post-design-commnet-box").show()}})}function comment_deletetwo(e){$(".biderror .mes").html("<div class='pop_content'>Do you want to delete this comment?<div class='model_ok_cancel'><a class='okbtn' id="+e+" onClick='comment_deletedtwo("+e+")' href='javascript:void(0);' data-dismiss='modal'>Yes</a><a class='cnclbtn' href='javascript:void(0);' data-dismiss='modal'>No</a></div></div>"),$("#bidmodal").modal("show")}function comment_deletedtwo(e){var t=document.getElementById("post_deletetwo");$.ajax({type:"POST",url:base_url+"artist/delete_commenttwo",data:"post_id="+e+"&post_delete="+t.value,dataType:"json",success:function(e){$(".insertcommenttwo"+t.value).html(e.comment),$(".like_count_ext"+t.value).html(e.commentcount),$(".post-design-commnet-box").show()}})}function check_perticular(e){var t=e.replace(/\s/g,""),o=/^(<br>)*$/,n=o.test(t);return n}function insert_comment(e){$("#post_comment"+e).click(function(){$(this).prop("contentEditable",!0),$(this).html("")});var t=$("#post_comment"+e),o=t.html();if(o=o.replace(/&nbsp;/gi," "),o=o.replace(/<br>$/,""),o=o.replace(/div>/gi,"p>"),o=o.replace(/^(\s*<br( \/)?>)*|(<br( \/)?>\s*)*$/gm,""),""==o||"<br>"==o||1==check_perticular(o))return!1;if(/^\s+$/gi.test(o))return!1;$("#post_comment"+e).html("");var n=document.getElementById("threecomment"+e),l=document.getElementById("fourcomment"+e);"block"===n.style.display&&"none"===l.style.display?$.ajax({type:"POST",url:base_url+"artist/insert_commentthree",data:"post_id="+e+"&comment="+encodeURIComponent(o),dataType:"json",success:function(t){$("textarea").each(function(){$(this).val("")}),$(".insertcomment"+e).html(t.comment),$(".like_count_ext"+e).html(t.commentcount)}}):$.ajax({type:"POST",url:base_url+"artist/insert_comment",data:"post_id="+e+"&comment="+encodeURIComponent(o),dataType:"json",success:function(t){$("textarea").each(function(){$(this).val("")}),$("#fourcomment"+e).html(t.comment),$(".like_count_ext"+e).html(t.commentcount)}})}function entercomment(e){$("#post_comment"+e).click(function(){$(this).prop("contentEditable",!0)}),$("#post_comment"+e).keypress(function(t){if(13==t.keyCode&&!t.shiftKey){t.preventDefault();var o=$("#post_comment"+e),n=o.html();if(n=n.replace(/&nbsp;/gi," "),n=n.replace(/<br>$/,""),n=n.replace(/div>/gi,"p>"),n=n.replace(/^(\s*<br( \/)?>)*|(<br( \/)?>\s*)*$/gm,""),""==n||"<br>"==n||1==check_perticular(n))return!1;if(/^\s+$/gi.test(n))return!1;if($("#post_comment"+e).html(""),window.preventDuplicateKeyPresses)return;window.preventDuplicateKeyPresses=!0,window.setTimeout(function(){window.preventDuplicateKeyPresses=!1},500);var l=document.getElementById("threecomment"+e),s=document.getElementById("fourcomment"+e);"block"===l.style.display&&"none"===s.style.display?$.ajax({type:"POST",url:base_url+"artist/insert_commentthree",data:"post_id="+e+"&comment="+encodeURIComponent(n),dataType:"json",success:function(t){$("textarea").each(function(){$(this).val("")}),$(".insertcomment"+e).html(t.comment),$(".like_count_ext"+e).html(t.commentcount)}}):$.ajax({type:"POST",url:base_url+"artist/insert_comment",data:"post_id="+e+"&comment="+encodeURIComponent(n),dataType:"json",success:function(t){$("textarea").each(function(){$(this).val("")}),$("#fourcomment"+e).html(t.comment),$(".like_count_ext"+e).html(t.commentcount)}})}}),$(".scroll").click(function(e){e.preventDefault(),$("html,body").animate({scrollTop:$(this.hash).offset().top},1200)})}function comment_editbox(e){document.getElementById("editcomment"+e).style.display="inline-block",document.getElementById("showcomment"+e).style.display="none",document.getElementById("editsubmit"+e).style.display="inline-block",document.getElementById("editcommentbox"+e).style.display="none",document.getElementById("editcancle"+e).style.display="block",$(".post-design-commnet-box").hide(),$(".hidebottomborder").find(".all-comment-comment-box:last").css("border-bottom","0px")}function comment_editcancle(e){document.getElementById("editcommentbox"+e).style.display="block",document.getElementById("editcancle"+e).style.display="none",document.getElementById("editcomment"+e).style.display="none",document.getElementById("showcomment"+e).style.display="block",document.getElementById("editsubmit"+e).style.display="none",$(".hidebottomborder").find(".all-comment-comment-box:last").css("border-bottom","1px solid #d9d9d9"),$(".post-design-commnet-box").show()}function comment_editboxtwo(e){$("div[id^=editcommenttwo]").css("display","none"),$("div[id^=showcommenttwo]").css("display","block"),$("button[id^=editsubmittwo]").css("display","none"),$("div[id^=editcommentboxtwo]").css("display","block"),$("div[id^=editcancletwo]").css("display","none"),document.getElementById("editcommenttwo"+e).style.display="inline-block",document.getElementById("showcommenttwo"+e).style.display="none",document.getElementById("editsubmittwo"+e).style.display="inline-block",document.getElementById("editcommentboxtwo"+e).style.display="none",document.getElementById("editcancletwo"+e).style.display="block",$(".post-design-commnet-box").hide(),$(".hidebottombordertwo").find(".all-comment-comment-box:last").css("border-bottom","0px"),$(".hidebottomborder").find(".all-comment-comment-box:last").css("border-bottom","0px")}function comment_editbox3(e){document.getElementById("editcomment3"+e).style.display="block",document.getElementById("showcomment3"+e).style.display="none",document.getElementById("editsubmit3"+e).style.display="block",document.getElementById("editcommentbox3"+e).style.display="none",document.getElementById("editcancle3"+e).style.display="block",$(".post-design-commnet-box").hide()}function comment_editcancletwo(e){document.getElementById("editcommentboxtwo"+e).style.display="block",document.getElementById("editcancletwo"+e).style.display="none",document.getElementById("editcommenttwo"+e).style.display="none",document.getElementById("showcommenttwo"+e).style.display="block",document.getElementById("editsubmittwo"+e).style.display="none",$(".hidebottombordertwo").find(".all-comment-comment-box:last").css("border-bottom","1px solid #d9d9d9"),$(".hidebottomborder").find(".all-comment-comment-box:last").css("border-bottom","1px solid #d9d9d9"),$(".post-design-commnet-box").show()}function comment_editbox4(e){document.getElementById("editcomment4"+e).style.display="block",document.getElementById("showcomment4"+e).style.display="none",document.getElementById("editsubmit4"+e).style.display="block",document.getElementById("editcommentbox4"+e).style.display="none",document.getElementById("editcancle4"+e).style.display="block",$(".post-design-commnet-box").hide()}function comment_editcancle4(e){document.getElementById("editcommentbox4"+e).style.display="block",document.getElementById("editcancle4"+e).style.display="none",document.getElementById("editcomment4"+e).style.display="none",document.getElementById("showcomment4"+e).style.display="block",document.getElementById("editsubmit4"+e).style.display="none",$(".post-design-commnet-box").show()}function edit_comment(e){$("#editcomment"+e).click(function(){$(this).prop("contentEditable",!0)});var t=$("#editcomment"+e),o=t.html();return o=o.replace(/&nbsp;/gi," "),o=o.replace(/<br>$/,""),o=o.replace(/div>/gi,"p>"),o=o.replace(/^(\s*<br( \/)?>)*|(<br( \/)?>\s*)*$/gm,""),""==o||"<br>"==o||1==check_perticular(o)?($(".biderror .mes").html("<div class='pop_content'>Do you want to delete this comment?<div class='model_ok_cancel'><a class='okbtn' id="+e+" onClick='comment_delete("+e+")' href='javascript:void(0);' data-dismiss='modal'>Yes</a><a class='cnclbtn' href='javascript:void(0);' data-dismiss='modal'>No</a></div></div>"),$("#bidmodal").modal("show"),!1):/^\s+$/gi.test(o)?!1:($.ajax({type:"POST",url:base_url+"artist/edit_comment_insert",data:"post_id="+e+"&comment="+encodeURIComponent(o),success:function(t){document.getElementById("editcomment"+e).style.display="none",document.getElementById("showcomment"+e).style.display="block",document.getElementById("editsubmit"+e).style.display="none",document.getElementById("editcommentbox"+e).style.display="block",document.getElementById("editcancle"+e).style.display="none",$("#showcomment"+e).html(t),$(".post-design-commnet-box").show(),$(".hidebottomborder").find(".all-comment-comment-box:last").css("border-bottom","1px solid #d9d9d9")}}),void $(".scroll").click(function(e){e.preventDefault(),$("html,body").animate({scrollTop:$(this.hash).offset().top},1200)}))}function commentedit(e){$("#editcomment"+e).click(function(){$(this).prop("contentEditable",!0)}),$("#editcomment"+e).keypress(function(t){if(13==t.which&&1!=t.shiftKey){t.preventDefault();var o=$("#editcomment"+e),n=o.html();if(n=n.replace(/&nbsp;/gi," "),n=n.replace(/<br>$/,""),n=n.replace(/div>/gi,"p>"),n=n.replace(/^(\s*<br( \/)?>)*|(<br( \/)?>\s*)*$/gm,""),""==n||"<br>"==n||1==check_perticular(n))return $(".biderror .mes").html("<div class='pop_content'>Do you want to delete this comment?<div class='model_ok_cancel'><a class='okbtn' id="+e+" onClick='comment_delete("+e+")' href='javascript:void(0);' data-dismiss='modal'>Yes</a><a class='cnclbtn' href='javascript:void(0);' data-dismiss='modal'>No</a></div></div>"),$("#bidmodal").modal("show"),!1;if(/^\s+$/gi.test(n))return!1;if(window.preventDuplicateKeyPresses)return;window.preventDuplicateKeyPresses=!0,window.setTimeout(function(){window.preventDuplicateKeyPresses=!1},500),$.ajax({type:"POST",url:base_url+"artist/edit_comment_insert",data:"post_id="+e+"&comment="+encodeURIComponent(n),success:function(t){document.getElementById("editcomment"+e).style.display="none",document.getElementById("showcomment"+e).style.display="block",document.getElementById("editsubmit"+e).style.display="none",document.getElementById("editcommentbox"+e).style.display="block",document.getElementById("editcancle"+e).style.display="none",$("#showcomment"+e).html(t),$(".post-design-commnet-box").show(),$(".hidebottomborder").find(".all-comment-comment-box:last").css("border-bottom","1px solid #d9d9d9")}})}}),$(".scroll").click(function(e){e.preventDefault(),$("html,body").animate({scrollTop:$(this.hash).offset().top},1200)})}function edit_commenttwo(e){$("#editcommenttwo"+e).click(function(){$(this).prop("contentEditable",!0)});var t=$("#editcommenttwo"+e),o=t.html();return o=o.replace(/&nbsp;/gi," "),o=o.replace(/<br>$/,""),o=o.replace(/div>/gi,"p>"),o=o.replace(/^(\s*<br( \/)?>)*|(<br( \/)?>\s*)*$/gm,""),""==o||"<br>"==o||1==check_perticular(o)?($(".biderror .mes").html("<div class='pop_content'>Do you want to delete this comment?<div class='model_ok_cancel'><a class='okbtn' id="+e+" onClick='comment_deletetwo("+e+")' href='javascript:void(0);' data-dismiss='modal'>Yes</a><a class='cnclbtn' href='javascript:void(0);' data-dismiss='modal'>No</a></div></div>"),$("#bidmodal").modal("show"),!1):/^\s+$/gi.test(o)?!1:($.ajax({type:"POST",url:base_url+"artist/edit_comment_insert",data:"post_id="+e+"&comment="+encodeURIComponent(o),success:function(t){document.getElementById("editcommenttwo"+e).style.display="none",document.getElementById("showcommenttwo"+e).style.display="block",document.getElementById("editsubmittwo"+e).style.display="none",document.getElementById("editcommentboxtwo"+e).style.display="block",document.getElementById("editcancletwo"+e).style.display="none",$("#showcommenttwo"+e).html(t),$(".post-design-commnet-box").show(),$(".hidebottomborder").find(".all-comment-comment-box:last").css("border-bottom","1px solid #d9d9d9"),$(".hidebottombordertwo").find(".all-comment-comment-box:last").css("border-bottom","1px solid #d9d9d9")}}),void $(".scroll").click(function(e){e.preventDefault(),$("html,body").animate({scrollTop:$(this.hash).offset().top},1200)}))}function commentedittwo(e){$("#editcommenttwo"+e).click(function(){$(this).prop("contentEditable",!0)}),$("#editcommenttwo"+e).keypress(function(t){if(13==t.which&&1!=t.shiftKey){t.preventDefault();var o=$("#editcommenttwo"+e),n=o.html();if(n=n.replace(/&nbsp;/gi," "),n=n.replace(/<br>$/,""),n=n.replace(/div>/gi,"p>"),n=n.replace(/^(\s*<br( \/)?>)*|(<br( \/)?>\s*)*$/gm,""),""==n||"<br>"==n||1==check_perticular(n))return $(".biderror .mes").html("<div class='pop_content'>Do you want to delete this comment?<div class='model_ok_cancel'><a class='okbtn' id="+e+" onClick='comment_deletetwo("+e+")' href='javascript:void(0);' data-dismiss='modal'>Yes</a><a class='cnclbtn' href='javascript:void(0);' data-dismiss='modal'>No</a></div></div>"),$("#bidmodal").modal("show"),!1;if(/^\s+$/gi.test(n))return!1;if(window.preventDuplicateKeyPresses)return;window.preventDuplicateKeyPresses=!0,window.setTimeout(function(){window.preventDuplicateKeyPresses=!1},500),$.ajax({type:"POST",url:base_url+"artist/edit_comment_insert",data:"post_id="+e+"&comment="+encodeURIComponent(n),success:function(t){document.getElementById("editcommenttwo"+e).style.display="none",document.getElementById("showcommenttwo"+e).style.display="block",document.getElementById("editsubmittwo"+e).style.display="none",document.getElementById("editcommentboxtwo"+e).style.display="block",document.getElementById("editcancletwo"+e).style.display="none",$("#showcommenttwo"+e).html(t),$(".post-design-commnet-box").show(),$(".hidebottomborder").find(".all-comment-comment-box:last").css("border-bottom","1px solid #d9d9d9"),$(".hidebottombordertwo").find(".all-comment-comment-box:last").css("border-bottom","1px solid #d9d9d9")}})}}),$(".scroll").click(function(e){e.preventDefault(),$("html,body").animate({scrollTop:$(this.hash).offset().top},1200)})}function commentall(e){var t=document.getElementById("threecomment"+e),o=document.getElementById("fourcomment"+e),n=document.getElementById("insertcount"+e);"block"===t.style.display&&"none"===o.style.display&&(t.style.display="none",o.style.display="block",n.style.visibility="show",$.ajax({type:"POST",url:base_url+"artist/fourcomment",data:"art_post_id="+e,success:function(t){$("#fourcomment"+e).html(t)}}))}function read(e){return function(t){var o=t.target.result,n=$("<img/>",{src:o,title:encodeURIComponent(e.name),"class":"thumb"}),l=$("<span/>",{html:n,"class":"thumbParent"}).append('<span class="remove_thumb"/>');thumbsArray.push(o),$list.append(l)}}function handleFileSelect(e){e.preventDefault();var t=e.target.files,o=t.length;if(o>maxUpload||thumbsArray.length>=maxUpload)return alert("Sorry you can upload only 5 images");for(var n=0;o>n;n++){var l=t[n];if(l.type.match("image.*")){var s=new FileReader;s.onload=read(l),s.readAsDataURL(l)}}}function save_post(e){$.ajax({type:"POST",url:base_url+"artist/artistic_save",data:"art_post_id="+e,success:function(t){$(".savedpost"+e).html(t)}})}function deleteownpostmodel(e){$(".biderror .mes").html("<div class='pop_content'>Do you want to delete this post?<div class='model_ok_cancel'><a class='okbtn' id="+e+" onClick='remove_post("+e+")' href='javascript:void(0);' data-dismiss='modal'>Yes</a><a class='cnclbtn' href='javascript:void(0);' data-dismiss='modal'>No</a></div></div>"),$("#bidmodal").modal("show")}function remove_post(e){$.ajax({type:"POST",url:base_url+"artist/art_delete_post",dataType:"json",data:"art_post_id="+e,success:function(t){$("#removepost"+e).remove(),"count"==t.notcount&&$(".nofoundpost").html(t.notfound)}})}function deletepostmodel(e){$(".biderror .mes").html("<div class='pop_content'>Do you want to delete this post from your profile?<div class='model_ok_cancel'><a class='okbtn' id="+e+" onClick='del_particular_userpost("+e+")' href='javascript:void(0);' data-dismiss='modal'>Yes</a><a class='cnclbtn' href='javascript:void(0);' data-dismiss='modal'>No</a></div></div>"),$("#bidmodal").modal("show")}function del_particular_userpost(e){$.ajax({type:"POST",url:base_url+"artist/del_particular_userpost",dataType:"json",data:"art_post_id="+e,success:function(t){$("#removepost"+e).remove(),"count"==t.notcount&&$(".nofoundpost").html(t.notfound)}})}function imgval(e){var t=document.getElementById("file-1").files,o=document.getElementById("test-upload_product").value,n=o.trim(),l=document.getElementById("test-upload_des").value,s=l.trim(),d=document.getElementById("file-1").value;if(""==d&&""==n&&""==s)return $("#post .mes").html("<div class='pop_content'>This post appears to be blank. Please write or attach (photos, videos, audios, pdf) to post."),$("#post").modal("show"),$(document).on("keydown",function(e){27===e.keyCode&&($("#post").modal("hide"),$(".modal-post").show())}),e.preventDefault(),!1;for(var i=0;i<t.length;i++){var a=t[i].name,m=t[0].name,c=m.split(".").pop(),r=a.split(".").pop(),p=["jpg","jpeg","PNG","gif","png"],u=["mp4","webm","MP4"],y=["mp3"],h=["pdf"],f=$.inArray(c,p)>-1,b=$.inArray(c,u)>-1,g=$.inArray(c,y)>-1,v=$.inArray(c,h)>-1;if(1==f){var _=$.inArray(r,p)>-1;if(1==_&&t.length<=10);else{if(t.length>10)return $("#post .mes").html("<div class='pop_content'>You can't upload more than 10 images at a time."),$("#post").modal("show"),$(document).on("keydown",function(e){27===e.keyCode&&($("#post").modal("hide"),$(".modal-post").show())}),e.preventDefault(),!1;if(0==_)return $("#post .mes").html("<div class='pop_content'>You can only upload one type of file at a time...either photo or video or audio or pdf."),$("#post").modal("show"),$(document).on("keydown",function(e){27===e.keyCode&&($("#post").modal("hide"),$(".modal-post").show())}),e.preventDefault(),!1}}else if(1==b){var _=$.inArray(r,u)>-1;if(1!=_||1!=t.length)return $("#post .mes").html("<div class='pop_content'>You can only upload one type of file at a time...either photo or video or audio or pdf."),$("#post").modal("show"),$(document).on("keydown",function(e){27===e.keyCode&&($("#post").modal("hide"),$(".modal-post").show())}),e.preventDefault(),!1}else if(1==g){var _=$.inArray(r,y)>-1;if(1!=_||1!=t.length)return $("#post .mes").html("<div class='pop_content'>You can only upload one type of file at a time...either photo or video or audio or pdf."),$("#post").modal("show"),$(document).on("keydown",function(e){27===e.keyCode&&($("#post").modal("hide"),$(".modal-post").show())}),e.preventDefault(),!1;if(""==o)return $("#post .mes").html("<div class='pop_content'>You have to add audio title."),$("#post").modal("show"),$(document).on("keydown",function(e){27===e.keyCode&&($("#post").modal("hide"),$(".modal-post").show())}),e.preventDefault(),!1}else if(1==v){var _=$.inArray(r,h)>-1;if(1!=_||1!=t.length)return $("#post .mes").html("<div class='pop_content'>You can only upload one type of file at a time...either photo or video or audio or pdf."),$("#post").modal("show"),$(document).on("keydown",function(e){27===e.keyCode&&($("#post").modal("hide"),$(".modal-post").show())}),e.preventDefault(),!1;if(""==o)return $("#post .mes").html("<div class='pop_content'>You have to add pdf title."),$("#post").modal("show"),$(document).on("keydown",function(e){27===e.keyCode&&($("#post").modal("hide"),$(".modal-post").show())}),e.preventDefault(),!1}else{if(0==b&&0==v&&0==g&&0==f)return $("#post .mes").html("<div class='pop_content'>This File Format is not supported Please Try to Upload images , video , pdf or audio.."),$("#post").modal("show"),$(document).on("keydown",function(e){27===e.keyCode&&($("#post").modal("hide"),$(".modal-post").show())}),e.preventDefault(),!1;if(0==b)return $("#post .mes").html("<div class='pop_content'>This File Format is not supported Please Try to Upload MP4 or WebM files.."),$("#post").modal("show"),$(document).on("keydown",function(e){27===e.keyCode&&($("#post").modal("hide"),$(".modal-post").show())}),e.preventDefault(),!1}}}function contentedit(e){$("#post_comment"+e).click(function(){$(this).prop("contentEditable",!0),$(this).html("")}),$("#post_comment"+e).keypress(function(t){if(13==t.which&&1!=t.shiftKey){t.preventDefault();var o=$("#post_comment"+e),n=o.html();$("#post_comment"+e).html("");var l=document.getElementById("threecomment"+e),s=document.getElementById("fourcomment"+e);if(""==n)return t.preventDefault(),!1;"block"===l.style.display&&"none"===s.style.display?$.ajax({type:"POST",url:base_url+"artist/insert_commentthree",data:"post_id="+e+"&comment="+encodeURIComponent(n),dataType:"json",success:function(t){$("#insertcount"+e).html(t.count),$(".insertcomment"+e).html(t.comment)}}):$.ajax({type:"POST",url:base_url+"artist/insert_comment",data:"post_id="+e+"&comment="+encodeURIComponent(n),success:function(t){$("#fourcomment"+e).html(t)}})}}),$(".scroll").click(function(e){e.preventDefault(),$("html,body").animate({scrollTop:$(this.hash).offset().top},1200)})}function likeuserlist(e){$.ajax({type:"POST",url:base_url+"artist/likeuserlist",data:"post_id="+e,dataType:"html",success:function(e){var t=e;$("#likeusermodal .mes").html(t),$("#likeusermodal").modal("show")}})}function check_length(e){if(maxLen=50,e.my_text.value.length>maxLen){var t="You have reached your maximum limit of characters allowed";$("#test-upload_product").prop("readonly",!0),$(".biderror .mes").html("<div class='pop_content'>"+t+"</div>"),$("#bidmodal-limit").modal("show"),e.my_text.value=e.my_text.value.substring(0,maxLen)}else e.text_num.value=maxLen-e.my_text.value.length}function check_lengthedit(e){maxLen=50;var t=document.getElementById("editpostname"+e).value;if(t.length>maxLen){text_num=maxLen-t.length;var o="You have reached your maximum limit of characters allowed";$("#editpostname"+e).prop("readonly",!0),document.getElementById("editpostdesc"+e).contentEditable=!1,document.getElementById("editpostsubmit"+e).setAttribute("disabled","disabled"),$("#postedit .mes").html("<div class='pop_content'>"+o+"</div>"),$("#postedit").modal("show");var n=t.substring(0,maxLen);$("#editpostname"+e).val(n)}else text_num=maxLen-t.length,document.getElementById("text_num").value=text_num}function khdiv(e){$.ajax({type:"POST",url:base_url+"artist/edit_more_insert",data:"art_post_id="+e,dataType:"json",success:function(t){document.getElementById("editpostdata"+e).style.display="block",document.getElementById("editpostbox"+e).style.display="none",document.getElementById("editpostdetailbox"+e).style.display="none",document.getElementById("editpostsubmit"+e).style.display="none",document.getElementById("khyati"+e).style.display="none",document.getElementById("khyatii"+e).style.display="block",$("#editpostdata"+e).html(t.title),$("#khyatii"+e).html(t.description)}})}function editpost(e){var t=$("#editpostval"+e).html(),o=$("#khyatii"+e).html();$("#myDropdown"+e).removeClass("show"),document.getElementById("editpostdata"+e).style.display="none",document.getElementById("editpostbox"+e).style.display="block",document.getElementById("editpostdetailbox"+e).style.display="block",document.getElementById("editpostsubmit"+e).style.display="block",document.getElementById("khyati"+e).style.display="none",document.getElementById("khyatii"+e).style.display="none",t=t.trim(),o=o.trim(),$("#editpostname"+e).val(t),$("#editpostdesc"+e).html(o)}function edit_postinsert(e){var t=document.getElementById("editpostname"+e),o=($("#editpostdesc"+e),$("#editpostdesc"+e).html());o=o.replace(/&gt;/gi,">"),o=o.replace(/&nbsp;/gi," "),o=o.replace(/div>/gi,"p>"),o=o.replace(/^(\s*<br( \/)?>)*|(<br( \/)?>\s*)*$/gm,""),""!=t.value.trim()||""!=o.trim()&&"<br>"!=o&&1!=check_perticular(o)?$.ajax({type:"POST",url:base_url+"artist/edit_post_insert",data:"art_post_id="+e+"&art_post="+t.value+"&art_description="+encodeURIComponent(o),dataType:"json",success:function(t){document.getElementById("editpostdata"+e).style.display="block",document.getElementById("editpostbox"+e).style.display="none",document.getElementById("editpostdetailbox"+e).style.display="none",document.getElementById("editpostsubmit"+e).style.display="none",document.getElementById("khyati"+e).style.display="block",$("#editpostdata"+e).html(t.title),$("#khyati"+e).html(t.description),$("#postname"+e).html(t.postname)}}):($(".biderror .mes").html("<div class='pop_content'>You must either fill title or description."),$("#bidmodal").modal("show"),document.getElementById("editpostdata"+e).style.display="block",document.getElementById("editpostbox"+e).style.display="none",document.getElementById("khyati"+e).style.display="block",document.getElementById("editpostdetailbox"+e).style.display="none",document.getElementById("editpostsubmit"+e).style.display="none")}function OnPaste_StripFormatting(e,t){if(t.originalEvent&&t.originalEvent.clipboardData&&t.originalEvent.clipboardData.getData){t.preventDefault();var o=t.originalEvent.clipboardData.getData("text/plain");window.document.execCommand("insertText",!1,o)}else if(t.clipboardData&&t.clipboardData.getData){t.preventDefault();var o=t.clipboardData.getData("text/plain");window.document.execCommand("insertText",!1,o)}else window.clipboardData&&window.clipboardData.getData&&(_onPaste_StripFormatting_IEPaste||(_onPaste_StripFormatting_IEPaste=!0,t.preventDefault(),window.document.execCommand("ms-pasteTextOnly",!1)),_onPaste_StripFormatting_IEPaste=!1)}function seemorediv(e){document.getElementById("seemore"+e).style.display="block",document.getElementById("lessmore"+e).style.display="none"}$("#post").on("click",function(){$("#myModal").modal("show")}),window.onclick=function(e){if(!e.target.matches(".dropbtn1")){var t,o=document.getElementsByClassName("dropdown-content2");for(t=0;t<o.length;t++){var n=o[t];n.classList.contains("show")&&n.classList.remove("show")}}},$(document).ready(function(){$("body").on("change","#bgphotoimg",function(){$("#bgimageform").ajaxForm({target:"#timelineBackground",beforeSubmit:function(){},success:function(){$("#timelineShade").hide(),$("#bgimageform").hide()},error:function(){}}).submit()}),$("body").on("mouseover",".headerimage",function(){var e=$("#timelineBackground").height(),t=$(".headerimage").height();$(this).draggable({scroll:!1,axis:"y",drag:function(o,n){n.position.top>=0?n.position.top=0:n.position.top<=e-t&&(n.position.top=e-t)},stop:function(e,t){}})}),$("body").on("click",".bgSave",function(){var e=($(this).attr("id"),$("#timelineBGload").attr("style")),t=e.split("top:"),o=t[1].split(";"),n="position="+o[0];return $.ajax({type:"POST",url:"<?php echo base_url('artist/image_saveBG_ajax'); ?>",data:n,cache:!1,beforeSend:function(){},success:function(e){return e?(window.location.reload(),$(".bgImage").fadeOut("slow"),$(".bgSave").fadeOut("slow"),$("#timelineShade").fadeIn("slow"),$("#timelineBGload").removeClass("headerimage"),$("#timelineBGload").css({"margin-top":e}),!1):void 0}}),!1})}),$(document).ready(function(){art_home_three_user_list(),art_home_cellphone_user_list()}),$(document).ready(function(){$("video").mediaelementplayer({alwaysShowControls:!1,videoVolume:"horizontal",features:["playpause","progress","volume","fullscreen"]})}),$(function(){var e=200,t="Read More",o="";$(".show_more").each(function(){var o=$(this).html();if(o.length>e){var n=o.substr(0,e),l=o.substr(e,o.length-e),s=n+'<span class="dots">...</span><span class="morectnt"><span>'+l+'</span>&nbsp;&nbsp;<a href="" class="showmoretxt">'+t+"</a></span>";$(this).html(s)}}),$(".showmoretxt").click(function(){return $(this).hasClass("sample")?($(this).removeClass("sample"),$(this).text(t)):($(this).addClass("sample"),$(this).text(o)),$(this).parent().prev().toggle(),$(this).prev().toggle(),!1})}),$("#file-fr").fileinput({language:"fr",uploadUrl:"#",allowedFileExtensions:["jpg","png","gif","mp4","mp3","pdf","jpeg"]}),$("#file-es").fileinput({language:"es",uploadUrl:"#",allowedFileExtensions:["jpg","png","gif","mp4","mp3","pdf","jpeg"]}),$("#file-1").fileinput({uploadUrl:"#",allowedFileExtensions:["jpg","png","gif","mp4","mp3","pdf","jpeg"],overwriteInitial:!1,maxFileSize:1e6,maxFilesNum:10,slugCallback:function(e){return e.replace("(","_").replace("]","_")}}),$(".btn-warning").on("click",function(){var e=$("#file-4");e.attr("disabled")?e.fileinput("enable"):e.fileinput("disable")}),$(document).ready(function(){$("#test-upload").fileinput({showPreview:!1,allowedFileExtensions:["jpg","png","gif","mp4","mp3","pdf","jpeg"],elErrorContainer:"#errorBlock"}),$("#kv-explorer").fileinput({theme:"explorer",uploadUrl:"#",overwriteInitial:!1,initialPreviewAsData:!0})});var modal=document.getElementById("myModal"),btn=document.getElementById("myBtn"),span=document.getElementsByClassName("close")[0];btn.onclick=function(){modal.style.display="block"},span.onclick=function(){modal.style.display="none"},
window.onclick=function(e){e.target==modal&&(modal.style.display="none")};var modal=document.getElementById("myModal"),btn=document.getElementById("myBtn"),span=document.getElementsByClassName("close1")[0];btn.onclick=function(){modal.style.display="block"},span.onclick=function(){modal.style.display="none"},window.onclick=function(e){e.target==modal&&(modal.style.display="none")};var $fileUpload=$("#files"),$list=$("#list"),thumbsArray=[],maxUpload=10;$fileUpload.change(function(e){handleFileSelect(e)}),$list.on("click",".remove_thumb",function(){var e=$(".remove_thumb"),t=e.index(this);$(this).closest("span.thumbParent").remove(),thumbsArray.splice(t,1)}),$(document).ready(function(){$(".alert-danger").delay(3e3).hide("700"),$(".alert-success").delay(3e3).hide("700")}),$("body").on("click","*",function(e){var t=$(e.target).attr("class").toString().split(" ").pop();"fa-ellipsis-v"!=t&&$("div[id^=myDropdown]").hide().removeClass("show")}),jQuery(document).mouseup(function(e){var t=$("#myModal");jQuery(document).mouseup(function(e){var o=$("#close");o.is(e.target)||0!==o.has(e.target).length||t.hide()})}),$(document).on("keydown",function(e){27===e.keyCode&&$("#likeusermodal").modal("hide")}),$(document).on("keydown",function(e){27===e.keyCode&&$(".modal-post").show()&&$(document).on("keydown",function(e){27===e.keyCode&&$(".modal-post").hide()})}),$(document).on("keydown",function(e){27===e.keyCode&&$("#post").modal("hide")}),$(document).on("keydown",function(e){27===e.keyCode&&($("#postedit").modal("hide"),$(".my_text").attr("readonly",!1),$(".editable_text").attr("contentEditable",!0),$(".fr").attr("disabled",!1))});var _onPaste_StripFormatting_IEPaste=!1;$(document).ready(function(){var e=$("div.post-design-box").length;0==e&&$("#dropdownclass").addClass("no-post-h2")}),$("#file-1").on("click",function(e){var t=document.getElementById("test-upload_product").value,o=document.getElementById("test-upload_des").value;document.getElementById("artpostform").reset(),document.getElementById("test-upload_product").value=t,document.getElementById("test-upload_des").value=o}),$("#post").on("click",function(){$("#myModal").modal("show"),$("#test-upload_product").prop("readonly",!1)}),$("#postedit").on("click",function(){$(".my_text").attr("readonly",!1),$(".editable_text").attr("contentEditable",!0),$(".fr").attr("disabled",!1)}),jQuery(document).ready(function(e){var t=e(".progress-bar"),o=e(".sr-only"),n={beforeSend:function(){document.getElementById("progress_div").style.display="block";var e="0%";t.width(e),o.html(e),document.getElementById("myModal").style.display="none"},uploadProgress:function(e,n,l,s){var d=s+"%";t.width(d),o.html(d)},success:function(){var e="100%";t.width(e),o.html(e)},complete:function(t){document.getElementById("test-upload_product").value="",document.getElementById("test-upload_des").value="",document.getElementById("file-1").value="",e("input[name='my_text']").val(50),e(".file-preview-frame").hide(),document.getElementById("progress_div").style.display="none",e(".art-all-post div:first").remove(),e(".art-all-post").prepend(t.responseText);var o=e(".post-design-box").length;0==o?e("#dropdownclass").addClass("no-post-h2"):(document.getElementById("no_post_avl").style.display="none",e("#dropdownclass").removeClass("no-post-h2")),e("html, body").animate({scrollTop:e(".upload-image-messages").offset().top-100},150)}};return e(".upload-image-form").ajaxForm(n),!1}),$("#common-limit").on("click",function(){$("#myModal").modal("show"),$("#test-upload_product").prop("readonly",!1)}),$(document).on("keydown",function(e){27===e.keyCode&&("block"===document.getElementById("bidmodal-limit").style.display&&($("#bidmodal-limit").modal("hide"),$("#test-upload_product").prop("readonly",!1),$("#myModal").model("show")),"none"===document.getElementById("myModal").style.display)});