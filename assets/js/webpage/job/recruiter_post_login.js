//CODE FOR RESPONES OF AJAX COME FROM CONTROLLER AND LAZY LOADER START
$(document).ready(function () {
    rec_post();
    
    $(window).scroll(function () {
        if ($(window).scrollTop() >= ($(document).height() - $(window).height())*0.7){
      
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
                    rec_post(pagenum);
                }
            }
        }
    });
});
var isProcessing = false;
function rec_post(pagenum) {
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
        url: base_url + "job/ajax_rec_post?page=" + pagenum + "&id=" + id + "&postid=" + postid,
        data: {total_record: $("#total_record").val()},
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

 function login()
    {
            
          document.getElementById('error1').style.display = 'none';
    }
    //validation for edit email formate form
            $(document).ready(function () {
                /* validation */

                $("#login_form").validate({

                    rules: {
                        email_login: {
                            required: true,
                        },
                        password_login: {
                            required: true,
                        }
                    },
                    messages:
                            {
                                email_login: {
                                    required: "Please enter email address",
                                },
                                password_login: {
                                    required: "Please enter password",
                                }
                            },
                    submitHandler: submitForm
                });
                /* validation */
                /* login submit */
                function submitForm()
                {

                    var email_login = $("#email_login").val();
                    var password_login = $("#password_login").val();

                    var post_data = {
                        'email_login': email_login,
                        'password_login': password_login,
                        csrf_token_name : csrf_hash
                    }
                    $.ajax({
                        type: 'POST',
                        url: base_url + 'login/job_check_login',
                        data: post_data,
                        dataType: "json",
                        beforeSend: function ()
                        {
                            $("#error").fadeOut();
                            $("#btn1").html('Login ...');
                        },
                        success: function (response)
                        {
            
                            if (response.data == "ok") {
                                $("#btn1").html('<img src="' +base_url +'images/btn-ajax-loader.gif" /> &nbsp; Login ...');
                                if(response.jobuser==1)
                                {
                                    
                                    window.location = base_url +"job/post-" + postid + "/" + text + "-vacancy-in-" + cityname;
                                             
                                }
                                else
                                {
                                    window.location = base_url +"job/";
                                }
                               
                            } else if (response.data == "password") {
                                $("#errorpass").html('<label for="email_login" class="error">Please enter a valid password.</label>');
                                document.getElementById("password_login").classList.add('error');
                                document.getElementById("password_login").classList.add('error');
                                $("#btn1").html('Login');
                            } else {
                                $("#errorlogin").html('<label for="email_login" class="error">Please enter a valid email.</label>');
                                document.getElementById("email_login").classList.add('error');
                                document.getElementById("email_login").classList.add('error');
                                $("#btn1").html('Login');
                            }
                        }
                    });
                    return false;
                }
                /* login submit */
            });

            $(document).ready(function () {

                $("#register_form").validate({
                    rules: {
                        first_name: {
                            required: true,
                        },
                        last_name: {
                            required: true,
                        },
                        email_reg: {
                            required: true,
                            email: true,
    
                            remote: {
                                url: base_url +"registration/check_email",
                                type: "post",
                                data: {
                                    email_reg: function () {
                                        // alert("hi");
                                        return $("#email_reg").val();
                                    },
                                    csrf_token_name: csrf_hash,
                                },
                            },
                        },
                        password_reg: {
                            required: true,
                        },
                        selday: {
                            required: true,
                        },
                        selmonth: {
                            required: true,
                        },
                        selyear: {
                            required: true,
                        },
                        selgen: {
                            required: true,
                        }
                    },

                    groups: {
                        selyear: "selyear selmonth selday"
                    },
                    messages:
                            {
                                first_name: {
                                    required: "Please enter first name",
                                },
                                last_name: {
                                    required: "Please enter last name",
                                },
                                email_reg: {
                                    required: "Please enter email address",
                                    remote: "Email address already exists",
                                },
                                password_reg: {
                                    required: "Please enter password",
                                },

                                selday: {
                                    required: "Please enter your birthdate",
                                },
                                selmonth: {
                                    required: "Please enter your birthdate",
                                },
                                selyear: {
                                    required: "Please enter your birthdate",
                                },
                                selgen: {
                                    required: "Please enter your gender",
                                }

                            },
                    submitHandler: submitRegisterForm
                });
                /* register submit */
                function submitRegisterForm()
                {
                    var first_name = $("#first_name").val();
                    var last_name = $("#last_name").val();
                    var email_reg = $("#email_reg").val();
                    var password_reg = $("#password_reg").val();
                    var selday = $("#selday").val();
                    var selmonth = $("#selmonth").val();
                    var selyear = $("#selyear").val();
                    var selgen = $("#selgen").val();

                    var post_data = {
                        'first_name': first_name,
                        'last_name': last_name,
                        'email_reg': email_reg,
                        'password_reg': password_reg,
                        'selday': selday,
                        'selmonth': selmonth,
                        'selyear': selyear,
                        'selgen': selgen,
                        csrf_token_name : csrf_hash
                    }


                    var todaydate = new Date();
                    var dd = todaydate.getDate();
                    var mm = todaydate.getMonth() + 1; //January is 0!
                    var yyyy = todaydate.getFullYear();

                    if (dd < 10) {
                        dd = '0' + dd
                    }

                    if (mm < 10) {
                        mm = '0' + mm
                    }

                    var todaydate = yyyy + '/' + mm + '/' + dd;
                    var value = selyear + '/' + selmonth + '/' + selday;


                    var d1 = Date.parse(todaydate);
                    var d2 = Date.parse(value);
                    if (d1 < d2) {
                        $(".dateerror").html("Date of birth always less than to today's date.");
                        return false;
                    } else {
                        if ((0 == selyear % 4) && (0 != selyear % 100) || (0 == selyear % 400))
                        {
                            if (selmonth == 4 || selmonth == 6 || selmonth == 9 || selmonth == 11) {
                                if (selday == 31) {
                                    $(".dateerror").html("This month has only 30 days.");
                                    return false;
                                }
                            } else if (selmonth == 2) { //alert("hii");
                                if (selday == 31 || selday == 30) {
                                    $(".dateerror").html("This month has only 29 days.");
                                    return false;
                                }
                            }
                        } else {
                            if (selmonth == 4 || selmonth == 6 || selmonth == 9 || selmonth == 11) {
                                if (selday == 31) {
                                    $(".dateerror").html("This month has only 30 days.");
                                    return false;
                                }
                            } else if (selmonth == 2) {
                                if (selday == 31 || selday == 30 || selday == 29) {
                                    $(".dateerror").html("This month has only 28 days.");
                                    return false;
                                }
                            }
                        }
                    }
                    $.ajax({
                        type: 'POST',
                        url: base_url + 'registration/reg_insert',
                        data: post_data,
                        beforeSend: function ()
                        {
                            $("#register_error").fadeOut();
                            $("#btn1").html('Create an account ...');
                        },
                        success: function (response)
                        {
                            if (response == "ok") {
                                $("#btn-register").html('<img src=' + base_url + '"images/btn-ajax-loader.gif"/> &nbsp; Sign Up ...');
                               if(response.jobuser==1)
                                {
                                    window.location = base_url +"job/post-" + postid + "/" + text + "-vacancy-in-" + cityname;
                                }
                                else
                                {
                                    window.location = base_url +"job/";
                                }
                            } else {
                                $("#register_error").fadeIn(1000, function () {
                                    $("#register_error").html('<div class="alert alert-danger main"> <i class="fa fa-info-circle" aria-hidden="true"></i> &nbsp; ' + response + ' !</div>');
                                    $("#btn1").html('Create an account');
                                });
                            }
                        }
                    });
                    return false;
                }
            });

       $(document).ready(function () { //aletr("hii");
                /* validation */
                $("#forgot_password").validate({
                    rules: {
                        forgot_email: {
                            required: true,
                            email: true,
                        }

                    },
                    messages: {
                        forgot_email: {
                            required: "Email address is required.",
                        }
                    },
                    submitHandler: submitforgotForm
                });
                /* validation */

 function submitforgotForm()
    {

        var email_login = $("#forgot_email").val();

        var post_data = {
            'forgot_email': email_login,
            csrf_token_name: csrf_hash
        }
        $.ajax({
            type: 'POST',
            url: base_url + 'profile/forgot_live',
            data: post_data,
            dataType: "json",
            beforeSend: function ()
            {
                $("#error").fadeOut();
//                $("#forgotbuton").html('Your credential has been send in your register email id');
            },
            success: function (response)
            {
                if (response.data == "success") {
                    //  alert("login");
                    $("#forgotbuton").html(response.message);
                    setTimeout(function () {
                        $('#login').modal('show');
                        $('#forgotPassword').modal('hide');
                         $("#forgotbuton").html('');
                    document.getElementById("forgot_email").value = "";
                    }, 5000); // milliseconds

                   
                    //window.location = base_url + "job/home/live-post";
                } else {
                    $("#forgotbuton").html(response.message);

                }
            }
        });
        return false;
    }

            });

        function login_profile() {
            $(".password_login").val('');
            $(".email_login").val('');
                $('#login').modal('show');
            }

//For Save Button Click Process Start
        function login_profile_save() {
                $(".password_login").val('');
            $(".email_login").val('');
                $('#login_save').modal('show');
            }
         //validation for edit email formate form
            $(document).ready(function () {
                /* validation */

                $("#login_form_save").validate({

                    rules: {
                        email_login_save: {
                            required: true,
                        },
                        password_login_save: {
                            required: true,
                        }
                    },
                    messages:
                            {
                                email_login_save: {
                                    required: "Please enter email address",
                                },
                                password_login_save: {
                                    required: "Please enter password",
                                }
                            },
                    submitHandler: submitFormsave
                });
                /* validation */
                /* login submit */
                function submitFormsave()
                {

                    var email_login = $("#email_login_save").val();
                    var password_login = $("#password_login_save").val();

                    var post_data = {
                        'email_login': email_login,
                        'password_login': password_login,
                        csrf_token_name : csrf_hash
                    }
                    $.ajax({
                        type: 'POST',
                        url: base_url + 'login/job_check_login',
                        data: post_data,
                        dataType: "json",
                        beforeSend: function ()
                        {
                            $("#error").fadeOut();
                            $("#btn1").html('Login ...');
                        },
                        success: function (response)
                        {
            
                            if (response.data == "ok") {
                                $("#btn1").html('<img src="' +base_url +'images/btn-ajax-loader.gif" /> &nbsp; Login ...');
                                if(response.jobuser==1)
                                {
                                     $.ajax({
                                             type: 'POST',
                                             url: base_url +'job/job_save',
                                             data: 'post_id=' + postid,
                                             success: function (data) {
                                                window.location = base_url +"job/post-" + postid + "/" + text + "-vacancy-in-" + cityname;
                                            }
                                     });
                                }
                                else
                                {
                                    window.location = base_url +"job/";
                                }
                               
                            } else if (response.data == "password") {
                                $("#errorpass_save").html('<label for="email_login_save" class="error">Please enter a valid password.</label>');
                                document.getElementById("password_login_save").classList.add('error');
                                document.getElementById("password_login_save").classList.add('error');
                                $("#btn1").html('Login');
                            } else {
                                $("#errorlogin_save").html('<label for="email_login_save" class="error">Please enter a valid email.</label>');
                                document.getElementById("email_login_save").classList.add('error');
                                document.getElementById("email_login_save").classList.add('error');
                                $("#btn1").html('Login');
                            }
                        }
                    });
                    return false;
                }
                /* login submit */
            });
//For Save Button Click Process End

//For Apply Button Click Process Start
        function login_profile_apply() {
                $(".password_login").val('');
            $(".email_login").val('');
                $('#login_apply').modal('show');
            }
         //validation for edit email formate form
            $(document).ready(function () {
                /* validation */

                $("#login_form_apply").validate({

                    rules: {
                        email_login_apply: {
                            required: true,
                        },
                        password_login_apply: {
                            required: true,
                        }
                    },
                    messages:
                            {
                                email_login_apply: {
                                    required: "Please enter email address",
                                },
                                password_login_apply: {
                                    required: "Please enter password",
                                }
                            },
                    submitHandler: submitFormapply
                });
                /* validation */
                /* login submit */
                function submitFormapply()
                {

                    var email_login = $("#email_login_apply").val();
                    var password_login = $("#password_login_apply").val();

                    var post_data = {
                        'email_login': email_login,
                        'password_login': password_login,
                        csrf_token_name : csrf_hash
                    }
                    $.ajax({
                        type: 'POST',
                        url: base_url + 'login/job_check_login',
                        data: post_data,
                        dataType: "json",
                        beforeSend: function ()
                        {
                            $("#error").fadeOut();
                            $("#btn1").html('Login ...');
                        },
                        success: function (response)
                        {
            
                            if (response.data == "ok") {
                               $("#btn1").html('<img src="' +base_url +'images/btn-ajax-loader.gif" /> &nbsp; Login ...');
                                if(response.jobuser==1)
                                {
                                    var alldata = 'all';
                                    var id = response.id;
                                    $.ajax({
                                                type: 'POST',
                                                url: base_url +'job/job_apply_post',
                                                data: 'post_id=' + postid + '&allpost=' + alldata + '&userid=' + id,
                                                success: function (data) 
                                                {
                                                     window.location = base_url +"job/post-" + postid + "/" + text + "-vacancy-in-" + cityname;
                                                }
                                    });
                                   
                                }
                                else
                                {
                                    window.location = base_url +"job/";
                                }
                               
                            } else if (response.data == "password") {
                                alert("hi");
                                $("#errorpass_apply").html('<label for="email_login_apply" class="error">Please enter a valid password.</label>');
                                document.getElementById("password_login_apply").classList.add('error');
                                document.getElementById("password_login_apply").classList.add('error');
                                $("#btn1").html('Login');
                            } else {
                                $("#errorlogin_apply").html('<label for="email_login_apply" class="error">Please enter a valid email.</label>');
                                document.getElementById("email_login_apply").classList.add('error');
                                document.getElementById("email_login_apply").classList.add('error');
                                $("#btn1").html('Login');
                            }
                        }
                    });
                    return false;
                }
                /* login submit */
            });
//For Apply Button Click Process End

            function register_profile() {
                $('#login').modal('hide');
                $('#register').modal('show');
            }
            function forgot_profile() {
                $('#forgotPassword').modal('show');
            }

      $(document).on('click', '[data-toggle*=modal]', function () {
                $('[role*=dialog]').each(function () {
                    switch ($(this).css('display')) {
                        case('block'):
                        {
                            $('#' + $(this).attr('id')).modal('hide');
                            break;
                        }
                    }
                });
            });
