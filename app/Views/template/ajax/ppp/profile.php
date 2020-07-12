
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
        <th class="text-dark font-weight-bold">LOCAL ADDRESS</th>
        <th class="text-dark font-weight-bold">SPEED MAX</th>
    </thead>
    <tbody>

        <?php $no=1; foreach ($data as $key => $value){ if(@$value['local-address']){ 
            $new_q = array_wheres($data_q,'name',$value['name']);

            if ($new_q==false) {
                $name_profile = $value['name'];
                $ip = $value['local-address'];
                $net = preg_replace('~(\d+)\.(\d+)\.(\d+)\.(\d+)~', "$1.$2.$3.0/24", $ip);
                $upload = '0';
                $download = '0';
                $out_queee = $mik->query([
                    '/queue/simple/add',
                    "=name=$name_profile",
                    "=target=$net", 
                    "=max-limit=$upload/$download", 
                    "=parent=CLIENT"
                ])->read();
                $new_q['max-limit'] = '0/0';
            }

            $limit = explode('/', $new_q['max-limit']);

            // var_dump($value);

            ?>
        <tr>
            <td><?php echo $no++ ?></td>
            <td><?php echo $value['name'] ?></td>
            <td><?php echo $value['local-address'] ?></td>
            <td><?php echo size_convert($limit[0]).' / '.size_convert($limit[1]) ?></td>
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