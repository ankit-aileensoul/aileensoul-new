<!DOCTYPE html>
<html>
<head>
<title><?php echo $title; ?></title>
<?php echo $head; ?>
<link rel="stylesheet" type="text/css" href="<?php echo base_url('css/bootstrap.min.css?ver='.time()); ?>">
<link rel="stylesheet" type="text/css" href="<?php echo base_url('css/1.10.3.jquery-ui.css?ver='.time()); ?>">
<link rel="stylesheet" type="text/css" href="<?php echo base_url('dragdrop/fileinput.css?ver='.time()); ?>">
<link href="<?php echo base_url('dragdrop/themes/explorer/theme.css?ver='.time()); ?>" media="all" rel="stylesheet" type="text/css"/>
<link rel="stylesheet" type="text/css" href="<?php echo base_url('css/video.css?ver='.time()); ?>">
<link rel="stylesheet" type="text/css" href="<?php echo base_url('css/custom-style.css?ver='.time()); ?>">
<link rel="stylesheet" type="text/css" href="<?php echo base_url('css/profiles/artistic/artistic.css?ver='.time()); ?>">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url('css/profiles/common/mobile.css?ver='.time()) ;?>" />
      <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
      
   </head>
   <body>
   <?php echo $header; ?>
   <?php echo $art_header2_border; ?>
      <div class="user-midd-section bui_art_left_box" id="paddingtop_fixed">
      <div class="container art_container">
      <div class="">
      <div class="profile-box-custom fl animated fadeInLeftBig left_side_posrt" >
      <div class="left_fixed"> 
         <?php ?>
<?php echo $left_artistic; ?>
          <div class="full-box-module_follow fixed_right_display_none">
          
            <div class="common-form">
               <h3 class="user_list_head">User List</h3>
               <div class="seeall">
                  <a href="<?php //echo base_url('artistic/userlist'); ?>">All User</a>
               </div>
               <div class="profile-boxProfileCard_follow_mobile  module">     
               </div>
             
            </div>
         </div>

         <div class="custom_footer_left fw">
          <div class="fl">
            <ul>
              <li><a href="<?php echo base_url('about_us'); ?>"> About Us </a></li>
              <span class="custom_footer_dot" role="presentation" aria-hidden="true"> · </span>
              <li><a href="<?php echo base_url('contact_us'); ?>">Contact Us</a></li>
              <span class="custom_footer_dot" role="presentation" aria-hidden="true"> · </span>
              <li><a href="<?php echo base_url('blog'); ?>">Blogs</a></li>
              <span class="custom_footer_dot" role="presentation" aria-hidden="true"> · </span>
              <li><a href="">Terms &amp; Condition </a></li>
              <span class="custom_footer_dot" role="presentation" aria-hidden="true"> · </span>
              <li><a href="">Privacy Policy</a></li>
              <span class="custom_footer_dot" role="presentation" aria-hidden="true"> · </span>
              <li><a href="<?php echo base_url('feedback'); ?>">Send Us Feedback</a></li>
            </ul>
          </div>
        <div>
          
        </div>

        </div>
      </div>
     </div> 
      <div class=" custom-right-art mian_middle_post_box animated fadeInUp">
             
        <div class="right_side_posrt fl"> 
         <div class="post-editor col-md-12">
            <div class="main-text-area col-md-12">
               <div class="popup-img">
                  <?php
                     $userimage = $this->db->get_where('art_reg', array('user_id' => $this->session->userdata('aileenuser')))->row()->art_user_image;
                     $userimageposted = $this->db->get_where('art_reg', array('user_id' => $this->session->userdata('aileenuser')))->row()->art_user_image;
                     ?>
                     <?php if($artisticdata[0]['art_user_image']){?>
                      <?php 
if (!file_exists($this->config->item('art_profile_thumb_upload_path') . $artisticdata[0]['art_user_image'])) { ?>
                                                                 <img  src="<?php echo base_url(NOARTIMAGE); ?>"  alt="">
                                                                <?php
                                                            } else { ?>
<img  src="<?php echo base_url($this->config->item('art_profile_thumb_upload_path') . $artisticdata[0]['art_user_image']); ?>"  alt="">
                  <?php }?>
                  <?php }else{ ?>
                     <img  src="<?php echo base_url(NOARTIMAGE); ?>"  alt="">
                  <?php }?>
               </div>
               <div id="myBtn"  class="editor-content popup-text">
                  <span > Post Your Art....</span> 
                  <div class="padding-left padding_les_left camer_h">
                     <i class=" fa fa-camera" >
                     </i> 
                  </div>
               </div>
            </div>
         </div>
          <div class="bs-example">
                                <div class="progress progress-striped" id="progress_div">
                                    <div class="progress-bar" style="width: 0%;">
                                        <span class="sr-only">0%</span>
                                    </div>
                                </div>
         </div>
                             <div class="art-all-post">
                             <?php
                    if (count($art_data) > 0) {
                       
                            //  echo '<pre>'; print_r($finalsorting); die();
                            $userid = $this->session->userdata('aileenuser');

                            $contition_array = array('art_post_id' => $art_data[0]['art_post_id'], 'status' => '1');
                            $artdelete = $this->data['artdelete'] = $this->common->select_data_by_condition('art_post', $contition_array, $data = '*', $sortby = '', $orderby = '', $limit = '', $offset = '', $join_str = array(), $groupby = '');

                            $likeuserarray = explode(',', $artdelete[0]['delete_post']);

                            if (!in_array($userid, $likeuserarray) && $artdelete[0]['is_delete'] == '0') {
                                ?>
                <div id="<?php echo "removepost" . $art_data[0]['art_post_id']; ?>">
                   <div class="col-md-12 col-sm-12 post-design-box">
                         <div class="post_radius_box">
                              <div class="post-design-top col-md-12" id= "showpost">  
                                  <div class="post-design-pro-img "> 
                                   <?php
                                        $art_userimage = $this->db->get_where('art_reg', array('user_id' => $art_data[0]['user_id'], 'status' => 1))->row()->art_user_image;

                                        $userimageposted = $this->db->get_where('art_reg', array('user_id' => $art_data[0]['posted_user_id']))->row()->art_user_image;
                                                    ?>

                                        <?php if ($art_data[0]['posted_user_id']) { ?>

                                        <a class="post_dot" title="<?php echo ucwords($firstnameposted) . ' ' . ucwords($lastnameposted); ?>" href="<?php echo base_url('artistic/art_manage_post/' . $art_data[0]['posted_user_id']); ?>">

                                                <?php if($userimageposted){?>
                                                <img src="<?php echo base_url($this->config->item('art_profile_thumb_upload_path') . $userimageposted); ?>" name="image_src" id="image_src" />

                                                <?php }else{?>
<img src="<?php echo base_url(NOIMAGE); ?>" alt="<?php echo ucwords($artisticdata[0]['art_name']) . ' ' . ucwords($artisticdata[0]['art_lastname']); ?>">

                                                <?php }?>
                                            </a>

                                        <?php } else { ?>

                                          <a  class="post_dot" title="" href="<?php echo base_url('artistic/art_manage_post/' . $art_data[0]['user_id']); ?>">

               <?php if($art_userimage){?>
                <img  src="<?php echo base_url($this->config->item('art_profile_thumb_upload_path') . $art_userimage); ?>"  alt="">
                <?php }else{?>

                 <img src="<?php echo base_url(NOIMAGE); ?>" alt="<?php echo ucwords($art_data[0]['art_name']) . ' ' . ucwords($art_data[0]['art_lastname']); ?>">
                <?php }?>
                 </a>
         <?php } ?>
        </div>
                 <div class="post-design-name fl col-md-10">
                    <ul>

                          <?php
                                                        $firstname = $this->db->get_where('art_reg', array('user_id' => $art_data[0]['user_id']))->row()->art_name;

                                                        $lastname = $this->db->get_where('art_reg', array('user_id' => $art_data[0]['user_id']))->row()->art_lastname;

                                                        $firstnameposted = $this->db->get_where('art_reg', array('user_id' => $art_data[0]['posted_user_id']))->row()->art_name;
                                                        $lastnameposted = $this->db->get_where('art_reg', array('user_id' => $art_data[0]['posted_user_id']))->row()->art_lastname;
                                                       
                                                        $designation = $this->db->get_where('art_reg', array('user_id' => $art_data[0]['user_id']))->row()->designation;


                                                        $userskill = $this->db->get_where('art_reg', array('user_id' => $art_data[0]['user_id']))->row()->art_skill;


                                                        $aud = $userskill;
                                                        $aud_res = explode(',', $aud);
                                                        foreach ($aud_res as $skill) {

                                                            $cache_time = $this->db->get_where('skill', array('skill_id' => $skill))->row()->skill;
                                                            $skill1[] = $cache_time;
                                                        }
                                                        $listFinal = implode(', ', $skill1);
                                                        ?>


                                                        <li>
                                                            <div class="post-design-product">

                                                                <!-- other user post time name strat-->

                                                                <?php if ($art_data[0]['posted_user_id']) { ?>
                                                                    <div class="else_post_d">
                                                                        <a style="max-width: 30%;" class="post_dot" title="<?php echo ucwords($firstnameposted) . ' ' . ucwords($lastnameposted); ?>" href="<?php echo base_url('artistic/art_manage_post/' . $art_data[0]['posted_user_id']); ?>"><?php echo ucwords($firstnameposted) . ' ' . ucwords($lastnameposted); ?> </a>
                                                                        <p class="posted_with" > Posted With </p>
                                                                        <a  class="post_dot1 padding_less_left" href="<?php echo base_url('artistic/art_manage_post/' . $art_data[0]['user_id']); ?>"><?php echo ucwords($firstname) . ' ' . ucwords($lastname); ?></a>

                                                                <span role="presentation" aria-hidden="true"> · </span>
                                                                        <span class="ctre_date"> 
                                                        <?php echo $this->common->time_elapsed_string(date('Y-m-d H:i:s', strtotime($art_data[0]['created_date']))); ?>
                                                                        </span>
                                                                    </div>
                                                                    <!-- other user post time name end-->
                                                                <?php } else { ?>


                                                                    <a title="<?php
                                                                    echo ucwords($firstname);
                                                                    print "&nbsp;&nbsp;";
                                                                    echo ucwords($lastname);
                                                                    ?>" class="post_dot" href="<?php echo base_url('artistic/art_manage_post/' . $art_data[0]['user_id']); ?>"><?php
                                                                       echo ucwords($firstname);
                                                                       print "&nbsp;&nbsp;";
                                                                       echo ucwords($lastname);
                                                                       ?> </a>
<span role="presentation" aria-hidden="true"> · </span>
                                                                    <div class="datespan">
                                                                        <span class="ctre_date">  <?php // echo date('d-M-Y',strtotime($art_data[0]['created_date']));                                              ?>

                                                                            <?php echo $this->common->time_elapsed_string(date('Y-m-d H:i:s', strtotime($art_data[0]['created_date']))); ?>

                                                                        </span> </div>
                                                                <?php } ?> 

                                                            </div></li>
                                                         
                                                        <li><div class="post-design-product">
                                                                <a><?php if($designation)
                                                                    {echo $designation;
                                                                    
                                                                    }else{
                                                                        echo "Current Work";
                                                                       }?> </a>
                                                                
                                                            </div></li>
                                                                                                              
                    </ul>
                    </div>

                            <div class="dropdown1">
                                                    <a onClick="myFunction(<?php echo $art_data[0]['art_post_id']; ?>)" class="dropbtn1 dropbtn1 fa fa-ellipsis-v"></a>
                                                    <div id="<?php echo "myDropdown" . $art_data[0]['art_post_id']; ?>" class="dropdown-content1">

                                                        <?php
                                                        if ($art_data[0]['posted_user_id'] != 0) {

                                                            if ($this->session->userdata('aileenuser') == $art_data[0]['posted_user_id']) {
                                                                ?>
                                                                <a id="<?php echo $art_data[0]['art_post_id']; ?>" onClick="deleteownpostmodel(this.id)"><i class="fa fa-trash-o" aria-hidden="true"></i>Delete Post</a>

                                                                <a id="<?php echo $art_data[0]['art_post_id']; ?>" onClick="editpost(this.id)"><i class="fa fa-pencil-square-o" aria-hidden="true"></i>Edit</a>

                                                            <?php } else {
                                                                ?>

                                                                <!--<a id="<?php echo $art_data[0]['art_post_id']; ?>" onClick="deleteownpostmodel(this.id)"><i class="fa fa-trash-o" aria-hidden="true"></i>Delete Post</a>-->

                                                             <!--    <a href="<?php echo base_url('artistic/artistic_contactperson/' . $art_data[0]['user_id'] . ''); ?>"><i class="fa fa-user" aria-hidden="true"></i> Contact Person</a> -->

                                                            <?php
                                                            }
                                                        } else {
                                                            ?>  



                                                            <?php
                                                            $userid = $this->session->userdata('aileenuser');
                                                            if ($art_data[0]['user_id'] == $userid) {
                                                                ?>

                                                                <a id="<?php echo $art_data[0]['art_post_id']; ?>" onClick="deleteownpostmodel(this.id)"><i class="fa fa-trash-o" aria-hidden="true"></i>Delete Post</a>


                                                                <a id="<?php echo $art_data[0]['art_post_id']; ?>" onClick="editpost(this.id)"><i class="fa fa-pencil-square-o" aria-hidden="true"></i>Edit</a>


                <?php } else { ?>

                                                    <a id="<?php echo $art_data[0]['art_post_id']; ?>" onClick="deletepostmodel(this.id)"><i class="fa fa-trash-o" aria-hidden="true"></i>Delete Post</a>
                                                                <!-- <a href="<?php echo base_url('artistic/artistic_contactperson/' . $art_data[0]['user_id'] . ''); ?>"><i class="fa fa-user" aria-hidden="true"></i> Contact Person</a> -->
                                                            <?php
                                                            }
                                                        }
                                                        ?>
                                                    </div>
                                                </div>

                                                   <div class="post-design-desc ">
                                                    <span> 
                                                         <div class="ft-15 t_artd">
                                                            <div id="<?php echo 'editpostdata' . $art_data[0]['art_post_id']; ?>" style="display:block;">
                                                                <a class="ft-15 t_artd"><?php echo $this->common->make_links($art_data[0]['art_post']); ?></a>
                                                            </div>

                                                            <div id="<?php echo 'editpostbox' . $art_data[0]['art_post_id']; ?>" style="display:none;">
                                                                <input type="text" class="my_text" placeholder="Title" id="<?php echo 'editpostname' . $art_data[0]['art_post_id']; ?>" name="editpostname"  value="<?php echo $art_data[0]['art_post']; ?>" style=" margin-bottom: 10px;">
                                                            </div>

                                                        </div>
                                                       <!--  <div  id="<?php echo 'editpostdetails' . $art_data[0]['art_post_id']; ?>" style="display:block ; ">
                                                            <?php
                                                            $text = $this->common->make_links($art_data[0]['art_description']);
                                                            ?>
                                                            <span class="show ft-13 "><?php echo $text; ?></span>
                                                        </div> -->


                     <div id="<?php echo "khyati" . $art_data[0]['art_post_id']; ?>" style="display:block;">
                      <?php
                     $small = substr($art_data[0]['art_description'], 0, 180);
                     echo $this->common->make_links($small);

                     if (strlen($art_data[0]['art_description']) > 180) {
                          echo '... <span id="kkkk" onClick="khdiv(' . $art_data[0]['art_post_id'] . ')">View More</span>';
                        }?>
                   </div>
                    <div id="<?php echo "khyatii" . $art_data[0]['art_post_id']; ?>" style="display:none;">
                      <?php
                     echo $art_data[0]['art_description'];
                   ?>
                   </div>
                                                        <div id="<?php echo 'editpostdetailbox' . $art_data[0]['art_post_id']; ?>" style="display:none;">
                                                            <div  contenteditable="true" id="<?php echo 'editpostdesc' . $art_data[0]['art_post_id']; ?>"  class="textbuis editable_text margin_btm" name="editpostdesc" placeholder="Description" ><?php echo $art_data[0]['art_description']; ?></div>
                                                        </div>      
                                                        <button id="<?php echo "editpostsubmit" . $art_data[0]['art_post_id']; ?>" style="display:none" onClick="edit_postinsert(<?php echo $art_data[0]['art_post_id']; ?>)" class="fr" style="margin-right: 176px; border-radius: 3px;" >Save</button>
                                                    </span></div> 
                              </div>

                                                       <!-- multiple image code  start-->
                        <div class="post-design-mid col-md-12" > 

                             <div class="images_art_post">

                                <?php
                                                    $contition_array = array('post_id' => $art_data[0]['art_post_id'], 'is_deleted' => '1', 'insert_profile' => '1');
                                                    $artmultiimage = $this->data['artmultiimage'] = $this->common->select_data_by_condition('post_files', $contition_array, $data = '*', $sortby = '', $orderby = '', $limit = '', $offset = '', $join_str = array(), $groupby = '');
                                                    ?>

                                                    <?php if (count($artmultiimage) == 1) { ?>

                                                        <?php
                                                        $allowed = array('gif', 'png', 'jpg');
                                                        $allowespdf = array('pdf');
                                                        $allowesvideo = array('mp4', '3gp', 'avi', 'ogg', '3gp', 'webm');
                                                        $allowesaudio = array('mp3');
                                                        $filename = $artmultiimage[0]['file_name'];
                                                        $ext = pathinfo($filename, PATHINFO_EXTENSION);

                                                        if (in_array($ext, $allowed)) {
                                                            ?>

                                                            <!-- one image start -->
                                                            <div class="one-image">
                                                                <a href="<?php echo base_url('artistic/postnewpage/' . $art_data[0]['art_post_id']) ?>"><img  src="<?php echo base_url($this->config->item('art_post_thumb_upload_path') . $artmultiimage[0]['file_name']) ?>" > </a>
                                                            </div>
                                                            <!-- one image end -->

               <?php } elseif (in_array($ext, $allowespdf)) { ?>

                                                            <!-- one pdf start -->
                                                            <div>
                                                                <a href="<?php echo base_url('artistic/creat_pdf/' . $artmultiimage[0]['post_files_id']) ?>"><div class="pdf_img">
                                                                        <img src="<?php echo base_url('images/PDF.jpg') ?>">
                                                                    </div></a>
                                                            </div>
                                                            <!-- one pdf end -->

                <?php } elseif (in_array($ext, $allowesvideo)) { ?>

                 <!-- one video start -->
                                                            <div>


                                                                <video width="100%" height="370" >
                                                                    <source src="<?php echo base_url($this->config->item('art_post_main_upload_path') . $artmultiimage[0]['file_name']) ?>" type="video/mp4">
                                                                    <source src="movie.ogg" type="video/ogg">
                                                                </video>

                                                            </div>
                                                            <!-- one video end -->

                <?php } elseif (in_array($ext, $allowesaudio)) { ?>

                                                            <!-- one audio start -->
                                                           
                                                                <div class="audio_main_div">
                                                                    <div class="audio_img">
                                                                        <img src="<?php echo base_url('images/music-icon.png') ?> ">  
                                                                    </div>
                                                                    <div class="audio_source">
                                                                        <audio  controls>

                                                                            <source src="<?php echo base_url($this->config->item('art_post_main_upload_path') . $artmultiimage[0]['file_name']) ?>" type="audio/mp3">
                                                                            <source src="movie.ogg" type="audio/ogg">
                                                                            Your browser does not support the audio tag.
                                                                        </audio>
                                                                    </div>
                                                                    <div class="audio_mp3">
                                                                        <p title="hellow this is mp3">This text will scroll from right to left</p>
                                                                    </div>
                                                                </div> 
                                                                <!-- one audio end -->

                                                            <?php } ?>

                                        <?php } elseif (count($artmultiimage) == 2) { ?>

                                            <?php
                                              foreach ($artmultiimage as $multiimage) {
                                            ?>

                                            <!-- two image start -->
                                              <div class="two-images" >
                                            <a href="<?php echo base_url('artistic/postnewpage/' . $art_data[0]['art_post_id']) ?>"><img class="two-columns" src="<?php echo base_url($this->config->item('art_post_thumb_upload_path') . $multiimage['file_name']) ?>" > </a>
                                            </div>

                                            <!-- two image end -->
                                             <?php } ?>

                                             <?php } elseif (count($artmultiimage) == 3) { ?>



                                                            <!-- three image start -->
                                                            <div class="three-image-top" >
                                                                <a href="<?php echo base_url('artistic/postnewpage/' . $art_data[0]['art_post_id']) ?>"><img class="three-columns" src="<?php echo base_url($this->config->item('art_post_thumb_upload_path') . $artmultiimage[0]['file_name']) ?>"> </a>
                                                            </div>
                                                              <div class="three-image" >
                                                                <a href="<?php echo base_url('artistic/postnewpage/' . $art_data[0]['art_post_id']) ?>"><img class="three-columns" src="<?php echo base_url($this->config->item('art_post_thumb_upload_path') . $artmultiimage[1]['file_name']) ?>" > </a>
                                                            </div>
                                                            <div class="three-image" >
                                                                <a href="<?php echo base_url('artistic/postnewpage/' . $art_data[0]['art_post_id']) ?>"><img class="three-columns" src="<?php echo base_url($this->config->item('art_post_thumb_upload_path') . $artmultiimage[2]['file_name']) ?>" > </a>
                                                            </div>

                                                            <!-- three image end -->

                                 <?php } elseif (count($artmultiimage) == 4) { ?>

                                 <?php
                                                            foreach ($artmultiimage as $multiimage) {
                                                                ?>

                                                                <!-- four image start -->
                                                              <div class="four-image" >
                                                                    <a href="<?php echo base_url('artistic/postnewpage/' . $art_data[0]['art_post_id']) ?>"><img class="breakpoint" src="<?php echo base_url($this->config->item('art_post_thumb_upload_path') . $multiimage['file_name']) ?>" > </a>

                                                                </div>

                                                                <!-- four image end -->

                                                            <?php } ?>


            <?php } elseif (count($artmultiimage) > 4) { ?>


             <?php
                     $i = 0;
                     foreach ($artmultiimage as $multiimage) {
                                                                ?>

                            <!-- five image start -->
                            <div>
                             <div class="four-image" >
                                    <a href="<?php echo base_url('artistic/postnewpage/' . $art_data[0]['art_post_id']) ?>"><img src="<?php echo base_url($this->config->item('art_post_thumb_upload_path') . $multiimage['file_name']) ?>" > </a>
                                </div>
                                 </div>

                                <!-- five image end -->

                                    <?php
                                      $i++;
                                      if ($i == 3)
                                      break;
                                    }
                                 ?>
                            <!-- this div view all image start -->

                                                                                        <div>
                                                                 <div class="four-image" >
                                                                    <a href="<?php echo base_url('artistic/postnewpage/' . $art_data[0]['art_post_id']) ?>"><img src="<?php echo base_url($this->config->item('art_post_thumb_upload_path') . $artmultiimage[3]['file_name']) ?>"> </a></div>

                                                                    <a href="<?php echo base_url('artistic/postnewpage/' . $art_data[0]['art_post_id']) ?>" >

                                                                <div class="more-image" >


                                                                    <span> View All (+<?php echo (count($artmultiimage) - 4); ?>) </span>
                                                                </div>

                                                                </a>

                                                            </div>
                                                            <!-- this div view all image end -->


            <?php } ?>
                                        

                             </div>

                        </div>

                         <!-- multiple image code  end-->

                                                  <!-- like comment symbol start -->

                                                <div class="post-design-like-box col-md-12">
                                                    <div class="post-design-menu">
                                                        <!-- like comment div start -->
                                                        <ul class="col-md-6">

                                                            <li class="<?php echo 'likepost' . $art_data[0]['art_post_id']; ?>">
                                                                <a id="<?php echo $art_data[0]['art_post_id']; ?>" class="ripple like_h_w" onClick="post_like(this.id)">

                                                                    <?php
                                                                    $userid = $this->session->userdata('aileenuser');
                                                                    $contition_array = array('art_post_id' => $art_data[0]['art_post_id'], 'status' => '1');
                                                                    $artlike = $this->data['artlike'] = $this->common->select_data_by_condition('art_post', $contition_array, $data = '*', $sortby = '', $orderby = '', $limit = '', $offset = '', $join_str = array(), $groupby = '');
                                                                    $likeuserarray = explode(',', $artlike[0]['art_like_user']);

                                                                    if (!in_array($userid, $likeuserarray)) {
                                                                        ?>
                                                                        <i class="fa fa-thumbs-up   fa-1x" aria-hidden="true"></i>
                                                                    <?php } else {
                                                                        ?>
                                                                        <i class="fa fa-thumbs-up fa-1x main_color " aria-hidden="true"></i>
                                                                        <?php }
                                                                        ?>
                                                                    <span>
                                                                        <?php
//                                                                        if ($art_data[0]['art_likes_count'] > 0) {
//                                                                            echo $art_data[0]['art_likes_count'];
//                                                                        }
//                                                                        ?>
                                                                    </span>
                                                                </a>
                                                            </li>
                                                            <li id="<?php echo 'insertcount' . $art_data[0]['art_post_id']; ?>" style="visibility:show">
                                                                <?php
                                                                $contition_array = array('art_post_id' => $art_data[0]['art_post_id'], 'status' => '1', 'is_delete' => '0');
                                                                $commnetcount = $this->common->select_data_by_condition('artistic_post_comment', $contition_array, $data = '*', $sortby = '', $orderby = '', $limit = '', $offset = '', $join_str = array(), $groupby = '');
                                                                ?>
                                                                <a  class="ripple like_h_w" onClick="commentall(this.id)" id="<?php echo $art_data[0]['art_post_id']; ?>">
                                                                    <i class="fa fa-comment-o" aria-hidden="true">
                                                                        <?php
//                                                                        if (count($commnetcount) > 0) {
//                                                                            echo count($commnetcount);
//                                                                        }
                                                                        ?>
                                                                    </i>  
                                                                </a>
                                                            </li>
                                                        </ul>
                                                        <ul class="col-md-6 like_cmnt_count">

                                                            <li>
                                                                <div class="like_cmmt_space comnt_count_ext_a like_count_ext<?php echo $art_data[0]['art_post_id']; ?>">
                                                                    <span class="comment_count" > 
                                                                        <?php
                                                                        if (count($commnetcount) > 0) {
                                                                            echo count($commnetcount); ?>
                                                                             
                                                                        </span> 
                                                                    <span> Comment</span>
                                                                                <?php }
                                                                        ?> 
                                                                </div>
                                                            </li>

                                                            <li>
                                                                <div class="comnt_count_ext_a <?php echo 'comnt_count_ext' . $art_data[0]['art_post_id']; ?>">
                                                                    <span class="comment_like_count"> 
                                                                       <?php
                                                                        if ($art_data[0]['art_likes_count'] > 0) { 
                                                                            echo $art_data[0]['art_likes_count']; ?>
                                                                   </span> 
                                                                    <span> Like</span>
                                                                <?php   }
                                                                        ?> 
                                                                   
                                                                </div>
                                                            </li>
                                                        </ul>
                                                        <!-- like comment div end -->
                                                    </div>
                                                </div>
                     <!-- like comment symbol end -->

                                                                      <?php
                                                    if ($art_data[0]['art_likes_count'] > 0) {
                                                        ?>
                                                    <div class="likeduserlist<?php echo $art_data[0]['art_post_id'] ?>">
                                                        <?php
                                                        $contition_array = array('art_post_id' => $art_data[0]['art_post_id'], 'status' => '1', 'is_delete' => '0');
                                                        $commnetcount = $this->common->select_data_by_condition('art_post', $contition_array, $data = '*', $sortby = '', $orderby = '', $limit = '', $offset = '', $join_str = array(), $groupby = '');
                                                        $likeuser = $commnetcount[0]['art_like_user'];
                                                        $countlike = $commnetcount[0]['art_likes_count'] - 1;
                                                        $likelistarray = explode(',', $likeuser);
                                                        //  $likelistarray = array_reverse($likelistarray);
                                                        foreach ($likelistarray as $key => $value) {
                                                            $art_fname1 = $this->db->get_where('art_reg', array('user_id' => $value, 'status' => 1))->row()->art_name;
                                                            $art_lname1 = $this->db->get_where('art_reg', array('user_id' => $value, 'status' => 1))->row()->art_lastname;
                                                            ?>
                                                            <?php } ?>
                                                        <!-- pop up box end-->
                                                        <a href="javascript:void(0);" class="likeuserlist1"  onclick="likeuserlist(<?php echo $art_data[0]['art_post_id']; ?>);">
                                                            <?php
                                                            $contition_array = array('art_post_id' => $art_data[0]['art_post_id'], 'status' => '1', 'is_delete' => '0');
                                                            $commnetcount = $this->common->select_data_by_condition('art_post', $contition_array, $data = '*', $sortby = '', $orderby = '', $limit = '', $offset = '', $join_str = array(), $groupby = '');

                                                            $likeuser = $commnetcount[0]['art_like_user'];
                                                            $countlike = $commnetcount[0]['art_likes_count'] - 1;

                                                            $likelistarray = explode(',', $likeuser);
                                                            $likelistarray = array_reverse($likelistarray);
                                                            $art_fname = $this->db->get_where('art_reg', array('user_id' => $likelistarray[0], 'status' => 1))->row()->art_name;
                                                            $art_lname = $this->db->get_where('art_reg', array('user_id' => $likelistarray[0], 'status' => 1))->row()->art_lastname;
                                                            ?>
                                                            <div class="like_one_other">
                                                                <?php
                                                                $userid = $this->session->userdata('aileenuser');

                                                                if ($userid == $likelistarray[0]) {

                                                                    echo "You";
                                                                } else {
                                                                    echo ucwords($art_fname);
                                                                    echo "&nbsp;";
                                                                    echo ucwords($art_lname);
                                                                    echo "&nbsp;";
                                                                }
                                                                ?>
                                                                <?php
                                                                if (count($likelistarray) > 1) {
                                                                    echo "and ";
                                                                    echo $countlike;
                                                                    echo "&nbsp;";
                                                                    echo "others";
                                                                }
                                                                ?>
                                                            </div>
                                                        </a>
                                                    </div>
                                                        <?php
                                                    }
                                                    ?>


                <!-- like user list name start -->


                                                                <div class="<?php echo "likeusername" . $art_data[0]['art_post_id']; ?>" id="<?php echo "likeusername" . $art_data[0]['art_post_id']; ?>" style="display:none">
                                                    <?php
                                                    $contition_array = array('art_post_id' => $art_data[0]['art_post_id'], 'status' => '1', 'is_delete' => '0');
                                                    $commnetcount = $this->common->select_data_by_condition('art_post', $contition_array, $data = '*', $sortby = '', $orderby = '', $limit = '', $offset = '', $join_str = array(), $groupby = '');
                                                    $likeuser = $commnetcount[0]['art_like_user'];
                                                    $countlike = $commnetcount[0]['art_likes_count'] - 1;
                                                    $likelistarray = explode(',', $likeuser);
                                                    // $likelistarray = array_reverse($likelistarray);
                                                    foreach ($likelistarray as $key => $value) {
                                                        $art_fname1 = $this->db->get_where('art_reg', array('user_id' => $value, 'status' => 1))->row()->art_name;
                                                        $art_lname1 = $this->db->get_where('art_reg', array('user_id' => $value, 'status' => 1))->row()->art_lastname;
                                                        ?>
                                                        <?php } ?>
                                                    <!-- pop up box end-->
                                                    <a href="javascript:void(0);" class="likeuserlist1"  onclick="likeuserlist(<?php echo $art_data[0]['art_post_id']; ?>);">
                                                        <?php
                                                        $contition_array = array('art_post_id' => $art_data[0]['art_post_id'], 'status' => '1', 'is_delete' => '0');
                                                        $commnetcount = $this->common->select_data_by_condition('art_post', $contition_array, $data = '*', $sortby = '', $orderby = '', $limit = '', $offset = '', $join_str = array(), $groupby = '');

                                                        $likeuser = $commnetcount[0]['art_like_user'];
                                                        $countlike = $commnetcount[0]['art_likes_count'] - 1;

                                                        $likelistarray = explode(',', $likeuser);
                                                        $likelistarray = array_reverse($likelistarray);
                                                        $art_fname = $this->db->get_where('art_reg', array('user_id' => $likelistarray[0], 'status' => 1))->row()->art_name;
                                                        $art_lname = $this->db->get_where('art_reg', array('user_id' => $likelistarray[0], 'status' => 1))->row()->art_lastname;
                                                        ?>
                                                        <div class="like_one_other">
                                                            <?php
                                                            echo ucwords($art_fname);
                                                            echo "&nbsp;";
                                                            echo ucwords($art_lname);
                                                            echo "&nbsp;";
                                                            ?>
                                                            <?php
                                                            if (count($likelistarray) > 1) {
                                                                echo "and ";
                                                                echo $countlike;
                                                                echo "&nbsp;";
                                                                echo "others";
                                                            }
                                                            ?>
                                                        </div>
                                                    </a>
                                                </div>
                                                <!-- like user list end -->



                                                                         <!-- comment start -->

                         <div class="art-all-comment col-md-12">


                         <div id="<?php echo "fourcomment" . $art_data[0]['art_post_id']; ?>" style="display:none">
                         </div>

                <div  id="<?php echo "threecomment" . $art_data[0]['art_post_id']; ?>" style="display:block">
                    <div class="<?php echo 'insertcomment' . $art_data[0]['art_post_id']; ?>">


                         <?php
                                $contition_array = array('art_post_id' => $art_data[0]['art_post_id'], 'status' => '1');
                                $artdata = $this->data['artdata'] = $this->common->select_data_by_condition('artistic_post_comment', $contition_array, $data = '*', $sortby = 'artistic_post_comment_id', $orderby = 'DESC', $limit = '1', $offset = '', $join_str = array(), $groupby = '');

                                if ($artdata) {
                                        foreach ($artdata as $rowdata) {
                                           $artname = $this->db->get_where('art_reg', array('user_id' => $rowdata['user_id']))->row()->art_name;
                                            $artlastname = $this->db->get_where('art_reg', array('user_id' => $rowdata['user_id']))->row()->art_lastname;
                                        ?>



                    <div class="all-comment-comment-box">
                                                                                <a href="<?php echo base_url('artistic/art_manage_post/' . $rowdata['user_id'] . ''); ?>">
                        <div class="post-design-pro-comment-img">

                        <?php
                    $art_userimage = $this->db->get_where('art_reg', array('user_id' => $rowdata['user_id'], 'status' => 1))->row()->art_user_image;
                    ?>
                                                                            <?php if ($art_userimage) { ?>

                                                                                    <img  src="<?php echo base_url($this->config->item('art_profile_thumb_upload_path') . $art_userimage); ?>"  alt="">
                        <?php
                    } else {
                        ?>
                                                                                <a href="<?php echo base_url('artistic/art_manage_post/' . $rowdata['user_id'] . ''); ?>">

                                                                                    <img src="<?php echo base_url(NOIMAGE); ?>" alt="">
                                                                                </a>
                        <?php
                    }
                    ?>
                                                                    

                        </div>


                              <div class="comment-name">
                                                                            <b title=" <?php
                                                                                   echo ucwords($artname);
                                                                                   echo "&nbsp;";
                                                                                   echo ucwords($artlastname);
                                                                                   ?>">
                                                                                <?php
                                                                                echo ucwords($artname);
                                                                                echo "&nbsp;";
                                                                                echo ucwords($artlastname);
                                                                                ?></b><?php echo '</br>'; ?></div>
                        
                                                                                </a>

                                         <div class="comment-details" id= "<?php echo "showcomment" . $rowdata['artistic_post_comment_id']; ?>">
                    <?php
                    echo $this->common->make_links($rowdata['comments']);
                    ?>
                                         </div>


                        <div class="edit-comment-box">
                                 <div class="inputtype-edit-comment">
                                        <div contenteditable="true" style="display:none; min-height:37px !important; margin-top: 0px!important; margin-left: 1.5% !important; width: 78%;" class="editable_text" name="<?php echo $rowdata['artistic_post_comment_id']; ?>"  id="editcomment<?php echo $rowdata['artistic_post_comment_id']; ?>" placeholder="Enter Your Comment " value= ""  onkeyup="commentedit(<?php echo $rowdata['artistic_post_comment_id']; ?>)"><?php echo $rowdata['comments']; ?></div>
                                        <span class="comment-edit-button"><button id="<?php echo "editsubmit" . $rowdata['artistic_post_comment_id']; ?>" style="display:none" onClick="edit_comment(<?php echo $rowdata['artistic_post_comment_id']; ?>)">Save</button></span>
                                  </div>
                        </div>



                         <div class="art-comment-menu-design">
                                   <div class="comment-details-menu" id="<?php echo 'likecomment1' . $rowdata['artistic_post_comment_id']; ?>">
                                    <a id="<?php echo $rowdata['artistic_post_comment_id']; ?>"   onClick="comment_like1(this.id)">

                                    <?php
                                         $userid = $this->session->userdata('aileenuser');
                                         $contition_array = array('artistic_post_comment_id' => $rowdata['artistic_post_comment_id'], 'status' => '1');
                                         $artcommentlike = $this->data['artcommentlike'] = $this->common->select_data_by_condition('artistic_post_comment', $contition_array, $data = '*', $sortby = '', $orderby = '', $limit = '', $offset = '', $join_str = array(), $groupby = '');
                                         $likeuserarray = explode(',', $artcommentlike[0]['artistic_comment_like_user']);

                                        if (!in_array($userid, $likeuserarray)) {
                                        ?>

                                       <i class="fa fa-thumbs-up fa-1x" aria-hidden="true"></i> 
                                            <?php } else {
                                            ?>
                                        <i class="fa fa-thumbs-up fa-1x main_color" aria-hidden="true"></i>
                                        <?php }
                                        ?>
                                        <span>
                                         <?php
                                            if ($rowdata['artistic_comment_likes_count'] > 0) {
                                                    echo $rowdata['artistic_comment_likes_count'];
                                             }
                                        ?>
                                        </span>
                                        </a>
                                     </div>

                                          <?php
                                                                            $userid = $this->session->userdata('aileenuser');

                                                                            if ($rowdata['user_id'] == $userid) {
                                                                                ?> 

                                                                                <span role="presentation" aria-hidden="true"> · </span>
                                                                                <div class="comment-details-menu">
                                                                                    <div id="<?php echo 'editcommentbox' . $rowdata['artistic_post_comment_id']; ?>" style="display:block;">
                                                                                        <a id="<?php echo $rowdata['artistic_post_comment_id']; ?>" onClick="comment_editbox(this.id)" class="editbox">Edit
                                                                                        </a>
                                                                                    </div>
                                                                                    <div id="<?php echo 'editcancle' . $rowdata['artistic_post_comment_id']; ?>" style="display:none;">
                                                                                        <a id="<?php echo $rowdata['artistic_post_comment_id']; ?>" onClick="comment_editcancle(this.id)">Cancel
                                                                                        </a>
                                                                                    </div>
                                                                                </div>
                                                                            <?php } ?>


                                                                <?php
                                                                            $userid = $this->session->userdata('aileenuser');

                                                                            $art_userid = $this->db->get_where('art_post', array('art_post_id' => $rowdata['art_post_id'], 'status' => 1))->row()->user_id;


                                                                            if ($rowdata['user_id'] == $userid || $art_userid == $userid) {
                                                                                ?> 
                                                                                <span role="presentation" aria-hidden="true"> · </span>
                                                                                <div class="comment-details-menu">
                    <input type="hidden" name="post_delete"  id="post_delete<?php echo $rowdata['artistic_post_comment_id']; ?>" value= "<?php echo $rowdata['art_post_id']; ?>">
                                                                                    <a id="<?php echo $rowdata['artistic_post_comment_id']; ?>"   onClick="comment_delete(this.id)"> Delete<span class="<?php echo 'insertcomment' . $rowdata['artistic_post_comment_id']; ?>">
                                                                                        </span>
                                                                                    </a>
                                                                                </div>
                    <?php } ?>
                     <span role="presentation" aria-hidden="true"> · </span>

                     <div class="comment-details-menu">
                                                                                <p> <?php
                                                                                  
                                                                                    echo $this->common->time_elapsed_string(date('Y-m-d H:i:s', strtotime($rowdata['created_date'])));
                                                                                    echo '</br>';
                                                                                    ?>
                                                                                </p></div>


                         </div>

                        </div>

                                        <?php } }?>

                    </div>
            </div>

                         </div>


                         <!-- comment end -->


                         <!-- comment enter box start  -->


                           <div class="post-design-commnet-box col-md-12">
                                                    <?php
                                                    $userid = $this->session->userdata('aileenuser');
                                                    $art_userimage = $this->db->get_where('art_reg', array('user_id' => $userid, 'status' => 1))->row()->art_user_image;
                                                    ?>
                                                <div class="post-design-proo-img">
                                                    <?php if ($art_userimage) { ?>
                                                        <img src="<?php echo base_url($this->config->item('art_profile_thumb_upload_path') . $art_userimage); ?>" name="image_src" id="image_src" />
                                                        <?php
                                                    } else {
                                                        ?>
                                                        <img src="<?php echo base_url(NOIMAGE); ?>" alt="No Image">
                <?php
            }
            ?>
                                                </div>
                                                <div class="">
                                                    <div id="content" class="col-md-12 inputtype-comment cmy_2" >
                                                        <div contenteditable="true" class="editable_text edt_2" name="<?php echo $art_data[0]['art_post_id']; ?>"  id="<?php echo "post_comment" . $art_data[0]['art_post_id']; ?>" placeholder="Add a Comment ..." onClick="entercomment(<?php echo $art_data[0]['art_post_id']; ?>)"></div>
                                                    </div>
            <?php echo form_error('post_comment'); ?>
                                                    <div class=" comment-edit-butn" >   
                                                        <button  id="<?php echo $art_data[0]['art_post_id']; ?>" onClick="insert_comment(this.id)">Comment</button> 
                                                    </div>
                                                </div>
                                            </div>

                         <!-- comment enter box end  -->

                        </div>
                    </div>
                </div>




                            <?php } 
                            else if($artdelete[0]['is_delete'] == '1'){?>

                           <div class="text-center rio">
                                <h4 class="page-heading  product-listing" >Sorry, this content isn't available at the moment.</h4>
                            </div>

                   <?php } ?>

                            <?php } else {
                            ?>


                        <div class="text-center rio">
                                <h4 class="page-heading  product-listing" >No Post Found.</h4>
                            </div>


                        <?php } ?>

                             </div>
                              
       </div>
      
        

    </div> 
    <div class="right_middle_side_posrt animated fadeInRightBig fixed_right_display" id="hideuserlist" style="display: none">
     
         <div class="full-box-module_follow" style="margin-top: 0px;">
            <!-- follower list start  -->  
            <div class="common-form">
               <h3 class="user_list_head">User List</h3>
               <div class="seeall">
                  <a href="<?php echo base_url('artistic/userlist'); ?>">All User</a>
               </div>
               <div class="profile-boxProfileCard_follow  module">     
               </div>
               <!-- follower list end  -->
            </div>
         </div>
     
      </div>
  <!-- Bid-modal  -->
                    <div class="modal fade message-box biderror" id="bidmodal-limit" role="dialog">
                        <div class="modal-dialog modal-lm deactive">
                            <div class="modal-content">
                                <button type="button" class="modal-close" data-dismiss="modal" id="common-limit">&times;</button>       
                                <div class="modal-body">
                                    <!--<img class="icon" src="images/dollar-icon.png" alt="" />-->
                                    <span class="mes"></span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Model Popup Close -->
      <!-- Bid-modal  -->
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
      <!-- Model Popup Close -->
      <!-- Bid-modal-2  -->
      <div class="modal fade message-box" id="likeusermodal" role="dialog" >
         <div class="modal-dialog modal-lm">
            <div class="modal-content">
               <button type="button" class="modal-close" data-dismiss="modal">&times;</button>       
               <div class="modal-body">
                  <span class="mes">
                  </span>
               </div>
            </div>
         </div>
      </div>
      <!-- Model Popup Close -->
       <!-- Bid-modal for this modal appear or not start -->
            <div class="modal fade message-box" id="post" role="dialog">
                <div class="modal-dialog modal-lm">
                    <div class="modal-content">
                        <button type="button" class="modal-close" id="post" data-dismiss="modal">&times;</button>       
                        <div class="modal-body">
                            <span class="mes">
                            </span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal fade message-box" id="postedit" role="dialog">
                <div class="modal-dialog modal-lm">
                    <div class="modal-content">
                        <button type="button" class="modal-close" id="postedit" data-dismiss="modal">&times;</button>       
                        <div class="modal-body">
                            <span class="mes">
                            </span>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Bid-modal for this modal appear or not  Popup Close -->
    <!-- The Modal -->
         <div id="myModal" class="modal-post">
            <!-- Modal content -->
            <div class="modal-content-post">
               <span class="close1">&times;</span>
                  <div class="post-editor col-md-12 post-edit-popup" id="close">
                  <?php echo form_open_multipart(base_url('artistic/art_post_insert/'), array('id' => 'artpostform', 'name' => 'artpostform', 'class' => 'clearfix upload-image-form', 'onsubmit' => "return imgval(event)")); ?>
                  <div class="main-text-area " >
                     <div class="popup-img-in "> 
                     <?php if($artisticdata[0]['art_user_image']){?>
                   <?php 
if (!file_exists($this->config->item('art_profile_thumb_upload_path') . $artisticdata[0]['art_user_image'])) { ?>
                                                                <img  src="<?php echo base_url(NOARTIMAGE); ?>"  alt="">
                                                                <?php
                                                            } else { ?>
                     <img  src="<?php echo base_url($this->config->item('art_profile_thumb_upload_path') . $artisticdata[0]['art_user_image']); ?>"  alt="">
                     <?php }?>
                     <?php }else{?>
                                    <img  src="<?php echo base_url(NOARTIMAGE); ?>"  alt="">
                     <?php }?>
                     </div>
                     <div id="myBtn"  class="editor-content col-md-10 popup-text" >
                        <textarea id= "test-upload_product" placeholder="Post Your Art...."   onKeyPress=check_length(this.form); onKeyDown=check_length(this.form); onKeyup=check_length(this.form); onblur="check_length(this.form)" name=my_text rows=4 cols=30 class="post_product_name" style="position: relative;"></textarea>
                        <div class="fifty_val">                       
                           <input size=1 class="text_num" tabindex="-500" value=50 name=text_num readonly> 
                        </div>
                      <div class="padding-left padding_les_left camer_h">
                        <i class=" fa fa-camera" >
                        </i> 
                     </div>
                       </div>
                  </div>
                  <div class="row"></div>
                  <div  id="text"  class="editor-content col-md-12 popup-textarea" >
                     <textarea id="test-upload_des" name="product_desc" class="description" placeholder="Enter Description"></textarea>
                     <output id="list"></output>
                  </div>
                  <div class="popup-social-icon">
                     <ul class="editor-header">
                        <li>
                           <div class="col-md-12">
                              <div class="form-group">
                                 <input id="file-1" type="file" class="file" name="postattach[]"  multiple class="file" data-overwrite-initial="false" data-min-file-count="2" style="visibility:hidden;">
                              </div>
                           </div>
                           <label for="file-1">
                           <i class=" fa fa-camera upload_icon"  > Photo</i>
                           <i class=" fa fa-video-camera upload_icon"  > Video </i>
                           <i class="fa fa-music upload_icon "  > Audio </i>
                           <i class=" fa fa-file-pdf-o upload_icon"  > PDF </i>
                           </label>
                        </li>
                     </ul>
                  </div>
                  <div class="fr">
                     <button type="submit"  value="Submit">Post</button>    
                  </div>
                  <?php echo form_close(); ?>
               </div>
            </div>
         </div>
<footer>
<?php echo $footer; ?>
</footer>
<script src="<?php echo base_url('js/jquery.wallform.js?ver='.time()); ?>"></script>
<script src="<?php echo base_url('js/bootstrap.min.js?ver='.time()); ?>"></script>
<script src="<?php echo base_url('js/jquery.form.3.51.js?ver='.time()); ?>"></script>
<script src="<?php echo base_url('js/mediaelement-and-player.min.js?ver='.time()); ?>"></script>
<script src="<?php echo base_url('dragdrop/js/plugins/sortable.js?ver='.time()); ?>"></script>
<script src="<?php echo base_url('dragdrop/js/fileinput.js?ver='.time()); ?>"></script>
<script src="<?php echo base_url('dragdrop/js/locales/fr.js?ver='.time()); ?>"></script>
<script src="<?php echo base_url('dragdrop/js/locales/es.js?ver='.time()); ?>"></script>
<script src="<?php echo base_url('dragdrop/themes/explorer/theme.js?ver='.time()); ?>"></script>
<script type="text/javascript">
var base_url = '<?php echo base_url(); ?>';   
var data= <?php echo json_encode($demo); ?>;
var data1 = <?php echo json_encode($city_data); ?>;
var complex = <?php echo json_encode($selectdata); ?>;
var textarea = document.getElementById("textarea");
</script>


<script type="text/javascript" src="<?php echo base_url('js/webpage/artistic/notification-home.js?ver='.time()); ?>"></script>
<script type="text/javascript" src="<?php echo base_url('js/webpage/artistic/search.js?ver='.time()); ?>"></script>

</body>
</html>
