
<div class="alert alert-success alert-dismissible bg-success text-white border-0 fade show" style="display: none;" role="alert">
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">×</span>
    </button>
    <strong>Success - </strong> successfully added profile data.
</div>

<table class="table table-striped search-table v-middle">
    <thead class="header-item">
        <th width="1" class="text-center"> # </th>
        <th class="text-dark font-weight-bold">NAME</th>
        <th class="text-dark font-weight-bold text-center">DATA</th>
    </thead>
    <tbody>

        <?php $no=1; foreach ($data as $key => $value){ if(@$value['local-address']){  ?>
        <tr>
            <td><?php echo $no++ ?></td>
            <td><?php echo $value['name'] ?></td>
            <td>
                <table class="table table-striped search-table v-middle">
                    <thead class="header-item">
                        <th width="1" class="text-center"> # </th>
                        <th width="35%" class="text-dark font-weight-bold">NAME</th>
                        <th width="23%" class="text-dark font-weight-bold">SPEED</th>
                        <th width="32%" class="text-dark font-weight-bold">HARGA</th>
                        <th width="10%" class="text-dark font-weight-bold text-center">EDIT</th>
                    </thead>
                    <tbody>
                    <?php 
                        $no2 = 1;
                        $new = $ct->where(['router_id'=>$sess['router_id'],'profile_id'=>$value['.id']])->findAll();
                        foreach ($new as $result => $detail) { ?>
                         <td><?php echo $no2++ ?></td>
                         <td><?php echo $detail['name'] ?></td>
                         <td><?php echo $detail['upload'].'Mb/'.$detail['download'].'Mb' ?></td>
                         <td><?php echo rupiah($detail['harga']) ?></td>
                         <td class="text-center">
                            <div class="action-btn">
                                <a href="javascript:void(0)" data-size="" data-button="Save" data-title="Add Category" data-url="http://pancanemix.test/add/view_customer_category"  class="text-info panca-mod"><i class="fas fa-edit "></i></a>
                            </div>
                         </td>





                        
                    <?php  } ?>

                       
                    </tbody>
                </table>
            </td>
        </tr>
            
        <?php }} ?>

    </tbody>
</table>

<?php if (@$_GET['success']): ?>
    <script type="text/javascript">
    setTimeout(function() {
            $('.alert-success ').fadeIn(1000);
            $('.alert-success ').fadeOut(5000);
        },200);
    </script>
<?php endif ?>


