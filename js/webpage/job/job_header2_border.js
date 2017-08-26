//Dropdown CLose while outside body click Start
 $(document).ready(function(){
       $('.dropdown_hover').click(function(event){
           event.stopPropagation();
            $(".dropdown-content_hover").fadeToggle("fast");
       });
       $(".dropdown-content_hover").on("dropdown_hover", function (event) {
          event.stopPropagation();
       });
   });
   
   $(document).on("dropdown_hover", function () {
       $(".dropdown-content_hover").hide(600);
   });
   
   $(document).ready(function() {
        $("body").click(function(event) {
           $(".dropdown-content_hover").fadeOut(600);
           // event.stopPropagation();
       });
    
   });
//Dropdown CLose while outside body click End

//Deactivate Job Profile Start
 function deactivate(clicked_id) { 
       $('.biderror .mes').html("<div class='pop_content'> Are you sure you want to deactive your job profile?<div class='model_ok_cancel'><a class='okbtn' id=" + clicked_id + " onClick='deactivate_profile(" + clicked_id + ")' href='javascript:void(0);' data-dismiss='modal'>Yes</a><a class='cnclbtn' href='javascript:void(0);' data-dismiss='modal'>No</a></div></div>");
           $('#bidmodal').modal('show');
   }
   
   function deactivate_profile(clicked_id){
                   $.ajax({
                       type: 'POST',
                       url: base_url +'job/deactivate',
                       data: 'id=' + clicked_id,
                         success: function (data) {
                           window.location= base_url +"dashboard";
                                     
                                 }
                             });
   }
//Deactivate Job Profile End

//all popup close close using esc start
$( document ).on( 'keydown', function ( e ) {
    if ( e.keyCode === 27 ) {
        $( "#dropdown-content_hover" ).hide();
    }
   });  
   
   
    $( document ).on( 'keydown', function ( e ) {
    if ( e.keyCode === 27 ) {
        //$( "#bidmodal" ).hide();
        $('#bidmodal').modal('hide');
    }
   });  
 //all popup close close using esc End

 //script for fetch all unread message notification Start
function addmsg1(type, msg)
   {
       if (msg == 0)
       {
           $("#message_count").html('');
           $("span#message_count").removeAttr("style");
           $('#InboxLink').removeClass('msg_notification_available');
           document.getElementById('message_count').style.display = "none";
       } else
       {
           $('#message_count').html(msg);
           $('#message_count').css({"background": "#FF4500" , "padding" : '4px 6px 4px 5.5px',"line-height" : '1',"border-radius":' 100%',"line-height": '9px' ,"font-size": '10px' });
           $('#InboxLink').addClass('msg_notification_available');
          
       }
   }
   
   function waitForMsg1()
   {
       $.ajax({
           type: "GET",
           url: base_url +"notification/select_msg_noti/1",
   
           async: true,
           cache: false,
           timeout: 50000,
   
           success: function (data) {
               addmsg1("new", data);
               setTimeout(
                       waitForMsg1,
                       10000
                       );
           },
           error: function (XMLHttpRequest, textStatus, errorThrown) {
   
           }
       });
   }
   ;
   
   $(document).ready(function () {
   
       waitForMsg1();
   
   });
   $(document).ready(function () {
       $menuLeft = $('.pushmenu-left');
       $nav_list = $('#nav_list');
   
       $nav_list.click(function () {
           $(this).toggleClass('active');
           $('.pushmenu-push').toggleClass('pushmenu-push-toright');
           $menuLeft.toggleClass('pushmenu-open');
       });
   });
   
 //script for fetch all unread message notification end

 //script for update all read notification start
$(document).ready(function () {
     
   if(segment != "chat"){ chatmsg(); };
          });  
   function chatmsg()
   {             
            
           $.ajax({
               type: 'POST',
               url: base_url +'chat/userajax/1/2',
               dataType: 'json',
               data: '',
               success: function (data) { //alert(data);
   
                   $('#userlist').html(data.leftbar);
                   $('.notification_data_in_h2').html(data.headertwo);
                   $('#seemsg').html(data.seeall);
                setTimeout(
                       chatmsg,
                      500
                       );
               },
            error: function (XMLHttpRequest, textStatus, errorThrown) {
           }           
           });
         
           };
   
   function getmsgNotification() {
       msgNotification();
   }
   
   function msgNotification() {
       $.ajax({
           url: base_url + "notification/update_msg_noti/1",
           type: "POST",
           success: function (data) {
               data = JSON.parse(data);
           }
       });
   }
   function msgheader()
   {
       $.ajax({
           type: 'POST',
           url: base_url +'notification/msg_header/' +seg,
           data: 'message_from_profile=1&message_to_profile=2',
           success: function (data) {
               $('.' + 'notification_data_in_h2').html(data);
           }
       });
   
   }
 //script for update all read notification End
  