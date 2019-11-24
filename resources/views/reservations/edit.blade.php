@extends('adminlte::page')

@section('title', 'Reservations - MembershipCTL')

@section('content_header')
    <h1>{{ __('Maintenance') }}</h1>
@endsection

@section('content')
	<div class="row">
		<div class="col-xs-12">
			<div class="box">
				<div class="box-header with-border">
					<h3 class="box-title">{{ __('Reservations Form') }}</h3>
				</div>
				<div class="box-body">
					<div class="row">
						<div class="col-xs-12">
							{!! Form::open(['route' => ['reservations.update', $reservation->id], 'method' => 'PUT']) !!}
								
								<div class="row">
									<div class="col-sm-6">
										<div class="form-group {{ $errors->has('from') ? 'has-error' : '' }}">
											{!! Form::label('from', __('From'), ['class' => 'control-label']) !!}
											{!! Form::text('from', $reservation->from, [
												'data-datetimepicker' => 'true',
												'class' => 'form-control',
												'required'
											]) !!}
											{!! $errors->first('from', '<p class="help-block">* :message</p>') !!}
										</div>
									</div>
									<div class="col-sm-6">
										<div class="form-group {{ $errors->has('to') ? 'has-error' : '' }}">
											{!! Form::label('to', __('To'), ['class' => 'control-label']) !!}
											{!! Form::text('to', $reservation->to, [
												'data-datetimepicker' => 'true',
												'class' => 'form-control',
												'required'
											]) !!}
											{!! $errors->first('to', '<p class="help-block">* :message</p>') !!}
										</div>
									</div>
								</div>
								<div class="row">
									<div class="col-sm-6">
										<div class="form-group {{ $errors->has('place_id') ? 'has-error' : '' }}">
											{!! Form::label('place_id', __('Place'), ['class' => 'control-label']) !!}
											{!! Form::select('place_id',
												\App\Place::orderBy('name')->pluck('name', 'id')->toArray(), $reservation->place_id,
												['class' => 'form-control']
											) !!}
											{!! $errors->first('place_id', '<p class="help-block">* :message</p>') !!}
										</div>
									</div>
									<div class="col-sm-6">
										<div class="form-group {{ $errors->has('reserved_to') ? 'has-error' : '' }}">
											{!! Form::label('reserved_to', __('Reserved to'), ['class' => 'control-label']) !!}
											{!! Form::select('reserved_to',
												\App\Associate::orderBy('name')->pluck('name', 'id')->toArray(), $reservation->reserved_to,
												['class' => 'form-control']
											) !!}
											{!! $errors->first('reserved_to', '<p class="help-block">* :message</p>') !!}
										</div>
									</div>
								</div>

								<div class="form-group">
									{!! Form::button('<i class="far fa-save fa-fw"></i> ' . __('Save!'), ['type' => 'submit', 'class' => 'btn btn-success']) !!}
									<a href="{{ route('reservations') }}" class="btn btn-default"><i class="far fa-times-circle fa-fw"></i> {{ __('Cancel') }}</a>
								</div>

							{!! Form::close() !!}
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
@endsection
@include('scripts.datetimepicker')