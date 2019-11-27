@extends('adminlte::page')

@section('title', 'Users - MembershipCTL')

@section('content_header')
<h1>{{ __('Maintenance') }}</h1>
@endsection

@section('table-delete', 'users')

@section('content')
<div class="row">
	<div class="col-xs-12">
		<div class="box box-info">
			<div class="box-header with-border">
				<h3 class="box-title">{{ __('Users List') }}</h3>
				<div class="box-tools pull-right">
					<a href="{{ route('users.create') }}" class="btn btn-default">
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
										<th class="text-center">{{ __('Locale') }}</th>
										<th class="text-center">{{ __('Is Admin?') }}</th>
										<th class="text-center">{{ __('Actions') }}</th>
									</tr>
								</thead>
								<tbody>
									@if($users->isEmpty())
										<tr>
											<td colspan="6" class="text-center">@lang('messages.table.empty')</td>
										</tr>
									@else
										@foreach ($users as $user)
											<tr>
												<td class="text-center">{{ $user->id }}</td>
												<td>{{ $user->name }}</td>
												<td>{{ $user->email }}</td>
												<td class="text-center">{{ $user->locale }}</td>
												<td class="text-center">{{ $user->is_admin ? __('Yes') : __('No') }}</td>
												<td class="text-center">
													<a href="{{ route('users.edit', ['id' => $user->id]) }}" class="btn-sm btn-warning fas fa-edit" title="{{ __('Edit') }}"></a>
													<a href="#" class="btn-sm btn-danger fas fa-trash" onclick="return confirmDeletion({{ $user->id }});" title="{{ __('Delete') }}"></a>
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
						{{ $users->links() }}
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