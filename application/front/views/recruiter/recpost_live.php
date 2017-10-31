<!DOCTYPE html>
<html>
    <head>
        <title><?php echo $title; ?></title>
        <?php echo $head; ?> 
         <?php
        if (IS_REC_CSS_MINIFY == '0') {
            ?>
           <link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/css/1.10.3.jquery-ui.css'); ?>">
        
    <link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/css/recruiter.css'); ?>">
            <?php
        } else {
            ?>
            <link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/css_min/recruiter/rec_common_header.min.css?ver=' . time()); ?>">
        <?php } ?>
		
    </head>
    <body class="page-container-bg-solid page-boxed pushmenu-push">
        <?php echo $header; ?>
        <?php
        $returnpage = $_GET['page'];
        if ($returnpage == 'job') {
            echo $job_header2_border;
        } elseif ($recdata[0]['re_step'] == 3) {
            echo $recruiter_header2_border;
        } elseif ($returnpage == 'notification') {
            
        }
        ?>
        <div id="preloader"></div>
        <!-- START CONTAINER -->
        <section>
            <!-- MIDDLE SECTION START -->
            <div class="container mt-22" id="paddingtop_fixed">
                <div class="row" id="row1" style="display:none;">
                    <div class="col-md-12 text-center">
                        <div id="upload-demo" style="width:100%"></div>
                    </div>
                    <div class="col-md-12 cover-pic" >
                        <button class="btn btn-success  cancel-result" onclick="">Cancel</button>

                        <button class="btn btn-success set-btn upload-result " onclick="myFunction()">Save</button>

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
if ($this->uri->segment(3) == $userid) {
    $user_id = $userid;
} elseif ($this->uri->segment(3) == "") {
    $user_id = $userid;
} else {
    $user_id = $this->uri->segment(3);
}

$contition_array = array('user_id' => $user_id, 'is_delete' => '0', 're_status' => '1');
$image = $this->common->select_data_by_condition('recruiter', $contition_array, $data = 'profile_background', $sortby = '', $orderby = '', $limit = '', $offset = '', $join_str = array(), $groupby = '');

$image_ori = $this->config->item('rec_bg_main_upload_path') . $image[0]['profile_background'];
if (file_exists($image_ori) && $image[0]['profile_background'] != '') {
    ?>

                            <img src="<?php echo base_url($this->config->item('rec_bg_main_upload_path') . $image[0]['profile_background']); ?>" name="image_src" id="image_src" / >
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
<?php if ($returnpage == '') { ?>
                    <div class="upload-img">
                        <label class="cameraButton"><span class="tooltiptext_rec">Upload Cover Photo</span><i class="fa fa-camera" aria-hidden="true"></i>
                            <input type="file" id="upload" name="upload" accept="image/*;capture=camera" onclick="showDiv()">
                        </label>
                    </div>
<?php } ?>
                <div class="profile-photo">
                    <!--PROFILE PIC CODE START-->

                    <div class="profile-pho">
                        <div class="user-pic padd_img">
<?php
$imageee = $this->config->item('rec_profile_thumb_upload_path') . $recdata[0]['recruiter_user_image'];
if (file_exists($imageee) && $recdata[0]['recruiter_user_image'] != '') {
    ?>
                                <img src="<?php echo base_url($this->config->item('rec_profile_thumb_upload_path') . $recdata[0]['recruiter_user_image']); ?>" alt="" >
                                <?php
                            } else {
                                $a = $recdata[0]['rec_firstname'];
                                $acr = substr($a, 0, 1);

                                $b = $recdata[0]['rec_lastname'];
                                $acr1 = substr($b, 0, 1);
                                ?>
                                <div class="post-img-user">
                                <?php echo ucfirst(strtolower($acr)) . ucfirst(strtolower($acr1)); ?>

                                </div>
<?php } ?>
                            <?php if ($returnpage == '') { ?>
                                <a href="javascript:void(0);" class="cusome_upload" onclick="updateprofilepopup();"><img src="<?php echo base_url(); ?>assets/img/cam.png"> Update Profile Picture</a>
                            <?php } ?>
                        </div>
                    </div>

                    <!--PROFILE PIC CODE END-->
                    <div class="job-menu-profile mob-block">
                        <a href="javascript:void(0);" title="<?php echo $postdataone[0]['rec_firstname'] . ' ' . $postdataone[0]['rec_lastname']; ?>"><h3><?php echo $postdataone[0]['rec_firstname'] . ' ' . $postdataone[0]['rec_lastname']; ?></h3></a>
                        <div class="profile-text" >
<?php
if ($returnpage == '') {
    if ($recdata[0]['designation'] == '') {
        ?>
                                    <a id="designation" class="designation" title="Designation">Designation</a>
                                <?php } else {
                                    ?> 
                                    <a id="designation" class="designation" title="<?php echo ucfirst(strtolower($recdata[0]['designation'])); ?>"><?php echo ucfirst(strtolower($recdata[0]['designation'])); ?></a> 
                                    <?php
                                }
                            } else {
                                if ($recdata[0]['designation'] == '') {
                                    ?>
                                    <a id="designation" class="designation" title="Designation">Designation</a>
                                <?php } else { ?>
                                    <a id="designation" class="designation" title="<?php echo ucfirst(strtolower($recdata[0]['designation'])); ?>"> <?php echo ucfirst(strtolower($recdata[0]['designation'])); ?></a> <?php
                                }
                            }
                            ?>
                        </div>
                    </div>
                    <!-- menubar -->
                    <div class="profile-main-rec-box-menu profile-box-art col-md-12 padding_les">
                        <div class=" right-side-menu art-side-menu padding_less_right right-menu-jr">  
<?php
$userid = $this->session->userdata('aileenuser');
if ($recdata[0]['user_id'] == $userid) {
    ?>     
                                <ul class="current-user pro-fw4">
                            <?php } else { ?>
                                    <ul class="pro-fw">
                                <?php } ?>  
                                    <li <?php if ($this->uri->segment(1) == 'recruiter' && $this->uri->segment(2) == 'profile') { ?> class="active" <?php } ?>>
                                    <?php if ($returnpage == 'job') { ?>
                                            <a title="Details" href="<?php echo base_url('recruiter/profile/' . $this->uri->segment(3) . '?page=' . $returnpage); ?>">Details</a>
                                        <?php } else { ?>
                                            <a title="Details" href="<?php echo base_url('recruiter/profile'); ?>">Details</a>
                                        <?php } ?>
                                    </li>
                                    <li <?php if ($this->uri->segment(1) == 'recruiter' && $this->uri->segment(2) == 'post') { ?> class="active" <?php } ?>>
<?php if ($returnpage == 'job') { ?>
                                            <a title="Post" href="<?php echo base_url('recruiter/post/' . $this->uri->segment(3) . '?page=' . $returnpage); ?>">Post</a>
                                        <?php } else { ?>
                                            <a title="Post" href="<?php echo base_url('recruiter/post'); ?>">Post</a>
                                        <?php } ?>
                                    </li>
                                        <?php if (($this->uri->segment(1) == 'recruiter') && ($this->uri->segment(2) == 'post' || $this->uri->segment(2) == 'profile' || $this->uri->segment(2) == 'add-post' || $this->uri->segment(2) == 'save-candidate') && ($this->uri->segment(3) == $this->session->userdata('aileenuser') || $this->uri->segment(3) == '')) { ?>
                                        <li <?php if ($this->uri->segment(1) == 'recruiter' && $this->uri->segment(2) == 'save-candidate') { ?> class="active" <?php } ?>><a title="Saved Candidate" href="<?php echo base_url('recruiter/save-candidate'); ?>">Saved </a>
                                        </li> 
<?php } ?>   
                                </ul>
                                <div class="flw_msg_btn fr">
                                    <ul>
<?php if ($this->uri->segment(3) != "" && $this->uri->segment(3) != $userid) { ?>
                                            <li>
                                            <?php
                                            $returnpage = $_GET['page'];
                                            if ($returnpage == "job") {
                                                ?>
                                                    <a href="<?php echo base_url('chat/abc/1/2/' . $this->uri->segment(3)); ?>">Message</a>
                                                <?php } else { ?>
                                                    <a href="<?php echo base_url('chat/abc/2/1/' . $this->uri->segment(3)); ?>">Message</a>
                                                <?php } ?>
                                            </li>  <?php } ?>
                                    </ul>
                                </div>
                        </div>
                    </div>  
                    <!-- menubar -->    
                </div>                       
            </div> <div  class="add-post-button mob-block">
<?php if ($returnpage == '') { ?>
                    <a class="btn btn-3 btn-3b" id="rec_post_job2" href="<?php echo base_url('recruiter/add-post'); ?>"><i class="fa fa-plus" aria-hidden="true"></i>  Post a Job</a>
                <?php } ?>
            </div>
            <div class="middle-part container rec_res">
                <div class="job-menu-profile mob-none  ">
                    <a href="javascript:void(0);" title="<?php echo $postdataone[0]['rec_firstname'] . ' ' . $postdataone[0]['rec_lastname']; ?>"><h3><?php echo $postdataone[0]['rec_firstname'] . ' ' . $postdataone[0]['rec_lastname']; ?></h3></a>
                    <!-- text head start -->
                    <div class="profile-text" >
<?php
if ($returnpage == '') {
    //echo "hii";
    if ($recdata[0]['designation'] == "") {
        ?>
                                <a id="designation" class="designation" title="Designation">Designation</a>
                                <?php
                            } else {
                                ?> 
                                <a id="designation" class="designation" title="<?php echo ucfirst(strtolower($postdataone[0]['designation'])); ?>"><?php echo ucfirst(strtolower($recdata[0]['designation'])); ?></a>
                                <?php
                            }
                        } else {
                            echo ucfirst(strtolower($postdataone['designation']));
                        }
                        ?>
                    </div>
                    <div  class="add-post-button">
<?php if ($returnpage == '') { ?>
                            <a class="btn btn-3 btn-3b" id="rec_post_job1" href="<?php echo base_url('recruiter/add-post'); ?>"><i class="fa fa-plus" aria-hidden="true"></i>  Post a Job</a>
                        <?php } ?>
                    </div>
					
                </div>
                <div class="col-md-7 col-sm-12 mob-clear ">
                    <div class="common-form">
                        <div class="job-saved-box">
                            <h3>Post</h3>
                            <div class="contact-frnd-post">
<!--                                <div class = "job-contact-frnd">
                                    AJAX DATA START FOR RECOMMAND CANDIDATE
                                </div>-->
                     <?php
                     if(count($postdata) > 0){
          foreach ($postdata as $post) {
                        ?>
                        <div class="job-contact-frnd ">
                            <div class="profile-job-post-detail clearfix" id="<?php echo "removepost" . $post['post_id']; ?>">
                                <!-- vishang 14-4 end -->
                                <div class="profile-job-post-title clearfix">
                                    <div class="profile-job-profile-button clearfix">
       <div class="profile-job-details col-md-12">
          <ul>
              <li class="fr date_re">
                  Created Date : <?php echo date('d-M-Y',strtotime($post['created_date'])); ?>
               </li>
     
              <li class="">
              <a class="post_title" href="javascript:void(0)" title="Post Title">
               <?php 
                                              $cache_time = $this->db->get_where('job_title', array('title_id' => $post['post_name']))->row()->name;
                                              if($cache_time)
                                              {
                                                  echo  $cache_time;
                                              }
                                              else
                                              {
                                                echo $post['post_name'];
                                              }
                                           ?>  </a>     
              </li>
     
             <li>  
             <?php $cityname = $this->db->get_where('cities', array('city_id' => $post['city']))->row()->city_name;
            $countryname = $this->db->get_where('countries', array('country_id' => $post['country']))->row()->country_name; ?> 

            <?php  
             if($cityname || $countryname)
               { 
                ?>

            <div class="fr lction">
            <p title="Location"><i class="fa fa-map-marker" aria-hidden="true"></i>

            <?php if($cityname){
            echo $cityname .', ';}?>
            <?php 
             echo $countryname; ?> 
            </p>
                  
            </div>
             <?php
             }




            ?>
           <a class="display_inline" title="<?php echo $post['re_comp_name']?>" href="javascript:void(0)">
            <?php   $out = strlen($post['re_comp_name']) > 40 ? substr($post['re_comp_name'],0,40)."..." : $post['re_comp_name'];
             echo $out;?> </a>
              </li>
              <li class="fw"><a class="display_inline" title="Recruiter Name" href="javascript:void(0)"> <?php echo ucfirst(strtolower($post['rec_firstname'])).' '. ucfirst(strtolower($post['rec_lastname'])); ?> </a></li>
                                                <!-- vishang 14-4 end -->    
                                            </ul>
                                        </div>
                                    </div>
                                    <div class="profile-job-profile-menu">
                                        <ul class="clearfix">
                                             <li> <b> Skills</b> <span> 
                             <?php
                            $comma = ", ";
                            $k = 0;
                            $aud = $post['post_skill'];
                            $aud_res = explode(',', $aud);

                            if(!$post['post_skill']){

                                echo $post['other_skill'];

                            }else if(!$post['other_skill']){


                                foreach ($aud_res as $skill) {
                            
                            $cache_time = $this->db->get_where('skill', array('skill_id' => $skill))->row()->skill;

                            if($cache_time != " "){                                                                                                                                                                                                                                              
                                if ($k != 0) {
                                echo $comma;
                                 
                            }echo $cache_time;
                             $k++;  }
                            }


                            }else if($post['post_skill'] && $post['other_skill']){
                            foreach ($aud_res as $skill) {
                             if ($k != 0) {
                                echo $comma;
                            }
                            $cache_time = $this->db->get_where('skill', array('skill_id' => $skill))->row()->skill;


                            echo $cache_time;
                                $k++;
                            } echo ",". $post['other_skill']; }
                        ?>     
                                                
                                                </span>
                                            </li>
                                            <!-- <li><b>Other Skill</b><span> <?php if($post['other_skill'] != ''){ echo $post['other_skill']; } else{ echo PROFILENA;} ?></span>
                                            </li> -->
                                            <li><b>Job Description</b><span><pre><?php echo $this->common->make_links($post['post_description']); ?></pre></span>
                                            </li>
                                            <li><b>Interview Process</b><span>
                                            

                                            <?php if($post['interview_process'] != ''){?>
                                            <pre>
                                            <?php echo $this->common->make_links($post['interview_process']); ?></pre>
                                               <?php }else{ echo PROFILENA; }?> 

                                            </span>
                                            </li>

                                            <!-- vishang 14-4 start -->
                                              <li>
                                                <b>Required Experience</b>
                                                 <span>
                                                   <p title="Min - Max">
                                                       <?php 


                                                           if(($post['min_year'] !='0' || $post['max_year'] !='0') && ($post['fresher'] == 1))
                                                          { 
 

                                                               echo $post['min_year'].' Year - '.$post['max_year'] .' Year'." , ".   "Fresher can also apply.";
                                                                 } 
                                                             else if(($post['min_year'] !='0' || $post['max_year'] !='0'))
                                                                  {
                                                               echo $post['min_year'].' Year - '.$post['max_year'] . ' Year';
                                                                   }
                                                                  else
                                                                {
                                                                  echo "Fresher";
         
                                                                  }

                                                                  ?> 
    
                                                                  </p>  
                                                                  </span>
                                                                  </li>


                                             <li><b>Salary</b><span title="Min - Max" >
                                         <?php


            $currency = $this->db->get_where('currency', array('currency_id' => $post['post_currency']))->row()->currency_name;

          if($post['min_sal'] || $post['max_sal']) {
          echo $post['min_sal']." - ".$post['max_sal'].' '. $currency . ' '. $post['salary_type']; } 
          else { echo PROFILENA;} ?></span>
                                            </li>
                                          


                   <li><b>No of Position</b><span><?php echo $post['post_position'].' '. 'Position'; ?></span>
                 </li>

                  <li><b>Industry Type</b> <span>
                                                                  <?php
                                                                      $cache_time = $this->db->get_where('job_industry', array('industry_id' => $post['industry_type']))->row()->industry_name;
                                                                         echo $cache_time;
                                                                       ?>
                                                                         </span> 
                                                                  </li>

                          

<?php if ($post['degree_name'] != '' || $post['other_education'] != '') { ?>

    <li> <b>Education Required</b> <span> 
  

                                                                 
                             <?php
                            $comma = ", ";
                            $k = 0;
                            $edu = $post['degree_name'];
                            $edu_nm = explode(',', $edu);

                            if(!$post['degree_name']){

                                echo $post['other_education'];

                            }else if(!$post['other_education']){


                                foreach ($edu_nm as $edun) {
                             if ($k != 0) {
                                echo $comma;
                            }
                            $cache_time = $this->db->get_where('degree', array('degree_id' => $edun))->row()->degree_name;


                            echo $cache_time;
                                $k++;
                            }


                            }else if($post['degree_name'] && $post['other_education']){
                            foreach ($edu_nm as $edun) {
                             if ($k != 0) {
                                echo $comma;
                            }
                            $cache_time = $this->db->get_where('degree', array('degree_id' => $edun))->row()->degree_name;


                            echo $cache_time;
                                $k++;
                            } echo ",". $post['other_education']; }
                        ?>     
                                                
                                                </span>
                                            </li>

                                            <?php }

                                            else
                                            { ?>

                                            <li><b>Education Required</b><span>
                                            <?php
                                              echo PROFILENA; ?>
                                              </span>
                                            </li>
                                      <?php      }
                                            ?>                   <li><b>Employment Type</b><span>
                                            

                                            <?php if($post['emp_type'] != ''){?>
                                            <pre>
                                            <?php echo $this->common->make_links($post['emp_type']).'  Job'; ?></pre>
                                               <?php }else{ echo PROFILENA; }?> 

                                            </span>
                                            </li>

                                            <li><b>Company Profile</b><span>
                                            

                                            <?php if($post['re_comp_profile'] != ''){?>
                                            <pre>
                                            <?php echo $this->common->make_links($post['re_comp_profile']); ?></pre>
                                               <?php }else{ echo PROFILENA; }?> 

                                            </span>
                                            </li>
                                          

                 </ul>
                 </div>
                                    
                                     <div class="profile-job-profile-button clearfix">
                                                                    <div class="profile-job-details col-md-12">
                                                                        <ul><li class="job_all_post ">
                                                                                       <li class="job_all_post last_date">
                                                                        Last Date :
                       <?php if ($post['post_last_date'] != "0000-00-00") {
                         echo  date('d-M-Y', strtotime($post['post_last_date']));
                        } else {
                         echo   PROFILENA;
                        } ?>
                        </li>                                                   </li>
                                                                            <li class="fr">';
                       <a href="javascript:void(0);" class="button" onclick="removepopup(<?php echo $post['post_id'] ?>)">Remove</a>
                 <a href="<?php echo base_url() . 'recruiter/edit-post/' . $post['post_id'] ?>" class="button">Edit</a>
                   <?php     $join_str[0]['table'] = 'job_reg';
                        $join_str[0]['join_table_id'] = 'job_reg.user_id';
                        $join_str[0]['from_table_id'] = 'job_apply.user_id';
                        $join_str[0]['join_type'] = '';

                        $condition_array = array('post_id' => $post['post_id'], 'job_apply.job_delete' => '0', 'job_reg.status' => '1', 'job_reg.is_delete' => '0', 'job_reg.job_step' => 10);
                        $data = "job_apply.*,job_reg.job_id";
                        $apply_candida = $this->common->select_data_by_condition('job_apply', $condition_array, $data, $short_by = '', $order_by = '', $limit, $offset, $join_str, $groupby = '');
                        $countt = count($apply_candida); ?>

                     <a href="<?php echo base_url() . 'recruiter/apply-list/' . $post['post_id'] ?>" class="button">Applied  Candidate : <?php echo  $countt ?></a>
                                                                    </li>
                                                                        </ul>
                                                                    </div>

                                                                </div>
                            
                                </div>
                            </div>
                        </div>
                        <?php
                    }
                    }else{ ?>
                        
                        <div class="art-img-nn">
                                            <div class="art_no_post_img">
                                                <img src="' . base_url() . 'img/job-no.png">

                                           </div>
                                            <div class="art_no_post_text">
                                                No  Post Available.
                                            </div>
                                        </div>
                   <?php  }
                    ?>
                                <!--<div class="fw" id="loader" style="text-align:center;"><img src="<?php echo base_url('assets/images/loader.gif?ver=' . time()) ?>" /></div>-->
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- MIDDLE SECTION END -->
        </section>
        <!-- END CONTAINER -->

        <!-- BEGIN FOOTER -->
        <!--PROFILE PIC MODEL START-->
        <div class="modal fade message-box" id="bidmodal-2" role="dialog">
            <div class="modal-dialog modal-lm">
                <div class="modal-content">
                    <button type="button" class="modal-close" data-dismiss="modal">&times;</button>      
                    <div class="modal-body">
                        <span class="mes">
                            <div id="popup-form">

                                <div class="fw" id="profi_loader"  style="display:none;" style="text-align:center;" ><img src="<?php echo base_url('assets/images/loader.gif?ver=' . time()) ?>" /></div>
                                <form id ="userimage" name ="userimage" class ="clearfix" enctype="multipart/form-data" method="post">
                                    <div class="col-md-5">
                                        <input type="file" name="profilepic" accept="image/gif, image/jpeg, image/png" id="upload-one" >
                                    </div>

                                    <div class="col-md-7 text-center">
                                        <div id="upload-demo-one" style="display:none;" style="width:350px"></div>
                                    </div>
                                    <input type="submit" class="upload-result-one" name="profilepicsubmit" id="profilepicsubmit" value="Save" >
                                </form>

                            </div>
                        </span>
                    </div>
                </div>
            </div>
        </div>
        <!--PROFILE PIC MODEL END-->
        <!-- START FOOTER -->
        <footer>
<?php echo $footer; ?>
        </footer>
        <!-- END FOOTER -->


        <!-- FIELD VALIDATION JS START -->
          <?php
        if (IS_REC_JS_MINIFY == '0') {
            ?>
         <script src="<?php echo base_url('assets/js/croppie.js'); ?>"></script>  
        
        <script src="<?php echo base_url('assets/js/bootstrap.min.js'); ?>"></script>
        <script type="text/javascript" src="<?php echo base_url('assets/js/jquery.validate.min.js?ver=' . time()); ?>"></script>
            <?php
        } else {
            ?>
            <script type="text/javascript" defer="defer" src="<?php echo base_url('assets/js_min/croppie_bootstrap_validate.min.js?ver=' . time()); ?>"></script>
        <?php } ?>
        
        <script>
                                    var base_url = '<?php echo base_url(); ?>';
                                    var data1 = <?php echo json_encode($de); ?>;
                                    var data = <?php echo json_encode($demo); ?>;
                                    var get_csrf_token_name = '<?php echo $this->security->get_csrf_token_name(); ?>';
                                    var get_csrf_hash = '<?php echo $this->security->get_csrf_hash(); ?>';
                                    var id = '<?php echo $this->uri->segment(3); ?>';
                                    var return_page = '<?php echo $_GET['page']; ?>';
      
        
        
        
        function removepopup(id) 
{
            $('.biderror .mes').html("<div class='pop_content'>Do you want to remove this post?<div class='model_ok_cancel'><a class='okbtn' id=" + id + " onClick='remove_post(" + id + ")' href='javascript:void(0);' data-dismiss='modal'>Yes</a><a class='cnclbtn' href='javascript:void(0);' data-dismiss='modal'>No</a></div></div>");
            $('#bidmodal').modal('show');
}

//remove post start

         
                function remove_post(abc)
                {


                    $.ajax({
                        type: 'POST',
                        url: base_url +'recruiter/remove_post',
                        data: 'post_id=' + abc,
                        success: function (data) {

                            $('#' + 'removepost' + abc).html(data);
                            $('#' + 'removepost' + abc).removeClass();
                            var numItems = $('.contact-frnd-post .job-contact-frnd .profile-job-post-detail').length;

                            if (numItems == '0') {
                            
                                var nodataHtml = "<div class='art-img-nn'><div class='art_no_post_img'><img src='"+ base_url + "img/job-no.png'/></div><div class='art_no_post_text'> No Post Available.</div></div>";
                                $('.contact-frnd-post').html(nodataHtml);
                            }

                        }
                    });

                }
          
        </script>


       
    </body>
</html>