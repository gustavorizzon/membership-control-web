@extends('adminlte::page')

@section('title', 'Attractions - MembershipCTL')

@section('content_header')
    <h1>{{ __('Maintenance') }}</h1>
@endsection

@section('content')
	<div class="row">
		<div class="col-xs-12">
			<div class="box">
				<div class="box-header with-border">
					<h3 class="box-title">{{ __('Editting Attraction: ') . $attraction->name }}</h3>
				</div>
				<div class="box-body">
					<div class="row">
						<div class="col-xs-12">
							{!! Form::open(['route' => ["attractions.update", $attraction->id], 'method' => 'put']) !!}
							
							<div class="row">
								<div class="col-sm-6">
									<div class="form-group {{ $errors->has('name') ? 'has-error' : '' }}">
										{!! Form::label('name', __('Name'), ['class' => 'control-label']) !!}
										{!! Form::text('name', $attraction->name, [
											'class' 	=> 'form-control',
											'required'
										]) !!}
										{!! $errors->first('name', '<p class="help-block">* :message</p>') !!}
									</div>
								</div>
								<div class="col-sm-6">
									<div class="form-group {{ $errors->has('attraction_type_id') ? 'has-error' : '' }}">
										{!! Form::label('attraction_type_id', __('Type'), ['class' => 'control-label']) !!}
										{!! Form::select('attraction_type_id',
											\App\AttractionType::orderBy('name')->pluck('name', 'id')->toArray(), $attraction->attraction_type_id,
											['class' => 'form-control']
										) !!}
										{!! $errors->first('attraction_type_id', '<p class="help-block">* :message</p>') !!}
									</div>
								</div>
							</div>

							<div class="row">
								<div class="col-xs-12">
									<div class="form-group {{ $errors->has('description') ? 'has-error' : '' }}">
										{!! Form::label('description', __('Description'), ['class' => 'control-label']) !!}
										{!! Form::textarea('description', $attraction->description, ['class' => 'form-control', 'required']) !!}
										{!! $errors->first('description', '<p class="help-block">* :message</p>') !!}
									</div>
								</div>
							</div>

							<div class="form-group">
								{!! Form::button('<i class="far fa-save fa-fw"></i> ' . __('Save!'), ['type' => 'submit', 'class' => 'btn btn-success']) !!}
								<a href="{{ route('attractions') }}" class="btn btn-default"><i class="far fa-times-circle fa-fw"></i> {{ __('Cancel') }}</a>
							</div>

							{!! Form::close() !!}
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
@endsection