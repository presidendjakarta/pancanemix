<table class="table table-striped search-table v-middle">
    <thead class="header-item">
        <th width="1" class="text-center"> # </th>
        <th class="text-dark font-weight-bold">Service</th>
        <th class="text-dark font-weight-bold">Interface</th>
        <th class="text-dark font-weight-bold">Profile</th>
    </thead>
    <tbody>

    <?php foreach ($data as $key => $value): ?>
        <tr> 
            <td> <?php echo  $value['.id'] ?></td>
            <td> <?php echo  $value['service-name'] ?></td>
            <td> <?php echo  $value['interface'] ?></td>
            <td> <?php echo  $value['default-profile'] ?></td>
        </tr>
    <?php endforeach ?>

      

    </tbody>
</table>