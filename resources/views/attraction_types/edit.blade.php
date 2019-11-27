@extends('adminlte::page')

@section('title', 'Attraction Types - MembershipCTL')

@section('content_header')
    <h1>{{ __('Maintenance') }}</h1>
@endsection

@section('content')
	<div class="row">
		<div class="col-xs-12">
			<div class="box">
				<div class="box-header with-border">
					<h3 class="box-title">{{ __('Editing attraction type') . ': ' . $attraction_type->name }}</h3>
				</div>
				<div class="box-body">
					<div class="row">
						<div class="col-xs-12">
							{!! Form::open(['route' => ["attraction_types.update", $attraction_type->id], 'method' => 'put']) !!}
							
							<div class="row">
								<div class="col-xs-12">
									<div class="form-group {{ $errors->has('name') ? 'has-error' : '' }}">
										{!! Form::label('name', __('Name'), ['class' => 'control-label']) !!}
										{!! Form::text('name', $attraction_type->name, [
											'class' 	=> 'form-control',
											'required'
										]) !!}
										{!! $errors->first('name', '<p class="help-block">* :message</p>') !!}
									</div>
								</div>
							</div>
							<div class="row">
								<div class="col-xs-12">
									<div class="form-group {{ $errors->has('description') ? 'has-error' : '' }}">
										{!! Form::label('description', __('Description'), ['class' => 'control-label']) !!}
										{!! Form::textarea('description', $attraction_type->description, [
											'class'		=> 'form-control',
											'required'
										]) !!}
										{!! $errors->first('description', '<p class="help-block">* :message</p>') !!}
									</div>
								</div>
							</div>

							<div class="form-group">
								{!! Form::button('<i class="far fa-save fa-fw"></i> ' . __('Save!'), ['type' => 'submit', 'class' => 'btn btn-success']) !!}
								<a href="{{ route('attraction_types') }}" class="btn btn-default"><i class="far fa-times-circle fa-fw"></i> {{ __('Cancel') }}</a>
							</div>

							{!! Form::close() !!}
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
@endsection