@section('css')
	<link rel="stylesheet" href="{{ asset('vendor/bootstrap-datetimepicker/bootstrap-datetimepicker.min.css') }}">

	@parent
@endsection
@section('js')
	<script src="{{ asset('vendor/momentjs/moment-with-locales.min.js') }}"></script>
	<script src="{{ asset('vendor/bootstrap-datetimepicker/bootstrap-datetimepicker.min.js') }}"></script>
	<script>
		$(document).ready(function () {
			$('input[data-datetimepicker=true]').each(function () {
				$(this).datetimepicker({
					locale: '{{ app()->getLocale() }}',
					format: 'YYYY-MM-DD HH:mm'
				});
			});
		});
	</script>

	@parent
@endsection