function artistic_dashboard_post(t,e){isProcessing=!0,$.ajax({type:"POST",url:base_url+"artist_userprofile/artistic_user_dashboard_post/"+t+"?page="+e,data:{total_record:$("#total_record").val()},dataType:"html",beforeSend:function(){$("#loader").show()},complete:function(){$("#loader").hide()},success:function(t){$(".fw").hide(),$(".art-all-post").append(t);var e=$(".post-design-box").length;0==e?$("#dropdownclass").addClass("no-post-h2"):$("#dropdownclass").removeClass("no-post-h2"),isProcessing=!1,$("video, audio").mediaelementplayer(),$(".all-comment-comment-box").css("border-bottom","0px")}})}function GetArtPhotos(){$.ajax({type:"POST",url:base_url+"artist_userprofile/artistic_user_photos",data:"art_id="+slug,beforeSend:function(){$("#loader").show()},success:function(t){$("#loader").hide(),$(".art_photos").html(t)}})}function GetArtVideos(){$.ajax({type:"POST",url:base_url+"artist_userprofile/artistic_user_videos",data:"art_id="+slug,beforeSend:function(){$("#loader").show()},success:function(t){$("#loader").hide(),$(".art_videos").html(t),$("video, audio").mediaelementplayer()}})}function GetArtAudios(){$.ajax({type:"POST",url:base_url+"artist_userprofile/artistic_user_audio",data:"art_id="+slug,beforeSend:function(){$("#loader").show()},success:function(t){$("#loader").hide(),$(".art_audios").html(t)}})}function GetArtPdf(){$.ajax({type:"POST",url:base_url+"artist_userprofile/artistic_user_pdf",data:"art_id="+slug,beforeSend:function(){$("#loader").show()},success:function(t){$("#loader").hide(),$(".art_pdf").html(t)}})}$(document).ready(function(){artistic_dashboard_post(slug),GetArtPhotos(),GetArtVideos(),GetArtAudios(),GetArtPdf(),$(window).scroll(function(){if($(window).scrollTop()+$(window).height()>=$(document).height()){var t=$(".page_number:last").val(),e=$(".total_record").val(),a=$(".perpage_record").val();if(parseInt(a)<=parseInt(e)){var r=e/a;r=parseInt(r,10);var o=e%a;if(o>0&&(r+=1),parseInt(t)<=parseInt(r)){var s=parseInt($(".page_number:last").val())+1;artistic_dashboard_post(slug,s)}}}})});var isProcessing=!1;