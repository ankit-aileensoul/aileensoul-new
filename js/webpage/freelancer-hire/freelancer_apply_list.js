//CODE FOR AUTOFILL OF SEARCH KEYWORD START    
$(function () {
    // alert('hi');
    $("#tags").autocomplete({
        source: function (request, response) {
            var matcher = new RegExp("^" + $.ui.autocomplete.escapeRegex(request.term), "i");
            response($.grep(data, function (item) {
                return matcher.test(item.label);
            }));
        },
        minLength: 1,
        select: function (event, ui) {
            event.preventDefault();
            $("#tags").val(ui.item.label);
            $("#selected-tag").val(ui.item.label);
            // window.location.href = ui.item.value;
        }
        ,
        focus: function (event, ui) {
            event.preventDefault();
            $("#tags").val(ui.item.label);
        }
    });
});
//CODE FOR AUTOFILL OF SEARCH KEYWORD END 
//CODE FOR AUTOFILL OF SEARCH LOCATION START
$(function () {
    $("#searchplace").autocomplete({
        source: function (request, response) {
            var matcher = new RegExp("^" + $.ui.autocomplete.escapeRegex(request.term), "i");
            response($.grep(data1, function (item) {
                return matcher.test(item.label);
            }));
        },
        minLength: 1,
        select: function (event, ui) {
            event.preventDefault();
            $("#searchplace").val(ui.item.label);
            $("#selected-tag").val(ui.item.label);
            // window.location.href = ui.item.value;
        }
        ,
        focus: function (event, ui) {
            event.preventDefault();
            $("#searchplace").val(ui.item.label);
        }
    });
});
//CODE FOR AUTOFILL OF SEARCH LOCATION END
// CHECK SEARCH KEYWORD AND LOCATION BLANK START
function checkvalue() {
    var searchkeyword = document.getElementById('tags').value;
    var searchplace = document.getElementById('searchplace').value;
    if (searchkeyword == "" && searchplace == "") {
        return false;
    }
}
// CHECK SEARCH KEYWORD AND LOCATION BLANK END

//SAVE USER START
function savepopup(id) {
    save_user(id);
    $('.biderror .mes').html("<div class='pop_content'>Freelancer successfully saved.");
    $('#bidmodal').modal('show');
}
function save_user(abc) {
    var saveid = document.getElementById("hideenuser" + abc);
    $.ajax({
        type: 'POST',
        url:  base_url + "freelancer/save_user1",
        data: 'user_id=' + abc + '&save_id=' + saveid.value,
        success: function (data) {
            $('.' + 'saveduser' + abc).html(data).addClass('saved');
        }
    });
}
//SAVE USER END

//INVITE USER START
 // function inviteuserpopup(abc){
//    $('.biderror .mes').html("<div class='pop_content'>Do you want to select this freelancer for your project?<div class='model_ok_cancel'><a class='okbtn' id=" + abc + " onClick='inviteuser(" + abc + ")' href='javascript:void(0);' data-dismiss='modal'>Yes</a><a class='cnclbtn' href='javascript:void(0);' data-dismiss='modal'>No</a></div></div>");
//    $('#bidmodal').modal('show');
//   } 
//     function inviteuser(clicked_id)
//    {  
// var post_id = "<?php echo $postid; ?>";
//        $.ajax({
//            type: 'POST',
//            url:  base_url() + "freelancer/free_invite_user",
//            data: 'post_id=' + post_id + '&invited_user=' + clicked_id,
//            success: function (data) { //alert(data);
//                $('#' + 'invited' + clicked_id).html(data).addClass('invited').removeClass('invite_border').removeAttr("onclick");
//                 $('#' + 'invited' + clicked_id).css('cursor', 'default');
//
//            }
//        });
//    }
//INVITE USER END

