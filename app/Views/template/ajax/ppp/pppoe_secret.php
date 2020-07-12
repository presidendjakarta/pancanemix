<table class="table table-striped search-table v-middle">
    <thead class="header-item">
        <th width="1" class="text-center"> # </th>
        <th class="text-dark font-weight-bold"> User </th>
        <th class="text-dark font-weight-bold">IP</th>
        <th class="text-dark font-weight-bold">Profile</th>
        <th class="text-dark font-weight-bold">Last DC</th>
    </thead>
    <tbody>

    <?php foreach ($data as $key => $value): ?>
            <?php 
                if ($value['disabled']=='true') {
                   $status = '<b class="btn-danger p-1" >X</b>';
                }else{
                   $status = '<b class="btn-success p-1" >E</b>';
                }
             ?>
        <tr> 
            <td><?php echo $status ?></td>
            <td><?php echo $value['name'] ?></td>
            <td><?php echo $value['remote-address'] ?></td>
            <td><?php echo $value['profile'] ?></td>
            <td><?php echo $value['last-logged-out'] ?></td>
            
        </tr>
    <?php endforeach ?>

      

    </tbody>
</table>