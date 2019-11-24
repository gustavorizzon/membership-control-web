@extends('adminlte::page')

@section('title', 'Places - MembershipCTL')

@section('content_header')
    <h1>{{ __('Maintenance') }}</h1>
@endsection

@section('content')
	<div class="row">
		<div class="col-xs-12">
			<div class="box">
				<div class="box-header with-border">
					<h3 class="box-title">{{ __('Editting Place: ') . $place->name }}</h3>
				</div>
				<div class="box-body">
					<div class="row">
						<div class="col-xs-12">
							{!! Form::open(['route' => ["places.update", $place->id], 'method' => 'put']) !!}
								{!! Form::hidden('latitude', $place->latitude) !!}
								{!! Form::hidden('longitude', $place->longitude) !!}
								
								<div class="row">
									<div class="col-sm-4">
										<div class="form-group {{ $errors->has('name') ? 'has-error' : '' }}">
											{!! Form::label('name', __('Name'), ['class' => 'control-label']) !!}
											{!! Form::text('name', $place->name, [
												'class' 	=> 'form-control',
												'required'
											]) !!}
											{!! $errors->first('name', '<p class="help-block">* :message</p>') !!}
										</div>
									</div>
									<div class="col-sm-4">
										<div class="form-group {{ $errors->has('place_type_id') ? 'has-error' : '' }}">
											{!! Form::label('place_type_id', __('Type'), ['class' => 'control-label']) !!}
											{!! Form::select('place_type_id',
												\App\PlaceType::orderBy('name')->pluck('name', 'id')->toArray(), $place->place_type_id,
												['class' => 'form-control']
											) !!}
											{!! $errors->first('place_type_id', '<p class="help-block">* :message</p>') !!}
										</div>
									</div>
									<div class="col-sm-4">
										<div class="form-group {{ $errors->has('capacity') ? 'has-error' : '' }}">
											{!! Form::label('capacity', __('Capacity'), ['class' => 'control-label']) !!}
											{!! Form::number('capacity', $place->capacity, ['class' => 'form-control', 'required']) !!}
											{!! $errors->first('capacity', '<p class="help-block">* :message</p>') !!}
										</div>
									</div>
								</div>

								<div class="row">
									<div class="col-md-6">
										<div class="form-group {{ $errors->has('description') ? 'has-error' : '' }}">
											{!! Form::label('description', __('Description'), ['class' => 'control-label']) !!}
											{!! Form::textarea('description', $place->description, ['class' => 'form-control', 'required']) !!}
											{!! $errors->first('description', '<p class="help-block">* :message</p>') !!}
										</div>
									</div>
									<div class="col-md-6">
										<div class="form-group {{ ($errors->has('latitude') || $errors->has('longitude'))  ? 'has-error' : '' }}">
											{!! Form::label('location', __('Location'), ['class' => 'control-label']) !!}
											<div id="map" style="height:214px"></div>
											{!! $errors->first('latitude', '<p class="help-block">* :message</p>') !!}
											{!! $errors->first('longitude', '<p class="help-block">* :message</p>') !!}
										</div>
									</div>
								</div>

								<div class="form-group">
									{!! Form::button('<i class="far fa-save fa-fw"></i> ' . __('Save!'), ['type' => 'submit', 'class' => 'btn btn-success']) !!}
									<a href="{{ route('places') }}" class="btn btn-default"><i class="far fa-times-circle fa-fw"></i> {{ __('Cancel') }}</a>
								</div>

							{!! Form::close() !!}
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
@endsection

@include('scripts.googlemaps')