const notifData = $('.notif-data').data('notifdata');

if(notifData) {
	Swal.fire({
	  title: 'Data Produk !',
	  text: 'Berhasil '  + notifData,
	  icon: 'success',
	  confirmButtonText: 'OK'
	});
}

$('.hapus-produk').on('click', function(e) {

	e.preventDefault();
	const href = $(this).attr('href');

	Swal.fire({
	  title: ' Yakin',
	  text: "Hapus Produk ?",
	  icon: 'question',
	  showCancelButton: true,
	  confirmButtonColor: '#3085d6',
	  cancelButtonColor: '#d33',
	  confirmButtonText: 'Hapus'
	}).then((result) => {
	  if (result.value) {
	    document.location.href = href;
	  }
	})

});