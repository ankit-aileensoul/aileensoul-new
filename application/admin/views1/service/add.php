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

                        <?php if ($this->session->flashdata('success')) { ?>
                            <div class="alert fade in alert-success">
                                <i class="icon-remove close" data-dismiss="alert"></i>
                                <?php echo $this->session->flashdata('success'); ?>
                            </div>
                        <?php } ?>
                        <?php if ($this->session->flashdata('error')) { ?>  
                            <div class="alert fade in alert-danger" >
                                <i class="icon-remove close" data-dismiss="alert"></i>
                                <?php echo $this->session->flashdata('error'); ?>
                            </div>
                        <?php } ?>


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
                        $form_attr = array('id' => 'add_service_frm','enctype' => 'multipart/form-data');
                        echo form_open_multipart('service/add', $form_attr);
                        ?>
                        <div class="box-body">
                           
                           
                            
                            <div class="form-group col-sm-10">
                                <label for="inputEmail3" class="col-sm-2 control-label">Service Name</label>
                                <div class="col-sm-6">
                                    <input type="text" class="form-control" name="service_title" id="service_title" placeholder="Service Name">
                                </div>
                            </div>
                            
                            <div class="form-group col-sm-10">
                                <label for="inputEmail3" class="col-sm-2 control-label">Sort Description</label>
                                <div class="col-sm-6">
                                    <input type="text" class="form-control" name="sort_description" id="sort_description" placeholder="Sort Description">
                                </div>
                            </div>
                            
                            <div class="form-group col-sm-10">
                                <label for="inputEmail3" class="col-sm-2 control-label">Service Description </label>
                                <div class="col-sm-6">
                                     <textarea class="form-control ckeditor" id="desc" name="service_description" rows="10" cols="80"></textarea> 
                                </div>
                            </div>
                            
                            

                            <div class="form-group col-sm-10">
                                <label for="inputEmail3" class="col-sm-2 control-label">Service Image *<br>(gif|jpg|png)</label>
                                <div class="col-sm-6">
                                    <input type="file" name="service_image" id="service_image"   />
                                </div>
                            </div>
                            
                            
                           
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
        

        $("#add_service_frm").validate({
            
            rules: {
               
                service_title: {
                   required: true,
                },
                sort_description: {
                   required: true,
                },
                desc:{
                   required: true,
                },
                service_price:{
                   required: true,
                },
                service_image:{
                   required: true,
                }
            },
            messages:{
               
                service_title: {
                    required: "Service name is required",
                },
                sort_description: {
                    required: "Sort description is required",
                },
                desc: {
                   required: "Service description  is required",
                },
                service_price: {
                   required: "Service price is required",
                },
                service_image: {
                   required: "Service image  is required",
                }

            },
        });
       
    

    });
</script>