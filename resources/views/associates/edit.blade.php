@extends('adminlte::page')

@section('title', 'Associates - MembershipCTL')

@section('content_header')
    <h1>{{ __('Maintenance') }}</h1>
@endsection

@section('content')
	<div class="row">
		<div class="col-xs-12">
			<div class="box">
				<div class="box-header with-border">
					<h3 class="box-title">{{ __('Editing associated') . ': ' . $associate->name }}</h3>
				</div>
				<div class="box-body">
					<div class="row">
						<div class="col-xs-12">
							{!! Form::open(['route' => ["associates.update", $associate->id], 'method' => 'put']) !!}
							
							<div class="row">
								<div class="col-sm-6">
									<div class="form-group {{ $errors->has('name') ? 'has-error' : '' }}">
										{!! Form::label('name', __('Name'), ['class' => 'control-label']) !!}
										{!! Form::text('name', $associate->name, [
											'class' 	=> 'form-control',
											'required'
										]) !!}
										{!! $errors->first('name', '<p class="help-block">* :message</p>') !!}
									</div>
								</div>
								<div class="col-sm-6">
									<div class="form-group {{ $errors->has('email') ? 'has-error' : '' }}">
										{!! Form::label('email', __('Email'), ['class' => 'control-label']) !!}
										{!! Form::email('email', $associate->email, [
											'class'		=> 'form-control',
											// 'required'
										]) !!}
										{!! $errors->first('email', '<p class="help-block">* :message</p>') !!}
									</div>
								</div>
							</div>

							<div class="row">
								<div class="col-sm-6">
									<div class="form-group {{ $errors->has('phone_number') ? 'has-error' : '' }}">
										{!! Form::label('phone_number', __('Phone Number'), ['class' => 'control-label']) !!}
										{!! Form::text('phone_number', $associate->phone_number, ['class' => 'form-control']) !!}
										{!! $errors->first('phone_number', '<p class="help-block">* :message</p>') !!}
									</div>
								</div>
								<div class="col-sm-6">
									<div class="form-group {{ $errors->has('birth_date') ? 'has-error' : '' }}">
										{!! Form::label('birth_date', __('Birth Date'), ['class' => 'control-label']) !!}
										{!! Form::date('birth_date', $associate->birth_date, [
											'class' 	=> 'form-control',
											'required'
										]) !!}
										{!! $errors->first('birth_date', '<p class="help-block">* :message</p>') !!}
									</div>
								</div>
							</div>

							<div class="row">
								<div class="col-sm-6">
									<div class="form-group {{ $errors->has('address') ? 'has-error' : '' }}">
										{!! Form::label('address', __('Address'), ['class' => 'control-label']) !!}
										{!! Form::text('address', $associate->address, [
											'class' 	=> 'form-control',
											'required'
										]) !!}
										{!! $errors->first('address', '<p class="help-block">* :message</p>') !!}
									</div>
								</div>
								<div class="col-sm-6">
									<div class="form-group {{ $errors->has('city') ? 'has-error' : '' }}">
										{!! Form::label('city', __('City'), ['class' => 'control-label']) !!}
										{!! Form::text('city', $associate->city, [
											'class' 	=> 'form-control',
											'required'
										]) !!}
										{!! $errors->first('city', '<p class="help-block">* :message</p>') !!}
									</div>
								</div>
							</div>
							<div class="row">
								<div class="col-sm-6">
									<div class="form-group {{ $errors->has('state') ? 'has-error' : '' }}">
										{!! Form::label('state', __('State'), ['class' => 'control-label']) !!}
										{!! Form::text('state', $associate->state, [
											'class' 	=> 'form-control',
											'required'
										]) !!}
										{!! $errors->first('state', '<p class="help-block">* :message</p>') !!}
									</div>
								</div>
								<div class="col-sm-6">
									<div class="form-group {{ $errors->has('country') ? 'has-error' : '' }}">
										{!! Form::label('country', __('Country'), ['class' => 'control-label']) !!}
										{!! Form::text('country', $associate->country, [
											'class' 	=> 'form-control',
											'required'
										]) !!}
										{!! $errors->first('country', '<p class="help-block">* :message</p>') !!}
									</div>
								</div>
							</div>

							<div class="row">
								<div class="col-sm-6">
									<div class="form-group {{ $errors->has('drivers_license') ? 'has-error' : '' }}">
										{!! Form::label('drivers_license', __('Drivers License'), ['class' => 'control-label']) !!}
										{!! Form::text('drivers_license', $associate->drivers_license, ['class' => 'form-control']) !!}
										{!! $errors->first('drivers_license', '<p class="help-block">* :message</p>') !!}
									</div>
								</div>
								<div class="col-sm-6">
									<div class="form-group {{ $errors->has('social_security_number') ? 'has-error' : '' }}">
										{!! Form::label('social_security_number', __('Social Security Number'), ['class' => 'control-label']) !!}
										{!! Form::text('social_security_number', $associate->social_security_number, ['class' 	=> 'form-control']) !!}
										{!! $errors->first('social_security_number', '<p class="help-block">* :message</p>') !!}
									</div>
								</div>
							</div>

							<div class="row">
								<div class="col-xs-12">
									<div class="form-group">
										<div class="checkbox">
											<label>
												{!! Form::checkbox('is_holder', null, $associate->is_holder) !!}
												{{ __('Is Holder?') }}
											</label>
										</div>
										<div class="checkbox">
											<label>
												{!! Form::checkbox('is_active', null, $associate->is_active) !!}
												{{ __('Is Active?') }}
											</label>
										</div>
									</div>
								</div>
							</div>

							<div class="form-group">
								{!! Form::button('<i class="far fa-save fa-fw"></i> ' . __('Save!'), ['type' => 'submit', 'class' => 'btn btn-success']) !!}
								<a href="{{ route('associates') }}" class="btn btn-default"><i class="far fa-times-circle fa-fw"></i> {{ __('Cancel') }}</a>
							</div>

							{!! Form::close() !!}
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
@endsection