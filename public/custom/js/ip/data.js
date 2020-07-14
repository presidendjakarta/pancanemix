
$('.preloader').fadeIn();
$.ajax({
  url: $("#data-page").data('url'),
  type: "GET",
  dataType: "html",
  success: function (res) {
  	$('.preloader').fadeOut();
    $("#data-page").html(res);
  }
});


