<!--<!DOCTYPE html> -->
<html>
    <head>
        <title><?php echo $title; ?></title>
        <?php echo $head; ?>
        <?php
        if (IS_BUSINESS_CSS_MINIFY == '0') {
            ?>
            <link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/css/1.10.3.jquery-ui.css?ver=' . time()); ?>">
            <link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/css/business.css?ver=' . time()); ?>">
            <?php
        } else {
            ?>
            <link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/css_min/business_profile/business-common.min.css?ver=' . time()); ?>">
        <?php } ?>
    </head>
    <body class="page-container-bg-solid page-boxed pushmenu-push">
        <?php echo $header; ?>
        <?php echo $business_header2_border; ?> 
        <section>
            <?php echo $business_common; ?>
            <div class="">
                <div class="user-midd-section">
                    <div class="container">
                        <div  class="col-sm-12 border_tag padding_low_data padding_les" >
                            <div class="padding_les main_art" >
                                <?php echo $file_header; ?>
                                <!-- Tab panes -->
                                <div class="tab-content">
                                    <div class="tab-pane active" id="home">
                                        <div class="common-form">
                                            <div class="">
                                                <div class="all-box">
                                                    <ul>
                                                        <?php
                                                        $i = 1;
                                                        $allowed = array('gif', 'png', 'jpg');
//                                                        $allowed = VALID_IMAGE;
                                                        foreach ($business_profile_data as $mke => $mval) {
                                                            $ext = pathinfo($mval['file_name'], PATHINFO_EXTENSION);
                                                            if (in_array($ext, $allowed)) {
                                                                $databus[] = $mval;
                                                            }
                                                        }
                                                        if ($databus) {
                                                            ?>
                                                            <div class="pictures">
                                                                <ul>
                                                                    <?php foreach ($databus as $data) {
                                                                        ?>
                                                                        <li>
                                                                            <!--<img src="<?php echo base_url($this->config->item('bus_post_210_210_upload_path') . $data['file_name']) ?>" onclick="openModal();currentSlide(<?php echo $i; ?>)" class="hover-shadow cursor" width="550" height="669"/>-->
                                                                            <?php // echo '<img src="https://' . bucket . '.s3.amazonaws.com/' . $this->config->item('bus_post_210_210_upload_path') . $data['file_name'] . '" onclick="openModal(); currentSlide(' . $i . ')" class="hover-shadow cursor"/>'; ?>
                                                                            <?php echo '<img src="' . BUS_POST_RESIZE3_UPLOAD_URL . $data['file_name'] . '" onclick="openModal(); currentSlide(' . $i . ')" class="hover-shadow cursor"/>'; ?>
                                                                        </li>
                                                                        <?php
                                                                        $i++;
                                                                    }
                                                                    ?>
                                                                </ul>
                                                            </div>
                                                        <?php } else {
                                                            ?>
                                                            <div class="art_no_pva_avl">
                                                                <div class="art_no_post_img">
                                                                    <img src="<?php echo base_url('assets/images/020-c.png'); ?>"  >
                                                                </div>
                                                                <div class="art_no_post_text1">
                                                                    No Photo Available.
                                                                </div>
                                                            </div>
                                                        <?php } ?>
                                                    </ul>
                                                </div>
                                                <!-- silder start -->
                                                <div id="myModal1" class="modal2">
                                                    <div class="modal-content2">
                                                        <span class="close2 cursor" onclick="closeModal()">&times;</span>
                                                        <!--  multiple image start -->
                                                        <?php
                                                        $i = 1;

                                                        $allowed = array('gif', 'png', 'jpg');
                                                        //$allowed = VALID_IMAGE;
                                                        foreach ($business_profile_data as $mke => $mval) {

                                                            $ext = pathinfo($mval['file_name'], PATHINFO_EXTENSION);

                                                            if (in_array($ext, $allowed)) {
                                                                $databus1[] = $mval;
                                                            }
                                                        }

                                                        foreach ($databus1 as $busdata) {
                                                            ?>
                                                            <div class="mySlides">
                                                                <div class="numbertext"><?php echo $i ?> / <?php echo count($databus1) ?></div>
                                                                <div class="slider_img_p">
                                                                    <!--<img src="<?php echo base_url($this->config->item('bus_post_main_upload_path') . $busdata['file_name']) ?>" >-->
                                                                    <?php echo '<img src="' . BUS_POST_MAIN_UPLOAD_URL . $busdata['file_name'] . '" >'; ?>
                                                                </div>
                                                                <!-- like comment start -->
                                                                <div>
                                                                    <?php
                                                                    $contition_array = array('post_image_id' => $busdata['post_files_id'], 'is_unlike' => '0');
                                                                    $commneteduser = $this->common->select_data_by_condition('bus_post_image_like', $contition_array, $data = 'post_image_like_id,post_image_id,user_id', $sortby = '', $orderby = '', $limit = '', $offset = '', $join_str = array(), $groupby = '');
                                                                    if (count($commneteduser) > 0) {
                                                                        ?>
                                                                        <div class="likeduserlistimg<?php echo $busdata['post_files_id'] ?>">
                                                                            <?php
                                                                            $contition_array = array('post_image_id' => $busdata['post_files_id'], 'is_unlike' => '0');
                                                                            $commneteduser = $this->common->select_data_by_condition('bus_post_image_like', $contition_array, $data = 'post_image_like_id,post_image_id,user_id', $sortby = '', $orderby = '', $limit = '', $offset = '', $join_str = array(), $groupby = '');
                                                                            $countlike = count($commneteduser) - 1;
                                                                            foreach ($commneteduser as $userdata) {
                                                                                $business_fname1 = $this->db->get_where('business_profile', array('user_id' => $userdata['user_id'], 'status' => 1))->row()->company_name;
                                                                            }
                                                                            ?>
                                                                            <!-- pop up box end-->
                                                                            <a href="javascript:void(0);"  onclick="likeuserlistimg(<?php echo $busdata['post_files_id'] ?>);">
                                                                                <?php
                                                                                $contition_array = array('post_image_id' => $busdata['post_files_id'], 'is_unlike' => '0');
                                                                                $commneteduser = $this->common->select_data_by_condition('bus_post_image_like', $contition_array, $data = 'post_image_like_id,post_image_id,user_id', $sortby = '', $orderby = '', $limit = '', $offset = '', $join_str = array(), $groupby = '');
                                                                                $countlike = count($commneteduser) - 1;
                                                                                $business_fname1 = $this->db->get_where('business_profile', array('user_id' => $commneteduser[0]['user_id'], 'status' => 1))->row()->company_name;
                                                                                ?>
                                                                                <div class="like_one_other_img">
                                                                                    <?php
                                                                                    if ($userid == $commneteduser[0]['user_id']) {
                                                                                        echo "You";
                                                                                        echo "&nbsp;";
                                                                                    } else {
                                                                                        echo ucfirst(strtolower($business_fname1));
                                                                                        echo "&nbsp;";
                                                                                    }
                                                                                    ?>
                                                                                    <?php
                                                                                    if (count($commneteduser) > 1) {
                                                                                        ?>
                                                                                        <?php echo "and"; ?>
                                                                                        <?php
                                                                                        echo $countlike;
                                                                                        echo "&nbsp;";
                                                                                        echo "others";
                                                                                        ?> 
                                                                                    <?php } ?>
                                                                                </div>
                                                                            </a>
                                                                        </div>
                                                                        <?php
                                                                    }
                                                                    ?>
                                                                    <div class="<?php echo "likeusernameimg" . $busdata['post_files_id']; ?>" id="<?php echo "likeusernameimg" . $busdata['post_files_id']; ?>" style="display:none">
                                                                        <?php
                                                                        $contition_array = array('post_image_id' => $busdata['post_files_id'], 'is_unlike' => '0');
                                                                        $commneteduser = $this->common->select_data_by_condition('bus_post_image_like', $contition_array, $data = 'post_image_like_id,post_image_id,user_id', $sortby = '', $orderby = '', $limit = '', $offset = '', $join_str = array(), $groupby = '');
                                                                        $countlike = count($commneteduser) - 1;
                                                                        foreach ($commneteduser as $userdata) {
                                                                            $business_fname1 = $this->db->get_where('business_profile', array('user_id' => $userdata['user_id'], 'status' => 1))->row()->company_name;
                                                                        }
                                                                        ?>
                                                                        <!-- pop up box end-->
                                                                        <a href="javascript:void(0);"  onclick="likeuserlistimg(<?php echo $busdata['post_files_id'] ?>);">
                                                                            <?php
                                                                            $contition_array = array('post_image_id' => $busdata['post_files_id'], 'is_unlike' => '0');
                                                                            $commneteduser = $this->common->select_data_by_condition('bus_post_image_like', $contition_array, $data = 'post_image_like_id,post_image_id,user_id', $sortby = '', $orderby = '', $limit = '', $offset = '', $join_str = array(), $groupby = '');
                                                                            $countlike = count($commneteduser) - 1;
                                                                            $business_fname1 = $this->db->get_where('business_profile', array('user_id' => $commneteduser[0]['user_id'], 'status' => 1))->row()->company_name;
                                                                            ?>
                                                                            <div class="like_one_other_img">
                                                                                <?php
                                                                                echo ucfirst(strtolower($business_fname1));
                                                                                echo "&nbsp;";
                                                                                ?>
                                                                                <?php
                                                                                if (count($commneteduser) > 1) {
                                                                                    ?>
                                                                                    <?php echo "and"; ?>
                                                                                    <?php
                                                                                    echo $countlike;
                                                                                    echo "&nbsp;";
                                                                                    echo "others";
                                                                                    ?> 
                                                                                <?php } ?>
                                                                            </div>
                                                                        </a>
                                                                    </div>
                                                                    <!-- show comment div start -->
                                                                </div>
                                                                <!-- like comment end -->
                                                            </div>
                                                            <?php
                                                            $i++;
                                                        }
                                                        ?>
                                                        <!-- slider image rotation end  -->
                                                        <a class="prev" style="left: 0px" onclick="plusSlides(-1)">&#10094;</a>
                                                        <a class="next" style="right: 0px"  onclick="plusSlides(1)">&#10095;</a>
                                                        <div class="caption-container">
                                                            <p id="caption"></p>
                                                        </div>
                                                    </div>
                                                </div>
                                                <!-- slider end -->
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="clearfix"></div>
            </div>
        </section>


        <!-- Bid-modal for this modal appear or not start -->
        <div class="modal fade message-box" id="query" role="dialog">
            <div class="modal-dialog modal-lm">
                <div class="modal-content">
                    <button type="button" class="profile-modal-close" id="query" data-dismiss="modal">&times;</button>       
                    <div class="modal-body">
                        <span class="mes">
                        </span>
                    </div>
                </div>
            </div>
        </div>
        <!-- Bid-modal for this modal appear or not  Popup Close -->
        <!-- Bid-modal-2  -->
        <div class="modal fade message-box" id="bidmodal-2" role="dialog">
            <div class="modal-dialog modal-lm">
                <div class="modal-content">
                    <button type="button" class="modal-close" data-dismiss="modal">&times;</button>       
                    <div class="modal-body">
                        <span class="mes">
                            <div id="popup-form">
                                <?php echo form_open_multipart(base_url('business_profile/user_image_insert'), array('id' => 'userimage', 'name' => 'userimage', 'class' => 'clearfix')); ?>
                                <input type="file" name="profilepic" accept="image/gif, image/jpeg, image/png" id="profilepic">
                                <input type="hidden" name="hitext" id="hitext" value="9">
                                <div class="popup_previred">
                                    <img id="preview" src="#" alt="your image"/>
                                </div>
                                <input type="submit" name="profilepicsubmit" id="profilepicsubmit" value="Save" >
                                <?php echo form_close(); ?>
                            </div>
                        </span>
                    </div>
                </div>
            </div>
        </div>
        <!-- Model Popup Close -->
        <!-- Bid-modal  -->
        <div class="modal fade message-box biderror" id="bidmodal" role="dialog" style="z-index: 999999;">
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
        <div class="modal fade message-box" id="likeusermodal" role="dialog" style="z-index: 999999 !important;">
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
        <?php echo $login_footer ?>
        <?php echo $footer; ?>
        <!--<script src="<?php // echo base_url('assets/js/jquery-ui.min.js?ver=' . time());    ?>"></script>-->
        <!--<script src="<?php // echo base_url('assets/js/demo/jquery-1.9.1.js?ver='.time());     ?>"></script>-->
        <!--<script src="<?php // echo base_url('assets/js/demo/jquery-ui-1.9.1.js?ver='.time());     ?>"></script>-->
        <script src="<?php echo base_url('assets/js/croppie.js?ver=' . time()); ?>"></script>
        <script src="<?php echo base_url('assets/js/bootstrap.min.js?ver=' . time()); ?>"></script>
        <script type="text/javascript" src="<?php echo base_url('assets/js/jquery.validate.min.js?ver=' . time()); ?>"></script>
        <script>
                                                            var base_url = '<?php echo base_url(); ?>';
        </script>
        <?php if (IS_BUSINESS_JS_MINIFY == '0') { ?>
            <script type="text/javascript" src="<?php echo base_url('assets/js/webpage/business-profile/photos.js?ver=' . time()); ?>"></script>
            <script type="text/javascript" defer="defer" src="<?php echo base_url('assets/js/webpage/business-profile/common.js?ver=' . time()); ?>"></script>
        <?php } else { ?>
            <script type="text/javascript" src="<?php echo base_url('assets/js_min/webpage/business-profile/photos.min.js?ver=' . time()); ?>"></script>
            <script type="text/javascript" defer="defer" src="<?php echo base_url('assets/js_min/webpage/business-profile/common.min.js?ver=' . time()); ?>"></script>
        <?php } ?>
    </body>
</html>