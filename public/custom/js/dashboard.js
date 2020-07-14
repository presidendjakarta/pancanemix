$.get(base_url+'/get/sys_', function(data) {
	$('#sys_model').text(data.data.model);
	$('#sys_version').text(data.data.version);
	$('#sys_board').text(data.data.board);
	$('#sys_time').text(data.data.date);
	$('#sys_uptime').text(data.data.uptime);
	$('#sys_cpu').text(data.data.cpu);
	$('#sys_ram').text(data.data.ram);
	$('#sys_disk').text(data.data.hdd);
});

setInterval(function() {
    

	$.get(base_url+'/get/sys_', function(data) {
		$('#sys_model').text(data.data.model);
		$('#sys_version').text(data.data.version);
		$('#sys_board').text(data.data.board);
		$('#sys_time').text(data.data.date);
		$('#sys_uptime').text('Uptime '+data.data.uptime);
		$('#sys_cpu').text(data.data.cpu);
		$('#sys_ram').text(data.data.ram);
		$('#sys_disk').text(data.data.hdd);
	});













}, 1000);



$(".preloader").fadeOut();