<!DOCTYPE html>
<html>
    <head>
        <title><?php echo $title; ?></title>
        <?php echo $head; ?>
        <link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/css/freelancer-apply.css?ver=' . time()); ?>">
        

    </head>
    <body class="page-container-bg-solid page-boxed">
        <?php echo $header; ?>
        <?php echo $freelancer_post_header2_border; ?>
        <section class="custom-row">
            <div class="container" id="paddingtop_fixed">
                <div class="row" id="row1" style="display:none;">
                    <div class="col-md-12 text-center">
                        <div id="upload-demo" ></div>
                    </div>
                    <div class="col-md-12 cover-pic" >
                        <button class="btn btn-success cancel-result"><?php echo $this->lang->line("cancel"); ?></button>
                        <button class="btn btn-success set-btn upload-result"><?php echo $this->lang->line("save"); ?></button>
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
                        <div id="upload-demo-i"></div>
                    </div>
                </div>
                <div class="">
                    <div class="" id="row2">
                        <?php
                        $userid = $this->session->userdata('aileenuser');
                        if ($this->uri->segment(3) == $userid) {
                            $user_id = $userid;
                        } elseif ($this->uri->segment(3) == "") {
                            $user_id = $userid;
                        } else {
                            $user_id = $this->uri->segment(3);
                        }
                        $contition_array = array('user_id' => $user_id, 'is_delete' => '0', 'status' => '1');
                        $image = $this->common->select_data_by_condition('freelancer_post_reg', $contition_array, $data = 'profile_background', $sortby = '', $orderby = '', $limit = '', $offset = '', $join_str = array(), $groupby = '');

                        $image_ori = $image[0]['profile_background'];
                        if ($image_ori) {
                            ?>
                            <img src="<?php echo FREE_POST_BG_MAIN_UPLOAD_URL . $image[0]['profile_background']; ?>" name="image_src" id="image_src" / >
                            <?php
                        } else {
                            ?>
                                 <div class="bg-images no-cover-upload">
                                <img src="<?php echo base_url(WHITEIMAGE); ?>" name="image_src" id="image_src" />
                            </div>
                        <?php }
                        ?>
                    </div>
                </div>
            </div>
            <div class="container tablate-container art-profile">
                <div class="upload-img">
                    <label class="cameraButton"><span class="tooltiptext"><?php echo $this->lang->line("upload_cover_photo"); ?></span><i class="fa fa-camera" aria-hidden="true"></i>
                        <input type="file" id="upload" name="upload" accept="image/*;capture=camera" onclick="showDiv()">
                    </label>
                </div>
                <div class="profile-photo">
                    <div class="profile-pho">
                        <div class="user-pic padd_img">
                            <?php
                            $fname = $freepostdata[0]['freelancer_post_fullname'];
                            $lname = $freepostdata[0]['freelancer_post_username'];
                            $sub_fname = substr($fname, 0, 1);
                            $sub_lname = substr($lname, 0, 1);
                            if ($freepostdata[0]['freelancer_post_user_image']) {
                                if (IMAGEPATHFROM == 'upload') {
                                    if (!file_exists($this->config->item('free_post_profile_main_upload_path') . $freepostdata[0]['freelancer_post_user_image'])) {
                                        ?>
                                        <div class="post-img-user">
                                            <?php echo ucfirst(strtolower($sub_fname)) . ucfirst(strtolower($sub_lname)); ?>
                                        </div>
                                    <?php } else {
                                        ?>
                                        <img src="<?php echo FREE_POST_PROFILE_MAIN_UPLOAD_URL . $freepostdata[0]['freelancer_post_user_image']; ?>" alt="" >
                                        <?php
                                    }
                                } else {
                                    $filename = $this->config->item('free_post_profile_main_upload_path') . $freepostdata[0]['freelancer_post_user_image'];
                                    $s3 = new S3(awsAccessKey, awsSecretKey);
                                    $info = $s3->getObjectInfo(bucket, $filename);
                                    if ($info) {
                                        ?>
                                        <img src="<?php echo FREE_POST_PROFILE_MAIN_UPLOAD_URL . $freepostdata[0]['freelancer_post_user_image']; ?>" alt="" >
                                    <?php } else { ?>
                                        <div class="post-img-user">
                                            <?php echo ucfirst(strtolower($sub_fname)) . ucfirst(strtolower($sub_lname)); ?>
                                        </div>
                                        <?php
                                    }
                                }
                            } else {
                                ?>
                                <div class="post-img-user">
                                    <?php echo ucfirst(strtolower($sub_fname)) . ucfirst(strtolower($sub_lname)); ?>
                                </div>
                            <?php } ?>
                            <a href="javascript:void(0);" class="cusome_upload" onclick="updateprofilepopup();"><img  src="<?php echo base_url('assets/img/cam.png'); ?>"><?php echo $this->lang->line("update_profile_picture"); ?></a>
                        </div>

                    </div>
                    <div class="job-menu-profile mob-block ">
                        <a href="javascript:void(0);">
                            <h3> <?php echo ucwords($freepostdata[0]['freelancer_post_fullname']) . ' ' . ucwords($freepostdata[0]['freelancer_post_username']); ?></h3>
                        </a>
                        <div class="profile-text">
                            <?php
                            if ($freepostdata[0]['designation'] == "") {
                                ?>
                                <a id="designation" class="designation" title="Designation"><?php echo $this->lang->line("designation"); ?></a>
                                <?php
                            } else {
                                ?> 
                                <a id="designation" class="designation" title="<?php echo ucwords($freepostdata[0]['designation']); ?>"><?php echo ucwords($freepostdata[0]['designation']); ?></a>
                            <?php } ?>
                        </div>
                    </div>
                    <div class="profile-main-rec-box-menu profile-box-art col-md-12 padding_les">
                        <div class=" right-side-menu art-side-menu padding_less_right  right-menu-jr">
                            <?php
                            $userid = $this->session->userdata('aileenuser');
                            if ($freepostdata[0]['user_id'] == $userid) {
                                ?>     
                                <ul class="current-user pro-fw">
                                <?php } else { ?>
                                    <ul class="pro-fw4">
                                    <?php } ?>  
                                    <li <?php if (($this->uri->segment(1) == 'freelancer-work') && ($this->uri->segment(2) == 'freelancer-details')) { ?> class="active" <?php } ?>><a title="Freelancer Details" href="<?php echo base_url('freelancer-work/freelancer-details'); ?>">
                                            <?php echo $this->lang->line("freelancer_details"); ?></a>
                                    </li>
                                    <?php if (($this->uri->segment(1) == 'freelancer-work') && ($this->uri->segment(2) == 'freelancer-details' || $this->uri->segment(2) == 'home' || $this->uri->segment(2) == 'saved-projects' || $this->uri->segment(2) == 'applied-projects') && ($this->uri->segment(3) == $this->session->userdata('aileenuser') || $this->uri->segment(3) == '')) { ?>
                                        <li <?php if (($this->uri->segment(1) == 'freelancer-work') && ($this->uri->segment(2) == 'saved-projects')) { ?> class="active" <?php } ?>><a title="Saved Post" href="<?php echo base_url('freelancer-work/saved-projects'); ?>"><?php echo $this->lang->line("saved_projects"); ?></a>
                                        </li>
                                        <li <?php if (($this->uri->segment(1) == 'freelancer-work') && ($this->uri->segment(2) == 'applied-projects')) { ?> class="active" <?php } ?>><a title="Applied Post" href="<?php echo base_url('freelancer-work/applied-projects'); ?>"><?php echo $this->lang->line("applied_projects"); ?></a>
                                        </li>
                                    <?php } ?>
                                </ul>
                        </div>
                    </div>
                </div>
            </div>
            <div class="middle-part container padding_set_res">
                <div class="job-menu-profile mob-none pt20">
                    <a href="javascript:void(0);">
                        <h3> <?php echo ucwords($freepostdata[0]['freelancer_post_fullname']) . ' ' . ucwords($freepostdata[0]['freelancer_post_username']); ?></h3>
                    </a>
                    <div class="profile-text">
                        <?php
                        if ($freepostdata[0]['designation'] == "") {
                            ?>
                            <a id="designation" class="designation" title="Designation"><?php echo $this->lang->line("designation"); ?></a>
                            <?php
                        } else {
                            ?> 
                            <a id="designation" class="designation" title="<?php echo ucwords($freepostdata[0]['designation']); ?>"><?php echo ucwords($freepostdata[0]['designation']); ?></a>
                        <?php } ?>
                    </div>
                </div>
                <div class="col-md-7 col-sm-12 col-xs-12 mob-clear">
                    <?php if(!($returnpage))
                {
                  if($count_profile == 100)
                  {
                    if($freepostdata[0]['progressbar']==0)
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
                  
                    
                  <a href="<?php echo base_url('freelancer-work/basic-information')?>"><i class="fa fa-pencil-square-o" aria-hidden="true"></i>Edit Profile</a>
                  
                    
               </p>
               <div class="progress skill-bar ">
                  <div class="progress-bar progress-bar-custom" role="progressbar" aria-valuenow="<?php echo($count_profile);?>" aria-valuemin="0" aria-valuemax="100">
                     <span class="skill"><i class="val"><?php echo(round($count_profile));?>%</i></span>
                  </div>
               </div>
            </div>

            <?php
          }}
          ?>
                    <div class="common-form">
                        <div class="job-saved-box">
                            <h3><?php echo $this->lang->line("applied_projects"); ?></h3>
                            <div class="contact-frnd-post">
                                <!--...............AJAX DATA..................-->
                                <div>
                                    <div class="fw" id="loader" style="text-align:center;"><img src="<?php echo base_url('assets/images/loader.gif?ver=' . time()) ?>" /></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <?php 
               if(!($returnpage))
                       {
                           if($count_profile == 100)
                           {
                            if($freepostdata[0]['progressbar']==0)
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
                           <a href="<?php echo base_url('freelancer-work/basic-information')?>" class="edit_profile_job">Edit Profile
                           </a>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
            <?php
               }
               ?>
            <?php
               }
               ?>
            </div>
            <div class="clearfix"></div>
        </section>
        <?php echo $login_footer ?>
        <?php echo $footer; ?>
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
        <!-- Bid-modal-2  -->
        <div class="modal fade message-box" id="bidmodal-2" role="dialog">
            <div class="modal-dialog modal-lm">
                <div class="modal-content">
                    <button type="button" class="modal-close" data-dismiss="modal">&times;</button>       
                    <div class="modal-body">
                        <span class="mes">
                            <div id="popup-form">
                                <div class="fw" id="profi_loader"  style="display:none;" style="text-align:center;" ><img src="<?php echo base_url('assets/images/loader.gif?ver=' . time()) ?>" /></div>
                                <form id ="userimage" name ="userimage" class ="clearfix" enctype="multipart/form-data" method="post">
                                    <?php //echo form_open_multipart(base_url('freelancer/user_image_insert'), array('id' => 'userimage', 'name' => 'userimage', 'class' => 'clearfix'));     ?>
                                    <div class="fw">
                                        <input type="file" name="profilepic" accept="image/gif, image/jpeg, image/png" id="upload-one">
                                    </div>
                                    <div class="col-md-7 text-center">
                                        <div id="upload-demo-one" style="width:350px"></div>
                                    </div>
                                    <input type="submit" class="upload-result-one" name="profilepicsubmit" id="profilepicsubmit" value="Save" >
                                </form>
                                <?php //echo form_close();     ?>
                            </div>
                        </span>
                    </div>
                </div>
            </div>
        </div>
        <!-- Model Popup Close -->
        <!-- model for popup start -->
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
        <script  src="<?php echo base_url('assets/js/croppie.js?ver=' . time()); ?>"></script>
        <script  type="text/javascript" src="<?php echo base_url('assets/js/jquery.validate.min.js?ver=' . time()); ?>"></script>
        <script type="text/javascript" src="<?php echo base_url('assets/js/progressloader.js?ver=' . time()); ?>">
        </script>
        <script>
            var base_url = '<?php echo base_url(); ?>';
            var count_profile_value = '<?php echo $count_profile_value; ?>';
            var count_profile = '<?php echo $count_profile; ?>';

        </script>
        <script  type="text/javascript" src="<?php echo base_url('assets/js/webpage/freelancer-apply/freelancer_applied_post.js?ver=' . time()); ?>"></script>
        <script  type="text/javascript" src="<?php echo base_url('assets/js/webpage/freelancer-apply/freelancer_apply_common.js?ver=' . time()); ?>"></script>
        <script async type="text/javascript" src="<?php echo base_url('assets/js/webpage/freelancer-apply/progressbar.js?ver=' . time()); ?>"></script>
    </body>
</html>