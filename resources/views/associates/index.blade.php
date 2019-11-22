@extends('adminlte::page')

@section('title', 'Associates - MembershipCTL')

@section('content_header')
<h1>{{ __('Maintenance') }}</h1>
@endsection

@section('table-delete', 'associates')

@section('content')
<div class="row">
	<div class="col-xs-12">
		<div class="box box-info">
			<div class="box-header with-border">
				<h3 class="box-title">{{ __('Associates List') }}</h3>
				<div class="box-tools pull-right">
					<a href="{{ route('associates.create') }}" class="btn btn-default">
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
										<th>{{ __('Email') }}</th>
										<th>{{ __('Phone Number') }}</th>
										<th>{{ __('Birth Date') }}</th>
										<th class="text-center">{{ __('Is Holder?') }}</th>
										<th class="text-center">{{ __('Is Active?') }}</th>
										<th class="text-center">{{ __('Actions') }}</th>
									</tr>
								</thead>
								<tbody>
									@if($associates->isEmpty())
										<tr>
											<td colspan="8" class="text-center">@lang('messages.table.empty')</td>
										</tr>
									@else
										@foreach ($associates as $associate)
											<tr>
												<td class="text-center">{{ $associate->id }}</td>
												<td>{{ $associate->name }}</td>
												<td>{{ $associate->email }}</td>
												<td>{{ $associate->phone_number }}</td>
												<td>{{ $associate->birth_date }}</td>
												<td class="text-center">{{ $associate->is_holder ? __('Yes') : __('No') }}</td>
												<td class="text-center">{{ $associate->is_active ? __('Yes') : __('No') }}</td>
												<td class="text-center">
													<a href="{{ route('associates.edit', ['id' => $associate->id]) }}" class="btn-sm btn-warning fas fa-edit" title="{{ __('Edit') }}"></a>
													<a href="#" class="btn-sm btn-danger fas fa-trash" onclick="return confirmDeletion({{ $associate->id }});" title="{{ __('Delete') }}"></a>
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
						{{ $associates->links() }}
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