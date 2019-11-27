@extends('adminlte::page')

@section('title', 'Event Tickets - MembershipCTL')

@section('content_header')
<h1>{{ __('Maintenance') }}</h1>
@endsection

@section('table-delete', 'event_tickets')

@section('content')
<div class="row">
	<div class="col-xs-12">
		<div class="box box-info">
			<div class="box-header with-border">
				<h3 class="box-title">{{ __('Event Tickets') }}</h3>
				<div class="box-tools pull-right">
					<a href="{{ route('events') }}" class="btn btn-default">
						<i class="fa fa-arrow-left fa-fw"></i>
						{{ __('Back') }}
					</a>
					<a href="{{ route('event_tickets.create', ['id' => $event_id]) }}" class="btn btn-default">
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
										<th>{{ __('Ticket Type') }}</th>
										<th>{{ __('Event Name') }}</th>
										<th class="text-center">{{ __('Actions') }}</th>
									</tr>
								</thead>
								<tbody>
									@if($event_tickets->isEmpty())
										<tr>
											<td colspan="4" class="text-center">@lang('messages.table.empty')</td>
										</tr>
									@else
										@foreach ($event_tickets as $event_ticket)
											<tr>
												<td>{{ $event_ticket->id }}</td>
												<td>{{ $event_ticket->type->name }}</td>
												<td>{{ $event_ticket->event->name }}</td>
												<td class="text-center">
													<a href="#" class="btn-sm btn-danger fas fa-trash" onclick="return confirmDeletion({{ $event_ticket->id }});" title="{{ __('Delete') }}"></a>
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