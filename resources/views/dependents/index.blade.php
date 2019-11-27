@extends('adminlte::page')

@section('title', 'Dependents - MembershipCTL')

@section('content_header')
<h1>{{ __('Maintenance') }}</h1>
@endsection

@section('table-delete', 'dependents')

@section('content')
<div class="row">
	<div class="col-xs-12">
		<div class="box box-info">
			<div class="box-header with-border">
				<h3 class="box-title">{{ __('Dependents') }}</h3>
				<div class="box-tools pull-right">
					<a href="{{ route('associates') }}" class="btn btn-default">
						<i class="fa fa-arrow-left fa-fw"></i>
						{{ __('Back') }}
					</a>
					<a href="{{ route('dependents.create', ['id' => $holder_id]) }}" class="btn btn-default">
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
										<th>{{ __('Birth Date') }}</th>
										<th>{{ __('Is Active?') }}</th>
										<th class="text-center">{{ __('Actions') }}</th>
									</tr>
								</thead>
								<tbody>
									@if($dependents->isEmpty())
										<tr>
											<td colspan="5" class="text-center">@lang('messages.table.empty')</td>
										</tr>
									@else
										@foreach ($dependents as $dependent)
											<tr>
												<td>{{ $dependent->id }}</td>
												<td>{{ $dependent->dependent->name }}</td>
												<td>{{ $dependent->dependent->birth_date }}</td>
												<td>{{ $dependent->dependent->is_active ? __('Yes') : __('No') }}</td>
												<td class="text-center">
													<a href="#" class="btn-sm btn-danger fas fa-trash" onclick="return confirmDeletion({{ $dependent->id }});" title="{{ __('Delete') }}"></a>
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