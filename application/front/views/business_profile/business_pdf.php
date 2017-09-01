<!DOCTYPE html>
<html>
    <head>
        <title><?php echo $title; ?></title>
        <?php echo $head; ?>
        <!--<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">-->
        <link rel="stylesheet" type="text/css" href="<?php echo base_url('css/jquery.jMosaic.css?ver='.time()); ?>">
        <link rel="stylesheet" type="text/css" href="<?php echo base_url('css/1.10.3.jquery-ui.css?ver='.time()); ?>">
        <link rel="stylesheet" href="<?php echo base_url('assets/css/croppie.css?ver='.time()); ?>">
        <link rel="stylesheet" type="text/css" href="<?php echo base_url('css/profiles/business/business.css?ver='.time()); ?>">
        <script type="text/javascript">
            //For Scroll page at perticular position js Start
            $(document).ready(function () {
                $('html,body').animate({scrollTop: 330}, 500);
            });
            //For Scroll page at perticular position js End
        </script>
    </head>
    <body class="page-container-bg-solid page-boxed pushmenu-push">
        <?php echo $header; ?>
        <?php echo $business_header2_border; ?> 
        <section>
            <?php echo $business_common; ?>
            <div class="container">
                <div class="user-midd-section">
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
                                                    $contition_array = array('user_id' => $businessdata1[0]['user_id']);
                                                    $businessimage = $this->data['businessimage'] = $this->common->select_data_by_condition('business_profile_post', $contition_array, $data = '*', $sortby = '', $orderby = '', $limit = '', $offset = '', $join_str = array(), $groupby = '');
                                                    foreach ($businessimage as $val) {
                                                        $contition_array = array('post_id' => $val['business_profile_post_id'], 'is_deleted' => '1', 'image_type' => '2');
                                                        $busmultipdf = $this->data['busmultipdf'] = $this->common->select_data_by_condition('post_image', $contition_array, $data = '*', $sortby = 'post_id', $orderby = 'DESC', $limit = '', $offset = '', $join_str = array(), $groupby = '');
                                                        $multiplepdf[] = $busmultipdf;
                                                    }
                                                    ?>
                                                    <?php
                                                    $allowed = array('pdf');
                                                    foreach ($multiplepdf as $mke => $mval) {
                                                        foreach ($mval as $mke1 => $mval1) {
                                                            $ext = pathinfo($mval1['image_name'], PATHINFO_EXTENSION);
                                                            if (in_array($ext, $allowed)) {
                                                                $singlearray3[] = $mval1;
                                                            }
                                                        }
                                                    }
                                                    ?>
                                                    <?php
                                                    if ($singlearray3) {

                                                        foreach ($singlearray3 as $pdfv) {
                                                            ?>
                                                            <li>
                                                                <div class="main_box_pdf">
                                                                    <div class="main_box_img">
                                                                        <a href="<?php echo base_url('business_profile/creat_pdf/' . $pdfv['image_id']) ?>">
                                                                            <div class="" style="margin: 0!important;">
                                                                                <img src="<?php echo base_url('images/PDF.jpg') ?>" style="height: 100%; width: 100%;">
                                                                            </div>
                                                                        </a>
                                                                    </div>
                                                                    <?php
                                                                    $contition_array = array('business_profile_post_id' => $pdfv['post_id']);
                                                                    $businesstitle = $this->data['businesstitle'] = $this->common->select_data_by_condition('business_profile_post', $contition_array, $data = '*', $sortby = '', $orderby = '', $limit = '', $offset = '', $join_str = array(), $groupby = '');
                                                                    ?>
                                                                    <div class="pdf_name"><a title="Zalak infotech .in pdf" href="<?php echo base_url('business_profile/creat_pdf/' . $pdfv['image_id']) ?>"><?php echo ucfirst(strtolower($businesstitle[0]['product_name'])); ?></a> </div>
                                                                </div>
                                                            </li>
                                                            <?php
                                                        }
                                                    } else {
                                                        ?>
                                                        <div class="art_no_pva_avl">
                                                            <div class="art_no_post_img">
                                                                <img src="<?php echo base_url('images/020.png'); ?>"  >
                                                            </div>
                                                            <div class="art_no_post_text1">
                                                                No Pdf Available.
                                                            </div>
                                                        </div>

                                                    <?php } ?>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="clearfix"></div>
                    </div>
                </div>
            </div>
        </section>



        <!-- Bid-modal for this modal appear or not start -->
        <div class="modal fade message-box" id="query" role="dialog">
            <div class="modal-dialog modal-lm">
                <div class="modal-content">
                    <button type="button" class="modal-close" id="query" data-dismiss="modal">&times;</button>       
                    <div class="modal-body">
                        <span class="mes">
                        </span>
                    </div>
                </div>
            </div>
        </div>
        <!-- Bid-modal for this modal appear or not  Popup Close -->

        
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
        <!-- Model Popup Close -->
        <!-- Bid-modal-2  -->
        <div class="modal fade message-box" id="bidmodal-2" role="dialog">
            <div class="modal-dialog modal-lm" style="z-index: 9999;">
                <div class="modal-content">
                    <button type="button" class="modal-close" data-dismiss="modal">&times;</button>       
                    <div class="modal-body">
                        <span class="mes">
                            <div id="popup-form">
                                <?php echo form_open_multipart(base_url('business_profile/user_image_insert'), array('id' => 'userimage', 'name' => 'userimage', 'class' => 'clearfix')); ?>
                                <input type="file" name="profilepic" accept="image/gif, image/jpeg, image/png" id="profilepic">
                                <input type="hidden" name="hitext" id="hitext" value="12">
                                <div class="popup_previred">    <img id="preview" src="#" alt="your image" /></div>
                                <input type="submit" name="profilepicsubmit" id="profilepicsubmit" value="Save" >
                                <?php echo form_close(); ?>
                            </div>
                        </span>
                    </div>
                </div>
            </div>
        </div>
        <!-- Model Popup Close -->
        <?php echo $footer; ?>
        <!--<script src="<?php // echo base_url('js/jquery-ui.min.js?ver='.time()); ?>"></script>-->
        <!--<script src="<?php // echo base_url('js/demo/jquery-1.9.1.js?ver='.time()); ?>"></script>-->
        <!--<script src="<?php // echo base_url('js/demo/jquery-ui-1.9.1.js?ver='.time()); ?>"></script>-->
        <script src="<?php echo base_url('js/jquery.jMosaic.js?ver='.time()); ?>"></script>
        <script src="<?php echo base_url('assets/js/croppie.js?ver='.time()); ?>"></script>
        <script src="<?php echo base_url('js/bootstrap.min.js?ver='.time()); ?>"></script>
        <script type="text/javascript" src="<?php echo base_url('js/jquery.validate.js?ver='.time()); ?>"></script>
        <script>
            var base_url = '<?php echo base_url(); ?>';
            var data = <?php echo json_encode($demo); ?>;
            var data1 = <?php echo json_encode($city_data); ?>;
        </script>
        <script type="text/javascript" src="<?php echo base_url('js/webpage/business-profile/pdf.js?ver='.time()); ?>"></script>
    </body>
</html>
