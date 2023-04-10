$('.tambah-baku').on('click', function(e) {

	var $nama_bahan_baku = $('.nama_bahan_baku').val();
	var $jumlah = $('.jumlah').val();
	var $id_satuan = $('.id_satuan').val();
	var $ket = $('.ket').val();

	$.ajax({
		url: "<?= base_url('bahan_baku') ?>";
	})

});