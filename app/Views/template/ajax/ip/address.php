<table class="table table-striped search-table v-middle">
    <thead class="header-item">
        <th class="text-center"> # </th>
        <th class="text-dark font-weight-bold">ADDRESS</th>
        <th class="text-dark font-weight-bold">NETWORK</th>
        <th class="text-dark font-weight-bold">INTERFACE</th>
<!--         <th class="text-center">
            
        </th> -->
    </thead>
    <tbody>
        <?php foreach ($address as $key => $value){ ?>

            <?php 
                $status = '<b class="btn-info p-1" s>S</b>';
                if ($value['disabled']=='true') {
                   $status = '<b class="btn-danger p-1" >X</b>';
                }
                if ($value['dynamic']=='true') {
                   $status = '<b class="btn-primary p-1" >D</b>';
                }
                if ($value['invalid']=='true') {
                   $status = '<b class="btn-warning p-1" >I</b>';
                }

             ?>

        <tr>
            <td class="text-center"> <?php echo $status ?> </td>
            <td>
                <span class="usr-email-addr" data-email="adams@mail.com"><?php echo $value['address'] ?></span>
            </td>
            <td>
                <span class="usr-location" data-location="Boston, USA"><?php echo $value['network'] ?></span>
            </td>
            <td>
                <span class="usr-ph-no" data-phone="+1 (070) 123-4567"><?php echo $value['interface'] ?></span>
            </td>
          <!--   <td class="text-center">
                <div class="action-btn">
                    <a href="javascript:void(0)" class="text-info edit"><i class="mdi mdi-account-edit font-20"></i></a>
                    <a href="javascript:void(0)" class="text-dark delete ml-2"><i class="mdi mdi-delete font-20"></i></a>
                </div>
            </td> -->
        </tr>
        <?php } ?>
    </tbody>
</table>