<!DOCTYPE html>
<html>
   <head>
      <!-- start head -->
      <?php  echo $head; ?>
      <!-- END HEAD -->

      <title><?php echo $title; ?></title>

      <link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/css/1.10.3.jquery-ui.css?ver='.time()); ?>">
	  <link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/css/job.css?ver='.time()); ?>">
   </head>
   <!-- END HEAD -->
   <!-- Start HEADER -->
   <?php 
      echo $header; 
      echo $job_header2_border;  
      ?>
   <!-- END HEADER -->
   <body  class="page-container-bg-solid page-boxed custom-border">
      <section class="custom-row">
         <div class="container" id="paddingtop_fixed_job">
            <div class="row" id="row1" style="display:none;">
               <div class="col-md-12 text-center">
                  <div id="upload-demo" ></div>
               </div>
               <div class="col-md-12 cover-pic" >
                  <button class="btn btn-success  cancel-result" onclick="" >Cancel</button>
                  <button class="btn btn-success  set-btn upload-result" onclick="myFunction()">Save</button>
                  <div id="message1" style="display:none;">
                     <div id="floatBarsG">
                        <div id="floatBarsG_1" class="floatBarsG"></div>
                        <div id="floatBarsG_2" class="floatBarsG"></div>
                        <div id="floatBarsG_3" class="floatBarsG"></div>
                        <div id="floatBarsG_4" class="floatBarsG"></div>
                        <div id="floatBarsG_5" class="floatBarsG"></div>
                        <div id="floatBarsG_6" class="floatBarsG"></div>
                        <div id="floatBarsG_7" class="floatBarsG"></div>
                        <div id="floatBarsG_8" class="floatBarsG"></div>
                     </div>
                  </div>
               </div>
               <div class="col-md-12"  style="visibility: hidden; ">
                  <div id="upload-demo-i" ></div>
               </div>
            </div>
            <div class="">
               <div class="" id="row2">
                  <?php
                     $userid = $this->session->userdata('aileenuser');
                      if($this->uri->segment(3) == $userid){
                      $user_id = $userid;
                      }elseif($this->uri->segment(3) == ""){
                      $user_id = $userid;
                      }else{
                      $user_id = $this->uri->segment(3);
                       }
                     $contition_array = array('user_id' => $user_id, 'is_delete' => '0', 'status' => '1');
                     $image = $this->common->select_data_by_condition('job_reg', $contition_array, $data = 'profile_background', $sortby = '', $orderby = '', $limit = '', $offset = '', $join_str = array(), $groupby = '');
                     
                     $image_ori = $image[0]['profile_background'];
                     if ($image_ori) {
                         ?>
                  <img src="<?php echo JOB_BG_MAIN_UPLOAD_URL  . $image[0]['profile_background']; ?>" name="image_src" id="image_src" / >
                  <?php
                     } else {
                         ?>
                <div class="bg-images no-cover-upload">
                  <img src="<?php echo base_url(WHITEIMAGE); ?>" name="image_src" id="image_src" / >
               </div>
                  <?php }
                     ?>
               </div>
            </div>
         </div>
         <div class="container tablate-container art-profile">
            <div class="upload-img">
               <label class="cameraButton"><span class="tooltiptext">Upload Cover Photo</span><i class="fa fa-camera" aria-hidden="true"></i>
               <input type="file" id="upload" name="upload" accept="image/*;capture=camera" onclick="showDiv()">
               </label>
            </div>
            <div class="profile-photo">
               <div class="profile-pho">
                  <div class="user-pic padd_img">
                     <?php 
                        if ($jobdata[0]['job_user_image'] != '') { ?>
                     <img src="<?php echo JOB_PROFILE_THUMB_UPLOAD_URL . $jobdata[0]['job_user_image']; ?>" alt="" >
                     <?php } else { ?>
                     <?php
                        $a = $jobdata[0]['fname'];
                               $words = explode(" ", $a);
                               foreach ($words as $w) {
                                 $acronym = $w[0];
                                 }?>
                     <?php 
                        $b = $jobdata[0]['lname'];
                        $words = explode(" ", $b);
                        foreach ($words as $w) {
                          $acronym1 = $w[0];
                          }?>
                     <div class="post-img-user">
                        <?php echo  ucfirst(strtolower($acronym)) . ucfirst(strtolower($acronym1)); ?>
                     </div>
                     <?php } ?>
                     <a href="javascript:void(0);" class="cusome_upload" onclick="updateprofilepopup();"><img  src="<?php echo base_url(); ?>assets/img/cam.png">Update Profile Picture</a>
                  </div>
               </div>
               <div class="job-menu-profile mob-block">
                  <a  href="<?php echo site_url('job/resume/' . $jobdata[0]['user_id']); ?>">
                     <h5 class="profile-head-text"> <?php echo $jobdata[0]['fname'] . ' ' . $jobdata[0]['lname']; ?></h5>
                  </a>
                  <!-- text head start -->
                  <div class="profile-text" >
                     <?php
                        if ($jobdata[0]['designation'] == '') {
                            ?>
                     <a id="designation" class="designation" title="Designation">Current Work</a>
                     <?php } else {
                        ?> 
                     <a id="designation" class="designation" title="<?php echo ucwords($jobdata[0]['designation']); ?>"><?php echo ucwords($jobdata[0]['designation']); ?></a>
                     <?php } ?>
                  </div>
               </div>
               <?php echo $job_menubar; ?>   
            </div>
         </div>
         <div class="middle-part container padding_set_res ">
            <div class="job-menu-profile job_edit_menu mob-none" >
               <a  href="<?php echo site_url('job/resume/' . $jobdata[0]['user_id']); ?>">
                  <h3 class="profile-head-text"> <?php echo $jobdata[0]['fname'] . ' ' . $jobdata[0]['lname']; ?></h3>
               </a>
               <div class="profile-text" >
                  <!-- text head start -->
                  <div class="profile-text" >
                     <?php
                        if ($jobdata[0]['designation'] == '') {
                            ?>
                     <a id="designation" class="designation" title="Designation">Current Work</a>
                     <?php } else {
                        ?> 
                     <a id="designation" class="designation" title="<?php echo ucwords($jobdata[0]['designation']); ?>"><?php echo ucwords($jobdata[0]['designation']); ?></a>
                     <?php } ?>
                  </div>
                  <!-- text head end -->
               </div>
            </div>
            <div class="col-md-7 col-sm-12 mob-clear">
               <?php 
                  if($count_profile == 100)
                  {
                    if($job_reg[0]['progressbar']==0)
                    {
          ?>

          <div class="mob-progressbar" >
               <p>Please fill up your entire profile to get better job options and so that recruiter can find you easily.</p>
               <p class="mob-edit-pro">
                 
                  <a href="javascript:void(0);"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Successfully Completed</a>      
                  
                 
               </p>
               <div class="progress skill-bar ">
                  <div class="progress-bar progress-bar-custom" role="progressbar" aria-valuenow="<?php echo($count_profile);?>" aria-valuemin="0" aria-valuemax="100">
                     <span class="skill"><i class="val"><?php echo(round($count_profile));?>%</i></span>
                  </div>
               </div>
            </div>
            <?php
          }
        }else{

            ?>
            <div class="mob-progressbar" >
               <p>Please fill up your entire profile to get better job options and so that recruiter can find you easily.</p>
               <p class="mob-edit-pro">
                  
                    
                  <a href="<?php echo base_url('job/basic-information')?>"><i class="fa fa-pencil-square-o" aria-hidden="true"></i>Edit Profile</a>
                  
                    
               </p>
               <div class="progress skill-bar ">
                  <div class="progress-bar progress-bar-custom" role="progressbar" aria-valuenow="<?php echo($count_profile);?>" aria-valuemin="0" aria-valuemax="100">
                     <span class="skill"><i class="val"><?php echo(round($count_profile));?>%</i></span>
                  </div>
               </div>
            </div>

            <?php
          }
          ?>
               <div class="common-form">
                  <div class="job-saved-box">
                     <h3>Applied Job</h3>
                      
                       <div class="contact-frnd-post">
                            <div class="job-contact-frnd">
                              <!--.........AJAX DATA......-->           
                        </div>

                         <div class="fw" id="loader" style="text-align:center;"><img src="<?php echo base_url('assets/images/loader.gif?ver='.time()) ?>" /></div>
                        </div>

                     <div class="col-md-1">
                     </div>
                  </div>
               </div>
            </div>
            <?php
               if($count_profile == 100)
               {
                   if($job_reg[0]['progressbar']==0)
                  {
               ?>
            <div class="edit_profile_progress edit_pr_bar complete_profile">
               <div class="progre_bar_text">
                  <p>Please fill up your entire profile to get better job options and so that recruiter can find you easily.</p>
               </div>
               <div class="count_main_progress">
                  <div class="circles">
                     <div class="second circle-1 ">
                        <div class="true_progtree">
                           <img src="<?php echo base_url("img/true.png"); ?>">
                        </div>
                        <div class="tr_text">
                           Successfully Completed
                        </div>
                     </div>
                  </div>
               </div>
            </div>
            <?php
               }
            }
                  
               else
               {
                   ?>
            <div class="edit_profile_progress edit_pr_bar">
               <div class="progre_bar_text">
                  <p>Please fill up your entire profile to get better job options and so that recruiter can find you easily.</p>
               </div>
               <div class="count_main_progress">
                  <div class="circles">
                     <div class="second circle-1">
                        <div>
                           <strong></strong>
                           <a href="<?php echo base_url('job/basic-information')?>" class="edit_profile_job">Edit Profile
                           </a>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
            <?php
               }
               ?>
         </div>
         </div>
         </div>
      </section>
      <!-- Model Popup Open -->
      <!-- Bid-modal  -->
      <div class="modal fade message-box biderror" id="bidmodal" role="dialog">
         <div class="modal-dialog modal-lm">
            <div class="modal-content">
               <button type="button" class="modal-close" data-dismiss="modal">&times;</button>      
               <div class="modal-body">
                  <span class="mes"></span>
               </div>
            </div>
         </div>
      </div>
      <!-- Bid-modal-2  -->
      <div class="modal fade message-box" id="bidmodal-2" role="dialog">
         <div class="modal-dialog modal-lm">
            <div class="modal-content">
               <button type="button" class="modal-close" data-dismiss="modal">&times;</button>      
               <div class="modal-body">
                  <span class="mes">
                     <div id="popup-form">

                     <div class="fw" id="loader_popup"  style="text-align:center; display:none;"><img src="<?php echo base_url('assets/images/loader.gif?ver='.time()) ?>" /></div>

                     <form id ="userimage" name ="userimage" class ="clearfix" enctype="multipart/form-data" method="post">

                        <div class="fw">
                                 <input type="file" name="profilepic" accept="image/gif, image/jpeg, image/png" id="upload-one">
                        </div>

                        <div class="col-md-7 text-center">
                              <div id="upload-demo-one" style="width:350px; display:none;"></div>
                        </div>

                        <input type="submit" class="upload-result-one" name="profilepicsubmit" id="profilepicsubmit" value="Save" >

                        </form>
                        
                     </div>
                  </span>
               </div>
            </div>
         </div>
      </div>
      <!-- Model Popup Close -->

 <!-- <footer>   -->
 <?php echo $login_footer ?>      
<?php echo $footer;  ?>
<!-- </footer> -->

<!-- script for skill textbox automatic start-->
<!--<script src="<?php //echo base_url('assets/js/jquery-ui.min.js?ver='.time()); ?>"></script>-->

<script src="<?php echo base_url('assets/js/croppie.js?ver='.time()); ?>"></script>
<!-- script for skill textbox automatic end-->

<script type="text/javascript" src="<?php echo base_url('assets/js/jquery.validate.min.js?ver='.time()) ?>"></script>
<script src="<?php echo base_url('assets/js/bootstrap.min.js?ver='.time()); ?>"></script>
<!--<script type="text/javascript" src="<?php// echo base_url('assets/js/raphael-min.js
//?ver='.time()); ?>"></script>-->
<script type="text/javascript" src="<?php echo base_url('assets/js/progressloader.js?ver='.time()); ?>"></script>

<script>
    var base_url = '<?php echo base_url(); ?>';
    var count_profile_value='<?php echo $count_profile_value;?>';
    var count_profile='<?php echo $count_profile;?>';
</script>

<script type="text/javascript" src="<?php echo base_url('assets/js/webpage/job/job_applied_post.js?ver='.time()); ?>"></script>
<script type="text/javascript" src="<?php echo base_url('assets/js/webpage/job/cover_profile_common.js?ver='.time()); ?>"></script>
<script type="text/javascript" src="<?php echo base_url('assets/js/webpage/job/search_common.js?ver='.time()); ?>"></script>
<script type="text/javascript" src="<?php echo base_url('assets/js/webpage/job/progressbar_common.js?ver='.time()); ?>"></script>

</body>
</html>