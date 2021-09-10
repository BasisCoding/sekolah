
<script type="text/javascript">

	var table;
	$(document).ready(function() {
		// icon picker options
		var iconPickerOptions = {searchText: "Buscar...", labelHeader: "{0}/{1}"};
		// sortable list options
		var sortableListOptions = {
			placeholderCss: {'background-color': "#cccccc"}
		};
		var editor = new MenuEditor('myEditor', 
		{ 
			listOptions: sortableListOptions, 
			iconPicker: iconPickerOptions,
		            maxLevel: 2 // (Optional) Default is -1 (no level limit)
		            // Valid levels are from [0, 1, 2, 3,...N]
		        });
		editor.setForm($('#frmEdit'));
		editor.setUpdateButton($('#btnUpdate'));
		//Calling the update method
		$("#btnUpdate").click(function(){
			editor.update();
		});
		// Calling the add method
		$('#btnAdd').click(function(){
			editor.add();
		});

		var arrayjson = [{"href":"http://home.com","icon":"fas fa-home","text":"Home", "target": "_top", "title": "My Home"},{"icon":"fas fa-chart-bar","text":"Opcion2"},{"icon":"fas fa-bell","text":"Opcion3"},{"icon":"fas fa-crop","text":"Opcion4"},{"icon":"fas fa-flask","text":"Opcion5"},{"icon":"fas fa-map-marker","text":"Opcion6"},{"icon":"fas fa-search","text":"Opcion7","children":[{"icon":"fas fa-plug","text":"Opcion7-1","children":[{"icon":"fas fa-filter","text":"Opcion7-1-1"}]}]}];
		editor.setData(arrayJson);

		var str = editor.getString();
		$("#myTextarea").text(str);
	});

</script>
<script src="<?= site_url('assets/assets/vendor/select2/dist/js/select2.min.js') ?>"></script>
<script src="<?= site_url('assets/assets/vendor/bootstrap-notify/bootstrap-notify.min.js') ?>"></script>
<script type="text/javascript" src="<?= site_url('assets/assets/vendor/menu-editor/bootstrap-iconpicker/js/iconset/fontawesome5-3-1.min.js') ?>"></script>
<script type="text/javascript" src="<?= site_url('assets/assets/vendor/menu-editor/bootstrap-iconpicker/js/bootstrap-iconpicker.min.js') ?>"></script>
<script type="text/javascript" src="<?= site_url('assets/assets/vendor/menu-editor/jquery-menu-editor.min.js') ?>"></script>
<script src="<?= site_url('assets/assets/js/argon.js?v=1.1.0') ?>"></script>

</body>
</html>