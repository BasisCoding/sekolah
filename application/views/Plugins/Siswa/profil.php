
<!-- Custom js -->
<script src="<?= site_url('assets/vendor/bootstrap-notify/bootstrap-notify.min.js') ?>"></script>
<script src="<?= site_url('assets/js/argon.js?v=1.1.0') ?>"></script>
<script src="http://maps.googleapis.com/maps/api/js?sensor=false&libraries=geometry"></script>

<script type="text/javascript">
	$(document).ready(function() {

		// Google Maps

		var map, infoWindow,geocoder,marker,accuracyStatus;

		function taruhMarker(peta, posisiTitik, posisi_1){

			if( marker ){
			  // pindahkan marker
			  marker.setPosition(posisiTitik);
			} else {
			  // buat marker baru
			  marker = new google.maps.Marker({
			  	position: posisiTitik,
			  	map: peta
			  });
			}

			var posisi_2 = new google.maps.LatLng(posisiTitik.lat(), posisiTitik.lng());

			 // isi nilai koordinat ke form
			 $('[name="lattitude"]').val(posisiTitik.lat());
			 $('[name="longitude"]').val(posisiTitik.lng());

			 $('[name="jarak_tempuh"]').val(hitungJarak(posisi_1, posisi_2));
		}

		function hitungJarak(posisi_1, posisi_2) {
		  return (google.maps.geometry.spherical.computeDistanceBetween(posisi_1, posisi_2) / 1000).toFixed(2);
		}

		function initialize() {
			var lat = <?= _LATTITUDE ?>;
			var long = <?= _LONGITUDE ?>;
			var propertiPeta = {
				center:new google.maps.LatLng(lat, long),
				zoom:9,
				mapTypeId:google.maps.MapTypeId.ROADMAP
			};

			var peta = new google.maps.Map(document.getElementById("googleMap"), propertiPeta);

		  	// membuat Marker
		  	var marker=new google.maps.Marker({
		  		position: new google.maps.LatLng(lat, long),
		  		map: peta,
		  		icon: "<?= site_url('assets/img/icons/icon-sekolah.png') ?>"
		 	});

			var posisi_1 = new google.maps.LatLng(lat, long);

		  	// even listner ketika peta diklik
		  	google.maps.event.addListener(peta, 'click', function(event) {
		  		taruhMarker(this, event.latLng, posisi_1);
		  	});

		}


		function errorHandler(err) {
			if(err.code == 1) {
				alert("Error: Access is denied!");
			} else if( err.code == 2) {
				alert("Error: Position is unavailable!");
			}
		}

		function getLocation(){
			if(navigator.geolocation){
               // timeout at 60000 milliseconds (60 seconds)
               var options = {timeout:60000};
               navigator.geolocation.getCurrentPosition
               (log, errorHandler, options);
           } else{
           	alert("Sorry, browser does not support geolocation!");
           }
       	}

       	function log(position) {
       		var latitude = position.coords.latitude;
            var longitude = position.coords.longitude;

       		console.log(latitude+", "+longitude);
       	}

		// event jendela di-load  
		google.maps.event.addDomListener(window, 'load', initialize);
		

		$('.select-regencies').attr('disabled', true);
		$('.select-districts').attr('disabled', true);
		$('.select-villages').attr('disabled', true);
		$('#get_location').on('click', function() {
			getLocation();
		});

		provinces();
		function provinces() {
			$.ajax({
				url: '<?= base_url('Wilayah/provinces') ?>',
				type: 'GET',
				dataType: 'HTML',
				success:function (data) {
					$('.select-provinces').html(data);
				}
			});
		}

		function regencies(prov_id) {
			$.ajax({
				url: '<?= base_url('Wilayah/regencies') ?>',
				data:{prov_id:prov_id},
				type: 'GET',
				dataType: 'HTML',
				success:function (data) {
					$('.select-regencies').html(data);
				}
			});
		}

		function districts(regency_id) {
			$.ajax({
				url: '<?= base_url('Wilayah/districts') ?>',
				data:{regency_id:regency_id},
				type: 'GET',
				dataType: 'HTML',
				success:function (data) {
					$('.select-districts').html(data);
				}
			});
		}

		function villages(district_id) {
			$.ajax({
				url: '<?= base_url('Wilayah/villages') ?>',
				data:{district_id:district_id},
				type: 'GET',
				dataType: 'HTML',
				success:function (data) {
					$('.select-villages').html(data);
				}
			});
		}


		$('.select-provinces').change(function() {
			var prov_id = $(this).val();
			regencies(prov_id);
			$('.select-regencies').attr('disabled', false);
		});

		$('.select-regencies').change(function() {
			var regency_id = $(this).val();
			districts(regency_id);
			$('.select-districts').attr('disabled', false);
		});

		$('.select-districts').change(function() {
			var district_id = $(this).val();
			villages(district_id);
			$('.select-villages').attr('disabled', false);
		});
	});
</script>
</body>
</html>