@extends('adminlte::page')

@section('title', 'Ticket Types - MembershipCTL')

@section('content_header')
<h1>{{ __('Maintenance') }}</h1>
@endsection

@section('table-delete', 'ticket_types')

@section('content')
<div class="row">
	<div class="col-xs-12">
		<div class="box box-info">
			<div class="box-header with-border">
				<h3 class="box-title">{{ __('Ticket Types List') }}</h3>
				<div class="box-tools pull-right">
					<a href="{{ route('ticket_types.create') }}" class="btn btn-default">
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
										<th class="text-center">{{ __('Actions') }}</th>
									</tr>
								</thead>
								<tbody>
									@if($ticket_types->isEmpty())
										<tr>
											<td colspan="4" class="text-center">@lang('messages.table.empty')</td>
										</tr>
									@else
										@foreach ($ticket_types as $ticket_type)
											<tr>
												<td class="text-center">{{ $ticket_type->id }}</td>
												<td>{{ $ticket_type->name }}</td>
												<td>{{ Str::limit($ticket_type->description, 50) }}</td>
												<td class="text-center">
													<a href="{{ route('ticket_types.edit', ['id' => $ticket_type->id]) }}" class="btn-sm btn-warning fas fa-edit" title="{{ __('Edit') }}"></a>
													<a href="#" class="btn-sm btn-danger fas fa-trash" onclick="return confirmDeletion({{ $ticket_type->id }});" title="{{ __('Delete') }}"></a>
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
						{{ $ticket_types->links() }}
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