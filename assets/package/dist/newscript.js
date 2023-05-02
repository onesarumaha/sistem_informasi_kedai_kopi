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

const notifDataorder = $('.notif-dataorder').data('notifdataorder');

if(notifDataorder) {
	Swal.fire({
	  title: 'Order',
	  text:   notifDataorder,
	  icon: 'success',
	  confirmButtonText: 'OK'
	});
}

$('.hapus-orderan').on('click', function(e) {

	e.preventDefault();
	const href = $(this).attr('href');

	Swal.fire({
	  title: ' Yakin',
	  text: "Hapus Order ?",
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

$('.hapus-checkout').on('click', function(e) {

	e.preventDefault();
	const href = $(this).attr('href');

	Swal.fire({
	  title: ' Yakin',
	  text: "Hapus?",
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

const notifDatabahan = $('.notif-databahan').data('notifdatabahan');

if(notifDatabahan) {
	Swal.fire({
	  title: 'Bahan Baku !',
	  text: 'Berhasil '  + notifDatabahan,
	  icon: 'success',
	  confirmButtonText: 'OK'
	});
}

$('.hapus-bahan').on('click', function(e) {

	e.preventDefault();
	const href = $(this).attr('href');

	Swal.fire({
	  title: ' Yakin',
	  text: "Hapus Bahan Baku ?",
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

const notifDatakeuangan = $('.notif-datakeuangan').data('notifdatakeuangan');

if(notifDatakeuangan) {
	Swal.fire({
	  title: 'Keuangan !',
	  text: 'Berhasil '  + notifDatakeuangan,
	  icon: 'success',
	  confirmButtonText: 'OK'
	});
}

$('.hapus-uang').on('click', function(e) {

	e.preventDefault();
	const href = $(this).attr('href');

	Swal.fire({
	  title: ' Keuangan',
	  text: "Yakin Hapus Transaksi ?",
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

const notifDatalun = $('.notif-datalun').data('notifdatalun');

if(notifDatalun) {
	Swal.fire({
	  title: 'Pembayaran !',
	  text: 'Berhasil '  + notifDatalun,
	  icon: 'success',
	  confirmButtonText: 'OK'
	});
}

const notifDataantar = $('.notif-dataantar').data('notifdataantar');

if(notifDataantar) {
	Swal.fire({
	  title: 'Pemesanan !',
	  text: 'Berhasil '  + notifDataantar,
	  icon: 'success',
	  confirmButtonText: 'OK'
	});
}