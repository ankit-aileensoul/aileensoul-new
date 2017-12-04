<!DOCTYPE html>
<html lang="en">
    <head>
        <?php echo $head_message; ?>
        <meta charset="utf-8">
        <title>Chat | Aileensoul</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0" />
        <link rel="icon" href="<?php echo base_url('assets/images/favicon.png'); ?>">
        <link href="https://afeld.github.io/emoji-css/emoji.css" rel="stylesheet">
        <link href="https://afeld.github.io/emoji-css/emoji.css" rel="stylesheet">
        <script src="<?php echo base_url() ?>assets/js/bootstrap.min.js"></script>
        <style type="text/css">
            .msg_right:hover .messagedelete{ visibility: visible;opacity: 1;}
            .msg_right .messagedelete{ visibility: hidden;  cursor: pointer; width:25px; float:left;}
            .msg_left_data:hover .messagedelete{ visibility: visible;opacity: 1;}
            .msg_left_data .messagedelete{ visibility: hidden;  cursor: pointer; width:25px; float:left;}
			.chat .chat-history .msg_left_data::after{display:none;}
			.chat .chat-history .msg_right::after{display:none;}
			.msg-user-img{width:35px; height:35px; border-radius:100%; overflow:hidden; float:left; margin-right:10px;}
			.chat .chat-history .my-message{max-width:93%;}
        </style>
    <body>
        <?php echo $header; ?>
        <?php echo $business_header2_border; ?>
        <div class="container">
            <div class="" id="paddingtop_fixed">
                <div class="chat_nobcx">
                    <div class="people-list" id="people-list" ng-app="messageApp" ng-controller="messageController">
                        <div class="search border_btm">
                            <input name="search_key" ng-model="search_key" ng-keyup="getSearchdata()" id="search_key" placeholder="search" type="search">
                            <i class="fa fa-search" id="add_search"></i>
                        </div>
                        <ul class="list">
                            <div id="userlist">
                                <div class="userlist_repeat" ng-repeat="data in loaded_user_data| filter:search">
                                    <a href="<?php echo base_url() ?>message/b/{{data.business_slug}}">
                                        <li class="clearfix" id="{{data.business_slug}}" ng-class="{'active': data.business_slug == current}">
                                            <div class="chat_heae_img" ng-if="data.business_user_image">
                                                <img src="<?php echo BUS_PROFILE_THUMB_UPLOAD_URL ?>{{data.business_user_image}}" alt="{{data.company_name}}"/>
                                            </div>
                                            <div class="chat_heae_img" ng-if="!data.business_user_image">
                                                <img src="<?php echo base_url() . NOBUSIMAGE2 ?>" alt="No Bus Image"/>
                                            </div>
                                            <div class="about">
                                                <div class="name">{{data.company_name}}<br></div>
                                                <div>{{data.message| htmlToPlaintext}}</div>
                                            </div>
                                        </li>
                                    </a>
                                </div>
                            </div>
                        </ul>
                    </div>
                    <!-- chat start -->
                    <div class="chat" id="chat" style="display:block;">
                        <div class="chat-header clearfix border_btm">
                            <a href="#">
                                <div class="chat_heae_img">
                                    <?php if ($user_data['business_user_image'] != '') { ?>
                                        <img src="<?php echo BUS_PROFILE_THUMB_UPLOAD_URL . $user_data['business_user_image'] ?>" alt="<?php echo $user_data['company_name'] ?>"/>
                                    <?php } else { ?>
                                        <img src="<?php echo base_url() . NOBUSIMAGE2; ?>" alt="No Business Image"/>
                                    <?php } ?>
                                </div>
                                <div class="chat-about">
                                    <div class="chat-with">
                                        <span><?php echo $user_data['company_name'] ?></span>  
                                    </div>
                                    <div class="chat-num-messages"><?php echo $user_data['industriyal'] ?></div>
                                </div>
                            </a>
                            <div class="chat_drop">
                                <a onclick="myFunction()" class="chatdropbtn fr"> 
                                    <img src="https://www.aileensoul.com/assets/img/t_dot.png" onclick="myFunction()">
                                </a>
                                <div id="mychat_dropdown" class="chatdropdown-content">
                                    <a href="javascript:void(0);" onclick="delete_history()">
                                        <span class="h4-img h2-srrt"></span>  Delete All
                                    </a>
                                </div>
                            </div>
                        </div>
                        <div class="chat-history" id="chat-history">
                            <ul id="received" class="padding_less_right">
                                <?php
                                foreach ($user_data['chat'] as $chat) {
                                    if ($chat['message_from_profile_id'] == $business_login_profile_id) {
                                        ?>
                                        <li class="clearfix">   
                                            <div class="message-data align-right">    
                                                <span class="message-data-time"><?php echo date('l, d M Y i:s',$chat['timestamp']); ?></span>
                                            </div>   
                                            <div class="msg_right"> 
                                                <div class="messagedelete fl">
                                                    <a href="javascript:void(0);">
                                                        <i class="fa fa-trash-o" aria-hidden="true"></i>
                                                    </a>
                                                </div>
                                                <div class="message other-message float-right"><?php echo $chat['message']; ?> </div>
                                            </div>
                                        </li> 
                                        <?php
                                    } else {
                                        ?>
                                        <li class="recive-data"> 
                                            <div class="message-data">
                                                <span class="message-data-time"><?php echo date('l, d M Y i:s',$chat['timestamp']); ?></span></span> 
                                            </div>    
                                            <div class="msg_left_data"> 
                                                <div class="msg-user-img"><img src="https://aileensoulimages.s3.amazonaws.com/uploads/business_profile/thumbs/1507704688.png"></div><div class="message my-message"><?php echo $chat['message']; ?></div>
                                                <div class="messagedelete"> 
                                                    <a href="javascript:void(0);" onclick="delete_chat(2, 365)"><i class="fa fa-trash-o" aria-hidden="true"></i>
                                                    </a>
                                                </div>
                                            </div>
                                        </li>
                                        <?php
                                    }
                                }
                                ?>
                            </ul>
                        </div>
                        <div class="panel-footer">
                            <div class="">
                                <div class="" id="msg_block">
                                    <div class="input-group" id="set_input">
                                        <form name="blog">
                                            <div class="comment" name="comments" id="message" onpaste="OnPaste_StripFormatting(this, event);" placeholder="Type your message here..." style="position: relative;" contenteditable="true"></div>
                                            <div for="smily" class="smily_b">
                                                <div>
                                                    <a class="smil" href="#" id="notificationLink1">
                                                        <i class="em em-blush"></i>
                                                    </a>

                                                </div>
                                            </div>
                                        </form>
                                        <span class="input-group-btn">
                                            <button class="btn btn-warning btn-sm main_send" id="submit">Send</button>
                                        </span>
                                    </div>
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
        <script>
            // Defining angularjs application.
//            var messageApp = angular.module('messageApp', []);
            var messageApp = angular.module('messageApp', []);
            messageApp.filter('htmlToPlaintext', function () {
                return function (text) {
                    return  text ? String(text).replace(/<[^>]+>/gm, '') : '';
                };
            });

            messageApp.controller('messageController', function ($scope, $http) {
                $scope.current = '<?php echo $this->uri->segment(3); ?>';
                load_message_user();
                function load_message_user() {
                    $http.get(base_url + "message/getBusinessUserChatList").success(function (data) {
                        $scope.loaded_user_data = data;
                        var select_segment = window.location.pathname.split("/").pop();
                        $('li#' + select_segment).addClass('active');
                    })
                }

                $scope.getSearchdata = function () {
                    $http({
                        method: 'POST',
                        url: base_url + 'message/getBusinessUserChatSearchList',
                        data: 'search_key=' + $scope.search_key,
                        headers: {'Content-Type': 'application/x-www-form-urlencoded'}
                    })
                            .success(function (data) {
                                $scope.loaded_user_data = data;
                            });
                }
            });

        </script>
    </body>
</html>

