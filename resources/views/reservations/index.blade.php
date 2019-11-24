@extends('adminlte::page')

@section('title', 'Reservations - MembershipCTL')

@section('content_header')
<h1>{{ __('Maintenance') }}</h1>
@endsection

@section('table-delete', 'reservations')

@section('content')
<div class="row">
	<div class="col-xs-12">
		<div class="box box-info">
			<div class="box-header with-border">
				<h3 class="box-title">{{ __('Reservations List') }}</h3>
				<div class="box-tools pull-right">
					<a href="{{ route('reservations.create') }}" class="btn btn-default">
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
										<th class="text-center">ID</th>
										<th>{{ __('From') }}</th>
										<th>{{ __('To') }}</th>
										<th>{{ __('Place') }}</th>
										<th>{{ __('Reserved to') }}</th>
										<th>{{ __('Reserved by') }}</th>
										<th>{{ __('Guests') }}</th>
										<th class="text-center">{{ __('Actions') }}</th>
									</tr>
								</thead>
								<tbody>
									@if($reservations->isEmpty())
										<tr>
											<td colspan="8" class="text-center">@lang('messages.table.empty')</td>
										</tr>
									@else
										@foreach ($reservations as $reservation)
											<tr>
												<td class="text-center">{{ $reservation->id }}</td>
												<td>{{ $reservation->from }}</td>
												<td>{{ $reservation->to }}</td>
												<td>{{ $reservation->place->name }}</td>
												<td>{{ $reservation->reservedTo->name }}</td>
												<td>{{ $reservation->reservedBy->name }}</td>
												<td>{{ $reservation->guests()->count() }}</td>
												<td class="text-center">
													{{-- <a href="{{ route('reservation_guests', ['id' => $reservation->id]) }}" class="btn-sm btn-info fas fa-user" title="{{ __('Guests') }}"></a> --}}
													<a href="{{ route('reservations.edit', ['id' => $reservation->id]) }}" class="btn-sm btn-warning fas fa-edit" title="{{ __('Edit') }}"></a>
													<a href="#" class="btn-sm btn-danger fas fa-trash" onclick="return confirmDeletion({{ $reservation->id }});" title="{{ __('Delete') }}"></a>
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
			<div class="box-footer">
				<div class="row">
					<div class="col-xs-12 text-center">
						{{ $reservations->links() }}
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