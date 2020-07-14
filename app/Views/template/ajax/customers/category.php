
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
        <th class="text-dark font-weight-bold">DATA</th>
    </thead>
    <tbody>

        <?php $no=1; foreach ($data as $key => $value){ if(@$value['local-address']){ ?>
        <tr>
            <td><?php echo $no++ ?></td>
            <td><?php echo $value['name'] ?></td>
            <td>
                <table class="table table-striped search-table v-middle">
                    <thead class="header-item">
                        <th width="1" class="text-center"> # </th>
                        <th class="text-dark font-weight-bold">NAME</th>
                        <th class="text-dark font-weight-bold">SPEED</th>
                        <th class="text-dark font-weight-bold">HARGA</th>
                        <th class="text-dark font-weight-bold">ACTION</th>
                    </thead>
                    <tbody>

                       
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