<!DOCTYPE html>
<html>
    <head>
        <title><?php echo $title; ?></title>
        <?php echo $head; ?>
        <link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/css/freelancer-hire.css?ver=' . time()); ?>">
    </head>
    <body class="page-container-bg-solid page-boxed">
        <?php echo $header; ?>
        <?php echo $freelancer_hire_header2_border; ?>

        <section>
            <div class="user-midd-section" id="paddingtop_fixed">
                <div class="container">
                    <div class="row">
                        <div class="col-md-3 col-sm-3">
                            <div class="add-post-button">
                                <a title="Back to Post" href="<?php echo base_url("freelancer-hire/projects"); ?>"><div class="back">
                                        <div class="but1">
                                            <?php echo $this->lang->line("back_to_post"); ?>
                                        </div>
                                    </div></a>
                            </div>
                        </div>
                        <div>
                            <?php
                            if ($this->session->flashdata('error')) {
                                echo '<div class="alert alert-danger">' . $this->session->flashdata('error') . '</div>';
                            }
                            if ($this->session->flashdata('success')) {
                                echo '<div class="alert alert-success">' . $this->session->flashdata('success') . '</div>';
                            }
                            ?>
                        </div>
                        <!-- middle div stat -->
                        <div class="col-md-7 col-sm-7 all-form-content">
                            <div class="common-form">
                                <div class="job-saved-box">
                                    <h3><?php echo $this->lang->line("applied_freelancer"); ?> </h3>
                                    <div class="contact-frnd-post">
                                        <div class="job-contact-frnd ">
                                            <?php
                                            if ($postdata) {
                                                foreach ($postdata as $row) {
                                                    ?> 
                                                    <div class="profile-job-post-detail clearfix">
                                                        <div class="profile-job-post-title-inside clearfix">
                                                            <div class="profile-job-profile-button clearfix">
                                                                <div class="profile-job-post-location-name-rec">
                                                                    <div style="display: inline-block; " class="fl">
                                                                        <div  class="buisness-profile-pic-candidate">
                                                                            <?php
                                                                            if ($row['freelancer_post_user_image']) {
                                                                                ?>
                                                                                <a href="<?php echo base_url('freelancer-work/freelancer-details/' . $row['user_id'] . '?page=freelancer_hire'); ?>" title="<?php echo ucwords($row['freelancer_post_fullname']) . ' ' . ucwords($row['freelancer_post_username']); ?>"> <img src="<?php echo FREE_POST_PROFILE_THUMB_UPLOAD_URL . $row['freelancer_post_user_image']; ?>" alt="<?php echo ucwords($row['freelancer_post_fullname']) . ' ' . ucwords($row['freelancer_post_username']); ?>"> </a>
                                                                                <?php
                                                                            } else {
                                                                                $post_fname = $row['freelancer_post_fullname'];
                                                                                $post_lname = $row['freelancer_post_username'];
                                                                                $sub_post_fname = substr($post_fname, 0, 1);
                                                                                $sub_post_lname = substr($post_lname, 0, 1);
                                                                                ?>
                                                                                <div class="post-img-div">
                                                                                    <?php echo ucfirst(strtolower($sub_post_fname)) . ucfirst(strtolower($sub_post_lname)); ?>
                                                                                </div>
                                                                                <?php
                                                                            }
                                                                            ?>
                                                                        </div>
                                                                    </div>
                                                                    <div class="designation_rec fl">
                                                                        <ul>
                                                                            <li>        
                                                                                <a href="<?php echo base_url('freelancer-work/freelancer-details/' . $row['user_id'] . '?page=freelancer_hire' . "&post_id=" . $postid); ?>" title="<?php echo ucwords($row['freelancer_post_fullname']) . ' ' . ucwords($row['freelancer_post_username']); ?>"><h6>
                                                                                        <?php echo ucwords($row['freelancer_post_fullname']) . ' ' . ucwords($row['freelancer_post_username']); ?></h6>
                                                                                </a>
                                                                            </li>
                                                                            <li style="display: block;" ><a href="<?php echo base_url('freelancer-work/freelancer-details/' . $row['user_id'] . '?page=freelancer_hire' . "&post_id=" . $postid); ?>" title="<?php echo ucwords($row['freelancer_post_fullname']) . ' ' . ucwords($row['freelancer_post_username']); ?>" > <?php
                                                                                    if ($row['designation']) {
                                                                                        echo $row['designation'];
                                                                                    } else {
                                                                                        echo "Designation";
                                                                                    }
                                                                                    ?> </a></li>
                                                                        </ul>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>  <div class="profile-job-post-title clearfix">
                                                            <div class="profile-job-profile-menu">
                                                                <ul class="clearfix">
                                                                    <li><b><?php echo $this->lang->line("skill"); ?></b><span>
                                                                            <?php
                                                                            $comma = ", ";
                                                                            $k = 0;
                                                                            $aud = $row['freelancer_post_area'];
                                                                            $aud_res = explode(',', $aud);

                                                                            if (!$row['freelancer_post_area']) {

                                                                                echo $row['freelancer_post_otherskill'];
                                                                            } else if (!$row['freelancer_post_otherskill']) {
                                                                                foreach ($aud_res as $skill) {
                                                                                    if ($k != 0) {
                                                                                        echo $comma;
                                                                                    }
                                                                                    $cache_time = $this->db->get_where('skill', array('skill_id' => $skill))->row()->skill;

                                                                                    echo $cache_time;
                                                                                    $k++;
                                                                                }
                                                                            } else if ($row['freelancer_post_area'] && $row['freelancer_post_otherskill']) {

                                                                                foreach ($aud_res as $skill) {
                                                                                    if ($k != 0) {
                                                                                        echo $comma;
                                                                                    }
                                                                                    $cache_time = $this->db->get_where('skill', array('skill_id' => $skill))->row()->skill;

                                                                                    echo $cache_time;
                                                                                    $k++;
                                                                                } echo "," . $row['freelancer_post_otherskill'];
                                                                            }
                                                                            ?>   
                                                                        </span>    
                                                                    </li>

                                                                    <?php
                                                                    $cityname = $this->db->get_where('cities', array('city_id' => $row['freelancer_post_city']))->row()->city_name;
                                                                    $countryname = $this->db->select('country_name')->get_where('countries', array('country_id' => $row['freelancer_post_country']))->row()->country_name;
                                                                    ?>
                                                                    <li><b><?php echo $this->lang->line("location"); ?></b><span> <?php
                                                                            if ($cityname || $countryname) {
                                                                                if ($cityname) {
                                                                                    echo $cityname . ",";
                                                                                }
                                                                                if ($countryname) {
                                                                                    echo $countryname;
                                                                                }
                                                                            }
                                                                            ?></span></li>
                                                                    <li><b><?php echo $this->lang->line("skill_description"); ?></b> <span> <p>
                                                                                <?php
                                                                                if ($row['freelancer_post_skill_description']) {
                                                                                    echo $row['freelancer_post_skill_description'];
                                                                                } else {
                                                                                    echo PROFILENA;
                                                                                }
                                                                                ?></p></span>
                                                                    </li>

                                                                    <li><b><?php echo $this->lang->line("avaiability"); ?></b><span>
                                                                            <?php
                                                                            if ($row['freelancer_post_work_hour']) {
                                                                                echo $row['freelancer_post_work_hour'] . "  " . "Hours per week ";
                                                                            } else {
                                                                                echo PROFILENA;
                                                                            }
                                                                            ?></span>
                                                                    </li>
                                                                    <li><b><?php echo $this->lang->line("rate_hourly"); ?></b> <span>
                                                                            <?php
                                                                            if ($row['freelancer_post_hourly']) {
                                                                                $currency = $this->db->get_where('currency', array('currency_id' => $row['freelancer_post_ratestate']))->row()->currency_name;
                                                                                if ($row['freelancer_post_fixed_rate'] == '1') {
                                                                                    $rate_type = 'Fixed';
                                                                                } else {
                                                                                    $rate_type = 'Hourly';
                                                                                }
                                                                                echo $row['freelancer_post_hourly'] . "   " . $currency . "  " . $rate_type;
                                                                                ;
                                                                            } else {
                                                                                echo PROFILENA;
                                                                            }
                                                                            ?></span>
                                                                    </li>
                                                                    <li><b><?php echo $this->lang->line("total_experiance"); ?></b>
                                                                        <span> <?php
                                                                            if ($row['freelancer_post_exp_year'] || $row['freelancer_post_exp_month']) {
                                                                                if ($row['freelancer_post_exp_month'] == '12 month' && $row['freelancer_post_exp_year'] == '') {
                                                                                    echo "1 year";
                                                                                } elseif ($row['freelancer_post_exp_month'] == '12 month' && $row['freelancer_post_exp_year'] == '0 year') {
                                                                                    echo "1 year";
                                                                                } elseif ($row['freelancer_post_exp_month'] == '12 month' && $row['freelancer_post_exp_year'] != '') {
                                                                                    $year = explode(' ', $row['freelancer_post_exp_year']);
                                                                                    // echo $year;
                                                                                    $totalyear = $year[0] + 1;
                                                                                    echo $totalyear . $this->lang->line("year");
                                                                                } elseif ($row['freelancer_post_exp_year'] != '' && $row['freelancer_post_exp_month'] == '') {
                                                                                    echo $row['freelancer_post_exp_year'];
                                                                                } elseif ($row['freelancer_post_exp_year'] != '' && $row['freelancer_post_exp_month'] == '0 month') {

                                                                                    echo $row['freelancer_post_exp_year'];
                                                                                } else {

                                                                                    echo $row['freelancer_post_exp_year'] . ' ' . $row['freelancer_post_exp_month'];
                                                                                }
                                                                            } else {
                                                                                echo PROFILENA;
                                                                            }
                                                                            ?>
                                                                        </span>
                                                                    </li>
                                                                </ul>
                                                            </div>

                                                            <div class="profile-job-profile-button clearfix">
                                                                <div class="apply-btn fr">
                                                                    <?php
                                                                    $userid = $this->session->userdata('aileenuser');
                                                                    $contition_array = array('from_id' => $userid, 'to_id' => $row['user_id'], 'save_type' => '2', 'status' => '2');
                                                                    $savedata = $this->common->select_data_by_condition('save', $contition_array, $data = '*', $sortby = '', $orderby = '', $limit = '', $offset = '', $join_str = array(), $groupby = '');
                                                                    ?>

                                                                    <?php if ($userid != $row['user_id']) { ?>
                                                                    <a title="Message" class="msg_btn" href="<?php echo base_url('chat/abc/3/4/' . $row['user_id']); ?>"><?php echo $this->lang->line("message"); ?></a>
                                                                        <?php
                                                                        $contition_array = array('invite_user_id' => $row['user_id'], 'post_id' => $postid, 'profile' => 'freelancer');
                                                                        $userdata = $this->common->select_data_by_condition('user_invite', $contition_array, $data = '*', $sortby = '', $orderby = '', $limit = '', $offset = '', $join_str = array(), $groupby = '');
                                                                        if ($userdata) {
                                                                            ?>
                                                                    <a title="Selected" href="javascript:void(0);" class="button invited" id="<?php echo 'invited' . $row['user_id']; ?>" style="cursor: default;"><?php echo $this->lang->line("selected"); ?></a>       
                                                                        <?php } else { ?>
                                                                    <a title="Select" class=""  href="javascript:void(0);" class="button invite_border" id="<?php echo 'invited' . $row['user_id']; ?>" onClick="inviteuserpopup(<?php echo $row['user_id']; ?>)"><?php echo $this->lang->line("select"); ?></a>
                                                                        <?php } ?>

                                                                        <?php
                                                                        if ($savedata) {
                                                                            ?> 
                                                                    <a title="Shortlisted" class="saved" href="javascript:void(0);">Shortlisted</a>

                                                                            <?php
                                                                        } else {
                                                                            ?>
                                                                            <input type="hidden" id="<?php echo 'hideenuser' . $row['user_id']; ?>" value= "<?php echo $data[0]['save_id']; ?>">
                                                                            <input type="hidden" id="<?php echo 'hideenpostid'; ?>" value= "<?php echo $postid; ?>">

                                                                            <a id="<?php echo $row['user_id']; ?>" onClick="shortlistpopup(<?php echo $row['user_id']; ?>)" href="javascript:void(0);" class="<?php echo 'saveduser' . $row['user_id']; ?>">Shortlist</a>
                                                                            <?php
                                                                        }
                                                                    }
                                                                    ?>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <?php
                                                }
                                            } else {
                                                ?>
                                                <div class="art-img-nn">
                                                    <div class="art_no_post_img">
                                                        <img src="<?php echo base_url('assets/img/free-no1.png') ?>" alt="No applied candidate">
                                                    </div>
                                                    <div class="art_no_post_text"><?php echo $this->lang->line("no_applied_freelancer"); ?></div> 
                                                </div>
                                                <!--                                                <div class="text-center rio">
                                                                                                    <h4 class="page-heading  product-listing" ><?php //echo $this->lang->line("no_applied_freelancer");   ?></h4>
                                                                                                </div>-->
                                                <?php
                                            }
                                            ?>
                                            <div class="col-md-1">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- middle div end -->
                    </div>
                </div>
            </div>
        </section>
        <?php echo $footer; ?>
        <!-- Model Popup Open -->
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
        <!-- Model Popup Close -->
        <script src="<?php echo base_url('assets/js/bootstrap.min.js?ver=' . time()); ?>">
        </script>
        <script>
            var base_url = '<?php echo base_url(); ?>';
        </script>
        <script type="text/javascript" src="<?php echo base_url('assets/js/webpage/freelancer-hire/freelancer_apply_list.js?ver=' . time()); ?>"></script>
        <script   type="text/javascript" src="<?php echo base_url('assets/js/webpage/freelancer-hire/freelancer_hire_common.js?ver=' . time()); ?>"></script>
        <script>
            function inviteuserpopup(abc) {
                $('.biderror .mes').html("<div class='pop_content'>Do you want to select this freelancer for your project?<div class='model_ok_cancel'><a class='okbtn' id=" + abc + " onClick='inviteuser(" + abc + ")' href='javascript:void(0);' data-dismiss='modal'>Yes</a><a class='cnclbtn' href='javascript:void(0);' data-dismiss='modal'>No</a></div></div>");
                $('#bidmodal').modal('show');
            }
            function inviteuser(clicked_id)
            {
                var post_id = "<?php echo $postid; ?>";
                $.ajax({
                    type: 'POST',
                    url: '<?php echo base_url() . "freelancer/free_invite_user" ?>',
                    data: 'post_id=' + post_id + '&invited_user=' + clicked_id,
                    dataType: 'json',
                    success: function (data) { //alert(data);
                        $('#' + 'invited' + clicked_id).html(data.status).addClass('button invited').removeClass('invite_border').removeAttr("onclick");
                        $('#' + 'invited' + clicked_id).css('cursor', 'default');
                        if (data.notification.notification_count != 0) {
                            var notification_count = data.notification.notification_count;
                            var to_id = data.notification.to_id;
                            show_header_notification(notification_count, to_id);
                        }
                    }
                });
            }
        </script>
    </body>
</html>