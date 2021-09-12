
<!-- nestable js -->
<script src="<?= site_url('assets/assets/vendor/nestable/jquery.nestable.js') ?>"></script>
<!-- Custom js -->
<script src="<?= site_url('assets/assets/vendor/bootstrap-notify/bootstrap-notify.min.js') ?>"></script>
<script type="text/javascript" src="<?= site_url('assets/assets/vendor/menu-editor/bootstrap-iconpicker/js/iconset/fontawesome5-3-1.min.js') ?>"></script>
<script type="text/javascript" src="<?= site_url('assets/assets/vendor/menu-editor/bootstrap-iconpicker/js/bootstrap-iconpicker.min.js') ?>"></script>
<script src="<?= site_url('assets/assets/js/argon.js?v=1.1.0') ?>"></script>

<script type="text/javascript">
	var base_url = '<?= base_url() ?>';
	selectRole();

	function selectRole() {
		$.ajax({
			url: '<?= base_url('Management/RolesController/selectRole') ?>',
			type: 'POST',
			dataType: 'JSON',
			success:function (result) {
				
				var list = '';
				for (var i = 0; i < result.length; i++) {
					list += '<option value="'+result[i].id+'">';
					list += result[i].role_name;
					list += '</option>';
				}
				
				$('.role_akses').append(list);
			}
		});
	}

	function getMenu(result) {
		var list = '';
		for (var i = 0; i < result.length; i++) {
			list += '<li class="list-group-item d-flex justify-content-between align-items-center">';
			list += '<span class="'+result[i].color+'"><i class="'+result[i].icon+'"></i></span>';
			list += '<span class="'+result[i].color+'">'+result[i].nama_menu+'</span>';
			list += '<span>'+
				'<button data-id="'+result[i].id+'" data-nama="'+result[i].nama_menu+'" data-role="'+result[i].role_id+'" data-link="'+result[i].link+'" data-icon="'+result[i].icon+'" data-warna="'+result[i].color+'" class="btn btn-warning btn-sm update-menu btn-icon"><span class="btn-inner--icon"><i class="ni ni-settings"></i></span></button>'+
				'<button data-id="'+result[i].id+'" data-nama="'+result[i].nama_menu+'" data-link="'+result[i].link+'" data-icon="'+result[i].icon+'" data-warna="'+result[i].color+'" class="btn btn-danger btn-sm delete-menu btn-icon"><span class="btn-inner--icon"><i class="ni ni-fat-delete"></i></span></button>'+
				'</span>';
			list += '</li>';
		}
		$('#daftar-menu').html(list);
	}

	function makeUL(lst) {
		var html = [];                
		html.push('<ol class="dd-list">');

		$(lst).each(function() { 
			html.push(makeLI(this)) 
		});

		html.push('</ol>');      
		return html.join("\n");
	}

	function makeLI(elem) {
		var html = [];                
		html.push('<li class="dd-item" data-id="'+elem.id+'">');

		if (!jQuery.isEmptyObject(elem.parrent))
			html.push('<button data-action="collapse" type="button" style="display: block;">Collapse</button>')
		html.push('<button data-action="expand" type="button" style="display: none;">Expand</button>')

		html.push('<div class="dd-handle">'+ 
					'<div class="d-flex justify-content-between align-items-center">' +
						'<span>'+ elem.nama_menu +'</span>' +
						'<span class="badge badge-success">'+ elem.role_name +'</span>' +
					'</div>' +
				'</div>');

		if (!jQuery.isEmptyObject(elem.parrent))
			html.push(makeUL(elem.parrent));
		html.push('</li>');
		return html.join("\n");
	}

	var subIndicTreeObj = [];

	function findLiChild($obj, parentId) {
		$obj.find('> ol > li').each(function(index1, value1) {
			subIndicTreeObj.push({
				'id': $(this).attr('data-id'),
				'parrent_id': parentId
			});

			findOlChild($(this));
		});
	}

	function findOlChild($obj) {
		if ($obj.has('ol').length > 0) {
			findLiChild($obj, $obj.attr('data-id'));
		}
	}

	function actionData(formData, action) {
		$.ajax({
			url: '<?= base_url("menus/") ?>'+action+'',
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

	$(function() {
		$('.dd').nestable();
		$.ajax({
			type: "POST",
			url: base_url + "menus/getMenus",
			data: {},
			cache: false,
			dataType:"json",
			success: function(result){

				getMenu(result);
				$(".dd").html(makeUL(result));
			},
			error: function(jqXHR, textStatus, errorThrown) {
				$.notify({
					icon: 'ni ni-bell-55',
					message:errorThrown
				},{
					type:'danger',
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
			}
		});

		$('.btn-save').on('click', function (e) {
			subIndicTreeObj = [];
			var btnSave = $(this);
			findOlChild($('#nestable'));
			e.preventDefault();
			$(this).attr('disabled', true);
			$(this).html('<i class="fas fa-spinner fa-spin"></i>');
			$.ajax({
				type:"POST",
				url: base_url + "menus/updateMenus",
				data:{data:subIndicTreeObj},
				success:function(data){
					
					if(data.type == 'success'){
						btnSave.attr('disabled', false);
						btnSave.html('Save');
						$.notify({
							icon: 'ni ni-bell-55',
							message:data.message
						},{
							type:data.type,
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
					}
				},
				error:function(jqXHR, textStatus, errorThrown){
					$.notify({
						icon: 'ni ni-bell-55',
						message:errorThrown
					},{
						type:'danger',
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
					btnSave.attr('disabled', false);
					btnSave.html('Save');
				}
			});
		});
	});

	$('#daftar-menu').on('click', '.update-menu', function(event) {
		event.preventDefault();
		var id = $(this).attr('data-id');
		var nama = $(this).attr('data-nama');
		var link = $(this).attr('data-link');
		var icon = $(this).attr('data-icon');
		var warna = $(this).attr('data-warna');
		var role = $(this).attr('data-role');

		$('[name="id_update"]').val(id);
		$('[name="nama_menu_update"]').val(nama);
		$('[name="link_update"]').val(link);
		$('[name="icon_update"]').val(icon);
		$('[name="color_update"]').val(warna);
		$('[name="role_id_update"]').val(role);

		$('#modal-updateMenuById').modal('show');
	});

	$('#daftar-menu').on('click', '.delete-menu', function(event) {
		event.preventDefault();
		var id = $(this).attr('data-id');

		$('[name="id_delete"]').val(id);

		$('#modal-deleteMenuById').modal('show');
	});

	$('#form-updateMenuById').submit(function() {
			
		var formData = new FormData(this);
		actionData(formData, 'updateMenuById');

		setTimeout(function() {
			window.location.reload();
		}, 100);

		return false;
	});

	$('#form-deleteMenuById').submit(function() {
			
		var formData = new FormData(this);
		actionData(formData, 'deleteMenuById');

		setTimeout(function() {
			window.location.reload();
		}, 100);

		return false;
	});

	$('#form-addMenu').submit(function() {
			
		var formData = new FormData(this);
		actionData(formData, 'addMenu');

		setTimeout(function() {
			window.location.reload();
		}, 100);

		return false;
	});

</script>
</body>
</html>