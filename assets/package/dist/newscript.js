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

const notifDatakat = $('.notif-datakat').data('notifdatakat');

if(notifDatakat) {
	Swal.fire({
	  title: 'Kategori !',
	  text: 'Berhasil '  + notifDatakat,
	  icon: 'success',
	  confirmButtonText: 'OK'
	});
}

$('.hapus-kat').on('click', function(e) {

	e.preventDefault();
	const href = $(this).attr('href');

	Swal.fire({
	  title: ' Yakin',
	  text: "Hapus Kategori ?",
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

const notifDatasat = $('.notif-datasat').data('notifdatasat');

if(notifDatasat) {
	Swal.fire({
	  title: 'Satuan !',
	  text: 'Berhasil '  + notifDatasat,
	  icon: 'success',
	  confirmButtonText: 'OK'
	});
}

$('.hapus-satuan').on('click', function(e) {

	e.preventDefault();
	const href = $(this).attr('href');

	Swal.fire({
	  title: ' Yakin',
	  text: "Hapus Satuan ?",
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