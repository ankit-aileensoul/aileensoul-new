//validation start
$(document).ready(function () {
   
       $("#jobdesignation").validate({
   
           rules: {
   
               designation: {
   
                   required: true,
   
               },
   
           },
   
           messages: {
   
               designation: {
   
                   required: "Designation Is Required.",
   
               },
   
           },
   
       });
   });

 $(document).ready(function () { 
   
       $("#userimage").validate({
   
           rules: {
   
               profilepic: {
   
                   required: true,
                
               },
   
   
           },
   
           messages: {
   
               profilepic: {
   
                   required: "Photo Required",
                   
               },
       },
    submitHandler: profile_pic
       });
    });
//Validation End

//CODE FOR RESPONES OF AJAX COME FROM CONTROLLER AND LAZY LOADER START
$(document).ready(function () {
    job_save();
 
    $(window).scroll(function () {
        //if ($(window).scrollTop() == $(document).height() - $(window).height()) {
        if ($(window).scrollTop() + $(window).height() >= $(document).height()) {
            var page = $(".page_number:last").val();
            var total_record = $(".total_record").val();
            var perpage_record = $(".perpage_record").val();
            if (parseInt(perpage_record) <= parseInt(total_record)) {
                var available_page = total_record / perpage_record;
                available_page = parseInt(available_page, 10);
                var mod_page = total_record % perpage_record;
                if (mod_page > 0) {
                    available_page = available_page + 1;
                }
                //if ($(".page_number:last").val() <= $(".total_record").val()) {
                if (parseInt(page) <= parseInt(available_page)) {
                    var pagenum = parseInt($(".page_number:last").val()) + 1;
                    
                    job_save(pagenum);
                }
            }
        }
    });
    
});
var isProcessing = false;
function job_save(pagenum)
{
    if (isProcessing) {
        /*
         *This won't go past this condition while
         *isProcessing is true.
         *You could even display a message.
         **/
        return;
    }
    isProcessing = true;
    $.ajax({
        type: 'POST',
        url: base_url + "job/ajax_save_job?page=" + pagenum,
        data: {total_record:$("#total_record").val()},
        dataType: "html",
        beforeSend: function () {
            if (pagenum == 'undefined') {

                $(".job-contact-frnd").prepend('<p style="text-align:center;"><img class="loader" src="' + base_url + 'images/loading.gif"/></p>');
            } else {
                $('#loader').show();
            }
        },
        complete: function () {
            $('#loader').hide();
        },
        success: function (data) {
            $('.loader').remove();
            $('.job-contact-frnd').append(data);
            // second header class add for scroll
            var nb = $('.post-design-box').length;
            if (nb == 0) {
                $("#dropdownclass").addClass("no-post-h2");
            } else {
                $("#dropdownclass").removeClass("no-post-h2");
            }
            isProcessing = false;
        }
    });
}
//CODE FOR RESPONES OF AJAX COME FROM CONTROLLER AND LAZY LOADER END

//Cover Image Start
    function myFunction() {
       document.getElementById("upload-demo").style.visibility = "hidden";
       document.getElementById("upload-demo-i").style.visibility = "hidden";
       document.getElementById('message1').style.display = "block"; 
   }
   
   function showDiv() {
       document.getElementById('row1').style.display = "block";
       document.getElementById('row2').style.display = "none";
       $(".cr-image").attr("src","");
   }

    $uploadCrop = $('#upload-demo').croppie({
       enableExif: true,
       viewport: {
           width: 1250,
           height: 350,
           type: 'square'
       },
       boundary: {
           width: 1250,
           height: 350
       }
   });
   
   
   
   $('.upload-result').on('click', function (ev) {
       $uploadCrop.croppie('result', {
           type: 'canvas',
           size: 'viewport'
       }).then(function (resp) {
   
           $.ajax({
               url: base_url +"job/ajaxpro",
               type: "POST",
               data: {"image": resp},
               success: function (data) {
                   if (data) 
                   {
                    $("#row2").html(data);
                    document.getElementById('row2').style.display = "block";
                    document.getElementById('row1').style.display = "none";
                    document.getElementById('message1').style.display = "none";
                    document.getElementById("upload-demo").style.visibility = "visible";
                    document.getElementById("upload-demo-i").style.visibility = "visible";
                  }
               }
           });
   
       });
   });
   
   $('.cancel-result').on('click', function (ev) {
   
       document.getElementById('row2').style.display = "block";
       document.getElementById('row1').style.display = "none";
       document.getElementById('message1').style.display = "none"; 
       $(".cr-image").attr("src","");
   });
   
   //aarati code start
   $('#upload').on('change', function () {
   
       var reader = new FileReader();
       reader.onload = function (e) {
           $uploadCrop.croppie('bind', {
               url: e.target.result
           }).then(function () {
               console.log('jQuery bind complete');
           });
   
       }
       reader.readAsDataURL(this.files[0]);
   });
   
   $('#upload').on('change', function () {
   
       var fd = new FormData();
       fd.append("image", $("#upload")[0].files[0]);
   
       files = this.files;
       size = files[0].size;
   
   if (!files[0].name.match(/.(jpg|jpeg|png|gif)$/i)){
   savepopup();
   
   document.getElementById('row1').style.display = "none";
   document.getElementById('row2').style.display = "block";
   return false;
   }
   
       if (size > 4194304)
       {
           //show an alert to the user
           alert("Allowed file size exceeded. (Max. 4 MB)")
   
           document.getElementById('row1').style.display = "none";
           document.getElementById('row2').style.display = "block";
   
           return false;
       }
   
       $.ajax({
   
           url: base_url +"job/image",
           type: "POST",
           data: fd,
           processData: false,
           contentType: false,
           success: function (response) {
   
           }
       });
   });
   
   //aarati code end
   //Cover Image End

   //Remove Post Start
    function removepopup(id) {
       $('.biderror .mes').html("<div class='pop_content'>Do you want to remove this job?<div class='model_ok_cancel'><a class='okbtn' id=" + id + " onClick='remove_post(" + id + ")' href='javascript:void(0);' data-dismiss='modal'>Yes</a><a class='cnclbtn' href='javascript:void(0);' data-dismiss='modal'>No</a></div></div>");
       $('#bidmodal').modal('show');
   }

    function remove_post(abc)
   {
       var savepara = 'save';
       $.ajax({
           type: 'POST',
           url: base_url +'job/job_delete_apply',
           data: 'app_id=' + abc + '&para=' + savepara,
           success: function (data) {
               $('#' + 'postdata' + abc).html(data);
               $('#' + 'postdata' + abc).removeClass();
               var numItems = $('.contact-frnd-post .job-contact-frnd .profile-job-post-detail').length;
              if (numItems == '0') {
               
                  var nodataHtml = "<div class='art-img-nn'><div class='art_no_post_img'><img src = '"+ base_url + "img/job-no.png'/></div><div class='art_no_post_text'>No  Saved Post Available.</div></div>";
                  $('.contact-frnd-post').html(nodataHtml);
               }
           }
       });
   }
   //Remove Post End

   //Apply Post Start
    function applypopup(postid, appid) {
       $('.biderror .mes').html("<div class='pop_content'>Do you want to apply this job?<div class='model_ok_cancel'><a class='okbtn' id=" + postid + " onClick='apply_post(" + postid + "," + appid + ")' href='javascript:void(0);' data-dismiss='modal'>Yes</a><a class='cnclbtn' href='javascript:void(0);' data-dismiss='modal'>No</a></div></div>");
       $('#bidmodal').modal('show');
   }

    function apply_post(abc, xyz)
   {
   
       var alldata = 'all';
       var user = aileenuser_id;
       var appid = xyz;
   
       $.ajax({
           type: 'POST',
           url: base_url +'job/job_apply_post',
           data: 'post_id=' + abc + '&allpost=' + alldata.value + '&userid=' + user.value,
           success: function (data) {
               $('#' + 'postdata' + appid).html(data);
               $('#' + 'postdata' + appid).removeClass();
               var numItems = $('.contact-frnd-post .job-contact-frnd .profile-job-post-detail').length;
              
               if (numItems == '0') {

                   var nodataHtml = "<div class='art-img-nn'><div class='art_no_post_img'><img src='"+ base_url + "img/job-no.png'/></div><div class='art_no_post_text'>No  Saved Post Available.</div></div>";
                    $('.contact-frnd-post').html(nodataHtml);
               }
   
           }
       });
   
   }
   //Apply Post End

   //Update Profile Pic Start
    function updateprofilepopup(id) {
       $('#bidmodal-2').modal('show');
   }

   function readURL(input) {
      if (input.files && input.files[0]) {
          var reader = new FileReader();
          
          reader.onload = function (e) {
          
          document.getElementById('preview').style.display = 'block';
              $('#preview').attr('src', e.target.result);
          }
          
          reader.readAsDataURL(input.files[0]);
      }
   }
   
   $("#profilepic").change(function(){
    readURL(this);
      profile = this.files;
  
   });

    function savepopup() {
   $('.biderror .mes').html("<div class='pop_content'>Image Type is not Supported");
   $('#bidmodal').modal('show');
   }
    //Update Profile Pic End

    //Designation Update Start
     function divClicked() {
       var divHtml = $(this).html();
       var editableText = $("<textarea />");
       editableText.val(divHtml);
       $(this).replaceWith(editableText);
       editableText.focus();
       // setup the blur event for this new textarea
       editableText.blur(editableTextBlurred);
   	}
   
   function editableTextBlurred() {
       var html = $(this).val();
       var viewableText = $("<a>");
      if (html.match(/^\s*$/) || html == '') {
                               html = "Current Work";
                               }
       viewableText.html(html);
       $(this).replaceWith(viewableText);
       // setup the click event for this new div
       viewableText.click(divClicked);
   
       $.ajax({
           url: base_url +"job/ajax_designation",
           type: "POST",
           data: {"designation": html},
           success: function (response) {
           }
       });
   	}
   
   $(document).ready(function () {
       $("a.designation").click(divClicked);
   });
    //Designation Update End

   //all popup close close using esc start
     $( document ).on( 'keydown', function ( e ) {
   if ( e.keyCode === 27 ) {
       $('#bidmodal').modal('hide');
   }
   });  
   
   
    $( document ).on( 'keydown', function ( e ) {
   if ( e.keyCode === 27 ) {
       $('#bidmodal-2').modal('hide');
   }
   });  
   //all popup close close using esc end

   //For Scroll page at perticular position js Start
    $(document).ready(function(){
     
     $('html,body').animate({scrollTop:265}, 100);
     $('.complete_profile').fadeIn('fast').delay(5000).fadeOut('slow');
     $('.temp').fadeIn('fast').delay(5000).fadeOut('slow');
     $('.edit_profile_job').fadeIn('slow').delay(5000);
     $('.tr_text').fadeIn('slow').delay(500);
     $('.true_progtree img').fadeIn('slow').delay(500);
     $('.progress .progress-bar').css("width",
           function() {
               return $(this).attr("aria-valuenow") + "%";
           }
       )
   // Disable progress bar when 100% complete End  
   });
   //For Scroll page at perticular position js End

  //Disable progress bar when 100% complete Start
  $(document).ready(function(){ 
   
   var nb = $('div.profile-job-post-title').length;
    if(nb == 0){
   $("#dropdownclass").addClass("no-post-h2");
   
    }
   });
   
   $(document).ready(function () {
   $('.complete_profile').fadeIn('fast').delay(5000).fadeOut('slow');
   $('.edit_profile_job').fadeIn('slow').delay(5000);
   $('.tr_text').fadeIn('slow').delay(500);
   $('.true_progtree img').fadeIn('slow').delay(500);
     });
//Disable progress bar when 100% complete End

//Progress bar see start
 (function($) {9
   $('.second.circle-1').circleProgress({
   value: count_profile_value
   }).on('circle-animation-progress', function(event, progress) {
   $(this).find('strong').html(Math.round(count_profile * progress) + '<i>%</i>');
   });
   
   })(jQuery);
   //Progress bar see End

  //UPLOAD PROFILE PIC START
function profile_pic() {
    if (typeof FormData !== 'undefined') {
        
        var formData = new FormData($("#userimage")[0]);
        $.ajax({
          
            url: base_url + "job/user_image_insert",
            type: "POST",
            data: formData,
            contentType: false,
            cache: false,
            processData: false,
            success: function (data)
            {
                $('#bidmodal-2').modal('hide');
                $(".user-pic").html(data);
                document.getElementById('profilepic').value = null;
                $('#preview').prop('src', '#');
                 $('#preview').hide();
                $('.popup_previred').hide();
            },
        });
        return false;
    }
}
//UPLOAD PROFILE PIC END