@extends('adminlte::page')

@section('title', 'Places - MembershipCTL')

@section('content_header')
<h1>{{ __('Maintenance') }}</h1>
@endsection

@section('table-delete', 'places')

@section('content')
<div class="row">
	<div class="col-xs-12">
		<div class="box box-info">
			<div class="box-header with-border">
				<h3 class="box-title">{{ __('Places List') }}</h3>
				<div class="box-tools pull-right">
					<a href="{{ route('places.create') }}" class="btn btn-default">
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
										<th class="text-right">{{ __('Capacity') }}</th>
										<th class="text-right">{{ __('Latitude') }}</th>
										<th class="text-right">{{ __('Longitude') }}</th>
										<th class="text-center">{{ __('Actions') }}</th>
									</tr>
								</thead>
								<tbody>
									@if($places->isEmpty())
										<tr>
											<td colspan="8" class="text-center">@lang('messages.table.empty')</td>
										</tr>
									@else
										@foreach ($places as $place)
											<tr>
												<td class="text-center">{{ $place->id }}</td>
												<td>{{ $place->name }}</td>
												<td>{{ Str::limit($place->description, 40) }}</td>
												<td>{{ $place->type->name }}</td>
												<td class="text-right">{{ $place->capacity }}</td>
												<td class="text-right">{{ $place->latitude }}</td>
												<td class="text-right">{{ $place->longitude }}</td>
												<td class="text-center">
													<a href="{{ route('places.edit', ['id' => $place->id]) }}" class="btn-sm btn-warning fas fa-edit" title="{{ __('Edit') }}"></a>
													<a href="#" class="btn-sm btn-danger fas fa-trash" onclick="return confirmDeletion({{ $place->id }});" title="{{ __('Delete') }}"></a>
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
						{{ $places->links() }}
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