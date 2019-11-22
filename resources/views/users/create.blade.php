@extends('adminlte::page')

@section('title', 'Users - MembershipCTL')

@section('content_header')
    <h1>{{ __('Maintenance') }}</h1>
@endsection

@section('content')
	<div class="row">
		<div class="col-xs-12">
			<div class="box">
				<div class="box-header with-border">
					<h3 class="box-title">{{ __('Users Form') }}</h3>
				</div>
				<div class="box-body">
					<div class="row">
						<div class="col-xs-12">
							{!! Form::open(['route' => 'users.store']) !!}
							
							<div class="row">
								<div class="col-sm-6">
									<div class="form-group {{ $errors->has('name') ? 'has-error' : '' }}">
										{!! Form::label('name', __('Name'), ['class' => 'control-label']) !!}
										{!! Form::text('name', null, [
											'class' 	=> 'form-control',
											'required'
										]) !!}
										{!! $errors->first('name', '<p class="help-block">* :message</p>') !!}
									</div>
								</div>
								<div class="col-sm-6">
									<div class="form-group {{ $errors->has('email') ? 'has-error' : '' }}">
										{!! Form::label('email', __('Email'), ['class' => 'control-label']) !!}
										{!! Form::email('email', null, [
											'class'		=> 'form-control',
											// 'required'
										]) !!}
										{!! $errors->first('email', '<p class="help-block">* :message</p>') !!}
									</div>
								</div>
							</div>

							<div class="row">
								<div class="col-sm-6">
									<div class="form-group {{ $errors->has('password') ? 'has-error' : '' }}">
										{!! Form::label('password', __('Password'), ['class' => 'control-label']) !!}
										{!! Form::password('password', ['class' => 'form-control']) !!}
										{!! $errors->first('password', '<p class="help-block">* :message</p>') !!}
									</div>
								</div>
								<div class="col-sm-6">
									<div class="form-group {{ $errors->has('password_confirmation') ? 'has-error' : '' }}">
										{!! Form::label('password_confirmation', __('Password Confirmation'), ['class' => 'control-label']) !!}
										{!! Form::password('password_confirmation', ['class' => 'form-control']) !!}
										{!! $errors->first('password_confirmation', '<p class="help-block">* :message</p>') !!}
									</div>
								</div>
							</div>
							<div class="row">
								<div class="col-sm-4 col-md-3">
									<div class="form-group {{ $errors->has('locale') ? 'has-error' : '' }}">
										{!! Form::label('locale', __('Locale'), ['class' => 'control-label']) !!}
										{!! Form::select('locale', ['en' => 'English'], null, [
											'class' 	=> 'form-control',
											'required'
										]) !!}
										{!! $errors->first('locale', '<p class="help-block">* :message</p>') !!}
									</div>
								</div>
							</div>
							<div class="row">
								<div class="col-sm-4 col-md-3">
									<div class="form-group">
										<div class="checkbox">
											<label>
												{!! Form::checkbox('is_admin', null, false) !!}
												{{ __('Is Admin?') }}
											</label>
										</div>
									</div>
								</div>
							</div>

							<div class="form-group">
								{!! Form::button('<i class="far fa-save fa-fw"></i> ' . __('Create!'), ['type' => 'submit', 'class' => 'btn btn-success']) !!}
								<a href="{{ route('users') }}" class="btn btn-default"><i class="far fa-times-circle fa-fw"></i> {{ __('Cancel') }}</a>
							</div>

							{!! Form::close() !!}
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
@endsection