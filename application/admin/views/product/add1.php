<?php
echo $header;
echo $leftmenu;
?>

<div class="content-wrapper">
    <section class="content-header">
        <h1>
            <?php echo $module_name; ?>
            <small>Control panel</small>
        </h1>
        <ol class="breadcrumb">
            <li>
                <a href="<?php echo base_url('dashboard'); ?>">
                    <i class="fa fa-dashboard"></i>
                    Home
                </a>
            </li>
            <li class="active"><?php echo $module_name; ?></li>
        </ol>
    </section>
    <section class="content-header">
        <?php if ($this->session->flashdata('success')) { ?>
            <div class="callout callout-success">
                <p><?php echo $this->session->flashdata('success'); ?></p>
            </div>
        <?php } ?>
        <?php if ($this->session->flashdata('error')) { ?>  
            <div class="callout callout-danger" >
                <p><?php echo $this->session->flashdata('error'); ?></p>
            </div>
        <?php } ?>

    </section>
    <!-- Main content -->
    <section class="content">
        <div class="row">

            <div class="col-md-12">

                <div class="box box-info">
                    <div class="box-header with-border">
                        <h3 class="box-title"><?php echo $section_title; ?></h3>
                    </div><!-- /.box-header -->
                    <!-- form start -->
                    <?php
                    $form_attr = array('id' => 'add_product_frm', 'enctype' => 'multipart/form-data');
                    echo form_open_multipart('product/add', $form_attr);
                    ?>
                    <div class="box-body">

                        <div class="well">
                            <div id="datetimepicker2" class="input-append">
                                <input data-format="MM/dd/yyyy HH:mm:ss PP" type="text"></input>
                                <span class="add-on">
                                    <i data-time-icon="icon-time" data-date-icon="icon-calendar">
                                    </i>
                                </span>
                            </div>
                        </div>



                        <!-- product name start -->
                        <div class="form-group col-sm-10">
                            <label for="productname" name="product_name" id="page_title">Product Name*</label>
                            <input type="text" class="form-control" name="name" id="name" value="">
                        </div>
                        <!-- product name end -->
                        <!-- product category start -->
                        <div class="form-group col-sm-5">
                            <div class="form-group">
                                <label>Product Category*</label>
                                <select name="category_id" id="category_id" class="form-control select2" style="width: 100%;">
                                    <option value="">Select Category</option>
                                    <?php
                                    foreach ($category_list as $category) {
                                        ?>
                                        <option value="<?php echo $category['id']; ?>"><?php echo $category['name']; ?></option>
                                        <?php
                                    }
                                    ?>
                                </select>
                            </div>
                        </div>
                        <!-- product category end -->

                        <!-- product Manufacture start -->
                        <div class="form-group col-sm-5">
                            <div class="form-group">
                                <label>Product Manufacture*</label>
                                <select name="manufacture_id" id="manufacture_id" class="form-control select2" style="width: 100%;">
                                    <option value="">Select Manufacture</option>
                                    <?php
                                    foreach ($manufacturer_list as $manufacturer) {
                                        ?>
                                        <option value="<?php echo $manufacturer['id']; ?>"><?php echo $manufacturer['name']; ?></option>
                                        <?php
                                    }
                                    ?>
                                </select>
                            </div>
                        </div>
                        <!-- product Manufacture end -->
                        <!-- product price start -->
                        <div class="form-group col-sm-5">
                            <label for="productprice" name="product_price" id="product_price">Product Price*</label>
                            <input type="text" class="form-control" name="cost_price" id="cost_price" value="">
                        </div>
                        <!-- product price end -->
                        <!-- product selling price start -->
                        <div class="form-group col-sm-5">
                            <label for="productsellingprice" name="product_selling_price" id="product_selling_price">Product Selling Price*</label>
                            <input type="text" class="form-control" name="sell_price" id="sell_price" value="">
                        </div>
                        <!-- product selling price end -->

                        <!-- product selling price start -->
                        <div class="form-group col-sm-5">
                            <label for="productavailablefor" name="product_availablefor" id="product_availablefor">Product Available For*</label>
                            <!--<input type="text" class="form-control" name="name" id="name" value="">-->
                            <div class="form-group">
                                <label>
                                    <input type="radio" name="available_for" value="buy" id="buy" class="available_for minimal" checked>
                                    Buy
                                </label>
                                <label>
                                    <input type="radio" name="available_for" value="bid" id="bid" class="available_for minimal">
                                    Bid
                                </label>
                            </div>
                        </div>
                        <!-- product selling price end -->
                        <!-- product stock start -->
                        <div class="form-group col-sm-5 stock">
                            <label for="productstock" name="product_stock" id="product_stock">Product Stock*</label>
                            <input type="number" class="form-control" name="stock" id="stock" value="" min="1">
                        </div>
                        <!-- product stock end -->
                        <!-- product bid time start -->


                        <!--<div class="form-group col-sm-3 pull-center bidding clockpicker" data-placement="right" data-align="top" data-autoclose="true">
                            <label for="productbiddingtime" name="product_bidding_time" id="product_bidding_time">Product Bidding Time*</label>
                            <input type="text" class="form-control input-small" name="bid_time" id="bid_time timepicker2" value="12:00">
                        </div>

                        <script type="text/javascript">
                            $('.clockpicker').clockpicker();
                        </script> -->
                        <!-- product bid time end -->

                        <!-- product available date -->
                        <div class="form-group col-sm-5">
                            <label for="productavailabledate" name="product_available_date" id="product_available_date">Availble Date*</label>
                            <input type="text" class="form-control" name="available_date" id="available_date" value="">
                        </div>
                        <!-- product available date -->
                        <!-- product description start -->
                        <div class="form-group col-sm-10">
                            <label for="productdescription" name="product_description" id="product_description">Description *</label>
                            <?php echo form_textarea(array('name' => 'description', 'id' => 'description editor1', 'class' => "textarea", 'style' => 'width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;', 'value' => '')); ?><br>
                        </div>
                        <!-- product description end -->
                        <!-- product image start -->
                        <div class="form-group col-sm-10">
                            <label for="productimage" name="productimage" id="productimage">Image *</label>
                            <input type="file" class="form-control" name="image" id="image" value="" style="border: none;">
                        </div>
                        <!-- product image end -->
                        <!-- product sub image start -->
                        <div class="form-group col-sm-10">
                            <label for="productsubimage" name="productsubimage" id="productsubimage">Sub Image</label>
                            <input type="file" class="form-control" name="sub_image[]" multiple="5" id="sub_image" value="" style="border: none;">
                        </div>
                        <!-- product sub image end -->
                    </div><!-- /.box-body -->
                    <div class="box-footer">
                        <?php
                        $save_attr = array('id' => 'btn_save', 'name' => 'btn_save', 'value' => 'Save', 'class' => 'btn btn-primary');
                        echo form_submit($save_attr);
                        ?>    
                        <button type="button" onclick="window.history.back();" class="btn btn-default">Back</button>
                        <!--<button type="submit" class="btn btn-info pull-right">Sign in</button>-->
                    </div><!-- /.box-footer -->
                    </form>
                </div><!-- /.box -->


            </div><!--/.col (right) -->
        </div>   <!-- /.row -->
    </section><!-- /.content -->
</div><!-- /.content-wrapper -->
<?php echo $footer; ?>

<script type="text/javascript">
    //validation for edit email formate form
    $(document).ready(function () {


        $("#add_product_frm").validate({
            rules: {
                name: {
                    required: true,
                },
                category_id: {
                    required: true,
                },
                manufacture_id: {
                    required: true,
                },
                cost_price: {
                    required: true,
                    digits: true,
                },
                sell_price: {
                    required: true,
                    digits: true,
                },
                stock: {
                    required: true,
                },
                available_for: {
                    required: true,
                },
                bid_time: {
                    required: true,
                },
                description: {
                    required: true,
                }
            },
            messages:
                    {
                        name: {
                            required: "Please enter product name",
                        },
                        category_id: {
                            required: "Please enter category",
                        },
                        manufacture_id: {
                            required: "Please enter manufacturers",
                        },
                        cost_price: {
                            required: "Please enter product price",
                            digits: "Product cost price should be numeric",
                        },
                        sell_price: {
                            required: "Please enter product selling price",
                            digits: "Product sell price should be numeric",
                        },
                        stock: {
                            required: "Please enter product stock",
                        },
                        available_for: {
                            required: "Please enter product available for",
                        },
                        bid_time: {
                            required: "Please enter product bidding time",
                        },
                        description: {
                            required: "Please enter product description",
                        }
                    },
        });
        $(".bidding").hide();
        $(".available_for").click(function () {
            var available_for = this.value;
            if (available_for == 'buy')
            {
                $(".bidding").hide();
                $(".stock").show();
            }
            if (available_for == 'bid')
            {
                $(".bidding").show();
                $(".stock").hide();
            }
        });

    });

</script>

<script>
    $(function () {
        // Replace the <textarea id="editor1"> with a CKEditor
        // instance, using default configuration.
        //   CKEDITOR.replace('editor1');
        //bootstrap WYSIHTML5 - text editor
        $(".textarea1").wysihtml5();
    });
</script>
<script language="javascript" type="text/javascript">
    $(document).ready(function () {
        $('.callout-danger').delay(3000).hide('700');
        $('.callout-success').delay(3000).hide('700');
    });
</script>
<script type="text/javascript">
    $(function () {
        $('#datetimepicker2').datetimepicker({
            language: 'en',
            pick12HourFormat: true
        });
    });
</script>
