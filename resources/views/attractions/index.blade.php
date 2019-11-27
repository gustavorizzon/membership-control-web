@extends('adminlte::page')

@section('title', 'Attractions - MembershipCTL')

@section('content_header')
<h1>{{ __('Maintenance') }}</h1>
@endsection

@section('table-delete', 'attractions')

@section('content')
<div class="row">
	<div class="col-xs-12">
		<div class="box box-info">
			<div class="box-header with-border">
				<h3 class="box-title">{{ __('Attractions List') }}</h3>
				<div class="box-tools pull-right">
					<a href="{{ route('attractions.create') }}" class="btn btn-default">
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
										<th>{{ __('Type') }}</th>
										<th class="text-center">{{ __('Actions') }}</th>
									</tr>
								</thead>
								<tbody>
									@if($attractions->isEmpty())
										<tr>
											<td colspan="5" class="text-center">@lang('messages.table.empty')</td>
										</tr>
									@else
										@foreach ($attractions as $attraction)
											<tr>
												<td class="text-center">{{ $attraction->id }}</td>
												<td>{{ $attraction->name }}</td>
												<td>{{ Str::limit($attraction->description, 40) }}</td>
												<td>{{ $attraction->type->name }}</td>
												<td class="text-center">
													<a href="{{ route('attractions.edit', ['id' => $attraction->id]) }}" class="btn-sm btn-warning fas fa-edit" title="{{ __('Edit') }}"></a>
													<a href="#" class="btn-sm btn-danger fas fa-trash" onclick="return confirmDeletion({{ $attraction->id }});" title="{{ __('Delete') }}"></a>
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
						{{ $attractions->links() }}
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