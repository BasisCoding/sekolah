
<script type="text/javascript">

	var table;
	$(document).ready(function() {
		getUsers();
		function getUsers() {
			$.ajax({
				url: '<?= base_url('roles/getUsers') ?>',
				type: 'POST',
				dataType: 'HTML',
				success:function (data) {
					$('#daftar_users').html(data);
				}
			});
			
		}

	});
</script>
<script src="<?= site_url('assets/assets/vendor/datatables.net/js/jquery.dataTables.min.js') ?>"></script>
<script src="<?= site_url('assets/assets/vendor/select2/dist/js/select2.min.js') ?>"></script>
<script src="<?= site_url('assets/assets/vendor/bootstrap-notify/bootstrap-notify.min.js') ?>"></script>

<script src="<?= site_url('assets/assets/js/argon.js?v=1.1.0') ?>"></script>

</body>
</html>