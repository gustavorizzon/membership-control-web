@extends('adminlte::page')

@section('title', 'Associates - MembershipCTL')

@section('content_header')
    <h1>{{ __('Maintenance') }}</h1>
@endsection

@section('content')
	<div class="row">
		<div class="col-md-3 col-sm-6 col-xs-12">
			<div class="box">
				<div class="box-header with-border">
					<h3 class="box-title">{{ __('Associates') . ' ' . __('list') }}</h3>
				</div>
				<div class="box-body">
					<div class="row">
						<div class="col-xs-12">
							<div class="table-responsive">
								<table class="table table-striped">
									<thead class="bg-default">
										<tr>
											<th></th>
										</tr>
									</thead>
									<tbody>
										@if($associates->isEmpty())
											<tr>
												<td colspan="" class="text-center">@lang('messages.table.empty')</td>
											</tr>
										@else
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