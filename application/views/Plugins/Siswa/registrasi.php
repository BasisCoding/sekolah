
<!-- Custom js -->
<script src="<?= site_url('assets/vendor/bootstrap-notify/bootstrap-notify.min.js') ?>"></script>
<script src="<?= site_url('assets/js/argon.js?v=1.1.0') ?>"></script>
<script src="http://maps.googleapis.com/maps/api/js?sensor=false&libraries=geometry"></script>

<script type="text/javascript">
	$(document).ready(function() {

		jurusan();
		function jurusan() {
			$.ajax({
				url: '<?= base_url('Jurusan/getJurusan') ?>',
				type: 'GET',
				dataType: 'HTML',
				success:function (data) {
					$('.select-jurusan').html(data);
				}
			});
		}

	});
</script>
</body>
</html>