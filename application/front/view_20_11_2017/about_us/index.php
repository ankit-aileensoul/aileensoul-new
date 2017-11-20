<!DOCTYPE html>
<html lang="en">
    <head>
        <title>About Aileensoul.com and its vision and mission</title>
        <meta name="description" content="Aileensoul.com have something to give this world, Know about us." />
        <link rel="icon" href="<?php echo base_url('assets/images/favicon.png?ver='.time()); ?>">
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0" />
        <?php
        if($_SERVER['HTTP_HOST'] != "localhost"){
        ?>
        <meta name="google-site-verification" content="BKzvAcFYwru8LXadU4sFBBoqd0Z_zEVPOtF0dSxVyQ4" />
        <script>
            (function (i, s, o, g, r, a, m) {
                i['GoogleAnalyticsObject'] = r;
                i[r] = i[r] || function () {
                    (i[r].q = i[r].q || []).push(arguments)
                }, i[r].l = 1 * new Date();
                a = s.createElement(o),
                        m = s.getElementsByTagName(o)[0];
                a.async = 1;
                a.src = g;
                m.parentNode.insertBefore(a, m)
            })(window, document, 'script', 'https://www.google-analytics.com/analytics.js', 'ga');

            ga('create', 'UA-91486853-1', 'auto');
            ga('send', 'pageview');

        </script>
        <meta name="msvalidate.01" content="41CAD663DA32C530223EE3B5338EC79E" />
        <?php
        }
        ?>
        <link rel="stylesheet" href="<?php echo base_url('assets/css/common-style.css?ver='.time()) ?>">
        <link rel="stylesheet" href="<?php echo base_url('assets/css/style-main.css?ver='.time()) ?>">
        <!--<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.0/jquery.min.js"></script>-->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

    </head>
    <body class="about-us">
        <div class="main-inner">
            <?php echo $login_header ?>
            <section class="middle-main">
                <div class="container">
                    <div class="pt10">
                        <div class="titlea">
                            <h1 class="pb20">About us</h1>
                        </div>
                        <div class="about-content">
                            Aileensoul is dedicated purely towards providing relentless and free platform to everyone. We provide a diversified platform for every kind of person. You can hire, recruit, and find a job of your preference in your required field. You can also find freelancing work from our site. Aileensoul targets every kind of population be it a person from artistic field or a person working in a contemporary setup. Beginning from hiring a housemaid to hiring an employ for your business, Aileensoul has it all. Any person looking for any kind of job or wants to showcase his/her artistic talent are free to create their profile. We want the gap that exists between the employer and employee to be fulfilled and hence creating a vast platform for employment as well as different services. 
                        </div>
                        <p class="text-center"><img src="<?php echo base_url('assets/img/message.png'); ?>"></p>
                        <div class="text-center">
                            <ul class="mail-sent">
                                <li><a href="mailto:hr@aileensoul.com">hr@aileensoul.com</a></li>
                                <li><a href="mailto:info@aileensoul.com">info@aileensoul.com</a></li>
                                <li><a href="mailto:inquiry@aileensoul.com">inquiry@aileensoul.com</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </section>
            <?php
            echo $login_footer
            ?>
        </div>
        <script type="text/javascript" src="<?php echo base_url('assets/js/webpage/aboutus.js'); ?>"></script>
    </body>
</html>