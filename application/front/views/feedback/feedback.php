<!DOCTYPE html>
<html lang="en">
    <head>
        <title>Feedback to Aileensoul.com</title>
        <meta name="description" content="Feel free to share your views and thoughts about Aileensoul.com services." />
        <link rel="icon" href="<?php echo base_url('assets/images/favicon.png?ver='.time()); ?>">
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0" />
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
        <script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
        <script>
            (adsbygoogle = window.adsbygoogle || []).push({
                google_ad_client: "ca-pub-6060111582812113",
                enable_page_level_ads: true
            });
        </script>
        <link rel="stylesheet" href="<?php echo base_url('assets/css/style-main.css'); ?>">
         <link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/css/common-style.css?ver='.time()); ?>">
        <link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/css/style-main.css?ver='.time()); ?>">
         <link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/css/style.css?ver='.time()); ?>">
       
    </head>
    <body class="feedback-cus">
        <div class="main-inner" class="feedback">
           <!--  <?php
            //echo $login_header
            ?> -->

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
                    <h2 class="about-h2">YOUR &nbsp;FEEDBACK &nbsp;MATTERS</h2>
<!--                     <p class="about-para" >We provide platform & opportunities to every person in the world to make their career.</p> -->
                </div>
            </section>
            </div>
            </div>
        </div>

            <section class="middle-main">
                <div class="container">
                    <div class="form-pd row">
                        <div id="feedbacksucc"></div>
                        <div class="inner-form">
                            <div class="login">
                                <div class="title">
                                    <h1>Send us feedback</h1>
                                </div>
                                <form role="form" name="feedback_form" id="feedback_form" method="post">
                                    <div class="row">
                                        <div class="col-sm-6 col-md-6">
                                            <div class="form-group">
                                                <input type="text" name="feedback_firstname" id="feedback_firstname" class="form-control input-sm" placeholder="First Name*">
                                            </div>
                                        </div>
                                        <div class="col-sm-6 col-md-6">
                                            <div class="form-group">
                                                <input type="text" name="feedback_lastname" id="feedback_lastname" class="form-control input-sm" placeholder="Last Name*">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <input type="email" name="feedback_email" id="feedback_email" class="form-control input-sm" placeholder="Email Address*">
                                    </div>
                                    <div class="form-group">
                                        <input type="text" name="feedback_subject" id="feedback_subject" class="form-control input-sm" placeholder="Subject*">
                                    </div>
                                    <div class="form-group">
                                        <textarea type="text" id="feedback_message" name="feedback_message" class="form-control" placeholder="Message*"></textarea>
                                    </div>
                                    <p class="pb15">
                                        <span class="red">*</span>All fields are mendatory
                                    </p>
                                    <p>
                                        <button title="Submit" class="btn1">Submit</button>
                                    </p>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <?php echo $login_footer ?>
        </div>

        <div class="modal fade message-box biderror" id="bidmodal" role="dialog"  >
         <div class="modal-dialog modal-lm" >
            <div class="modal-content">
               <button type="button" class="modal-close" data-dismiss="modal">&times;</button>       
               <div class="modal-body">
                  <span class="mes"></span>
               </div>
            </div>
         </div>
      </div>

        <script>
var base_url = '<?php echo base_url(); ?>';   
   
</script>
 <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script src="<?php echo base_url('assets/js/bootstrap.min.js?ver='.time()); ?>"></script>
<script src="<?php echo base_url('assets/js/jquery.validate.min.js?ver='.time()); ?>"></script>
<script type="text/javascript" src="<?php echo base_url('assets/js/webpage/feedback.js'); ?>"></script>
    </body>
</html>