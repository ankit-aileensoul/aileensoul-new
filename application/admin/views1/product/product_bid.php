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



    <!-- Content Header (Page header) -->




    <!-- Main content -->
    <section class="content">
        <div class="row" >
            <div class="col-xs-12" >
                <?php if ($this->session->flashdata('success')) { ?>
                    <div class="callout callout-success">
                        <p><?php echo $this->session->flashdata('success'); ?></p>
                    </div>
                <?php } ?>
                <?php if ($this->session->flashdata('error')) { ?>  
                    <div class="callout callout-danger">
                        <p><?php echo $this->session->flashdata('error'); ?></p>
                    </div>
                <?php } ?>
            </div>
        </div>


        <div class="row">
            <div class="col-xs-12">
                <div class="box">
                    <div class="box-header">
                        <h3 class="box-title">Products</h3>
                    </div>

                    <!-- /.box-header -->
                    <div class="box-body">
                        <table id="example1" class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>No.</th>
                                    <th>User Name</th>
                                    <th>Bid Coins</th>
                                    <th>Bid Date</th>
                                    <th>Bid Status</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $i = 1;
                                foreach ($product_bid_detail as $product) {
                                    if ($product['bid_status'] == 'won') {
                                        ?>
                                        <tr style="background-color:#E9D171;">
                                            <?php
                                        } else {
                                            ?>
                                        <tr>
                                        <?php }
                                        ?>
                                        <td><?php echo $i ?></td>
                                        <td><?php echo $product['full_name'] ?></td>
                                        <td><?php echo $product['bid_coins'] ?></td>
                                        <td><?php echo $product['bid_datetime'] ?></td>
                                        <td><?php echo $product['bid_status'] == 'won' ? 'Won' : '-' ?></td>
                                    </tr>
    <?php
    $i = $i + 1;
}
?>
                            </tbody>
                        </table>
                    </div>
                    <!-- /.box-body -->
                </div>
                <!-- /.box -->


                </tbody>
                <tfoot>

                </tfoot>
                </table>
            </div><!-- /.box -->


        </div><!-- /.col -->
</div><!-- /.row -->
</section><!-- /.content -->
</div><!-- /.content-wrapper -->
<div class="modal fade" id="confirm-delete" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                <h4 class="modal-title" id="frm_title">Delete Conformation</h4>
            </div>
            <div class="modal-body">
                Are you sure want to delete this product?
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                <a href="#" class="btn btn-danger danger">Delete</a>
            </div>
        </div>
    </div>
</div>
<?php echo $footer; ?>

<script type="text/javascript">

    $(document).ready(function () {
        $('#confirm-delete').on('show.bs.modal', function (e) {
            $(this).find('.danger').attr('href', $(e.relatedTarget).data('href'));
        });

        $('#search_frm').submit(function () {
            var value = $('#search_keyword').val();
            if (value == '')
                return false;
        });


        $('#checkedall').click(function (service) {
            if (this.checked) {
                // Iterate each checkbox
                $('.deletes').each(function () {
                    this.checked = true;
                });
            }
            else {
                $('.deletes').each(function () {
                    this.checked = false;
                });
            }
        });

        $('.deletes').click(function (service) {
            var flag = 0;
            $('.deletes').each(function () {
                if (this.checked == false) {
                    flag++;
                }
            });
            if (flag) {
                $('.checkedall').prop('checked', false);
            }
            else {
                $('.checkedall').prop('checked', true);
            }


        });



    });
</script>
<!-- page script -->
<script>
    $(function () {
        $("#example1").DataTable();
        $('#example2').DataTable({
            "paging": true,
            "lengthChange": false,
            "searching": false,
            "ordering": true,
            "info": true,
            "autoWidth": false
        });
    });
</script>
<script language="javascript" type="text/javascript">
    $(document).ready(function () {
        $('.callout-danger').delay(3000).hide('700');
        $('.callout-success').delay(3000).hide('700');
    });
</script>
<style type="text/css">
    .btn-primary{
        margin-top: 2px;
    }
</style>