<!DOCTYPE html>
<html lang="en" ng-app="businessCategoryApp" ng-controller="businessCategoryController">
    <head>
        <title ng-bind="title"></title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="<?php echo base_url('assets/n-css/bootstrap.min.css?ver=' . time()) ?>">
        <link rel="stylesheet" href="<?php echo base_url('assets/n-css/animate.css?ver=' . time()) ?>">
        <link rel="stylesheet" href="<?php echo base_url('assets/n-css/font-awesome.min.css?ver=' . time()) ?>">
        <link rel="stylesheet" href="<?php echo base_url('assets/n-css/owl.carousel.min.css?ver=' . time()) ?>">
        <link rel="stylesheet" href="<?php echo base_url('assets/n-css/jquery.mCustomScrollbar.min.css?ver=' . time()) ?>">

        <link rel="stylesheet" href="<?php echo base_url('assets/n-css/n-commen.css?ver=' . time()) ?>">
        <link rel="stylesheet" href="<?php echo base_url('assets/n-css/n-style.css?ver=' . time()) ?>">
    </head>
    <body class="profile-main-page">
        <?php echo $header_profile; ?>
        <div class="middle-section middle-section-banner">
            <?php echo $search_banner; ?>
            <div class="container">
                <div class="custom-user-list">
                    <div class="list-box-custom">
                        <h3>All Categories</h3>
                        <div class="cat-box">
                            <ul>
                                <li ng-repeat="category in businessAllCategory">
                                    <a href="<?php echo base_url('business-profile/category/') ?>{{category.industry_slug}}">
                                        <img src="<?php echo base_url('assets/n-images/car.png?ver='.time()) ?>">
                                        <p>{{category.industry_name}}<span>({{category.count}})</span></p>
                                    </a>
                                </li>
                                <li>
                                    <a href="<?php echo base_url('business-profile/category/other') ?>">
                                        <img src="<?php echo base_url('assets/n-images/car.png?ver='.time()) ?>">
                                        <p>Other<span>({{otherCategoryCount}})</span><p>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>

                <div class="right-part">
                    <div class="add-box">
                        <img src="<?php echo base_url('assets/n-images/add.jpg') ?>">
                    </div>
                </div>
            </div>
        </div>
        <script src="<?php echo base_url('assets/js/jquery.min.js?ver=' . time()) ?>"></script>
        <script src="<?php echo base_url('assets/js/bootstrap.min.js?ver=' . time()) ?>"></script>
        <script src="<?php echo base_url('assets/js/owl.carousel.min.js?ver=' . time()) ?>"></script>
        <script src="<?php echo base_url('assets/js/jquery.mCustomScrollbar.concat.min.js?ver=' . time()) ?>"></script>

        <script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.6.4/angular.min.js"></script>
        <script data-semver="0.13.0" src="http://angular-ui.github.io/bootstrap/ui-bootstrap-tpls-0.13.0.min.js"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.6.4/angular-route.js"></script>
        <script>
            var base_url = '<?php echo base_url(); ?>';
            var user_id = '<?php echo $this->session->userdata('aileenuser'); ?>';
            var title = '<?php echo $title; ?>';
            var header_all_profile = '<?php echo $header_all_profile; ?>';
            var app = angular.module('businessCategoryApp', ['ui.bootstrap']);
        </script>               
        <script src="<?php echo base_url('assets/js/webpage/user/user_header_profile.js?ver=' . time()) ?>"></script>
        <script src="<?php echo base_url('assets/js/webpage/business/searchBusiness.js?ver=' . time()) ?>"></script>
        <script src="<?php echo base_url('assets/js/webpage/business/category.js?ver=' . time()) ?>"></script>
    </body>
</html>