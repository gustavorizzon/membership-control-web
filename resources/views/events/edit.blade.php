@extends('adminlte::page')

@section('title', 'Events - MembershipCTL')

@section('content_header')
    <h1>{{ __('Maintenance') }}</h1>
@endsection

@section('content')
	<div class="row">
		<div class="col-xs-12">
			<div class="box">
				<div class="box-header with-border">
					<h3 class="box-title">{{ __('Events Form') }}</h3>
				</div>
				<div class="box-body">
					<div class="row">
						<div class="col-xs-12">
							{!! Form::open(['route' => ['events.update', $event->id], 'method' => 'PUT']) !!}
								
								<div class="row">
									<div class="col-xs-12">
										<div class="form-group {{ $errors->has('name') ? 'has-error' : '' }}">
											{!! Form::label('name', __('Name'), ['class' => 'control-label']) !!}
											{!! Form::text('name', $event->name, [
												'class' => 'form-control',
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
											{!! Form::textarea('description', $event->description, [
												'class' => 'form-control',
												'required'
											]) !!}
											{!! $errors->first('description', '<p class="help-block">* :message</p>') !!}
										</div>
									</div>
								</div>
								<div class="row">
									<div class="col-sm-6">
										<div class="form-group {{ $errors->has('attraction_id') ? 'has-error' : '' }}">
											{!! Form::label('attraction_id', __('Attraction'), ['class' => 'control-label']) !!}
											{!! Form::select('attraction_id',
												\App\Attraction::orderBy('name')->pluck('name', 'id')->toArray(), $event->attraction_id,
												['class' => 'form-control']
											) !!}
											{!! $errors->first('attraction_id', '<p class="help-block">* :message</p>') !!}
										</div>
									</div>
									<div class="col-sm-6">
										<div class="form-group {{ $errors->has('reservation_id') ? 'has-error' : '' }}">
											{!! Form::label('reservation_id', __('Reservation'), ['class' => 'control-label']) !!}
											{!! Form::select('reservation_id',
												\App\Reservation::all()->pluck('id', 'id')->transform(function ($id, $key) {
													$reservation = \App\Reservation::find($id);
													return $reservation->id
														. ' - At: ' . $reservation->place->name
														. ' - To: ' . $reservation->reservedTo->name;
												})->toArray(), $event->reservation_id,
												['class' => 'form-control']
											) !!}
											{!! $errors->first('reservation_id', '<p class="help-block">* :message</p>') !!}
										</div>
									</div>
								</div>

								<div class="row">
									<div class="col-xs-12">
										<div class="form-group">
											<div class="checkbox">
												<label>
													{!! Form::checkbox('is_public', null, $event->is_public) !!}
													{{ __('Is Public?') }}
												</label>
											</div>
											<div class="checkbox">
												<label>
													{!! Form::checkbox('is_cancelled', null, $event->is_cancelled) !!}
													{{ __('Is Cancelled?') }}
												</label>
											</div>
										</div>
									</div>
								</div>

								<div class="form-group">
									{!! Form::button('<i class="far fa-save fa-fw"></i> ' . __('Save!'), ['type' => 'submit', 'class' => 'btn btn-success']) !!}
									<a href="{{ route('events') }}" class="btn btn-default"><i class="far fa-times-circle fa-fw"></i> {{ __('Cancel') }}</a>
								</div>

							{!! Form::close() !!}
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
@endsection