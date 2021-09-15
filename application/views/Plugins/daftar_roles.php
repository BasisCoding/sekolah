
<script type="text/javascript">

	var table;
	$(document).ready(function() {
		getRoles();
		getRoleMenus();

		function actionData(formData, action) {
			$.ajax({
				url: '<?= base_url("roles/") ?>'+action+'',
				type: 'POST',
				dataType: 'JSON',
				data: formData,
				processData: false,
				contentType: false,
				success:function (response) {
					$.notify({
						icon: 'ni ni-bell-55',
						message:response.message
					},{
						type:response.type,
						z_index:2000,
						placement: {
							from: "top",
							align: "right"
						},
						animate: {
							enter: 'animated fadeInDown',
							exit: 'animated fadeOutUp'
						}
					});

					if (response.type == 'success') {
						$('#modal-'+action).modal('hide');
						$('#form-'+action)[0].reset();
					}
				}
			});
		}

		function getRoleMenus(role_id=null) {
			$.ajax({
				url: '<?= base_url('roles/getRoleMenus') ?>',
				type: 'POST',
				data:{role_id:role_id},
				dataType: 'JSON',
				success:function (result) {
					
					var list = '';
					for (var i = 0; i < result.length; i++) {
						list += '<li class="list-group-item d-flex justify-content-between align-items-center">';
						list += '<span class="'+result[i].color+'"><i class="'+result[i].icon+'"></i></span>';
						list += '<span class="'+result[i].color+'">'+result[i].nama_menu+'</span>';
						list += '</li>';
					}
					
					$('#daftar_menus').html(list);
				}
			});
		}

		function getRoles() {
			$.ajax({
				url: '<?= base_url('roles/getRoles') ?>',
				type: 'POST',
				dataType: 'HTML',
				success:function (data) {
					$('#daftar_roles').html(data);
				}
			});
		}

		$('#daftar_roles').on('click', '.view-menu', function(event) {
			event.preventDefault();
			var role_id = $(this).attr('data-id');
			var role_name = $(this).attr('data-nama');

			$('#role-name').html(role_name);
			getRoleMenus(role_id);

		});

		$('#daftar_roles').on('click', '.update-role', function(event) {
			event.preventDefault();
			var role_id = $(this).attr('data-id');
			var role_name = $(this).attr('data-nama');
			var role_slug = $(this).attr('data-slug');

			$('[name="id_update"]').val(role_id);
			$('[name="role_name_update"]').val(role_name);
			$('[name="role_slug_update"]').val(role_slug);
			
			$('#modal-updateRole').modal('show');

		});

		$('#daftar_roles').on('click', '.delete-role', function(event) {
			event.preventDefault();
			var role_id = $(this).attr('data-id');
			var role_name = $(this).attr('data-nama');
			var role_slug = $(this).attr('data-slug');

			$('[name="id_delete"]').val(role_id);
			$('#role-name').html(role_name);
			
			$('#modal-deleteRole').modal('show');

		});

		$('#form-addRole').submit(function() {
			
			var formData = new FormData(this);
			actionData(formData, 'addRole');

			setTimeout(function() {
				getRoles();
			}, 100);

			return false;
		});

		$('#form-updateRole').submit(function() {
			
			var formData = new FormData(this);
			actionData(formData, 'updateRole');

			setTimeout(function() {
				getRoles();
			}, 100);

			return false;
		});

		$('#form-deleteRole').submit(function() {
			
			var formData = new FormData(this);
			actionData(formData, 'deleteRole');

			setTimeout(function() {
				getRoles();
			}, 100);

			return false;
		});
	});
</script>
<script src="<?= site_url('assets/vendor/select2/dist/js/select2.min.js') ?>"></script>
<script src="<?= site_url('assets/vendor/bootstrap-notify/bootstrap-notify.min.js') ?>"></script>

<script src="<?= site_url('assets/js/argon.js?v=1.1.0') ?>"></script>

</body>
</html>