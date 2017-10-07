<!DOCTYPE html>
<html>
<head>
<title><?php echo $title; ?></title>
<?php echo $head; ?>
<!-- <link rel="stylesheet" href="<?php //echo base_url('assets/css/bootstrap-3.min.css?ver='.time()); ?>"> -->
<link rel="stylesheet" href="<?php echo base_url('css/croppie.css?ver='.time()); ?>">
<link rel="stylesheet" type="text/css" href="<?php echo base_url('css//bootstrap.min.css?ver='.time()); ?>">
<link rel="stylesheet" type="text/css" href="<?php echo base_url('css/1.10.3.jquery-ui.css?ver='.time()); ?>">
<link rel="stylesheet" type="text/css" href="<?php echo base_url('css/custom-style.css?ver='.time()); ?>">
<link rel="stylesheet" type="text/css" href="<?php echo base_url('css/profiles/artistic/artistic.css?ver='.time()); ?>">
<link rel="stylesheet" type="text/css" href="<?php echo base_url('css/profiles/common/mobile.css?ver='.time()) ;?>" />
</head>
<body  class="page-container-bg-solid page-boxed">
<?php echo $header; ?>
<?php echo $art_header2_border; ?>
   <section class="custom-row">
      <?php echo $artistic_common; ?>
       <div class="user-midd-section art-inner">
           <div class="container">
   <div class="col-md-3"> 
</div>
      <div class="col-md-8 col-sm-12 follow_mid mob-plr0">
      <div>
         <?php
            if ($this->session->flashdata('error')) {
                echo '<div class="alert alert-danger">' . $this->session->flashdata('error') . '</div>';
            }
            if ($this->session->flashdata('success')) {
                echo '<div class="alert alert-success">' . $this->session->flashdata('success') . '</div>';
            }?>
      </div>
      <div class="common-form">
         <div class="job-saved-box">
            <h3>Followers</h3>
            <div class="contact-frnd-post">
                    <div class="job-contact-frnd ">
                    </div>  
                    <div class="fw" id="loader" style="text-align:center;"><img src="<?php echo base_url('images/loader.gif?ver='.time()) ?>" /></div>         
                  <div class="col-md-1">
                  </div>
            </div>
         </div>
      </div>
      </div>
      </div>
           </div>
   </section>   
     <!-- Bid-modal-2  -->
   <div class="modal fade message-box" id="bidmodal-2" role="dialog">
            <div class="modal-dialog modal-lm">
                <div class="modal-content">
                    <button type="button" class="modal-close" data-dismiss="modal">&times;</button>         
                    <div class="modal-body">
                        <span class="mes">
                            <div id="popup-form">
                             <form id ="userimage" name ="userimage" class ="clearfix" enctype="multipart/form-data" method="post">
                               <div class="col-md-5">

                                <div class="user_profile"></div>

                                        <input type="file" name="profilepic" accept="image/gif, image/jpeg, image/png" id="upload-one">
                                    </div>
                                    <div class="col-md-7 text-center">
                                        <div id="upload-demo-one" style="width:350px; display: none"></div>
                                    </div>
                                <input type="submit"  class="upload-result-one" name="profilepicsubmit" id="profilepicsubmit" value="Save">
                                </form>
                            </div>
                        </span>
                    </div>
                </div>
            </div>
        </div>
   <!-- Model Popup Close -->
    <!-- Bid-modal  -->
   <div class="modal fade message-box biderror" id="bidmodal" role="dialog">
      <div class="modal-dialog modal-lm">
         <div class="modal-content">
            <button type="button" class="modal-close" data-dismiss="modal">&times;</button>       
            <div class="modal-body">
               <!--<img class="icon" src="images/dollar-icon.png" alt="" />-->
               <span class="mes"></span>
            </div>
         </div>
      </div>
   </div>
   <!-- Model Popup Close -->
<footer>
      <?php echo $footer;  ?>
</footer>

<script src="<?php echo base_url('js/croppie.js?ver='.time()); ?>"></script>
<script src="<?php echo base_url('js/bootstrap.min.js?ver='.time()); ?>"></script>

<script type="text/javascript" src="<?php echo base_url('js/jquery.validate.min.js?ver='.time()); ?>"></script>
<script>
var base_url = '<?php echo base_url(); ?>';   
var data= <?php echo json_encode($demo); ?>;   
var data1 = <?php echo json_encode($city_data); ?>;
var slug_id = '<?php echo $artisticdata[0]['user_id'] ?>';
</script>
<script type="text/javascript" src="<?php echo base_url('js/webpage/artistic/artistic_common.js?ver='.time()); ?>"></script>
<script type="text/javascript" src="<?php echo base_url('js/webpage/artistic/followers.js?ver='.time()); ?>"></script>
</body>
</html>