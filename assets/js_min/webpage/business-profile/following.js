function business_following(o,t){isProcessing||(isProcessing=!0,$.ajax({type:"POST",url:base_url+"business_profile/ajax_following/"+o+"?page="+t,data:{total_record:$("#total_record").val()},dataType:"html",beforeSend:function(){"undefined"==t?$(".contact-frnd-post").prepend('<p style="text-align:center;"><img class="loader" src="'+base_url+'assets/images/loading.gif"/></p>'):$("#loader").show()},complete:function(){$("#loader").hide()},success:function(o){$(".loader").remove(),$(".contact-frnd-post").append(o);var t=$(".post-design-box").length;0==t?$("#dropdownclass").addClass("no-post-h2"):$("#dropdownclass").removeClass("no-post-h2"),isProcessing=!1}}))}function checkvalue(){var o=$.trim(document.getElementById("tags").value),t=$.trim(document.getElementById("searchplace").value);return""==o&&""==t?!1:void 0}function check(){var o=$.trim(document.getElementById("tags1").value),t=$.trim(document.getElementById("searchplace1").value);return""==o&&""==t?!1:void 0}function followuser(o){$.ajax({type:"POST",url:base_url+"business_profile/follow",data:"follow_to="+o,success:function(t){$(".fr"+o).html(t)}})}function unfollowuser(o){$.ajax({type:"POST",url:base_url+"business_profile/unfollow",data:"follow_to="+o,success:function(t){$(".fr"+o).html(t)}})}function followuser_two(o){$.ajax({type:"POST",url:base_url+"business_profile/follow_two",data:"follow_to="+o+"&profile_slug="+slug_id,dataType:"json",success:function(t){if($(".fr"+o).html(t.follow_html),$("#countfollow").html("("+t.following_count+")"),$("#countfollower").html("("+t.follower_count+")"),0!=t.notification.notification_count){var n=t.notification.notification_count,l=t.notification.to_id;show_header_notification(n,l)}}})}function unfollowuser_two(o){$.ajax({type:"POST",url:base_url+"business_profile/unfollow_two",data:"follow_to="+o,dataType:"json",success:function(t){$(".fr"+o).html(t.unfollow_html),$("#countfollow").html("("+t.unfollowing_count+")"),$("#countfollower").html("("+t.unfollower_count+")")}})}function followuser_list_two(o){$.ajax({type:"POST",url:base_url+"business_profile/follow_two",data:"follow_to="+o+"&profile_slug="+slug_id+"&is_listing=1",dataType:"json",success:function(t){if($(".follow_btn_"+o).html(t.follow_html),$("#countfollow").html("("+t.following_count+")"),$("#countfollower").html("("+t.follower_count+")"),$(".follow_btn_"+o).removeClass("user_btn"),$(".follow_btn_"+o).addClass("user_btn_h"),$("#unfollow"+o).html(""),$(".fruser"+o).html(t.follow_html),0!=t.notification.notification_count){var n=t.notification.notification_count,l=t.notification.to_id;show_header_notification(n,l)}}})}function unfollowuser_list_two(o){$.ajax({type:"POST",url:base_url+"business_profile/unfollow_two",data:"follow_to="+o+"&profile_slug="+slug_id+"&is_listing=1",dataType:"json",success:function(t){$(".follow_btn_"+o).html(t.unfollow_html),$("#countfollow").html("("+t.unfollowing_count+")"),$("#countfollower").html("("+t.unfollower_count+")"),$(".follow_btn_"+o).removeClass("user_btn_h"),$(".follow_btn_"+o).removeClass("user_btn_f"),$(".follow_btn_"+o).addClass("user_btn_i")}})}function unfollowuser_list(o){$.ajax({type:"POST",url:base_url+"business_profile/unfollow_following",dataType:"json",data:"follow_to="+o,success:function(t){$(".frusercount").html(t.unfollow),$("#countfollow").html("("+t.notcount+")"),0==t.notcount?$(".contact-frnd-post").html(t.notfound):$("#removefollow"+o).fadeOut(4e3)}})}function contact_person_query(o,t){$.ajax({type:"POST",url:base_url+"business_profile/contact_person_query",data:"toid="+o+"&status="+t,success:function(n){contact_person_model(o,t,n)}})}function contact_person_model(o,t,n){1==n?"pending"==t?($(".biderror .mes").html("<div class='pop_content'> Do you want to cancel  contact request?<div class='model_ok_cancel'><a class='okbtn' id="+o+" onClick='contact_person("+o+")' href='javascript:void(0);' data-dismiss='modal'>Yes</a><a class='cnclbtn' href='javascript:void(0);' data-dismiss='modal'>No</a></div></div>"),$("#bidmodal").modal("show")):"confirm"==t?($(".biderror .mes").html("<div class='pop_content'> Do you want to remove this user from your contact list?<div class='model_ok_cancel'><a class='okbtn' id="+o+" onClick='contact_person("+o+")' href='javascript:void(0);' data-dismiss='modal'>Yes</a><a class='cnclbtn' href='javascript:void(0);' data-dismiss='modal'>No</a></div></div>"),$("#bidmodal").modal("show")):contact_person(o):($("#query .mes").html("<div class='pop_content'>Sorry, we can't process this request at this time."),$("#query").modal("show"))}function contact_person(o){$.ajax({type:"POST",url:base_url+"business_profile/contact_person",data:"toid="+o,dataType:"json",success:function(o){if($("#contact_per").html(o),0!=o.co_notification.co_notification_count){var t=o.co_notification.co_notification_count,n=o.co_notification.co_to_id;show_contact_notification(t,n)}}})}$(document).ready(function(){business_following(slug_id),$(window).scroll(function(){if($(window).scrollTop()>=.7*($(document).height()-$(window).height())){var o=$(".page_number:last").val(),t=$(".total_record").val(),n=$(".perpage_record").val();if(parseInt(n)<=parseInt(t)){var l=t/n;l=parseInt(l,10);var s=t%n;if(s>0&&(l+=1),parseInt(o)<=parseInt(l)){var e=parseInt($(".page_number:last").val())+1;business_following(slug_id,e)}}}})});var isProcessing=!1;$(document).ready(function(){$("html,body").animate({scrollTop:330},500)}),$(document).on("keydown",function(o){27===o.keyCode&&$("#query").modal("hide")});