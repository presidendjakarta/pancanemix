	<table class="table table-bordered mb-0">
		<thead>
			<tr class="bg-info text-white">
				<th scope="col" width="1">#</th>
				<th scope="col">Name</th>
				<th scope="col">IP</th>
				<th scope="col">Username</th>
				<th scope="col" width="1%" class="text-center"></th>
				<th scope="col" width="1%" class="text-center"></th>
			</tr>
		</thead>
		<tbody>
			<?php $sess_id = @$sess['router_id']; $no=1; foreach ($router as $row): ?>
			<tr <?php echo (@$sess_id==$row['id'])?'class="bg-primary text-white"':'' ?>>
				<th scope="row"><?php echo $no++ ?></th>
				<td><?php echo $row['name_router'] ?></td>
				<td><?php echo $row['ip_router'].':'.$row['port_router'] ?></td>
				<td><?php echo $row['username']?></td>
				<td class="text-center">
					<button type="button"  datax='<?php echo $row['id'] ?>'  class="btn btn-secondary btn-sm sessions"><i class="fas fa-check"></i></button>
				</td>
				<td class="text-center">
					<button type="button" datax='<?php echo $row['id'] ?>' class="btn btn-danger btn-sm delete_router"><i class="fa fa-trash"></i></button>
				</td>
			</tr>	
			<?php endforeach ?>
			
		</tbody>
	</table>
	<div class="mt-1">
		<b><i>*mark  the router that will be used</i></b>
	</div>



<script type="text/javascript">
	
$('.sessions').click(function(e) {
	$('.preloader').show();
    /* Act on the event */
    var id = $(this).attr('datax');
    $.get(base_url+'/router/chose_session/'+id, function(data) {
		$('.preloader').hide();
    	if(data=='success'){
    		Swal.fire({
			    title: "Good job!",
			    text: "Success create connection to mikrotik.",
			    type: "success"
			}).then(function() {
			    window.location = base_url+"/router/data";
			});
    		 
    		  $('.table-responsive').fadeOut(500);
                                      setTimeout(function() {
	               $('.table-responsive').load(base_url+'/router/load');
	          },100);
	           $('.table-responsive').fadeIn(1000);
    	}else{
            Swal.fire({
                type: 'error',
                title: 'Oops...Fail',
                text: 'Failed connect to mikrotik'
            });
    	}
    });
});;

</script>

<!-- 
        $("#model-error-icon").click(function () {
            Swal.fire({
                type: 'error',
                title: 'Oops...',
                text: 'Something went wrong!',
                footer: '<a href>Why do I have this issue?</a>'
            })
        }); -->
