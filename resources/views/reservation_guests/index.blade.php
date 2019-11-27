@extends('adminlte::page')

@section('title', 'Reservation Guests - MembershipCTL')

@section('content_header')
<h1>{{ __('Maintenance') }}</h1>
@endsection

@section('table-delete', 'reservation_guests')

@section('content')
<div class="row">
	<div class="col-xs-12">
		<div class="box box-info">
			<div class="box-header with-border">
				<h3 class="box-title">{{ __('Reservation Guests') }}</h3>
				<div class="box-tools pull-right">
					<a href="{{ route('reservations') }}" class="btn btn-default">
						<i class="fa fa-arrow-left fa-fw"></i>
						{{ __('Back') }}
					</a>
					<a href="{{ route('reservation_guests.create', ['id' => $reservation_id]) }}" class="btn btn-default">
						<i class="fa fa-plus fa-fw"></i>
						{{ __('New') }}
					</a>
				</div>
			</div>
			<div class="box-body">
				<div class="row">
					<div class="col-xs-12">
						<div class="table-responsive">
							<table class="table table-striped table-hover">
								<thead class="bg-default">
									<tr>
										<th>{{ __('Full Name') }}</th>
										<th>{{ __('Document') }}</th>
										<th class="text-center">{{ __('Actions') }}</th>
									</tr>
								</thead>
								<tbody>
									@if($reservation_guests->isEmpty())
										<tr>
											<td colspan="3" class="text-center">@lang('messages.table.empty')</td>
										</tr>
									@else
										@foreach ($reservation_guests as $reservation_guest)
											<tr>
												<td>{{ $reservation_guest->full_name }}</td>
												<td>{{ $reservation_guest->document }}</td>
												<td class="text-center">
													<a href="{{ route('reservation_guests.edit', ['id' => $reservation_guest->id]) }}" class="btn-sm btn-warning fas fa-edit" title="{{ __('Edit') }}"></a>
													<a href="#" class="btn-sm btn-danger fas fa-trash" onclick="return confirmDeletion({{ $reservation_guest->id }});" title="{{ __('Delete') }}"></a>
												</td>
											</tr>
										@endforeach
									@endif
								</tbody>
							</table>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>	
@endsection

@section('js')
<script src="{{ asset('vendor/sweetalert2/sweetalert2.all.min.js') }}"></script>
@include('scripts.confirmdeletion')
@endsection