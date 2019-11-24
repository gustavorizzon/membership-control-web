@section('js')
	<script>
		var gmMap;
		var gmMarker;
		var latitude = document.querySelector('input[name=latitude]');
		var longitude = document.querySelector('input[name=longitude]');
		function initGoogleMapsComponents() {
			let latLng = {
				lat: parseInt(latitude.value),
				lng: parseInt(longitude.value)
			};

			// Map canvas
			gmMap = new google.maps.Map(document.getElementById('map'), {
				center: latLng,
				zoom: 7
			});

			// Add Initial Marker
			addMarker(latLng);

			// On Click Listener
			gmMap.addListener('click', function (e) {
				// Remove old marker
				gmMarker.setMap(null);

				// Add new marker
				addMarker(e.latLng);

				// Update form fields
				latitude.value = e.latLng.lat();
				longitude.value = e.latLng.lng();
			});
		}

		function addMarker(latLng) {
			gmMarker = new google.maps.Marker({
				position: latLng,
				map: gmMap
			});
			gmMap.panTo(latLng);
		}
	</script>
	<script src="https://maps.googleapis.com/maps/api/js?key={{ config('services.google.maps.key') }}&libraries=places&callback=initGoogleMapsComponents" async defer></script>
@endsection