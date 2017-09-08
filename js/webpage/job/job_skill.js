//Loader Start
 jQuery(document).ready(function ($) {
// site preloader -- also uncomment the div in the header and the css style for #preloader
        $(window).load(function () {
            $('#preloader').fadeOut('slow', function () {
                $(this).remove();
            });
        });
    });
//Loader End

//Validation Start
 $.validator.addMethod("regx", function(value, element, regexpr) {          
     if(!value) 
            {
                return true;
            }
            else
            {
                  return regexpr.test(value);
            }
}, "only space, only number and only special characters are not allow");
// validation js

$.validator.addMethod("regx1", function(value, element, regexpr) {          
     if(!value) 
            {
                return true;
            }
            else
            {
                  return regexpr.test(value);
            }
}, "only space, only number and only special characters are not allow");

 $("#jobseeker_regform").validate({

        
         rules: {

                industry: {

                    required: true,
                 
                },
               job_title: {

                    required: true,
                     regx1:/^[-@./#&+,\w\s]*[a-zA-Z][a-zA-Z0-9]*/,       
                },
                
                skills: {
                    required: true,
                     regx1:/^[-@./#&+,\w\s]*[a-zA-Z][a-zA-Z0-9]*/,

                }, 
                 cities: {

                    required: true,
                     regx1:/^[-@./#&+,\w\s]*[a-zA-Z][a-zA-Z0-9]*/,
                  
                 },             
            },

            messages: {

                industry: {

                    required: "industry Is Required.",

                },

                job_title: {

                    required: "job title Is Required.",

                },

                skills: {

                    required: "skill Is Required.",
                   
                },
               
                cities: {

                    required: "city Is Required.",

                },           
            },

        });
//Validation End
