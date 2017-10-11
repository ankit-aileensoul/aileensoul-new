<!DOCTYPE html>
<html>
    <head> 
        <title><?php echo $title; ?></title>
        <?php echo $head; ?>  
        <link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/dragdrop/fileinput.css?ver='.time()); ?>">
        <link href="<?php echo base_url('assets/dragdrop/themes/explorer/theme.css?ver='.time()); ?>" media="all" rel="stylesheet" type="text/css"/>
        <link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/css/video.css?ver='.time()); ?>">
       
    

        <link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/css/1.10.3.jquery-ui.css?ver='.time()); ?>">
       
        <link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/css/artistic.css?ver='.time()); ?>">
          
    </head>
<!-- END HEADER -->
<body   class="page-container-bg-solid page-boxed">
<?php echo $header; ?>
<?php echo $art_header2_border; ?>
<section class="custom-row">
<?php echo $artistic_common; ?>
<div class="text-center tab-block">
    <div class="container mob-inner-page">
       <a href="<?php echo base_url('artistic/photos/' . $artisticdata[0]['slug']) ?>">
            Photo
        </a>
       <a href="<?php echo base_url('artistic/videos/' . $artisticdata[0]['slug']) ?>">
            Video
        </a>
       <a href="<?php echo base_url('artistic/audios/' . $artisticdata[0]['slug']) ?>">
            Audio
        </a>
        <a href="<?php echo base_url('artistic/pdf/' . $artisticdata[0]['slug']) ?>">
            PDf
        </a>
    </div>
</div>
<div class="user-midd-section">
    <div class="container">
        <div class="row">
            <div class="col-md-4 hidden-sm hidden-xs">
                <div class="full-box-module business_data">
                    <div class="profile-boxProfileCard  module">
                       <div class="head_details1">
                            <span>
                                  <a href="<?php echo base_url('artistic/details/' . $this->uri->segment(3)) ?>">
                                      <h5><i class="fa fa-info-circle" aria-hidden="true"></i>
                                    Information  
                                   </h5>
                                  </a>     
                            </span>  </div>
                        <table class="business_data_table">
                            <tr>
                                <td class="business_data_td1"><i class="fa fa-trophy" aria-hidden="true"></i></td>
                                <td class="business_data_td2">
                                    <?php
                                    $aud = $artisticdata[0]['art_skill'];
                                    $aud_res = explode(',', $aud);
                                    foreach ($aud_res as $skill) {
                                        $cache_time = $this->db->select('skill')->select('skill')->get_where('skill', array('skill_id' => $skill))->row()->skill;
                                        $skill1[] = $cache_time;
                                    }
                                    $listFinal = implode(', ', $skill1);
                                        echo $listFinal;    
                                    ?>   
                                </td>
                            </tr>
                            <tr>
                                <td class="business_data_td1 detaile_map"><i class="fa fa-lightbulb-o" aria-hidden="true"></i></td>
                                <td class="business_data_td2"><span><?php echo $artisticdata[0]['art_yourart']; ?></span></td>
                            </tr>
                            <?php if($artisticdata[0]['art_desc_art']){?>
                            <tr>
                                <td class="business_data_td1 detaile_map"><i class="fa fa-file-text" aria-hidden="true"></i></td>
                                <td class="business_data_td2"><span><?php echo $this->common->make_links($artisticdata[0]['art_desc_art']); ?></span></td>
                            </tr>
                            <?php }?>
                            <tr>
                                <td class="business_data_td1 detaile_map"><i class="fa fa-envelope" aria-hidden="true"></i></td>
                                <td class="business_data_td2">
									<a href="mailto:<?php echo $artisticdata[0]['art_email']; ?>"><?php echo $artisticdata[0]['art_email']; ?></a>
								</td>
                            </tr>
                            <tr>
                                <td class="business_data_td1  detaile_map" ><i class="fa fa-map-marker" aria-hidden="true"></i></td>
                                <td class="business_data_td2"><span>
                                        <?php
                                        if ($artisticdata[0]['art_city']) {
                                            echo $this->db->select('city_name')->select('city_name')->get_where('cities', array('city_id' => $artisticdata[0]['art_city']))->row()->city_name;
                                            echo",";
                                        }
                                        ?> 
                                        <?php
                                        if ($artisticdata[0]['art_country']) {
                                            echo $this->db->select('country_name')->select('country_name')->get_where('countries', array('country_id' => $artisticdata[0]['art_country']))->row()->country_name;
                                        }
                                        ?>
                                    </span></td>
                                    </tr>
                        </table>
                    </div>
                </div>
                <a href="<?php echo base_url('artistic/photos/' . $artisticdata[0]['slug']) ?>">
                <div class="full-box-module business_data" id="autorefresh">
                    <div class="profile-boxProfileCard  module buisness_he_module" style="">
                        <div class="head_details">
                            <h5><i class="fa fa-camera" aria-hidden="true"></i>Photos</h5>
                        </div>  
                        <div class="art_photos"></div>
                    </div>
                </div>
                </a>
                <a href="<?php echo base_url('artistic/videos/' . $artisticdata[0]['slug']) ?>">
                <div class="full-box-module business_data">
                    <div class="profile-boxProfileCard  module">
                        <table class="business_data_table">
                            <div class="head_details">
                                 <h5><i class="fa fa-video-camera" aria-hidden="true"></i>  Video</h5>
                            </div>  
                            <div class="art_videos"></div>
                        </table>
                    </div>
                </div>
                </a>
                <a href="<?php echo base_url('artistic/audios/' . $artisticdata[0]['slug']) ?>">
                <div class="full-box-module business_data">
                    <div class="profile-boxProfileCard  module">
                        <table class="business_data_table">
                            <div class="head_details">
                                 <h5><i class="fa fa-music" aria-hidden="true"></i>  Audio</h5>
                            </div>
                            <div class="art_audios"></div>
                        </table>
                    </div>
                </div>
                </a>
                <a href="<?php echo base_url('artistic/pdf/' . $artisticdata[0]['slug']) ?>">
                <div class="full-box-module business_data">
                    <div class="profile-boxProfileCard  module pdf_box">
                        <table class="business_data_table">
                            <div class="head_details">
                                 <h5><i class="fa fa-file-pdf-o" aria-hidden="true"></i>  PDF</h5>
                            </div>
                            <div class="art_pdf"></div>
                        </table>
                    </div>
                </div>
                </a>
            </div>
            <!-- popup start -->
            <div class="col-md-6 col-sm-12 "  >
<?php 
$userid = $this->session->userdata('aileenuser');
$other_user = $artisticdata[0]['art_id'];
$contition_array = array('user_id' => $userid, 'is_delete' => '0', 'status' => '1');
 $userdata = $this->common->select_data_by_condition('art_reg', $contition_array, $data = '*', $sortby = '', $orderby = '', $limit = '', $offset = '', $join_str = array(), $groupby = '');
$loginuser = $userdata[0]['art_id'];
 $contition_array = array('follow_type' => 1, 'follow_status' => 1);
 $search_condition = "((follow_from  = '$loginuser' AND follow_to  = ' $other_user') OR (follow_from  = '$other_user' AND follow_to  = '$loginuser'))";
 $contactperson = $this->common->select_data_by_search('follow', $search_condition, $contition_array, $data = '*', $sortby = '', $orderby = '', $limit = '', $offset = '', $join_str = '', $groupby = '');
 if((count($contactperson) == 2) || ($artisticdata[0]['user_id'] == $userid)){
?>
                <div class="post-editor col-md-12">
                    <div class="main-text-area col-md-12">
                        <div class="popup-img"> 
                            <a href="<?php echo base_url('artistic/dashboard/' . $artisticdata[0]['slug']) ?>">
                             <?php
                                                    $userimage = $this->db->select('art_user_image')->get_where('art_reg', array('user_id' => $this->session->userdata('aileenuser')))->row()->art_user_image;
                                                    $userimageposted = $this->db->select('art_user_image')->get_where('art_reg', array('user_id' => $this->session->userdata('aileenuser')))->row()->art_user_image;
                                                    ?>
                                                    <?php ?>
                                                            
                
                 <?php 


                      $filename = $this->config->item('art_profile_thumb_upload_path') .$userimageposted;
                      $s3 = new S3(awsAccessKey, awsSecretKey);
                     $this->data['info'] = $info = $s3->getObjectInfo(bucket, $filename);


                     if ($info) { ?>
                                      <img src="<?php echo ART_PROFILE_THUMB_UPLOAD_URL . $userimageposted; ?>" name="image_src" id="image_src" />
                                                                <?php
                                                            } else { ?>
               
                <img  src="<?php echo base_url(NOARTIMAGE); ?>"  alt="">
                <?php }?>
               

                    </a> 
                        </div>
                        <div id="myBtn3"  class="editor-content popup-text">
                            <span> Post Your Art....</span> 
<div class="padding-left padding_les_left camer_h">
                                <i class=" fa fa-camera" >
                                </i> 
                            </div>
                        </div>    
                    </div>
                </div>
<?php }?>
            <!-- The Modal -->
            <div id="myModal3" class="modal-post">
                <!-- Modal content -->
                <div class="modal-content-post">
                    <span class="close3">&times;</span>
                    <div class="post-editor col-md-12 post-edit-popup" id="close">
                        <?php echo form_open_multipart(base_url('artistic/art_post_insert/' . 'manage/' . $artisticdata[0]['user_id']), array('id' => 'artpostform', 'name' => 'artpostform', 'class' => 'clearfix upload-image-form', 'onsubmit' => "return imgval(event);")); ?>
                        <div class="main-text-area col-md-12" >
                            <div class="popup-img-in "> 
                           
                             <?php 


                      $filename = $this->config->item('art_profile_thumb_upload_path') . $artisticdata[0]['art_user_image'];
                      $s3 = new S3(awsAccessKey, awsSecretKey);
                     $this->data['info'] = $info = $s3->getObjectInfo(bucket, $filename);

if ($info) { ?>
        <img  src="<?php echo ART_PROFILE_THUMB_UPLOAD_URL . $artisticdata[0]['art_user_image']; ?>"  alt="">
            <?php
                } else { ?>
                         
                             <img  src="<?php echo base_url(NOARTIMAGE); ?>"  alt="">
                            <?php }?>
                            
                            </div>
                            <div id="myBtn3"    class="editor-content col-md-10 popup-text" >                 
                            <textarea id= "test-upload-product" placeholder="Post Your Art...."  onKeyPress=check_length(this.form); onKeyDown=check_length(this.form);  onkeyup=check_length(this.form); onblur=check_length(this.form); name=my_text rows=4 cols=30 class="post_product_name"></textarea>
                               <div class="fifty_val">  
                                    <input size=1 class="text_num" tabindex="-500" value=50 name=text_num readonly> 
                                </div>
                      <div class="camera_in padding-left padding_les_left camer_h">
                                <i class=" fa fa-camera" >
                                </i> 
                            </div>
</div>
                        </div>
                        <div class="row"></div>
                        <div  id="text"  class="editor-content col-md-12 popup-textarea" >
                    <textarea id="test-upload-des" name="product_desc" class="description" placeholder="Enter Description"></textarea>
                            <output id="list"></output>
                        </div>
                        <div class="popup-social-icon">
                            <ul class="editor-header">
                                <li>
                                    <div class="col-md-12"> <div class="form-group">
                                            <input id="file-1" type="file" class="file" name="postattach[]"  multiple class="file" data-overwrite-initial="false" data-min-file-count="2" style="visibility:hidden;">
                                        </div></div>
                                    <label for="file-1">
                                           <i class=" fa fa-camera upload_icon"  ><span class="upload_span_icon"> Photo</span></i>
                                           <i class=" fa fa-video-camera upload_icon"  ><span class="upload_span_icon"> Video </span></i>
                                           <i class="fa fa-music upload_icon "  ><span class="upload_span_icon"> Audio </span></i>
                                           <i class=" fa fa-file-pdf-o upload_icon"  > <span class="upload_span_icon">PDF </span></i>
                                     </label>
                                </li>
                            </ul>
                        </div>
                        <div class="fr">
                            <button type="submit"  value="Submit" style="margin: 0px;">Post</button>    </div>
                        <?php echo form_close(); ?>
                    </div>
                </div>
            </div>
            <!-- popup end -->
            <div class="bs-example">
                                <div class="progress progress-striped" id="progress_div">
                                    <div class="progress-bar" style="width: 0%;">
                                        <span class="sr-only">0%</span>
                                    </div>
                                </div>
                            </div>
                            <div class="art-all-post">
                <!-- <div class="job-contact-frnd"> -->
                    
   <!--  <div class="nofoundpost">
    </div> -->
            <!--  </div> -->

             </div>
              <div class="fw" id="loader" style="text-align:center;"><img src="<?php echo base_url('assets/images/loader.gif?ver='.time()) ?>" /></div>
            </div>           
        </div>
    </div>
</div>   
</div>
            </section>
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
                    <div class="modal fade message-box biderror" id="bidmodal-limit" role="dialog">
                        <div class="modal-dialog modal-lm deactive">
                            <div class="modal-content">
                                <button type="button" class="modal-close" data-dismiss="modal" id="common-limit">&times;</button>       
                                <div class="modal-body">
                                    <span class="mes"></span>
                                </div>
                            </div>
                        </div>
                    </div>
        <div class="modal fade message-box biderror" id="profileimage" role="dialog">
            <div class="modal-dialog modal-lm">
                <div class="modal-content">
                    <button type="button" class="modal-close" data-dismiss="modal" id="profileimage">&times;</button>       
                    <div class="modal-body">
                        <span class="mes"></span>
                    </div>
                </div>
            </div>
        </div>
         <div class="modal fade message-box" id="postedit" role="dialog">
                <div class="modal-dialog modal-lm">
                    <div class="modal-content">
                        <button type="button" class="modal-close" id="postedit"data-dismiss="modal">&times;</button>       
                        <div class="modal-body">
                            <span class="mes">
                            </span>
                        </div>
                    </div>
                </div>
            </div>
        <div class="modal fade message-box" id="likeusermodal" role="dialog">
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
            <div class="modal fade message-box" id="post" role="dialog">
                <div class="modal-dialog modal-lm">
                    <div class="modal-content">
                        <button type="button" class="modal-close" id="post" data-dismiss="modal">&times;</button>     <div class="modal-body">
                            <span class="mes">
                            </span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal fade message-box" id="image" role="dialog">
                <div class="modal-dialog modal-lm">
                    <div class="modal-content">
                        <button type="button" class="modal-close" id="image" data-dismiss="modal">&times;</button>       
                        <div class="modal-body">
                            <span class="mes">
                            </span>
                        </div>
                    </div>
                </div>
            </div>  
<footer>
<?php echo $footer; ?>
</footer>

<script src="<?php echo base_url('assets/js/croppie.js?ver='.time()); ?>"></script>
<script src="<?php echo base_url('assets/js/bootstrap.min.js?ver='.time()); ?>"></script>
<script src="<?php echo base_url('assets/dragdrop/js/plugins/sortable.js?ver='.time()); ?>"></script>
<script src="<?php echo base_url('assets/dragdrop/js/fileinput.js?ver='.time()); ?>"></script>
<script src="<?php echo base_url('assets/dragdrop/js/locales/fr.js?ver='.time()); ?>"></script>
<script src="<?php echo base_url('assets/dragdrop/js/locales/es.js?ver='.time()); ?>"></script>
<script src="<?php echo base_url('assets/dragdrop/themes/explorer/theme.js?ver='.time()); ?>"></script>
<script src="<?php echo base_url('assets/js/jquery.form.3.51.js?ver='.time()); ?>"></script>
<script src="<?php echo base_url('assets/js/jquery.validate.min.js?ver='.time()); ?>"></script>

<script type="text/javascript">
var base_url = '<?php echo base_url(); ?>';   
var data= <?php echo json_encode($demo); ?>;
var data1 = <?php echo json_encode($city_data); ?>;
var complex = <?php echo json_encode($selectdata); ?>;
var textarea = document.getElementById("textarea");
var slug = '<?php echo $artid; ?>';
</script>
<script type="text/javascript" src="<?php echo base_url('assets/js/webpage/artistic/artistic_common.js?ver='.time()); ?>"></script>
<script type="text/javascript" src="<?php echo base_url('assets/js/webpage/artistic/dashboard.js?ver='.time()); ?>"></script>
 </body>
</html>


