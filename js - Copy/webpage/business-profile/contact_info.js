function checkvalue(){var e=$.trim(document.getElementById("tags").value),t=$.trim(document.getElementById("searchplace").value);return""==e&&""==t?!1:void 0}function check(){var e=$.trim(document.getElementById("tags1").value),t=$.trim(document.getElementById("searchplace1").value);return""==e&&""==t?!1:void 0}jQuery(document).ready(function(e){e(window).load(function(){e("#preloader").fadeOut("slow",function(){e(this).remove()})})}),$(function(){$("#tags").autocomplete({source:function(e,t){var a=new RegExp("^"+$.ui.autocomplete.escapeRegex(e.term),"i");t($.grep(data,function(e){return a.test(e.label)}))},minLength:1,select:function(e,t){e.preventDefault(),$("#tags").val(t.item.label),$("#selected-tag").val(t.item.label)},focus:function(e,t){e.preventDefault(),$("#tags").val(t.item.label)}})}),$(function(){$("#searchplace").autocomplete({source:function(e,t){var a=new RegExp("^"+$.ui.autocomplete.escapeRegex(e.term),"i");t($.grep(data1,function(e){return a.test(e.label)}))},minLength:1,select:function(e,t){e.preventDefault(),$("#searchplace").val(t.item.label),$("#selected-tag").val(t.item.label)},focus:function(e,t){e.preventDefault(),$("#searchplace").val(t.item.label)}})}),$("#searchplace").select2({placeholder:"Find Your Location",maximumSelectionLength:1,ajax:{url:base_url+"business_profile/location",dataType:"json",delay:250,processResults:function(e){return{results:e}},cache:!0}}),$.validator.addMethod("regx1",function(e,t,a){return a.test(e)},"Only numbers are allowed"),$.validator.addMethod("regx",function(e,t,a){return a.test(e)},"Only space and only number  are not allow"),$(document).ready(function(){$("#contactinfo").validate({rules:{contactname:{required:!0,regx:/^[a-zA-Z\s]*[a-zA-Z]/},contactmobile:{number:!0,minlength:8,maxlength:15},email:{required:!0,email:!0,remote:{url:base_url+"business_profile/check_email",type:"post",data:{email:function(){return $("#email").val()},get_csrf_token_name:get_csrf_hash}}}},messages:{contactname:{required:"Company name Is Required."},contactmobile:{required:"Mobile number Is Required."},email:{required:"Email id is required",email:"Please enter valid email id",remote:"Email already exists"}}})}),$(".alert").delay(3200).fadeOut(300),$(function(){$("#tags1").autocomplete({source:function(e,t){var a=new RegExp("^"+$.ui.autocomplete.escapeRegex(e.term),"i");t($.grep(data,function(e){return a.test(e.label)}))},minLength:1,select:function(e,t){e.preventDefault(),$("#tag1").val(t.item.label),$("#selected-tag").val(t.item.label)},focus:function(e,t){e.preventDefault(),$("#tags1").val(t.item.label)}})}),$(function(){$("#searchplace1").autocomplete({source:function(e,t){var a=new RegExp("^"+$.ui.autocomplete.escapeRegex(e.term),"i");t($.grep(data1,function(e){return a.test(e.label)}))},minLength:1,select:function(e,t){e.preventDefault(),$("#searchplace1").val(t.item.label),$("#selected-tag").val(t.item.label)},focus:function(e,t){e.preventDefault(),$("#searchplace1").val(t.item.label)}})});