@extends('adminlte::page')

@section('title', 'Reservation Guests - MembershipCTL')

@section('content_header')
    <h1>{{ __('Maintenance') }}</h1>
@endsection

@section('content')
	<div class="row">
		<div class="col-xs-12">
			<div class="box">
				<div class="box-header with-border">
					<h3 class="box-title">{{ __('Editting Reservation Guest: ') . $reservation_guest->full_name }}</h3>
				</div>
				<div class="box-body">
					<div class="row">
						<div class="col-xs-12">
							{!! Form::open(['route' => ["reservation_guests.update", $reservation_guest->id], 'method' => 'put']) !!}
								
								{!! Form::hidden('reservation_id', $reservation_guest->reservation_id) !!}

								<div class="row">
									<div class="col-sm-6">
										<div class="form-group {{ $errors->has('full_name') ? 'has-error' : '' }}">
											{!! Form::label('full_name', __('Full Name'), ['class' => 'control-label']) !!}
											{!! Form::text('full_name', $reservation_guest->full_name, [
												'class' 	=> 'form-control',
												'required'
											]) !!}
											{!! $errors->first('full_name', '<p class="help-block">* :message</p>') !!}
										</div>
									</div>
									<div class="col-sm-6">
										<div class="form-group {{ $errors->has('document') ? 'has-error' : '' }}">
											{!! Form::label('document', __('Document'), ['class' => 'control-label']) !!}
											{!! Form::text('document', $reservation_guest->document, [
												'class'		=> 'form-control',
												'required'
											]) !!}
											{!! $errors->first('document', '<p class="help-block">* :message</p>') !!}
										</div>
									</div>
								</div>

								<div class="form-group">
									{!! Form::button('<i class="far fa-save fa-fw"></i> ' . __('Save!'), ['type' => 'submit', 'class' => 'btn btn-success']) !!}
									<a href="{{ route('reservation_guests', ['id' => $reservation_guest->reservation_id]) }}" class="btn btn-default"><i class="far fa-times-circle fa-fw"></i> {{ __('Cancel') }}</a>
								</div>

							{!! Form::close() !!}
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
@endsection