@extends('adminlte::page')

@section('title', 'Events - MembershipCTL')

@section('content_header')
<h1>{{ __('Maintenance') }}</h1>
@endsection

@section('table-delete', 'events')

@section('content')
<div class="row">
	<div class="col-xs-12">
		<div class="box box-info">
			<div class="box-header with-border">
				<h3 class="box-title">{{ __('Events List') }}</h3>
				<div class="box-tools pull-right">
					<a href="{{ route('events.create') }}" class="btn btn-default">
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
										<th>{{ __('Name') }}</th>
										<th>{{ __('Description') }}</th>
										<th>{{ __('Is Public?') }}</th>
										<th>{{ __('Is Cancelled?') }}</th>
										<th>{{ __('Attraction') }}</th>
										<th>{{ __('Reserved from') }}</th>
										<th>{{ __('Reserved until') }}</th>
										<th class="text-center">{{ __('Actions') }}</th>
									</tr>
								</thead>
								<tbody>
									@if($events->isEmpty())
										<tr>
											<td colspan="9" class="text-center">@lang('messages.table.empty')</td>
										</tr>
									@else
										@foreach ($events as $event)
											<tr>
												<td class="text-center">{{ $event->id }}</td>
												<td>{{ $event->name }}</td>
												<td>{{ Str::limit($event->description, 50) }}</td>
												<td>{{ $event->is_public ? __('Yes') : __('No') }}</td>
												<td>{{ $event->is_cancelled ? __('Yes') : __('No') }}</td>
												<td>{{ $event->attraction->name }}</td>
												<td>{{ $event->reservation->from }}</td>
												<td>{{ $event->reservation->to }}</td>
												<td class="text-center">
													@if ($event->is_public)
														<a href="{{ route('event_tickets', ['id' => $event->id]) }}" class="btn-sm btn-info fas fa-user" title="{{ __('Guests') }}"></a>
													@endif
													<a href="{{ route('events.edit', ['id' => $event->id]) }}" class="btn-sm btn-warning fas fa-edit" title="{{ __('Edit') }}"></a>
													<a href="#" class="btn-sm btn-danger fas fa-trash" onclick="return confirmDeletion({{ $event->id }});" title="{{ __('Delete') }}"></a>
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
						{{ $events->links() }}
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