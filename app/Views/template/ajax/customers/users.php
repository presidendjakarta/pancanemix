<table class="table table-striped search-table v-middle">
    <thead class="header-item">
        <th class="text-center"> # </th>
        <th class="text-dark font-weight-bold">USERNAME</th>
        <th class="text-dark font-weight-bold">SPEED (U/D)</th>
        <th class="text-dark font-weight-bold">IP ADDRESS</th>
        <th class="text-dark font-weight-bold">LAST DC</th>
<!--         <th class="text-center">
            
        </th> -->
    </thead>
    <tbody>
    <?php $no=1; foreach ($data as $key => $value){ 

    	$data_w_q = array_where($data_q,'target',$value['ip_address'].'/32');
    	$data_w_s= array_where($data_s,'remote-address',$value['ip_address']);
    	$q_null = TRUE;
    	$s_null = TRUE;
    	$status = '<b class="btn-danger p-1" >0</b>';

    	// array_print($data_q[$data_w_q]);
    	if (@$data_s[$data_w_s]) {
    		$secret = $data_s[$data_w_s];
            
    		if ($value['ip_address']==$secret['remote-address']) {
    			$s_null = FALSE;
    			if ($secret['disabled']=='true') {
	               $status = '<b class="btn-danger p-1" >X</b>';
	            }else{
	               $status = '<b class="btn-success p-1" >E</b>';
	            }
    		}
    	}

    	if (@$data_q[$data_w_q]) {
    		$quee = $data_q[$data_w_q];
			$limit = explode('/', $quee['max-limit']);
    		if ($value['ip_address']==str_replace('/32', '', $quee['target'])) {
    			$q_null = FALSE;
    		}
    	}
		

    ?>
    	<tr>
            <td class="text-center"><?php echo $status ?></td>
            <td><?php echo $value['username'] ?></td>
            <td><?php echo ($q_null==FALSE)?size_convert($limit[0]).' / '.size_convert($limit[1]):"undifined" ?></td>
            <td><?php echo ($s_null==FALSE)?$secret['remote-address']:'undifined' ?></td>
            <td><?php echo ($s_null==FALSE)?$secret['last-logged-out']:'undifined' ?></td>

        </tr>
    <?php } ?>
    </tbody>
</table>