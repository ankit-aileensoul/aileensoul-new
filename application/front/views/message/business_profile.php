<!DOCTYPE html>
<html lang="en">
    <head>
        <?php echo $head_message; ?>
        <meta charset="utf-8">
        <title>Chat | Aileensoul</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0" />
        <link rel="icon" href="<?php echo base_url('assets/images/favicon.png'); ?>">
        <!--        <link href="https://afeld.github.io/emoji-css/emoji.css" rel="stylesheet">
                <link href="https://afeld.github.io/emoji-css/emoji.css" rel="stylesheet">-->
        <script src="<?php echo base_url() ?>assets/js/bootstrap.min.js"></script>
        <link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/as-videoplayer/build/mediaelementplayer.css'); ?>" />
        <style type="text/css">
            .msg_right:hover .messagedelete{ visibility: visible;opacity: 1;}
            .msg_right .messagedelete{ visibility: hidden;  cursor: pointer; width:25px; float:left;}
            .msg_left_data:hover .messagedelete{ visibility: visible;opacity: 1;}
            .msg_left_data .messagedelete{ visibility: hidden;  cursor: pointer; width:25px; float:left;}
            .chat .chat-history .msg_left_data::after{display:none;}
            .chat .chat-history .msg_right::after{display:none;}
            .msg_left_data .msg-user-img{width:35px; height:35px; border-radius:100%; overflow:hidden; float:left; margin-right:10px;}
            .msg_right .msg-user-img{width:35px; height:35px; border-radius:100%; overflow:hidden; float:right; margin-left:10px;}
            .chat .chat-history .my-message{max-width:93%;}
            .chat .chat-history .other-message{float:left; max-width:93%;}
            .msg-time{float: right; padding-left: 10px; font-size: 11px; vertical-align: bottom; line-height: 1;
                      padding-top: 10px; opacity: 0.5;}
            .link_b { position: absolute;top: 16px;right: 85px;bottom: 3px;z-index: 2;}
            .smily_b{ position: absolute; top: 7px; right: 70px; bottom: 3px; z-index: 2;}




            .loader,
            .loader:before,
            .loader:after {
                border-radius: 50%;
                width: 1.2em;
                height: 1.2em;
                -webkit-animation-fill-mode: both;
                animation-fill-mode: both;
                -webkit-animation: load7 1.8s infinite ease-in-out;
                animation: load7 1.8s infinite ease-in-out;
            }
            .loader {
                color: #0080c0;
                font-size: 10px;
                margin: 20px auto;
                position: relative;
                text-indent: -9999em;
                -webkit-transform: translateZ(0);
                -ms-transform: translateZ(0);
                transform: translateZ(0);
                -webkit-animation-delay: -0.16s;
                animation-delay: -0.16s;
            }
            .loader:before,
            .loader:after {
                content: '';
                position: absolute;
                top: 0;
            }
            .loader:before {
                left: -3.5em;
                -webkit-animation-delay: -0.32s;
                animation-delay: -0.32s;
            }
            .loader:after {
                left: 3.5em;
            }
            @-webkit-keyframes load7 {
                0%,
                80%,
                100% {
                    box-shadow: 0 2.5em 0 -1.3em;
                }
                40% {
                    box-shadow: 0 2.5em 0 0;
                }
            }
            @keyframes load7 {
                0%,
                80%,
                100% {
                    box-shadow: 0 2.5em 0 -1.3em;
                }
                40% {
                    box-shadow: 0 2.5em 0 0;
                }
            }




        </style>
        <style type="text/css">
            .mejs__overlay-button {
                background-image: url("https://www.aileensoul.com/assets/as-videoplayer/build/mejs-controls.svg");
            }
            .mejs__overlay-loading-bg-img {
                background-image: url("https://www.aileensoul.com/assets/as-videoplayer/build/mejs-controls.svg");
            }
            .mejs__button > button {
                background-image: url("https://www.aileensoul.com/assets/as-videoplayer/build/mejs-controls.svg");
            }
        </style>
<!--            <link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>assets/emoji/css/jquery.emojipicker.css">
        <script type="text/javascript" src="<?php echo base_url() ?>assets/emoji/js/jquery.emojipicker.js"></script>

         Emoji Data 
        <link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>assets/emoji/css/jquery.emojipicker.tw.css">
        <script type="text/javascript" src="<?php echo base_url() ?>assets/emoji/js/jquery.emojis.js"></script>-->

<!--            <script type="text/javascript">
                $(document).ready(function (e) {

                    $('#input-default').emojiPicker();
                    $('#input-custom-size').emojiPicker({
                        width: '300px',
                        height: '200px'
                    });
                    $('#input-left-position').emojiPicker({
                        position: 'left'
                    });
                    $('#create').click(function (e) {
                        e.preventDefault();
                        $('#text-custom-trigger').emojiPicker({
                            width: '300px',
                            height: '200px',
                            button: false
                        });
                    });
                    $('#toggle').click(function (e) {
                        e.preventDefault();
                        $('#text-custom-trigger').emojiPicker('toggle');
                    });
                    $('#destroy').click(function (e) {
                        e.preventDefault();
                        $('#text-custom-trigger').emojiPicker('destroy');
                    })

                    // keyup event is fired
                    $(".emojiable-question, .emojiable-option").on("keyup", function () {
                        //console.log("emoji added, input val() is: " + $(this).val());
                    });
                });
            </script>-->

    <body ng-app="messageApp" ng-controller="messageController">
        <?php echo $header; ?>
        <?php echo $business_header2_border; ?>
        <div class="container">
            <div class="" id="paddingtop_fixed">
                <div class="chat_nobcx">
                    <!--<div class="people-list" id="people-list" ng-app="messageApp" ng-controller="messageController">-->
                    <div class="people-list" id="people-list">
                        <div class="search border_btm">
                            <input name="search_key" ng-model="search_key" ng-keyup="getSearchdata()" id="search_key" placeholder="search" type="search">
                            <i class="fa fa-search" id="add_search"></i>
                        </div>
                        <ul class="list">
                            <div id="userlist">
                                <div class="userlist_repeat" ng-repeat="data in loaded_user_data">
                                    <!--<a href="<?php echo base_url() ?>message/b/{{data.business_slug}}">-->
                                    <li class="clearfix" id="{{data.business_slug}}" ng-class="{'active': data.business_slug == current}" ng-click="getuserMessage()">
                                        <div class="chat_heae_img" ng-if="data.business_user_image">
                                            <img ng-src="<?php echo BUS_PROFILE_THUMB_UPLOAD_URL ?>{{data.business_user_image}}" alt="{{data.company_name}}"/>
                                        </div>
                                        <div class="chat_heae_img" ng-if="!data.business_user_image">
                                            <img src="<?php echo base_url() . NOBUSIMAGE2 ?>" alt="No Bus Image"/>
                                        </div>
                                        <div class="about">
                                            <div class="name">{{data.company_name}}<br></div>
                                            <div>{{data.message| htmlToPlaintext}}</div>
                                        </div>
                                    </li>
                                    <!--</a>-->
                                </div>
                            </div>
                        </ul>
                    </div>
                    <!-- chat start -->
                    <div class="chat" id="chat" style="display:block;">
                        <div class="chat-header clearfix border_btm">
                            <a href="#">
                                <div class="chat_heae_img" ng-if="business_user_image">
                                    <img ng-src="<?php echo BUS_PROFILE_THUMB_UPLOAD_URL ?>{{business_user_image}}" alt="{{company_name}}"/>
                                </div>
                                <div class="chat_heae_img" ng-if="!business_user_image">
                                    <img src="<?php echo base_url() . NOBUSIMAGE2 ?>" alt="No Bus Image"/>
                                </div>

                                <div class="chat-about">
                                    <div class="chat-with">
                                        <span>{{company_name}}</span>  
                                    </div>
                                    <div class="chat-num-messages" ng-if="industriyal">{{industriyal}}</div>
                                    <div class="chat-num-messages" ng-if="!industriyal">{{other_industrial}}</div>
                                </div>
                            </a>
                            <div class="chat_drop">
                                <a onclick="myFunction()" class="chatdropbtn fr"> 
                                    <img src="<?php base_url('assets/img/t_dot.png') ?>" onclick="myFunction()">
                                </a>
                                <div id="mychat_dropdown" class="chatdropdown-content">
                                    <a href="javascript:void(0);" onclick="delete_history()">
                                        <span class="h4-img h2-srrt"></span>  Delete All
                                    </a>
                                </div>
                            </div>
                        </div>
                        <div class="chat-history" id="chat-history" scroll="user_chat">
                            <div id="<?php echo $business_login_slug ?>-{{business_slug}}" class="user_message_div">
                                <ul id="received" class="padding_less_right received" ng-repeat="(key, value) in user_chat | groupBy: 'date'">
                                    <div class="message-data align-right">    
                                        <span class="message-data-time">{{key}}</span>
                                    </div>
                                    <div ng-repeat="chat in value"> 
                                        <li class="clearfix" ng-if="chat.message_from_profile_id == '<?php echo $business_login_profile_id ?>'">   
                                            <div class="msg_right"> 
                                                <div class="messagedelete fl">
                                                    <a href="javascript:void(0);" ng-click="delete_chat('1',chat.id)">
                                                        <i class="fa fa-trash-o" aria-hidden="true"></i>
                                                    </a>
                                                </div>
                                                <div class="message other-message float-right" ng-bind-html="chat.message" ng-if="chat.message"><span class="msg-time">{{chat.timestamp * 1000| date : "hh:mm a"}}</span></div>
                                                <div class="message other-message float-right" ng-if="chat.message_file_type == 'image'">
                                                    <div class="file_image"><img ng-src="<?php echo BUS_MESSAGE_THUMB_UPLOAD_URL ?>{{chat.message_file}}" alt="{{chat.message_file}}" style="width:100px; height: auto;"></div><span class="msg-time">{{chat.timestamp * 1000| date : "hh:mm a"}}</span>
                                                    <div class="file_property">
                                                        <p><b>Size:</b>{{chat.message_file_size| Filesize}}</p>
                                                        <p><b><a download="{{chat.message_file}}" target="_blank" href="<?php echo BUS_MESSAGE_MAIN_UPLOAD_URL ?>{{chat.message_file}}">Click here for Download</a></b></p>
                                                    </div>
                                                </div>
                                                <div class="message other-message float-right" ng-if="chat.message_file_type == 'video'">
                                                    <div class="file_image">
                                                        <video ng-init="loadMediaElement()" width = "250" height = "200" ng-attr-poster="<?php echo BUS_MESSAGE_MAIN_UPLOAD_URL ?>{{chat.message_file| chnageExt}}" controls playsinline webkit-playsinline>
                                                            <source ng-src = "<?php echo BUS_MESSAGE_MAIN_UPLOAD_URL ?>{{chat.message_file}}" type = "video/mp4">
                                                            Your browser does not support the video tag.
                                                        </video>
                                                    </div><span class="msg-time">{{chat.timestamp * 1000| date : "hh:mm a"}}</span>
                                                    <div class="file_property">
                                                        <p><b>Size:</b>{{chat.message_file_size| Filesize}}</p>
                                                        <p><b><a download="{{chat.message_file}}" target="_blank" href="<?php echo BUS_MESSAGE_MAIN_UPLOAD_URL ?>{{chat.message_file}}">Click here for Download</a></b></p>
                                                    </div>
                                                </div>
                                                <div class="message other-message float-right" ng-if="chat.message_file_type == 'audio'">
                                                    <div class="file_image">
                                                        <audio ng-init="loadMediaElement()" id = "audio_player" width = "200" height = "200" controls>
                                                            <source ng-src = "<?php echo BUS_MESSAGE_MAIN_UPLOAD_URL ?>{{chat.message_file}}" type = "audio/mp3">
                                                            Your browser does not support the audio tag.
                                                        </audio>
                                                    </div>
                                                    <span class="msg-time">{{chat.timestamp * 1000| date : "hh:mm a"}}</span>
                                                    <div class="file_property">
                                                        <p><b>Size:</b>{{chat.message_file_size| Filesize}}</p>
                                                        <p><b><a download="{{chat.message_file}}" target="_blank" href="<?php echo BUS_MESSAGE_MAIN_UPLOAD_URL ?>{{chat.message_file}}">Click here for Download</a></b></p>
                                                    </div>
                                                </div>
                                                <div class="message other-message float-right" ng-if="chat.message_file_type == 'pdf'">
                                                    <img ng-src="<?php echo base_url('assets/images/PDF.jpg') ?>" alt="{{chat.message_file}}" width="100" height="100">
                                                    <span class="msg-time">{{chat.timestamp * 1000| date : "hh:mm a"}}</span>
                                                    <div class="file_property">
                                                        <p><b>Size:</b>{{chat.message_file_size| Filesize}}</p>
                                                        <p><b><a download="{{chat.message_file}}" target="_blank" href="<?php echo BUS_MESSAGE_MAIN_UPLOAD_URL ?>{{chat.message_file}}">Click here for Download</a></b></p>
                                                    </div>
                                                </div>
                                                <div class="msg-user-img" ng-if="chat.business_user_image"><img ng-src="<?php echo BUS_PROFILE_THUMB_UPLOAD_URL . $business_login_user_image ?>"></div>
                                                <div class="msg-user-img" ng-if="!chat.business_user_image"><img ng-src="<?php echo base_url() . NOBUSIMAGE2 ?>" alt="No Business Image"></div>
                                            </div>
                                        </li> 
                                        <li class="recive-data" ng-if="chat.message_from_profile_id != '<?php echo $business_login_profile_id ?>'"> 
                                            <div class="msg_left_data"> 
                                                <div class="msg-user-img" ng-if="chat.business_user_image"><img ng-src="<?php echo BUS_PROFILE_THUMB_UPLOAD_URL ?>{{business_user_image}}" alt="{{chat.company_name}}"></div>
                                                <div class="msg-user-img" ng-if="!chat.business_user_image"><img ng-src="<?php echo base_url() . NOBUSIMAGE2 ?>" alt="No Business Image"></div>
                                                <div class="message my-message" ng-bind-html="chat.message" ng-if="chat.message"><span class="msg-time">{{chat.timestamp * 1000| date : "hh:mm a"}}</span></div>
                                                <div class="message my-message" ng-if="chat.message_file_type == 'image'">
                                                    <div class="file_image"><img ng-src="<?php echo BUS_MESSAGE_THUMB_UPLOAD_URL ?>{{chat.message_file}}" alt="{{chat.message_file}}" style="width:100px; height: auto;"></div><span class="msg-time">{{chat.timestamp * 1000| date : "hh:mm a"}}</span>
                                                    <div class="file_property">
                                                        <p><b>Size:</b>{{chat.message_file_size| Filesize}}</p>
                                                        <p><b><a download="{{chat.message_file}}" target="_blank" href="<?php echo BUS_MESSAGE_MAIN_UPLOAD_URL ?>{{chat.message_file}}">Click here for Download</a></b></p>
                                                    </div>
                                                </div>
                                                <div class="message my-message" ng-if="chat.message_file_type == 'video'">
                                                    <div class="file_image">
                                                        <video width = "250" height = "200" ng-attr-poster="<?php echo BUS_MESSAGE_MAIN_UPLOAD_URL ?>{{chat.message_file| chnageExt}}" controls playsinline webkit-playsinline>
                                                            <source ng-src = "<?php echo BUS_MESSAGE_MAIN_UPLOAD_URL ?>{{chat.message_file}}" type = "video/mp4">
                                                            Your browser does not support the video tag.
                                                        </video>
                                                    </div><span class="msg-time">{{chat.timestamp * 1000| date : "hh:mm a"}}</span>
                                                    <div class="file_property">
                                                        <p><b>Size:</b>{{chat.message_file_size| Filesize}}</p>
                                                        <p><b><a download="{{chat.message_file}}" target="_blank" href="<?php echo BUS_MESSAGE_MAIN_UPLOAD_URL ?>{{chat.message_file}}">Click here for Download</a></b></p>
                                                    </div>
                                                    <span class="msg-time">{{chat.timestamp * 1000| date : "hh:mm a"}}</span>
                                                </div>
                                                <div class="message my-message" ng-if="chat.message_file_type == 'audio'">
                                                    <div class="file_image">
                                                        <audio id = "audio_player" width = "200" height = "200" controls>
                                                            <source ng-src = "<?php echo BUS_MESSAGE_MAIN_UPLOAD_URL ?>{{chat.message_file}}" type = "audio/mp3">
                                                            Your browser does not support the audio tag.
                                                        </audio>
                                                    </div>
                                                    <span class="msg-time">{{chat.timestamp * 1000| date : "hh:mm a"}}</span>
                                                    <div class="file_property">
                                                        <p><b>Size:</b>{{chat.message_file_size| Filesize}}</p>
                                                        <p><b><a download="{{chat.message_file}}" target="_blank" href="<?php echo BUS_MESSAGE_MAIN_UPLOAD_URL ?>{{chat.message_file}}">Click here for Download</a></b></p>
                                                    </div>
                                                </div>
                                                <div class="message my-message" ng-if="chat.message_file_type == 'pdf'">
                                                    <img ng-src="<?php echo base_url('assets/images/PDF.jpg') ?>" alt="{{chat.message_file}}"  width="100" height="100">
                                                    <span class="msg-time">{{chat.timestamp * 1000| date : "hh:mm a"}}</span>
                                                    <div class="file_property">
                                                        <p><b>Size:</b>{{chat.message_file_size| Filesize}}</p>
                                                        <p><b><a download="{{chat.message_file}}" target="_blank" href="<?php echo BUS_MESSAGE_MAIN_UPLOAD_URL ?>{{chat.message_file}}">Click here for Download</a></b></p>
                                                    </div>
                                                </div>
                                                <div class="messagedelete"> 
                                                    <a href="javascript:void(0);" ng-click="delete_chat('2',chat.id)"><i class="fa fa-trash-o" aria-hidden="true"></i></a>
                                                </div>
                                            </div>
                                        </li>
                                    </div>
                                </ul>
                                <div class="loader">Loading...</div>
                            </div>
                        </div>
                        <div class="panel-footer">
                            <div class="">
                                <div class="" id="msg_block">
                                    <div class="input-group " id="set_input">
                                        <form name="blog">
                                            <div class="comment " ng-class="{'form-control': false, 'has-error':isMsgBoxEmpty}" ng-model="chatMsg" ng-change="isMsgBoxEmpty = false" ng-enter="sendMsg()" ng-focus="setFocus" focus-me="setFocus" name="message" id="message" onpaste="OnPaste_StripFormatting(this, event);" placeholder="Type your message here..." style="position: relative;" contenteditable="true"></div>
                                            <!--<div class="comment" ng-class="{'form-control': false, 'has-error':isMsgBoxEmpty}" ng-model="chatMsg" ng-change="isMsgBoxEmpty = false" ng-enter="sendMsg()" name="message" id="message" onpaste="OnPaste_StripFormatting(this, event);" placeholder="Type your message here..." style="position: relative;" contenteditable="true"></div>-->
                                            <div for="smily" class="smily_b">
                                                <div><a class="smil" href="#" id="notificationLink1"><i class="em em-blush"></i></a></div>
                                            </div>
                                        </form>
                                        <div for="smily" class="link_b input-group-btn box-tools pull-right desktop">
                                            <!--<button class="btn btn-warning btn-flat ng-pristine ng-valid ng-touched fr" data-widget="" ngf-select="" ngf-multiple="false" ng-model="Files"><i class="fa fa-paperclip" aria-hidden="true"></i></button>-->
                                            <button class="btn btn-warning btn-flat fr" data-widget="" ngf-select="upload($files)" ngf-multiple="true" ng-model="Files"><i class="fa fa-paperclip" aria-hidden="true"></i></button>
                                        </div>
                                        <span class="input-group-btn">
                                            <button class="btn btn-warning btn-sm main_send" ng-click="sendMsg()" id="submit">Send</button>
                                        </span>
                                    </div>
                                    <!--                                     <div class="box-footer">
                                                    <div class="box-tools pull-right desktop">
                                                       Any File Select Button 
                                                      <button class="btn btn-warning btn-flat" data-widget="" ngf-select ng-model="Files"><i class="glyphicon glyphicon-paperclip"></i></button>
                                                    </div>
                                                     Text message  
                                                    <form action="" method="post">
                                                      <div class="input-group">
                                                        <input type="text" name="message" placeholder="Type Message ..." ng-class="{'form-control': true, 'has-error':isMsgBoxEmpty}" ng-model="chatMsg" ng-change="isMsgBoxEmpty=false" ng-enter="sendMsg()" ng-focus="setFocus" focus-me="setFocus"/>
                                                        <span class="input-group-btn">
                                                          <button type="button" class="btn btn-warning btn-flat" ng-click="sendMsg()">Send</button>
                                                        </span>
                                                      </div>
                                                    </form>
                                                  </div>-->
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <?php echo $footer; ?>
        <script>
                    var base_url = '<?php echo base_url(); ?>';
                    var slug = '<?php echo $slugid; ?>';
        </script>
        <script src="//cdnjs.cloudflare.com/ajax/libs/angular-filter/0.4.9/angular-filter.min.js"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.6.4/angular-sanitize.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/danialfarid-angular-file-upload/12.2.13/ng-file-upload-all.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/danialfarid-angular-file-upload/12.2.13/ng-file-upload.js"></script>
        <script src="<?php echo base_url() ?>assets/services/sendImageService.js"></script>
        <script type="text/javascript" src="<?php echo base_url('assets/as-videoplayer/build/mediaelement-and-player.js?ver=' . time()); ?>"></script>
        <script type="text/javascript" src="<?php echo base_url('assets/as-videoplayer/demo.js?ver=' . time()); ?>"></script>

        <script>
                    // Defining angularjs application.
//            var messageApp = angular.module('messageApp', []);
                    var messageApp = angular.module('messageApp', ['angular.filter', 'ngSanitize', 'ngFileUpload', 'Services']);
                    messageApp.filter('htmlToPlaintext', function () {
                        return function (text) {
                            return  text ? String(text).replace(/<[^>]+>/gm, '') : '';
                        };
                    });
                    messageApp.filter('Filesize', function () {
                        return function (size) {
                            if (isNaN(size))
                                size = 0;
                            if (size < 1024)
                                return size + ' Bytes';
                            size /= 1024;
                            if (size < 1024)
                                return size.toFixed(2) + ' Kb';
                            size /= 1024;
                            if (size < 1024)
                                return size.toFixed(2) + ' Mb';
                            size /= 1024;
                            if (size < 1024)
                                return size.toFixed(2) + ' Gb';
                            size /= 1024;
                            return size.toFixed(2) + ' Tb';
                        };
                    });
                    messageApp.filter("chnageExt", function () {
                        return function (fileName) {
                            return fileName = fileName.replace('.MP4', '.png');
                        };
                    });
                    //messageApp.filter('unsafe', function($sce) { return $sce.trustAsHtml; });
                    // AUTO SCROLL MESSAGE DIV FIRST TIME START
                    messageApp.directive('scroll', function ($timeout) {
                        return {
                            restrict: 'A',
                            link: function (scope, element, attr) {
                                scope.$watchCollection(attr.scroll, function (newVal) {
                                    $timeout(function () {
                                        element[0].scrollTop = element[0].scrollHeight;
                                    });
                                });
                            }
                        }
                    });
                    // AUTO SCROLL MESSAGE DIV FIRST TIME END
                    messageApp.directive('ngEnter', function () {			// custom directive for sending message on enter click
                        return function (scope, element, attrs) {
                            element.bind("keydown keypress", function (event) {
                                if (event.which === 13 && !event.shiftKey) {
                                    scope.$apply(function () {
                                        scope.$eval(attrs.ngEnter);
                                    });
                                    event.preventDefault();
                                }
                            });
                        };
                    });
                    messageApp.directive('focusMe', function ($timeout) {		// custom directive for focusing on message sending input box
                        return {
                            link: function (scope, element, attrs) {
                                scope.$watch(attrs.focusMe, function (value) {
                                    if (value === true) {
                                        $timeout(function () {
                                            element[0].focus();
                                            scope[attrs.focusMe] = false;
                                        });
                                    }
                                });
                            }
                        };
                    });
                    messageApp.controller('messageController', function ($scope, Upload, $timeout, $http) {
                        var socket = io.connect(window.location.protocol + '//' + window.location.hostname + ':3000');
                        $scope.current = '<?php echo $this->uri->segment(3); ?>';
                        $scope.delete_chat = function (message_for,message_id) {
                            $http({
                                method: 'POST',
                                url: base_url + 'message/businessmessageDelete',
                                data: 'message_id=' + message_id + '&message_for=' + message_for,
                                headers: {'Content-Type': 'application/x-www-form-urlencoded'}
                            })
                                    .then(function (success) {
                                        //            $scope.loaded_user_data = success.data;
//                                    alert($(this).parent().find('li').attr('id'));
                                        $(this).parents('ng-scope').remove();
                                    });
                        }
                        /*$scope.loadMediaElement = function ()
                         {
                         $('video, audio').mediaelementplayer();
                         console.log('called');
                         };*/
                        load_message_user();
                        function load_message_user() {
//                            $http.get(base_url + "message/getBusinessUserChatList").success(function (data) {
//                                $scope.loaded_user_data = data;
//                                var select_segment = window.location.pathname.split("/").pop();
//                                $('li#' + select_segment).addClass('active');
//                            })
                            $http.get(base_url + "message/getBusinessUserChatList").then(function (success) {
                                $scope.loaded_user_data = success.data;
                                var select_segment = window.location.pathname.split("/").pop();
                                $('li#' + select_segment).addClass('active');
                            }, function (error) {

                            });
                        }

                        $scope.getSearchdata = function () {
                            $http({
                                method: 'POST',
                                url: base_url + 'message/getBusinessUserChatSearchList',
                                data: 'search_key=' + $scope.search_key,
                                headers: {'Content-Type': 'application/x-www-form-urlencoded'}
                            })
                                    .then(function (success) {
                                        $scope.loaded_user_data = success.data;
                                    });
                        }
                        $scope.getuserMessage = function () {
                            var business_slug = this.data.business_slug;
                            getUserMessage(business_slug);
                            history.pushState('Business Profile Message', 'Business Profile Message', business_slug);
                            var select_segment = window.location.pathname.split("/").pop();
                            $('li').removeClass('active');
                            $('li#' + select_segment).addClass('active');
                        }

                        getUserMessage($scope.current);
                        function getUserMessage(business_slug) {
                            $http({
                                method: 'POST',
                                url: base_url + 'message/getBusinessUserChat',
                                data: 'business_slug=' + business_slug,
                                headers: {'Content-Type': 'application/x-www-form-urlencoded'}
                            })
                                    .then(function (success) {
                                        data = success.data;
                                        $scope.business_user_image = data.business_user_image;
                                        $scope.company_name = data.company_name;
                                        $scope.industriyal = data.industriyal;
                                        $scope.other_industrial = data.other_industrial;
                                        $scope.business_slug = data.business_slug;
                                        $scope.user_chat = data.chat;
                                    });
                        }

                        // sending text message function
                        $scope.sendMsg = function () {
                            $scope.current = window.location.pathname.split("/").pop();
                            var message = $('#message').html();
                            message = message.replace(/^(<br\s*\/?>)+/, '');
                            if (message) {
                                $scope.isFileSelected = false;
                                $scope.isMsg = true;
                                $http({
                                    method: 'POST',
                                    url: base_url + 'message/businessMessageInsert',
                                    data: 'message=' + message + '&business_slug=' + $scope.current,
                                    headers: {'Content-Type': 'application/x-www-form-urlencoded'}
                                })
                                        .then(function (success) {
                                            data = success.data;
                                            if (data.result != 'fail') {
                                                // GET SOCKET USER LIST START
                                                socket.emit('getBusinessChatUserList', {
                                                    message_slug: $scope.current, message_to_slug: data.business_slug, message: data.message, message_file: data.message_file, message_file_type: data.message_file_type, message_file_size: data.message_file_size, timestamp: data.timestamp, message_from_profile_id: data.message_from_profile_id, company_name: data.company_name, business_user_image: data.business_user_image, date: data.date
                                                });
                                                // GET SOCKET USER LIST END    
                                                $('#message').html('');
                                                $scope.setFocus = true;
                                            }
                                        });
                            } else {
                                $scope.isMsgBoxEmpty = true;
                            }
                        }
                        var isProcessing = false;
                        $scope.$watch('files', function () {
                            $scope.upload($scope.files);
                        });
                        $scope.$watch('Files', function () {
                            if ($scope.Files != null) {
                                $scope.files = [$scope.Files];
                            }
                        });

                        $scope.log = '';
                        $scope.upload = function (files) {
                            if (isProcessing) {
                                return;
                            }
                            isProcessing = true;
                            $scope.current = window.location.pathname.split("/").pop();
                            if (files && files.length) {

                                for (var i = 0; i < files.length; i++) {
                                    var file = files[i];
                                    if (!file.$error) {
                                        Upload.upload({
                                            url: base_url + 'message/business_file_upload',
                                            data: {
                                                file: file,
                                                business_slug: $scope.current,
                                            }
                                        })
                                                .then(function (success) {
                                                    data = success.data;
                                                    if (data.result != 'fail') {
                                                        // GET SOCKET USER LIST START
                                                        socket.emit('getBusinessChatUserList', {
                                                            message_slug: $scope.current, message_to_slug: data.business_slug, message: data.message, message_file: data.message_file, message_file_type: data.message_file_type, message_file_size: data.message_file_size, timestamp: data.timestamp, message_from_profile_id: data.message_from_profile_id, company_name: data.company_name, business_user_image: data.business_user_image, date: data.date
                                                        });
                                                        // GET SOCKET USER LIST END    
                                                        $('#message').html('');
                                                        $scope.setFocus = true;
                                                        isProcessing = false;
                                                    }
                                                });
//            .then(function (resp) {
//            $timeout(function () {
//            $scope.log = 'file: ' +
//                    resp.config.data.file.name +
//                    ', Response: ' + JSON.stringify(resp.data) +
//                    '\n' + $scope.log;
//            });
//            }, null, function (evt) {
//            var progressPercentage = parseInt(100.0 *
//                    evt.loaded / evt.total);
//            $scope.log = 'progress: ' + progressPercentage +
//                    '% ' + evt.config.data.file.name + '\n' +
//                    $scope.log;
//            });
                                    }
                                }
                            }
                        };
                        // SOCKET ON

                        socket.on('getBusinessChatUserList', function (data) {
                            var chat_length = $scope.user_chat.length;
                            if (chat_length == 0) {
                                $scope.user_chat = [];
                            }
                            load_message_user();
                            getUserMessage($scope.current);
                        });
                    });
        </script>
    </body>
</html>
