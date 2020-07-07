<table class="table table-striped search-table v-middle">
    <thead class="header-item">
        <th width="1" class="text-center"> # </th>
        <th class="text-dark font-weight-bold">NAME</th>
        <th class="text-dark font-weight-bold">LOCAL ADDRESS</th>
    </thead>
    <tbody>

        <?php $no=1; foreach ($data as $key => $value){ if(@$value['local-address']){ ?>
        <tr>
            <td><?php echo $no++ ?></td>
            <td><?php echo $value['name'] ?></td>
            <td><?php echo $value['local-address'] ?></td>
        </tr>
            
        <?php }} ?>

    </tbody>
</table>