function OnPaste_StripFormatting(t,a){if(a.originalEvent&&a.originalEvent.clipboardData&&a.originalEvent.clipboardData.getData){a.preventDefault();var e=a.originalEvent.clipboardData.getData("text/plain");window.document.execCommand("insertText",!1,e)}else if(a.clipboardData&&a.clipboardData.getData){a.preventDefault();var e=a.clipboardData.getData("text/plain");window.document.execCommand("insertText",!1,e)}else window.clipboardData&&window.clipboardData.getData&&(_onPaste_StripFormatting_IEPaste||(_onPaste_StripFormatting_IEPaste=!0,a.preventDefault(),window.document.execCommand("ms-pasteTextOnly",!1)),_onPaste_StripFormatting_IEPaste=!1)}$(document).ready(function(){$.validator.addMethod("regx1",function(t,a,e){return t?e.test(t):!0},"Only space, only number and only special characters are not allow"),$.validator.addMethod("regdigit",function(t,a,e){return t?e.test(t):!0},"Only digit allowed"),$("#jobseeker_regform").validate({rules:{project_name:{regx1:/^[-@.\/#&+,\w\s]*[a-zA-Z][a-zA-Z0-9]*/},project_description:{regx1:/^[-@.\/#&+,\w\s]*[a-zA-Z][a-zA-Z0-9]*/},project_duration:{regdigit:/^[0-9]*$/},training_as:{regx1:/^[-@.\/#&+,\w\s]*[a-zA-Z][a-zA-Z0-9]*/},training_duration:{regdigit:/^[0-9]*$/},training_organization:{regx1:/^[-@.\/#&+,\w\s]*[a-zA-Z][a-zA-Z0-9]*/}}})}),$(window).load(function(){$("#project_duration").on("keydown",function(t){return 32!==t.which})}),$(window).load(function(){$("#training_duration").on("keydown",function(t){return 32!==t.which})});var _onPaste_StripFormatting_IEPaste=!1;$(".formSentMsg").delay(3200).fadeOut(300);