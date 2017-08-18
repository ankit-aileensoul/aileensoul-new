<!DOCTYPE html>
<html>
<head>
<title><?php echo $title; ?></title>
<?php echo $head; ?>
<link rel="stylesheet" href="<?php echo base_url() ?>css/bootstrap.min.css" />
<link rel="stylesheet" type="text/css" href="<?php echo base_url('css/1.10.3.jquery-ui.css'); ?>">
<link rel="stylesheet" type="text/css" href="<?php echo base_url('dragdrop/fileinput.css'); ?>">
<link href="<?php echo base_url('dragdrop/themes/explorer/theme.css'); ?>" media="all" rel="stylesheet" type="text/css"/>
<link rel="stylesheet" type="text/css" href="<?php echo base_url('css/video.css'); ?>">
<link rel="stylesheet" type="text/css" href="<?php echo base_url('css/custom-style.css'); ?>">
<!-- END HEADER -->
</head>
<body   class="page-container-bg-solid page-boxed">
<?php echo $header; ?>
   <?php echo $art_header2_border; ?>
    <section class="custom-row">
    <?php echo $artistic_common; ?>
        <div class="user-midd-section art-inner">
            <div class="container">
    <div class="col-md-3"></div>
    <div class="col-md-7 col-sm-12 col-xs-12 mob-plr0">
        <div class="common-form">
            <div class="job-saved-box">
                <h3>Details</h3>
                <div class=" fr rec-edit-pro">
<?php
$userid = $this->session->userdata('aileenuser');

if ($artisticdata[0]['user_id'] === $userid) {
    ?>
    <ul>
    </ul>
<?php } ?>
                </div> 
                <div class="contact-frnd-post">
                    <div class="job-contact-frnd ">
                        <div class="profile-job-post-detail clearfix">
                            <div class="profile-job-post-title clearfix">
                                <div class="profile-job-profile-button clearfix">
                                    <div class="profile-job-details">
                                        <ul>
                                            <li>
            <p class="details_all_tital "> Basic Information</p>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="profile-job-profile-menu">
                                    <ul class="clearfix">
                                        <li> <b>First Name</b> <span> <?php echo $artisticdata[0]['art_name']; ?> </span>
                                        </li>
                                        <li> <b>Last Name</b> <span> <?php echo $artisticdata[0]['art_lastname']; ?> </span>
                                        </li>
                                        <li> <b>Email </b><span> <?php echo $artisticdata[0]['art_email']; ?> </span>
                                        </li>
                                         <?php if($artisticdata[0]['art_phnno']){ ?>
                                            <li><b> Phone Number</b> <span><?php echo $artisticdata[0]['art_phnno']; ?></span> </li>
                                            <?php } else {
           if($artisticdata[0]['user_id'] == $userid){ 
                  ?>  
      <li><b>Phone Number</b> <span>
             <?php echo PROFILENA;?></span></li><?php  }else{}?>               
          <?php }?>
                                    </ul>
                                </div>
                                <div class="profile-job-post-title clearfix">
                                    <div class="profile-job-profile-button clearfix">
                                        <div class="profile-job-details">
                                            <ul>
                                                <li>
                    <p class="details_all_tital ">Contact Address</p>
                                                </li>

                                            </ul>
                                        </div>
                                    </div>
                                    <div class="profile-job-profile-menu">
                                        <ul class="clearfix">
                                            <li> <b> Country</b> <span> <?php echo $this->db->get_where('countries', array('country_id' => $artisticdata[0]['art_country']))->row()->country_name; ?> </span>
                                            </li>
                                            <li> <b>State </b><span> <?php echo
$this->db->get_where('states', array('state_id' => $artisticdata[0]['art_state']))->row()->state_name;
?> </span>
<?php if($artisticdata[0]['art_city']){?>
                                        </li>
                                            <li><b> City</b> <span><?php echo
$this->db->get_where('cities', array('city_id' => $artisticdata[0]['art_city']))->row()->city_name;
?></span> </li>
<?php }  else {
           if($artisticdata[0]['user_id'] == $userid){ 
                  ?>  
      <li><b> City</b> <span>
             <?php echo PROFILENA;?></span></li><?php  }else{}?>               
          <?php }?>
    <?php if($artisticdata[0]['art_pincode']){ ?>
                                            <li> <b>Pincode </b><span> <?php echo $artisticdata[0]['art_pincode']; ?></span>
                                            </li>
                                            <?php } else {
           if($artisticdata[0]['user_id'] == $userid){ 
                  ?>  
      <li><b>Pincode</b> <span>
             <?php echo PROFILENA;?></span></li><?php  }else{}?>               
          <?php }?>
        </ul>
    </div>
                                </div>
                                <div class="profile-job-post-title clearfix">
                                    <div class="profile-job-profile-button clearfix">
                                        <div class="profile-job-details">
                                            <ul>
                                                <li>
             <p class="details_all_tital "> Art Information</p>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                    <div class="profile-job-profile-menu">
                                        <ul class="clearfix">
                                            <li> <b>Art </b> <span>
<?php
$aud = $artisticdata[0]['art_skill'];
$aud_res = explode(',', $aud);
foreach ($aud_res as $skill) {
    $cache_time = $this->db->get_where('skill', array('skill_id' => $skill))->row()->skill;
    $skill1[] = $cache_time;
}
$listFinal = implode(', ', $skill1);
echo $listFinal;  
?>     
</span>
 </li>
                                            <li> <b> Speciality in Art </b> <span> <?php echo $artisticdata[0]['art_yourart']; ?> </span>
                                            </li>
                                <?php if($artisticdata[0]['art_desc_art']){ ?>
                                          <li><b> Description of your art</b> <span><?php echo $this->common->make_links($artisticdata[0]['art_desc_art']); ?></span> </li>
                                            <?php } else {
           if($artisticdata[0]['user_id'] == $userid){ 
                  ?>  
      <li><b>Description of your art</b> <span>
             <?php echo PROFILENA;?></span></li><?php  }else{}?>               
          <?php }?>
                                        <?php if($artisticdata[0]['art_inspire']){?>
                                         <li><b> How You are Inspire</b> <span><?php echo $artisticdata[0]['art_inspire']; ?></span> </li>
                                         <?php } else {
           if($artisticdata[0]['user_id'] == $userid){ 
                  ?>  
      <li><b>Description of your art</b> <span>
             <?php echo PROFILENA;?></span></li><?php  }else{}?>               
          <?php }?>  
</ul>
                                    </div>
                                </div> 
                            </div> 
                            <?php if($artisticdata[0]['user_id'] == $userid){?>
                            <div class="profile-job-post-title clearfix">
                                <div class="profile-job-profile-button clearfix">
                                    <div class="profile-job-details">
                                        <ul>
                                            <li>
                <p class="details_all_tital ">Portfolio</p>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="profile-job-profile-menu">
                                    <ul class="clearfix">
                                      <li><b>Attachment</b> 
                                        <span>
                                         <?php
if ($artisticdata[0]['art_bestofmine']) {
    ?>
 <div class="buisness-profile-pic pdf">
    <?php
    $allowespdf = array('pdf'); 
    $filename = $artisticdata[0]['art_bestofmine'];
    $ext = pathinfo($filename, PATHINFO_EXTENSION);
   if (in_array($ext, $allowespdf)) { ?>
<?php if (!file_exists($this->config->item('art_portfolio_main_upload_path') . $artisticdata[0]['art_bestofmine'])) {
   echo "Pdf not available."
    ?>
<?php }else{  ?>
        <a href="<?php echo base_url($this->config->item('art_portfolio_main_upload_path') . $artisticdata[0]['art_bestofmine']) ?>">PDF</a>
<?php }?>
         <?php
         } ?>  
         </div>
<?php } else {
    echo PROFILENA;
    } ?>
    </span>
    </li>
<li> <b>Details of Portfolio </b> 
<span> 
<?php if($artisticdata[0]['art_portfolio']){?>
 <?php echo $this->common->make_links($artisticdata[0]['art_portfolio']); ?>
<?php } else{
echo PROFILENA;
} ?>
</span></li>
</ul></div>
</div>
<?php }else{
   if(trim($artisticdata[0]['art_bestofmine']) == '' && trim($artisticdata[0]['art_portfolio']) == '') {}else{ ?>
    <div class="profile-job-post-title clearfix">
                                <div class="profile-job-profile-button clearfix">
                                    <div class="profile-job-details">
                                        <ul>
                                            <li>
                <p class="details_all_tital ">Portfolio</p>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="profile-job-profile-menu">
                                    <ul class="clearfix">
                                    <?php if ($artisticdata[0]['art_bestofmine']) {
    ?>  
 <li><b>Attachment</b>                                          
<span>
<div class="buisness-profile-pic">
    <?php 
    $allowespdf = array('pdf');
    $filename = $artisticdata[0]['art_bestofmine'];
    $ext = pathinfo($filename, PATHINFO_EXTENSION);
    if (in_array($ext, $allowespdf)) { ?>
<?php if (!file_exists($this->config->item('art_portfolio_main_upload_path') . $artisticdata[0]['art_bestofmine'])) {
   echo "Pdf not available."
    ?>
<?php }else{ ?>
        <a href="<?php echo base_url($this->config->item('art_portfolio_main_upload_path') . $artisticdata[0]['art_bestofmine']) ?>">PDF</a>
<?php }?>
         <?php
         } ?></div></span></li>
<?php }?>          
 <li> <b>Details of Portfolio </b> 
<span> 
    <?php if($artisticdata[0]['art_portfolio']){?>
    <?php echo $this->common->make_links($artisticdata[0]['art_portfolio']); ?>
    <?php }else{
       echo PROFILENA;
                    } ?>
</span></li>
</ul></div>
</div>
<?php } }?></div> 
</div></div></div>
</div></div></div>
</div>
</section>
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
<!-- Bid-modal-2  -->
<div class="modal fade message-box" id="bidmodal-2" role="dialog">
    <div class="modal-dialog modal-lm">
        <div class="modal-content">
            <button type="button" class="modal-close" data-dismiss="modal">&times;</button>     	
            <div class="modal-body">
                <span class="mes">
                    <div id="popup-form">
<?php echo form_open_multipart(base_url('artistic/user_image_insert'), array('id' => 'userimage', 'name' => 'userimage', 'class' => 'clearfix')); ?>
                        <input type="file" name="profilepic" accept="image/gif, image/jpeg, image/png" id="profilepic">
                        <input type="hidden" name="hitext" id="hitext" value="4">
 <div class="popup_previred">
                        <img id="preview" src="#" alt="your image" />
                        </div>
                        <!--<input type="submit" name="cancel3" id="cancel3" value="Cancel">-->
                        <input type="submit" name="profilepicsubmit" id="profilepicsubmit" value="Save" >
<?php echo form_close(); ?>
                    </div>
                </span>
            </div>
        </div>
    </div>
</div>
<!-- Model Popup Close -->
<footer>
<?php echo $footer; ?>
</footer>
<!-- script for skill textbox automatic start (option 2)-->
<!-- <script src="https://code.jquery.com/jquery-1.12.4.js"></script> -->
<script src="<?php echo base_url('js/jquery-ui.min.js'); ?>"></script>
<script src="<?php echo base_url('js/demo/jquery-1.9.1.js'); ?>"></script>
<script src="<?php echo base_url('js/demo/jquery-ui-1.9.1.js'); ?>"></script>
<script src="<?php echo base_url('assets/js/croppie.js'); ?>"></script>
<script src="<?php echo base_url('js/bootstrap.min.js'); ?>"></script>
<script src="<?php echo base_url('js/fb_login.js'); ?>"></script>
<script type="text/javascript" src="<?php echo base_url('js/jquery.validate.js'); ?>"></script>
<script>
var base_url = '<?php echo base_url(); ?>';   
var data= <?php echo json_encode($demo); ?>;
var data1 = <?php echo json_encode($de); ?>;
var data= <?php echo json_encode($demo); ?>;
var data1 = <?php echo json_encode($city_data); ?>;
var slug = '<?php echo $artid; ?>';
</script>
<script type="text/javascript" src="<?php echo base_url('js/webpage/artistic/details.js'); ?>"></script>
 </body>
</html>
