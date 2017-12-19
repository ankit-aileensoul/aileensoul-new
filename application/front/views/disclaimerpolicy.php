<!DOCTYPE html>
<html lang="en">
    <head>
        <title>Disclaimer Policy - Aileensoul.com</title>
        <link rel="icon" href="<?php echo base_url('assets/images/favicon.png'); ?>">
        <meta charset="utf-8">
        <?php
        if($_SERVER['HTTP_HOST'] != "localhost"){
        ?>
        
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
        <meta name="google-site-verification" content="BKzvAcFYwru8LXadU4sFBBoqd0Z_zEVPOtF0dSxVyQ4" />
        <script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
        <script>
            (adsbygoogle = window.adsbygoogle || []).push({
                google_ad_client: "ca-pub-6060111582812113",
                enable_page_level_ads: true
            });
        </script>
        <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0" />        
        <link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/css/common-style.css'); ?>">
        <link rel="stylesheet" href="<?php echo base_url('assets/css/style-main.css'); ?>">
        <link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/css/gyc.css'); ?>">
        <link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/css/blog.css'); ?>">
    </head>
    <body class="custom-tp cust-disclaimer about-us outer-page">
        <div class="main-inner">            
            <div class="terms-con-cus">
            <header class="terms-con bg-none cust-header">
                <div class="overlaay">
                    <div class="container">
                        <div class="row">
                            <div class="col-md-4 col-sm-3">
                                <h2 class="logo"><a href="<?php echo base_url(); ?>">Aileensoul</a></h2>
                            </div>
                            <div class="col-md-8 col-sm-9">
                                <div class="btn-right pull-right">
                                <?php if(!$this->session->userdata('aileenuser')) {?>
                                    <a href="<?php echo base_url('login'); ?>" class="btn2">Login</a>
                                    <a href="<?php echo base_url('registration'); ?>" class="btn3">Create an account</a>
                                    <?php }?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </header>
            
            <div class="container">
                <div class="cus-about" >
            <section class="">
                <div class="main-comtai">
                    <!-- <h1>Terms and Conditions</h1> -->
                    <h2 class="about-h2">Disclaimer Policy</h2>
<!--                     <p class="about-para" >We provide platform & opportunities to every person in the world to make their career.</p> -->
                </div>
            </section>
            </div>
            </div>
        </div>
            <section class="middle-main bg_white">
                <div class="container">
                    <div class="term_desc test_py">
                        <p>The information contained in this website is for general information purposes only. The information is provided by www.aileensoul.com, a property of Aileensoul Technologies Pvt.Ltd. While we endeavour to keep the information up to date and correct, we make no representations or warranties of any kind, express or implied, about the completeness, accuracy, reliability, suitability or availability with respect to the website or the information, products, services, or related graphics contained on the website for any purpose. Any reliance you place on such information is therefore strictly at your own risk.
                        </p>                        
                    </div>
                    <div class="term_desc test_py">
                        <p>In no event will we be liable for any loss or damage including without limitation, indirect or consequential loss or damage, or any loss or damage whatsoever arising from loss of data or profits arising out of, or in connection with, the use of this website. </p>
                       
                       
                    </div>
                    <div class="term_desc test_py">
                        <p>Through this website you are able to link to other websites which are not under the control of Aileensoul Technologies Pvt.Ltd. We have no control over the nature, content and availability of those sites. The inclusion of any links does not necessarily imply a recommendation or endorse the views expressed within them.
                        </p>                        
                    </div><div class="term_desc test_py">
                      
                        <p>Every effort is made to keep the website up and running smoothly. However, Aileensoul Technologies Pvt.Ltd takes no responsibility for, and will not be liable for, the website being temporarily unavailable due to technical issues beyond our control.
                        </p>                        
                    </div>
                </div>
            </section>
        </div>

       <?php echo $login_footer ?>
    </body>
</html>
