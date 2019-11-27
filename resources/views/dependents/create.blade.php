@extends('adminlte::page')

@section('title', 'Dependents - MembershipCTL')

@section('content_header')
    <h1>{{ __('Maintenance') }}</h1>
@endsection

@section('content')
	<div class="row">
		<div class="col-xs-12">
			<div class="box">
				<div class="box-header with-border">
					<h3 class="box-title">{{ __('Dependents Form') }}</h3>
				</div>
				<div class="box-body">
					<div class="row">
						<div class="col-xs-12">
							{!! Form::open(['route' => 'dependents.store']) !!}
							
								{!! Form::hidden('holder_id', $holder_id) !!}

								<div class="row">
									<div class="col-xs-12">
										<div class="form-group {{ $errors->has('dependent_id') ? 'has-error' : '' }}">
											{!! Form::label('dependent_id', __('Dependent'), ['class' => 'control-label']) !!}
											{!! Form::select('dependent_id', 
												\App\Associate::where('is_holder', false)->orderBy('name')->pluck('name', 'id')->toArray(),
												null,
												['class' => 'form-control', 'required'])
											!!}
											{!! $errors->first('dependent_id', '<p class="help-block">* :message</p>') !!}
										</div>
									</div>
								</div>

								<div class="form-group">
									{!! Form::button('<i class="far fa-save fa-fw"></i> ' . __('Create!'), ['type' => 'submit', 'class' => 'btn btn-success']) !!}
									<a href="{{ route('dependents', ['id' => $holder_id]) }}" class="btn btn-default"><i class="far fa-times-circle fa-fw"></i> {{ __('Cancel') }}</a>
								</div>

							{!! Form::close() !!}
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
@endsection